<?php
namespace App\tests\Validator\Constraints;

use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Context\ExecutionContext;
use Symfony\Component\Validator\Violation\ConstraintViolationBuilder;

use PHPUnit\Framework\TestCase;

use App\Validator\Constraints\MonthBirthDate;
use App\Validator\Constraints\MonthBirthDateValidator;


class MonthBirthDateValidatorTest extends TestCase
{


  protected function initValidator($expectedMessage = null)
  {
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

      $validator = new MonthBirthDateValidator;
      /* @var ExecutionContext $context */
      $validator->initialize($context);

      return $validator;
  }

  public function testValidateIsValide()
  {
    $MonthBirthDateConstraint = new MonthBirthDate();

    $MonthBirthDateValidator = $this->initValidator();
    $MonthBirthDateValidator->validate(new \DateTime("now - 10 months"), $MonthBirthDateConstraint);
  }

  public function testValidateIsInvalide()
  {
    $MonthBirthDateConstraint = new MonthBirthDate();

    $MonthBirthDateValidator = $this->initValidator($MonthBirthDateConstraint->message);
    $MonthBirthDateValidator->validate(new \DateTime(), $MonthBirthDateConstraint);

  }
}
