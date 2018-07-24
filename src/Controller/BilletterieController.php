<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\Booking;
use App\Form\BookingType;

class BilletterieController extends Controller
{
    /**
     * @Route("/", name="billetterie")
     */
    public function index(Request $request, ObjectManager $manager)
    {   $booking = new Booking();
        $form = $this->createForm(BookingType::class,$booking);

        return $this->render('billetterie/index.html.twig', [
            'formBooking' => $form->createView()
        ]);
    }
}
