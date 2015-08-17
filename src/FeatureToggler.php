<?php
/**
 * Created by PhpStorm.
 * User: davis.peixoto
 * Date: 17/08/15
 * Time: 15:02
 */

namespace Davispeixoto\FeatureToggler;

class FeatureToggler
{
    /**
     * @var array $config
     */
    private $config;

    public function __construct($configFile)
    {
        if (is_readable($configFile)) {
            $this->config = include($configFile);
        } else {
            throw new FeatureTogglerException('Config file does not exists, or cannot be read');
        }
    }

    public function isEnabled()
    {
        $args = func_get_args();
        return $this->searchKey($args, $this->config);
    }

    private function searchKey($lookForIt, $context)
    {
        $key = array_shift($lookForIt);
        if (array_key_exists($key, $context)) {
            if (is_bool($context[$key])) {
                return $context[$key];
            } elseif (is_array($context[$key])) {
                return $this->searchKey($lookForIt, $context[$key]);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
