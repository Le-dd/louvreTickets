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

      for($i = 0; $i < count($response); ++$i){

        $response[$i]=$this->dateTimeInBooking($response[$i]);
        $response[$i]['idResponse'] = $i;
        $repoRate= $this->entityManager->getRepository(Rate::class);
        $idRate=intval($response[$i]['rateId']);
        $rate= $repoRate->findById($idRate);
        $rateName= $rate[0]->getName();
        $ratePrice= $rate[0]->getPrice();
        $response[$i]['nameRate']= $rateName;
        $response[$i]['priceRate']= $ratePrice;
        $repoType= $this->entityManager->getRepository(Type::class);
        $type=$repoType->find($response[$i]['typeId']);
        $response[$i]['nameType'] = $type->getName();
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




}
