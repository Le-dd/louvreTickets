<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use App\Form\StripeType;

use App\Service\SwiftMailerService;
use App\Service\BookingValueService;
use App\Service\SessionService;


class DefrayController extends Controller
{
    /**
     * @Route("/defray", name="defray")
     */
     public function defray(
       Request $request,
       BookingValueService $bookingResult,
       SessionService $sessionService,
       SwiftMailerService $Swift
       )
     {

       $uuidSession = $request->cookies->get('Uuid');
       $nameSession = $sessionService->getIdSession($uuidSession);
       $nameSessionResultLast = $sessionService->getIdSession($uuidSession,"resultLast_");
       $sessionService->newSession($nameSessionResultLast,json_encode([]));
       $testeErreur = $sessionService->ArrayInSessionEmpty($nameSessionResultLast);

       if (!$request->isMethod('POST') && !$testeErreur)
       {
         $bookingResult->secondValidNumbers($nameSession,$this->get('validator'));
         $sessionService->removeSession($sessionService->getIdSession($uuidSession,"valide_"));
       }
       $form = $this->createForm(StripeType::class);
       $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
          $payValue = $request->request->get($form->getName());
          $bookingResult->payAndAddToBooking($nameSession,$nameSessionResultLast,$payValue);
          $bookingValue = $bookingResult->addValueToBooking($nameSessionResultLast);
          $totalPay = $bookingResult->additionPrice($bookingValue);
          $Swift->mailBooking($bookingValue,$payValue['email'],$totalPay);
          return $this->redirectToRoute('thanksForTicket', [], 301);

        }

    $erreurCB = null;
    if($testeErreur)
    {
      $erreurCB = 'erreur';
    }

         return $this->render('defray/defray.html.twig', [
             'formStripe' => $form->createView(),
             'erreurCB' => $erreurCB
         ]);
     }

     /**
      * @Route("/thanksForTicket", name="thanksForTicket")
      */
     public function thanksForTicket(
       Request $request,
       BookingValueService $bookingResult,
       SessionService $sessionService,
       SwiftMailerService $Swift
       )
       {
         //resultLast_
         if (!$request->isMethod('POST'))
         {
           $uuidSession = $request->cookies->get('Uuid');
           $nameSession = $sessionService->getIdSession($uuidSession,"resultLast_");
           $bookingValue = json_encode($bookingResult->addValueToBooking($nameSession));
           $sessionService->removeSession($nameSession);
         }

         if ($request->isMethod('POST'))
         {
           $bookingValue = $request->request->get('bookingValue');
           $bookingValue = json_decode($bookingValue,true);
           $bookingValue = $bookingResult->dateTimeInArray($bookingValue);
           $totalPay =$bookingResult->additionPrice($bookingValue);
           $Swift->mailBooking($bookingValue,$bookingValue[0]['email'],$totalPay);
           $bookingValue = json_encode($bookingValue);
         }

         return $this->render('defray/thanksForTicket.html.twig', [
             'bookingValue' => $bookingValue
         ]);
       }
}
