<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ValidateTime extends Constraint
{
    public $message = 'You don\'t take "Journée" tiket after 14 hour';
}
