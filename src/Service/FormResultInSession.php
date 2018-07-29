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


class FormResultInSession
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



  public function addNewBilletInSession(string $sessionName,Request $request,string $formName):void
    {
      $resultInSession= json_decode($this->session->get($sessionName),true);
      $resultRequest= $request->request->get($formName);
      array_pop($resultRequest);
      $resultInSession[] =$resultRequest;
      $this->session->set($sessionName, json_encode($resultInSession));

    }

    /**
     * Change string dateTime to object DateTime
     * @param  array  $billet
     * @return array $billet
     */
    public function transToDateTime(array $billet)
    {
      $billet['visitDate']=new \DateTime($billet['visitDate']);
      $billet['birthDate']=new \DateTime($billet['birthDate']);
      return $billet;
    }

    /**
     * delete one booking in session
     * @param  string $sessionName
     * @param  int    $idDelete
     */
    public function delBillet(string $sessionName,int $idDelete) :void
    {
      $arrayResut =json_decode($this->session->get($sessionName),true);
      unset($arrayResut[$idDelete]);
      $arrayResut = array_values($arrayResut);
      $this->session->set($sessionName, json_encode($arrayResut));
    }


    /**
     * add new value in booking for twig
     * @param  mixed
     * @return mixed
     */
    public function NewValueBooking(array $response){

      for($i = 0; $i < count($response); ++$i){

        $response[$i]=$this->transToDateTime($response[$i]);
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

}
