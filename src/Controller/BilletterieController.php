<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Booking;
use App\Form\BookingType;

use App\Service\BookingValueService;
use App\Service\SessionService;


class BilletterieController extends Controller
{

    /**
     * @Route("/", name="billetterie")
     */
    public function index(
      Request $request,
      BookingValueService $bookingResult,
      SessionService $sessionService
      )
    {

      $booking = new Booking();
      $form = $this->createForm(BookingType::class,$booking);
      $newUuid = $sessionService->setUuidCookie($request);
      if($newUuid != null){
        if(!empty($request->cookies->get('Uuid'))){
        $request->cookies->remove('Uuid');
      }
        $request->cookies->set('Uuid',$newUuid);
      }
      $uuidSession = $request->cookies->get('Uuid');

      $nameSession = $sessionService->getIdSession($uuidSession);
      $nameSessionValid = $sessionService->getIdSession($uuidSession,"valide_");
      $sessionService->newSession($nameSession,json_encode([]));
      $sessionService->newSession($nameSessionValid,'0');



        if ($request->isMethod('POST'))
        {
          $valueRequest = $request->request->get($form->getName());
          $nameSessionValidTime = $sessionService->getIdSession($uuidSession,"valideTime_");
          $sessionService->newSession($nameSessionValidTime,$valueRequest['visitDate']);
          $sessionService->setSessionValide($uuidSession,1);
          $formResponse= $bookingResult->dateTimeInBooking($valueRequest);
          $form->submit($formResponse);

          if($form->isSubmitted() && $form->isValid()){
            $valueRequest['rateId'] = $bookingResult->idRateInBooking($valueRequest);
            unset($valueRequest['_token'],$valueRequest['idSession']);
            $sessionService->addEntityInSession($nameSession,$valueRequest);
            return $this->redirectToRoute('billetterie', [], 301);
          }
        }
        $formBillet = null;
        if($sessionService->ArrayInSessionEmpty($nameSession))
        {
          $formBillet = $bookingResult->addValueToBooking($nameSession);
        }


        return $this->render('billetterie/index.html.twig', [
            'formBooking' => $form->createView(),
            'formBillet' => $formBillet,

        ]);
    }

  /**
   * @Route("/billetDelete", name="billetDelete")
   */
  public function billetDelete(
    Request $request,
    BookingValueService $bookingResult,
    SessionService $sessionService
    )
    {
      $uuidSession = $request->cookies->get('Uuid');
      $idDelete = intval($request->request->get('idBillet'));
      $sessionService->delEntityInSession($sessionService->getIdSession($uuidSession),$idDelete);
      $uuidSession = $request->request->get('idSession');
      return $this->redirectToRoute('billetterie', [], 301);
    }

}
