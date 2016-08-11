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
        self::$toggler = new FeatureToggler('tests/test_mass.php');
    }

    /**
     * @param $a
     * @param $b
     * @dataProvider isEnabledProvider
     */
    public function testIsEnabled($a, $b)
    {
        $this->assertEquals($b, self::$toggler->isEnabled($a));
    }

    /**
     * @param $a
     * @param $b
     * @param $c
     * @dataProvider isEnabledProviderWithDefault
     */
    public function testIsEnabledWithDefault($a, $b, $c)
    {
        $this->assertEquals($c, self::$toggler->isEnabled($a, $b));
    }

    /**
     * @expectedException Davispeixoto\FeatureToggler\FeatureTogglerException
     */
    public function testConstructorException()
    {
        $toggler = new FeatureToggler('non-existent/path/or/file.php');
        $toggler->isEnabled('foo');
    }

    public function isEnabledProvider()
    {
        return [
            ['feature1', TRUE],
            ['feature2', FALSE],
            ['feature3', TRUE],
            ['feature4', TRUE],
            ['feature5', FALSE],
            ['feature6', FALSE],
            ['feature7', FALSE],
            ['feature8', TRUE],
            ['feature9', TRUE],
            ['feature10', FALSE],
            ['feature11', TRUE],
            ['feature12', TRUE],
            ['feature13', FALSE],
            ['feature14.a', TRUE],
            ['feature14.b', FALSE],
            ['feature14.c', TRUE],
            ['feature14.d', TRUE],
            ['feature14.e', FALSE],
            ['feature14.f', FALSE],
            ['feature14.g', FALSE],
            ['feature14.h', TRUE],
            ['feature14.i', TRUE],
            ['feature14.j', FALSE],
            ['feature14.k', TRUE],
            ['feature14.l', TRUE],
            ['feature14.m', FALSE],
            ['xptoFeat', FALSE],
            ['feature1.a', FALSE]
        ];
    }

    public function isEnabledProviderWithDefault()
    {
        return [
            ['feature1', FALSE, TRUE],
            ['feature2', TRUE, FALSE],
            ['feature3', FALSE, TRUE],
            ['feature4', FALSE, TRUE],
            ['feature5', TRUE, FALSE],
            ['feature6', TRUE, FALSE],
            ['feature7', TRUE, FALSE],
            ['feature8', FALSE, TRUE],
            ['feature9', FALSE, TRUE],
            ['feature10', TRUE, FALSE],
            ['feature11', FALSE, TRUE],
            ['feature12', FALSE, TRUE],
            ['feature13', TRUE, FALSE],
            ['feature14.a', FALSE, TRUE],
            ['feature14.b', TRUE, FALSE],
            ['feature14.c', FALSE, TRUE],
            ['feature14.d', FALSE, TRUE],
            ['feature14.e', TRUE, FALSE],
            ['feature14.f', TRUE, FALSE],
            ['feature14.g', TRUE, FALSE],
            ['feature14.h', FALSE, TRUE],
            ['feature14.i', FALSE, TRUE],
            ['feature14.j', TRUE, FALSE],
            ['feature14.k', FALSE, TRUE],
            ['feature14.l', FALSE, TRUE],
            ['feature14.m', TRUE, FALSE],
            ['xptoFeat', TRUE, TRUE],
            ['feature1.a', TRUE, TRUE],
            ['xptoFeat', FALSE, FALSE],
            ['feature1.a', FALSE, FALSE]
        ];
    }
}
