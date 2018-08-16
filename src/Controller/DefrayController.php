<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use App\Form\StripeType;

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
       SessionService $sessionService
       )
     {

       $uuidSession = $request->cookies->get('Uuid');
       $nameSession = $sessionService->getIdSession($uuidSession);

       if (!$request->isMethod('POST'))
       {
         $bookingResult->secondValidNumbers($nameSession,$this->get('validator'));
       }
       $form = $this->createForm(StripeType::class);
       $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
          $valueRequest = $request->request->get($form->getName());
          

        }
         return $this->render('defray/defray.html.twig', [
             'formStripe' => $form->createView(),


         ]);
     }
}
