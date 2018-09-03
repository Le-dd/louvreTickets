<?php
namespace App\tests\Validator\Constraints;

use PHPUnit\Framework\TestCase;

use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Context\ExecutionContext;
use Symfony\Component\Validator\Violation\ConstraintViolationBuilder;

use App\Validator\Constraints\NumberVisit;
use App\Validator\Constraints\NumberVisitValidator;



use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Booking;
use App\Repository\BookingRepository;


class NumberVisitValidatorTest extends TestCase
{

  protected function initValidator(int $numberBooking,$expectedMessage = null)
     {

      $countDate[0][1] = "$numberBooking";
      $session = new Session(new MockArraySessionStorage());

      $bookingRepository = $this->createMock(BookingRepository::class);
      $bookingRepository->expects($this->any())
        ->method('countAllDay')
        ->willReturn($countDate);

      $entityManager = $this->createMock(EntityManagerInterface::class);
      $entityManager->expects($this->any())
          ->method('getRepository')
          ->willReturn($bookingRepository);


      $builder = $this->getMockBuilder(ConstraintViolationBuilder::class)
        ->disableOriginalConstructor()
        ->setMethods(['addViolation'])
        ->getMock();

      $context = $this->getMockBuilder(ExecutionContext::class)
        ->disableOriginalConstructor()
        ->setMethods(['buildViolation'])
        ->getMock();

      if ($expectedMessage) {
        $builder->expects($this->once())->method('addViolation');

        $context->expects($this->once())
          ->method('buildViolation')
          ->with($this->equalTo($expectedMessage))
          ->will($this->returnValue($builder));
      } else {
        $context->expects($this->never())->method('buildViolation');
      }

      $validator = new NumberVisitValidator($session,$entityManager);

      $validator->initialize($context);

      return $validator;
     }




  public function testValidateIsValide()
  {
    $NumberVisitConstraint = new NumberVisit();

    $NumberVisitValidator = $this->initValidator(1);
    $NumberVisitValidator->validate(new \DateTime(), $NumberVisitConstraint);
  }

  public function testValidateIsInvalide()
  {
    $NumberVisitConstraint = new NumberVisit();

    $NumberVisitValidator = $this->initValidator(1000,$NumberVisitConstraint->message);
    $NumberVisitValidator->validate(new \DateTime(), $NumberVisitConstraint);

  }
}
