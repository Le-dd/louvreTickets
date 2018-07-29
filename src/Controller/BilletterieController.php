<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


use App\Entity\Booking;
use App\Form\BookingType;

use App\Service\FormResultInSession;


class BilletterieController extends Controller
{
    /**
     * @Route("/", name="billetterie")
     */
    public function index(Request $request,SessionInterface $session,FormResultInSession $SessionResult )
    {
        if (!$session->has('resultForm')) {
          $session->set('resultForm', json_encode([]));
        }

        $booking = new Booking();
        $form = $this->createForm(BookingType::class,$booking);
          if ($request->isMethod('POST')){
            $formResponse= $SessionResult->transToDateTime($request->request->get($form->getName()));
            $form->submit($formResponse);

            if($form->isSubmitted() && $form->isValid()){
              $SessionResult->addNewBilletInSession('resultForm',$request,$form->getName());
              return $this->redirectToRoute('billetterie', [], 301);
            }
          }
        $formBillet = null;
        if($session->get('resultForm') !== json_encode([]) ){
          $formBillet = $SessionResult->NewValueBooking(json_decode($session->get('resultForm'),true));
        }

        return $this->render('billetterie/index.html.twig', [
            'formBooking' => $form->createView(),
            'formBillet' => $formBillet
        ]);
    }

  /**
   * @Route("/billetDelete", name="billetDelete")
   */
  public function billetDelete(Request $request,SessionInterface $session,FormResultInSession $SessionResult )
  {
    $idDelete = intval($request->request->get('idBillet'));
    $SessionResult->delBillet('resultForm',$idDelete);
    return $this->redirectToRoute('billetterie', [], 301);
  }

}
