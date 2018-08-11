<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Booking;
use App\Form\BookingType;

use App\Service\BookingValueService;
use App\Service\SessionService;


class QuoteController extends Controller
{
    /**
     * @Route("/quote", name="quote")
     */
     public function quote(
       Request $request,
       BookingValueService $bookingResult,
       SessionService $sessionService
       )
     {

       $uuidSession = $request->cookies->get('Uuid');
       $nameSession = $sessionService->getIdSession($uuidSession);

         $formBillet = null;
         if($sessionService->ArrayInSessionEmpty($uuidSession))
         {
           $formBillet = $bookingResult->addValueToBooking($nameSession);
           $totalPrice = $bookingResult->additionPrice($formBillet);
         }

         
         return $this->render('quote/quote.html.twig', [
             'formBillet' => $formBillet,
             'totalPrice'=>$totalPrice

         ]);
     }

   /**
    * @Route("/quoteDelete", name="quoteDelete")
    */
   public function quoteDelete(
     Request $request,
     BookingValueService $bookingResult,
     SessionService $sessionService
     )
     {
       $uuidSession = $request->cookies->get('Uuid');
       $idDelete = intval($request->request->get('idBillet'));
       $sessionService->delEntityInSession($sessionService->getIdSession($uuidSession),$idDelete);
       $uuidSession = $request->request->get('idSession');
       return $this->redirectToRoute('quote', [], 301);
     }
}
