<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class MainCategory extends Enum
{
    const Fruits =   0;
    const Vagetables =   1;
    const FreshBerries = 2;
    const OceanFoods =   3;
    const ButterEgg =   4;
    const FastFood = 5;
    const FreshMeat =   6;
    const FreshOnion =   7;
    const PapayaCrips = 8;
    const OatMeal = 9;
    const FreshBananas = 10;

    public static function getDescription($value): string
    {
        if ($value === self::Fruits) {
            return "Fruits & Nut Gifts";
        } else if ($value === self::Vagetables) {
            return "Vegetables";
        } else if ($value === self::FreshBerries) {
            return "Fresh Berries";
        } else if ($value === self::OceanFoods) {
            return "Ocean Foods";
        } else if ($value === self::ButterEgg) {
            return "Butter Eggs";
        } else if ($value === self::FastFood) {
            return "Fast Food";
        } else if ($value === self::FreshMeat) {
            return " Fresh Meat";
        } else if ($value === self::FreshOnion) {
            return "Fresh Onion";
        } else if ($value === self::PapayaCrips) {
            return "Papaya & Crips";
        } else if ($value === self::OatMeal) {
            return "OatMeal";
        } else if ($value === self::FreshBananas) {
            return "Fresh Bananas & Plantains";
        }

        return parent::getDescription($value);
    }
}
