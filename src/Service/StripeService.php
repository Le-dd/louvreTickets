<?php

namespace App\Service;




class StripeService
{

  public function createCustomer(string $token,string $email){

  \Stripe\Stripe::setApiKey("pk_test_yIPUyjFH83amYU9zj43S2oma");

  $customer = \Stripe\Customer::create([
      'source' => 'tok_mastercard',
      'email' => 'paying.user@example.com',
  ]);

  return $customer;

  }


  public function simplePay($customer, int $amount,string $name,string $firstName ){

    \Stripe\Stripe::setApiKey("pk_test_yIPUyjFH83amYU9zj43S2oma");

    $amountCent = $amount*100;

    $charge = \Stripe\Charge::create([
        'amount' => $amountCent,
        'currency' => 'eur',
        'description' => "billet de $name $firstName d'un montant de $amount €",
        'customer' => $customer->id,
    ]);

  }



}
