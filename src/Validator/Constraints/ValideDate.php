<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ValideDate extends Constraint
{

    public $messageTuesday = 'The Louvre isn\'t open on Tuesday ';
    public $messageSunday = 'The Louvre isn\'t open on Sunday ';
    public $messageHoliday = 'The Louvre isn\'t open on {{ date }}';
    public $messagePastDay = ' {{ date }} this day is past';
}
