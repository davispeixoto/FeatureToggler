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
     * @var Config The config object
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
     * @param bool|string $defaultValue
     * @return boolean
     */
    public function isEnabled($key, $defaultValue = false)
    {
        try {
            if ($this->config->has($key)) {
                return (bool) $this->config->get($key, $defaultValue);
            } else {
                return (bool) $defaultValue;
            }
        } catch (Exception $e) {
            return (bool) $defaultValue;
        }
    }
}
