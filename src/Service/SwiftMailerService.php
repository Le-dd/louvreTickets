<?php

namespace App\Service;
use Symfony\Component\DependencyInjection\ContainerInterface;
use NotFloran\MjmlBundle\Mjml;


class SwiftMailerService {

    /**
     * @var \Swift_Mailer
     */
    private $mailer;
    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @var Mjml
     */
    private $mjml;

    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $twig, Mjml $mjml)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
        $this->mjml =$mjml ;
    }

  public function mailBooking(array $bookingValue, string $email, $totalPay){

    $message = (new \Swift_Message('Vos billets pour le louvre'))
        ->setFrom('louvretikets@mail.le-dev-web.com')
        ->setTo($email)
        ->setBody(
          $this->mjml->render(
            $this->twig->render('emails/devisEtBillet.mjml.twig',[
                  'bookingValue' => $bookingValue,
                  'totalPay' => $totalPay
                ])
        ),
        'text/html'
        )
        ->addPart(
            $this->twig->render('emails/devisEtBillet.text.twig',[
                  'bookingValue' => $bookingValue,
                  'totalPay' => $totalPay
                ]),
            'text/plain'
        );

    $this->mailer->send($message);


}



}
