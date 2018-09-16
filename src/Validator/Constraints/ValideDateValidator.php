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
        $now = date_format(new \DateTime(),"Y-m-d");

        if (in_array($dateValue, $arrayData)) {
            $this->context->buildViolation($constraint->messageHoliday)
                ->setParameter('{{ date }}', date_format($value,"d/m/Y"))
                ->addViolation();
        }
        if ($day == 2) {
            $this->context->buildViolation($constraint->messageTuesday)
                ->setParameter('{{ date }}', date_format($value,"d/m/Y"))
                ->addViolation();
        }
        if ($day == 7) {
            $this->context->buildViolation($constraint->messageSunday)
                ->setParameter('{{ date }}', date_format($value,"d/m/Y"))
                ->addViolation();
        }
        if (new \DateTime($dateValue) < new \DateTime($now)) {
            $this->context->buildViolation($constraint->messagePastDay)
                ->setParameter('{{ date }}', date_format($value,"d/m/Y"))
                ->addViolation();
        }
    }
}
