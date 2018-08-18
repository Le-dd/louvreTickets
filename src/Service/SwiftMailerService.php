<?php

namespace App\Service;

use App\Service\SessionService;


class SwiftMailerService
{

  public function mail($value, \Swift_Mailer $mailer,SessionService $sessionService){
    $uuidSession = $request->cookies->get('Uuid');
    $nameSession = $sessionService->getIdSession($uuidSession);
    $valueSession = getSession($nameSession);


    $message = (new \Swift_Message('Hello Email'))
        ->setFrom('send@example.com')
        ->setTo('recipient@example.com')
        ->setBody(
          $this->renderView('devisEtBillet.mjml.twig',['valueSession' => $valueSession ]),
          'text/mjml'
        )
        >addPart(
            $this->renderView(
                'emails/registration.txt.twig',['valueSession' => $valueSession ]),
            'text/plain'
        );

    $mailer->send($message);


}



}
