<?php

namespace App\tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;

use App\Entity\Rate;
use App\Entity\Type;
use App\Repository\RateRepository;
use App\Repository\TypeRepository;

class DefrayControllerTest extends WebTestCase
{

  public function testShowDefray()
  {

      $kernel = self::bootKernel();

      $entityManager = $kernel->getContainer()
              ->get('doctrine')
              ->getManager();
      $Type= $entityManager
            ->getRepository(Type::class)
            ->findByName('Journée');
      $Rate= $entityManager
            ->getRepository(Rate::class)
            ->findByName('Normal')
            ;
      $value= new \DateTime();
      $year = date_format($value,"Y");
      $visitDate=new \DateTime("next friday");
      $arrayData = ["{$year}-05-01","{$year}-11-01","{$year}-12-25"];
      $visitDateArray = date_format($visitDate,"Y-m-d");
      if(in_array($visitDateArray, $arrayData)){
        $visitDate=new \DateTime("next thursday");
      };

      $fakeValue=[
      ['name' => 'Emeric',
      'firstName' => 'Lebbrecht',
      'country' => 'FR',
      'typeId' =>$Type[0]->getId(),
      'visitDate' => date_format($visitDate,"Y-m-d H:i:s"),
      'birthDate' => date_format(new \DateTime("now - 20 years"),"Y-m-d H:i:s"),
      'rateId' =>$Rate[0]->getId(),
       ]];

      $client = static::createClient();
      $uuid = uniqid();
      $prefix = "resultForm_";
      $session = $client->getContainer()->get('session');
      $session->set("{$prefix}{$uuid}", json_encode($fakeValue));
      $session->save();
      $cookie = new Cookie('Uuid', $uuid);
      $client->getCookieJar()->set($cookie);

      $crawler = $client->request('GET', '/defray');

      $this->assertEquals(200, $client->getResponse()->getStatusCode());

      return $fakeValue;


  }

  /**
    * @depends testShowDefray
    */
 public function testShowthanksForTicket($fakeValue)
 {
   $client = static::createClient();
   $uuid = uniqid();
   $prefix = "resultLast_";
   $session = $client->getContainer()->get('session');
   $session->set("{$prefix}{$uuid}", json_encode($fakeValue));
   $session->save();
   $cookie = new Cookie('Uuid', $uuid);
   $client->getCookieJar()->set($cookie);

   $crawler = $client->request('GET', '/thanksForTicket');


   $this->assertEquals(200, $client->getResponse()->getStatusCode());

 }


}
