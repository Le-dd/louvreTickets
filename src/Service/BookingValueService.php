<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;

use Symfony\Component\Intl\Intl;

use Doctrine\ORM\EntityManagerInterface;

use App\Service\StripeService;
use App\Service\SessionService;

use App\Entity\Rate;
use App\Entity\Type;
use App\Entity\Booking;
use App\Repository\RateRepository;
use App\Repository\TypeRepository;

use App\Validator\Constraints as BookingAssert;



class BookingValueService
{
  /**
   * @var SessionService
   */
  private $session;

  /**
   * @var EntityManager
   */
  private $entityManager;

  public function __construct(SessionService $sessionService,EntityManagerInterface $entityManager)
    {
      $this->sessionService =$sessionService;
      $this->entityManager =$entityManager;
    }


    /**
     * add new value in booking for twig
     * @param  mixed
     * @return mixed
     */
    public function addValueToBooking(string $sessionName){

      $response =$this->sessionService->getSession($sessionName);
      $repoRate= $this->entityManager->getRepository(Rate::class);
      $repoType= $this->entityManager->getRepository(Type::class);
      for($i = 0; $i < count($response); ++$i){
        $rate= $repoRate->find($response[$i]['rateId']);
        $type=$repoType->find($response[$i]['typeId']);

        $response[$i]=$this->dateTimeInBooking($response[$i]);
        $response[$i]['idResponse'] = $i;
        $response[$i]['nameRate']= $rate->getName();
        $response[$i]['nameType']= $type->getName();
        $response[$i]['priceRate']= $this->choicePrice($type->getName(),$rate->getPrice());
        $response[$i]['nameCountry']= Intl::getRegionBundle()->getCountryName($response[$i]['country']);


      }

      return $response;

    }



    /**
     * valid if number to booking < 1000
     * @param  mixed
     * @return mixed
     */
    public function secondValidNumbers(string $sessionName,ValidatorInterface $validator){

      $response = $this->sessionService->getSession($sessionName);

      for($i = 0; $i < count($response); ++$i){

        $response[$i]=$this->dateTimeInBooking($response[$i]);
        $booking = $this->addToEntityBooking($response[$i]);
        $numberVisitConstraint = new BookingAssert\NumberVisit();

        $errors = $validator->validate(
              $booking->getVisitDate(),
              $numberVisitConstraint
        );
        if (0 !== count($errors)) {
          return $this->redirectToRoute('billetterie', [], 301);
          }
      }


    }

    /**
     * valid if number to booking < 1000
     * @param  mixed
     * @return mixed
     */
    public function payAndAddToBooking(string $sessionName,string $nameSessionResultLast,array $result,string $nameSessionError){

      $response =$this->sessionService->getSession($sessionName);
      $stripe = new StripeService($this->sessionService);
      $customer = $stripe->createCustomer($result['token'],$result['email'],$nameSessionError);

      for($i = 0; $i < count($response); ++$i){

        $response[$i]=$this->dateTimeInBooking($response[$i]);
        $booking = $this->addToEntityBooking($response[$i]);

        $name = $booking->getName();
        $firstName = $booking->getFirstName();
        $numberCode = uniqid();
        $code = "{$name[0]}{$name[1]}-{$firstName[0]}{$firstName[1]}-{$numberCode}";
        $booking->setCode($code);
        $booking->setTokenCb($result['token']);
        $type = $booking->getTypeId();
        $rate = $booking->getRateId();
        $amount = $this->choicePrice($type->getName(),$rate->getPrice());
        $stripe->simplePay($customer, $result, $amount,$nameSessionError);

        $this->entityManager->persist($booking);

        $this->sessionService->delEntityInSession($sessionName,0);

        $valueBooking = [
          'name' => $booking->getName(),
          'firstName' => $booking->getFirstName(),
          'country' => $booking->getCountry(),
          'birthDate'=> date_format($booking->getBirthDate(),"Y-m-d H:i:s"),
          'rateId' => $rate->getId(),
          'typeId' => $type->getId(),
          'visitDate' => date_format($booking->getVisitDate(),"Y-m-d H:i:s"),
          'tokenCb' => $booking->getTokenCb(),
          'code' => $booking->getCode(),
          'email'=> $result['email']
        ];

        $SessionResultLast = $this->sessionService->getSession($nameSessionResultLast);
        $SessionResultLast[] = $valueBooking;
        $this->sessionService->setSession($nameSessionResultLast,$SessionResultLast);


      }
      $this->entityManager->flush();
      $this->sessionService->removeSession($sessionName);

    }

    /**
     * add value in entity booking
     * @param  array $sessionName
     * @return booking
     */
    private function addToEntityBooking(array $booking){
      $repoRate= $this->entityManager->getRepository(Rate::class);
      $repoType= $this->entityManager->getRepository(Type::class);
      $rate= $repoRate->find($booking['rateId']);
      $type= $repoType->find($booking['typeId']);
        $response = (new Booking())
          ->setName($booking['name'])
          ->setFirstName($booking['firstName'])
          ->setCountry($booking['country'])
          ->setBirthDate($booking['birthDate'])
          ->setRateId($rate)
          ->setTypeId($type)
          ->setVisitDate($booking['visitDate']);
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
     * @param  array  $billets
     * @return array $billets
     */
    public function dateTimeInArray(array $billets)
    {
      for($i = 0; $i < count($billets); ++$i){
      $billets[$i]['visitDate']=new \DateTime($billets[$i]['visitDate']['date']);
      $billets[$i]['birthDate']=new \DateTime($billets[$i]['birthDate']['date']);
      }
      return $billets;
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

    /**
     * transform price
     * @param  string $typeName
     * @param   $ratePrice
     * @return $result
     */
    private function choicePrice(string $typeName,$ratePrice){
      if($typeName === "Journée"){
        $result = $ratePrice;
      }else{
      $value = $ratePrice/2;
      $result = floatval(number_format ( $value , 2 ));
      }
      return $result;
    }


}
