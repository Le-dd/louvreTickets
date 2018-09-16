<?php
namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\HttpFoundation\RequestStack;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Type;
use App\Repository\TypeRepository;

class ValidateTimeValidator extends ConstraintValidator
{


    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var RequestStack
     */
    private $requestStack;


    public function __construct(SessionInterface $session,EntityManagerInterface $entityManager,RequestStack $requestStack)
      {
        $this->session =$session;
        $this->entityManager =$entityManager;
        $this->requestStack = $requestStack;

      }

    public function validate($value, Constraint $constraint)
    {
      if (null === $value || '' === $value) {
          return;
      }
        $request = $this->requestStack->getCurrentRequest();
        $uuidSession = $request->cookies->get('Uuid');


        if (!empty($this->session->has("valideTime_{$uuidSession}"))) {
          $dateSelectedSession = $this->session->get("valideTime_{$uuidSession}");
          $dateSelected = date_format(new \DateTime($dateSelectedSession),"Y-m-d");
        }

        $nowDateTime = new \DateTime();
        $nowDate = date_format($nowDateTime,"Y-m-d");
        $nowFourteen = new \DateTime(date_format($nowDateTime,"Y-m-d").' 14:00:00');

        $repoType= $this->entityManager->getRepository(Type::class);
        $type = $repoType->find($value);
        $valueName = $type->getName();


        if ($valueName === "Journée" && $nowDateTime > $nowFourteen && $dateSelected === $nowDate) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}
