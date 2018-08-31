<?php
namespace App\tests\Validator\Constraints;

use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Context\ExecutionContext;
use Symfony\Component\Validator\Violation\ConstraintViolationBuilder;

use PHPUnit\Framework\TestCase;

use App\Validator\Constraints\ValideDate;
use App\Validator\Constraints\ValideDateValidator;


class ValideDateValidatorTest extends TestCase
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

      $validator = new ValideDateValidator;
      /* @var ExecutionContext $context */
      $validator->initialize($context);

      return $validator;
  }

  public function testValidateIsValide()
  {
    $value= new \DateTime();
    $year = date_format($value,"Y");
    $goodDay=new \DateTime("next friday");
    $arrayData = ["{$year}-05-01","{$year}-11-01","{$year}-12-25"];
    $goodDayArray = date_format($goodDay,"Y-m-d");
    if(in_array($goodDayArray, $arrayData)){
      $goodDay=new \DateTime("next thursday");
    };
    $MonthBirthDateConstraint = new ValideDate;

    $MonthBirthDateValidator = $this->initValidator();
    $MonthBirthDateValidator->validate($goodDay, $MonthBirthDateConstraint);
  }

  public function testValidateIsInvalide()
  {

    $value= new \DateTime();

    $year = date_format($value,"Y");
    $holiday= new \DateTime("{$year}-11-01");

    $tuesday=new \DateTime("next tuesday");

    $pastDay=new \DateTime("last friday");
    $arrayData = ["{$year}-05-01","{$year}-11-01","{$year}-12-25"];
    $pastDayArray = date_format($pastDay,"Y-m-d");
    if(in_array($pastDayArray, $arrayData)){
      $pastDay=new \DateTime("last thursday");
    };

    $MonthBirthDateConstraint = new ValideDate;

    $MonthBirthDateValidator = $this->initValidator($MonthBirthDateConstraint->messageTuesday);
    $MonthBirthDateValidator->validate($tuesday, $MonthBirthDateConstraint);

    $MonthBirthDateValidator = $this->initValidator($MonthBirthDateConstraint->messageHoliday);
    $MonthBirthDateValidator->validate($holiday, $MonthBirthDateConstraint);

    $MonthBirthDateValidator = $this->initValidator($MonthBirthDateConstraint->messagePastDay);
    $MonthBirthDateValidator->validate($pastDay, $MonthBirthDateConstraint);

  }
}
