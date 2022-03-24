<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ReviewStatus extends Enum
{
    const Pending =   1;
    const Ongoing =   2;
    const Done = 3;

    public static function getDescription($value): string
    {
        if ($value === self::Ongoing) {
            return 'On-going';
        }

        return parent::getDescription($value);
    }
}
