<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BilletterieController extends Controller
{
    /**
     * @Route("/", name="billetterie")
     */
    public function index()
    {
        return $this->render('billetterie/index.html.twig', [
            'controller_name' => 'BilletterieController',
        ]);
    }
}
