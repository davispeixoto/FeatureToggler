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
     * @return array|mixed|null
     */
    public function isEnabled($key, $defaultValue = false)
    {
        
        $config = $this->config->get($key, $defaultValue);

        if (is_array($config) && $config !== $defaultValue) {
            if (array_key_exists($defaultValue, $config)) {
                return $config[$defaultValue];
            }
            return false;
        }
        return $config;
    }
}
