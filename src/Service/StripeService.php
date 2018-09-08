<?php

namespace App\Service;




class StripeService
{

  public function createCustomer(string $token,string $email){

  \Stripe\Stripe::setApiKey("sk_test_lnxY8Rwd6mXknpAmQfZ0vD3K");

  $customer = \Stripe\Customer::create([
      'source' => $token,
      'email' => $email,
  ]);

  return $customer;

  }


  public function simplePay($customer, array $result, $amount){

    \Stripe\Stripe::setApiKey("sk_test_lnxY8Rwd6mXknpAmQfZ0vD3K");


    $charge = \Stripe\Charge::create([
        'amount' => $amount*100,
        'currency' => 'eur',
        'description' => "billet de {$result['name']} {$result['firstName']} d'un montant de $amount €",
        'customer' => $customer->id,
    ]);


    if ($charge->failure_code !== null){
      return $this->redirectToRoute('defray', [], 301);
    }

  }



}
