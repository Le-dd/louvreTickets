<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

use Symfony\Component\Intl\Intl;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Rate;
use App\Entity\Type;
use App\Repository\RateRepository;
use App\Repository\TypeRepository;


class BookingValueService
{
  /**
   * @var SessionInterface
   */
  private $session;

  /**
   * @var EntityManager
   */
  private $entityManager;

  public function __construct(SessionInterface $session,EntityManagerInterface $entityManager)
    {
      $this->session =$session;
      $this->entityManager =$entityManager;
    }


    /**
     * add new value in booking for twig
     * @param  mixed
     * @return mixed
     */
    public function addValueToBooking(string $sessionName){

      $response =json_decode($this->session->get($sessionName),true);
      $repoRate= $this->entityManager->getRepository(Rate::class);
      $repoType= $this->entityManager->getRepository(Type::class);
      for($i = 0; $i < count($response); ++$i){
        $rate= $repoRate->find($response[$i]['rateId']);
        $type=$repoType->find($response[$i]['typeId']);

        $response[$i]=$this->dateTimeInBooking($response[$i]);
        $response[$i]['idResponse'] = $i;
        $response[$i]['nameRate']= $rate->getName();
        $response[$i]['nameType']= $type->getName();
        if($type->getName() === "Journée"){
          $response[$i]['priceRate']= $rate->getPrice();
        }else{
        $value = $rate->getPrice()/2;
        $response[$i]['priceRate'] = floatval(number_format ( $value , 2 ));
        }

        $response[$i]['nameCountry']= Intl::getRegionBundle()->getCountryName($response[$i]['country']);


      }

      return $response;

    }


    /**
     * Change string dateTime to object DateTime
     * @param  array  $billet
     * @return array $billet
     */
    public function dateTimeInBooking(array $billet)
    {

      $billet['visitDate']=new \DateTime($billet['visitDate']);
      $billet['birthDate']=new \DateTime($billet['birthDate']);

      return $billet;
    }

    /**
     * Change string dateTime to object DateTime
     * @param  array  $billet
     * @return array $billet
     */
    public function idRateInBooking(array $booking)
    {
      $repoRate= $this->entityManager->getRepository(Rate::class);
      if(isset($booking['rateId']) && $booking['rateId'] === 'Réduit')
      {
        $resultBooking = $repoRate->findByName($booking['rateId']);
        $booking = $resultBooking[0]->getId();
        return $booking;
      }
      if($booking['birthDate'] )
      {
        $date = new \DateTime($booking['birthDate']);
        $now = new \DateTime();
        $age = $now->diff($date)->y;

        $Bookings = $repoRate->findAll();
        for($i=0; $i < count($Bookings) ;++$i)
        {
          if ($Bookings[$i]->getMinAge() != 'NaN' && $Bookings[$i]->getMaxAge() != 'NaN' )
          {
            $minAge= intval($Bookings[$i]->getMinAge());
            $maxAge = intval($Bookings[$i]->getMaxAge());
            if ($minAge <= $age   && $maxAge > $age )
            {
              $booking = $Bookings[$i]->getId();
              return $booking;
            }
          }
        }
      }
    }


    /**
     * Addition priceRate for values session
     * @param  array  $Value
     * @return int $response
     */
    public function additionPrice(array $Value)
    {
      $response = 0;
      for($i = 0; $i < count($Value); ++$i){
      $response += $Value[$i]['priceRate'];
      }
      return $response;
    }



}
