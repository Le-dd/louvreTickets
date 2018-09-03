<?php

namespace App\tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class BilletterieControllerTest extends WebTestCase
{


  public function testShowBilletterie()
  {
      $client = static::createClient();

      $client->request('GET', '/');

      $this->assertEquals(200, $client->getResponse()->getStatusCode());

      echo $client->getResponse()->getContent();
  }


}
