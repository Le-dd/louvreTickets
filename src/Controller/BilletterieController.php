<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\Booking;
use App\Form\BookingType;
use App\Entity\Rate;
use App\Entity\Type;
use App\Repository\RateRepository;
use App\Repository\TypeRepository;
use Symfony\Component\Intl\Intl;

class BilletterieController extends Controller
{
    /**
     * @Route("/", name="billetterie")
     */
    public function index(Request $request, ObjectManager $manager,SessionInterface $session)
    {
        if (!$session->has('resultForm')) {
          $session->set('resultForm', json_encode([]));
        }

        $booking = new Booking();
        $form = $this->createForm(BookingType::class,$booking);
          if ($request->isMethod('POST')){
            $formResponse= $this->transToSubmit($request->request->get($form->getName()));
            $form->submit($formResponse);

            if($form->isSubmitted() && $form->isValid()){
              $resultInSession= json_decode($session->get('resultForm'),true);
              $resultRequest=$request->request->get($form->getName());
              array_pop($resultRequest);
              $resultInSession[] =$resultRequest;
              $session->set('resultForm', json_encode($resultInSession));
              return $this->redirectToRoute('billetterie', [], 301);
            }
          }
        $formBillet = null;
        if($session->get('resultForm') !== json_encode([]) ){
          $formBillet = $this->addValue(json_decode($session->get('resultForm'),true));
        }



        return $this->render('billetterie/index.html.twig', [
            'formBooking' => $form->createView(),
            'formBillet' => $formBillet
        ]);
    }

  /**
   * @Route("/billetDelete", name="billetDelete")
   */
  public function billetDelete(Request $request,SessionInterface $session)
  {
    $idDelete = intval($request->request->get('idBillet'));
    $arrayResut =json_decode($session->get('resultForm'),true);
    unset($arrayResut[$idDelete]);
    $arrayResut = array_values($arrayResut);
    $session->set('resultForm', json_encode($arrayResut));
    return $this->redirectToRoute('billetterie', [], 301);
  }

  /**
   * Change string dateTime to object DateTime
   */
  private function transToSubmit($response){

    $response['visitDate']=new \DateTime($response['visitDate']);
    $response['birthDate']=new \DateTime($response['birthDate']);

    return $response;

  }

  /**
   * add new value to booking for twig
   * @param  mixed
   * @return mixed
   */
  private function addValue(array $response){

    for($i = 0; $i < count($response); ++$i){

      $response[$i]=$this->transToSubmit($response[$i]);
      $response[$i]['idResponse'] = $i;
      $repoRate= $this->getDoctrine()->getRepository(Rate::class);
      $idRate=intval($response[$i]['rateId']);
      $rate= $repoRate->findById($idRate);
      $rateName= $rate[0]->getName();
      $ratePrice= $rate[0]->getPrice();
      $response[$i]['nameRate']= $rateName;
      $response[$i]['priceRate']= $ratePrice;
      $repoType= $this->getDoctrine()->getRepository(Type::class);
      $type=$repoType->find($response[$i]['typeId']);
      $response[$i]['nameType'] = $type->getName();
      $response[$i]['nameCountry']= Intl::getRegionBundle()->getCountryName($response[$i]['country']);


    }

    return $response;

  }

  /**
   * delete billet to session
   */
  private function deleteOneBillet(array $valueSession,int $position){

    $response['visitDate']=new \DateTime($response['visitDate']);
    $response['birthDate']=new \DateTime($response['birthDate']);

    return $response;

  }
}
