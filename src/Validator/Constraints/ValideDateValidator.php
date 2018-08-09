<?php
namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;


class ValideDateValidator extends ConstraintValidator
{


    public function validate($value, Constraint $constraint)
    {
      if (null === $value || '' === $value) {
        return;
    }
        $year = date_format($value,"Y");
        $dateValue = date_format($value,"Y-m-d");
        $arrayData = ["{$year}-05-01","{$year}-11-01","{$year}-12-25"];
        $day = date("N" ,strtotime( $dateValue));

        $valideDay = true;
        $valideDate = true;
        if( $day == 2){
          $valideDay = false;
        }
        if( in_array($dateValue, $arrayData)){
          $valideDate = false;
        }



        if ($valideDay && $valideDate) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ date }}', date_format($value,"d/m/Y"))
                ->addViolation();
        }
    }
}
