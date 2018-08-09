<?php
namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Booking;
use App\Entity\BookingRepository;

class NumberVisitValidator extends ConstraintValidator
{

  /**
   * @var SessionInterface
   */
  private $session;

  /**
   * @var EntityManager
   */
  private $entityManager;



  public function __construct(SessionInterface $session,EntityManagerInterface $entityManager)
    {
      $this->session =$session;
      $this->entityManager =$entityManager;

    }

    public function validate($value, Constraint $constraint)
    {

      if (null === $value || '' === $value) {
          return;
      }
      $request= new Request;
      $uuidSession = $request->cookies->get('Uuid');
      if (!empty($this->session->has("resultForm_{$uuidSession}"))) {
      $sessionCount  = count(json_decode($this->session->get("resultForm_{$uuidSession}"),true));
    }else{
      $sessionCount  = 0;
    }
      $repoBooking= $this->entityManager->getRepository(Booking::class);
      $countDate= $repoBooking->countAllDay($value->format('Y-m-d'));
      $valueCount = intval($countDate[0][1]) + $sessionCount+1;


        if ($valueCount >= 1000) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ date }}',date_format($value,"d/m/Y"))
                ->addViolation();
        }
    }
}
