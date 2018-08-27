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

       if (!$request->isMethod('POST'))
       {
         $bookingResult->secondValidNumbers($nameSession,$this->get('validator'));
         $sessionService->removeSession($sessionService->getIdSessionValide($uuidSession));
       }
       $form = $this->createForm(StripeType::class);
       $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
          $payValue = $request->request->get($form->getName());
          $bookingResult->payAndAddToBooking($nameSession,$payValue);
          $bookingValue = $bookingResult->addValueToBooking($nameSession);
          $totalPay = $bookingResult->additionPrice($bookingValue);
          $Swift->mailBooking($bookingValue,$payValue['email'],$totalPay);
          return $this->redirectToRoute('thanksForTicket', [], 301);

        }

         return $this->render('defray/defray.html.twig', [
             'formStripe' => $form->createView(),
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

         if (!$request->isMethod('POST'))
         {
           $uuidSession = $request->cookies->get('Uuid');
           $nameSession = $sessionService->getIdSession($uuidSession);
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
