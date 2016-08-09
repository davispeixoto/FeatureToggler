<?php

/**
 * Created by PhpStorm.
 * User: dpeixoto
 * Date: 8/9/16
 * Time: 4:11 PM
 */

namespace Tests;

use Davispeixoto\FeatureToggler\FeatureToggler;
use PHPUnit_Framework_TestCase;

class FeatureTogglerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var FeatureToggler
     */
    public static $toggler;

    public static function setUpBeforeClass()
    {
        self::$toggler = new FeatureToggler('src/config/config.php');
    }

    /**
     * @param $a
     * @param $b
     * @dataProvider isEnabledProvider
     */
    public function testIsEnabled($a, $b)
    {
        $this->assertEquals($b, $a);
//        $this->assertEquals($b, self::$toggler->isEnabled($a));
    }

    public function isEnabledProvider()
    {
        return [
            [true, true],
            [false, false]
        ];
    }
}
