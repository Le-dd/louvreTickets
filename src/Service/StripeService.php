<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Service\SessionService;


class StripeService
{

  /**
   * @var SessionService
   */
  private $sessionService;

  public function __construct( SessionService $sessionService)
    {
      $this->sessionService =$sessionService;
    }


  public function createCustomer(string $token,string $email,string $nameSessionError){

  \Stripe\Stripe::setApiKey("sk_test_lnxY8Rwd6mXknpAmQfZ0vD3K");


try {
  $customer = \Stripe\Customer::create([
      'source' => $token,
      'email' => $email,
  ]);
} catch(\Stripe\Error\Card $e) {
  $this->error($nameSessionError);
} catch (\Stripe\Error\RateLimit $e) {
  $this->error($nameSessionError);
} catch (\Stripe\Error\InvalidRequest $e) {
  $this->error($nameSessionError);
} catch (\Stripe\Error\Authentication $e) {
  $this->error();
} catch (\Stripe\Error\ApiConnection $e) {
  $this->error($nameSessionError);
} catch (\Stripe\Error\Base $e) {
  $this->error($nameSessionError);
} catch (Exception $e) {
  $this->error($nameSessionError);
}
      return $customer;

      }


  public function simplePay($customer, array $result, $amount,string $nameSessionError){

    \Stripe\Stripe::setApiKey("sk_test_lnxY8Rwd6mXknpAmQfZ0vD3K");


    try {
      $charge = \Stripe\Charge::create([
          'amount' => $amount*100,
          'currency' => 'eur',
          'description' => "billet de {$result['name']} {$result['firstName']} d'un montant de $amount €",
          'customer' => $customer->id,
      ]);

    } catch(\Stripe\Error\Card $e) {
      $this->error($nameSessionError);
    } catch (\Stripe\Error\RateLimit $e) {
      $this->error($nameSessionError);
    } catch (\Stripe\Error\InvalidRequest $e) {
      $this->error($nameSessionError);
    } catch (\Stripe\Error\Authentication $e) {
      $this->error();
    } catch (\Stripe\Error\ApiConnection $e) {
      $this->error($nameSessionError);
    } catch (\Stripe\Error\Base $e) {
      $this->error($nameSessionError);
    } catch (Exception $e) {
      $this->error($nameSessionError);
    }


  }

  private function error($nameSessionError){
    $this->sessionService->setSession($nameSessionError,["error"]);
    (new RedirectResponse('defray', 301, []))->send();
  }



}
