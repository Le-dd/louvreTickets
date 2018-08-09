<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class MonthBirthDate extends Constraint
{
    public $message = 'your birth date {{ date }} is not valid';
}
