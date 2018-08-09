<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ValideDate extends Constraint
{

    public $message = 'The Louvre isn\'t open on {{ date }}';
}
