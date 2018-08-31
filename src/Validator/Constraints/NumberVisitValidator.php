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
      $sessionCount = 0;
      if (!empty($this->session->has("resultForm_{$uuidSession}"))) {
        $sessionValueArray = json_decode($this->session->get("resultForm_{$uuidSession}"),true);
        for($i = 0; $i < count($sessionValueArray); ++$i){
          if(date_format($value,"Y-m-d") === date_format($sessionValueArray[i]["visitDate"],"Y-m-d") )
          $sessionCount++ ;
        }
      }

      $repoBooking= $this->entityManager->getRepository(Booking::class);
      $countDate= $repoBooking->countAllDay($value->format('Y-m-d'));
      $valuePlus = intval($this->session->get("valide_{$uuidSession}"));
      $valueCount = intval($countDate[0][1]) + $sessionCount + $valuePlus;
      if($valuePlus>0){
      $this->session->set("valide_{$uuidSession}","0");
      }
        if ($valueCount >= 1000) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ date }}',date_format($value,"d/m/Y"))
                ->addViolation();
        }
    }
}
