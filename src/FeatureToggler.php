<?php
/**
 * Created by PhpStorm.
 * User: davis.peixoto
 * Date: 17/08/15
 * Time: 15:02
 */

namespace Davispeixoto\FeatureToggler;

use Exception;
use Noodlehaus\Config;

class FeatureToggler
{
    /**
     * @var array|string The path to config file
     */
    private $config;

    public function __construct($configFile)
    {
        try {
            $this->config = Config::load($configFile);
        } catch (Exception $e) {
            throw new FeatureTogglerException($e->getMessage());
        }
    }

    /**
     * @param string $key
     * @param bool|false $defaultValue
     * @return array|mixed|null
     */
    public function isEnabled($key, $defaultValue = false)
    {
        return $this->config->get($key, $defaultValue);
    }
}
