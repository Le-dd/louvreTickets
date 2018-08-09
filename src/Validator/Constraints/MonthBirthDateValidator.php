<?php
namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;


class MonthBirthDateValidator extends ConstraintValidator
{


    public function validate($value, Constraint $constraint)
    {
      if (null === $value || '' === $value) {
          return;
      }

      dump($value);
        $nowNineMonth = new \DateTime("now - 9 months");
      dump($nowNineMonth);

        if ($value >= $nowNineMonth) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ date }}',date_format($value,"d/m/Y"))
                ->addViolation();
        }
    }
}
