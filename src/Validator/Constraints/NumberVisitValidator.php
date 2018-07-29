<?php
namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

use App\Entity\Booking;
use App\Entity\BookingRepository;

class NumberVisitValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
      $session = SessionInterface::class;
      if (!$session->has('resultForm')) {
      $sessionCount  = count(json_decode($session->get('resultForm'),true));
      }
      $repoDate= $this->getDoctrine()->getRepository(Booking::class);
      $countDate= $repoRate->findById($idRate);


        if (!preg_match('/^[a-zA-Z0-9]+$/', $value, $matches)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ string }}', $value)
                ->addViolation();
        }
    }
}
