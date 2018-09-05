<?php

namespace App\tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;


use App\Entity\Rate;
use App\Entity\Type;
use App\Repository\RateRepository;
use App\Repository\TypeRepository;


class BilletterieControllerTest extends WebTestCase
{



  public function testShowBilletterie()
  {
      $client = static::createClient();

      $client->request('GET', '/');

      $this->assertEquals(200, $client->getResponse()->getStatusCode());
  }

  public function testFormBilletterie()
  {

    $kernel = self::bootKernel();

    $entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    $Type= $entityManager
          ->getRepository(Type::class)
          ->findByName('Journée');
    $value= new \DateTime();
    $year = date_format($value,"Y");
    $visitDate=new \DateTime("next friday");
    $arrayData = ["{$year}-05-01","{$year}-11-01","{$year}-12-25"];
    $visitDateArray = date_format($visitDate,"Y-m-d");
    if(in_array($visitDateArray, $arrayData)){
      $visitDate=new \DateTime("next thursday");
    };

      $client = static::createClient();
      $crawler = $client->request('GET', '/');

      $form = $crawler->selectButton('Ajouter un billet')->form();
      $form['booking[name]'] = 'Emeric';
      $form['booking[firstName]'] = 'Lebbrecht';
      $form['booking[country]']='FR';
      $form['booking[typeId]']= $Type[0]->getId();
      $form['booking[visitDate]'] = date_format($visitDate,"Y-m-d H:i:s");
      $form['booking[birthDate]'] = date_format(new \DateTime("now - 20 years"),"Y-m-d H:i:s");
      $client->submit($form);


      $this->assertTrue($client->getResponse()->isRedirect());

      return $form;

  }

    /**
      * @depends testFormBilletterie
      */
   public function testOneBilletBilletterie($form)
   {
     $kernel = self::bootKernel();

     $entityManager = $kernel->getContainer()
             ->get('doctrine')
             ->getManager();
     $Rate= $entityManager
           ->getRepository(Rate::class)
           ->findByName('Normal')
           ;
     $client = static::createClient();
     $uuid = uniqid();
     $prefix = "resultForm_";
     $fakeValue=[
     ['name' => $form['booking[name]']->getValue() ,
     'firstName' => $form['booking[firstName]']->getValue(),
     'country' => $form['booking[country]']->getValue(),
     'typeId' =>$form['booking[typeId]']->getValue(),
     'visitDate' => $form['booking[visitDate]']->getValue(),
     'birthDate' => $form['booking[birthDate]']->getValue(),
     'rateId' =>$Rate[0]->getId(),
      ]];

     $session = $client->getContainer()->get('session');
     $session->set("{$prefix}{$uuid}", json_encode($fakeValue));
     $session->save();

     $cookie = new Cookie('Uuid', $uuid);
     $client->getCookieJar()->set($cookie);

     $crawler = $client->request('GET', '/');

     $this->assertSame(1, $crawler->filter('html:contains("Devis ▶")')->count());

     return $fakeValue;


   }
}
