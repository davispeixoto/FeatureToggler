<?php
/**
 * Created by PhpStorm.
 * User: davis.peixoto
 * Date: 17/08/15
 * Time: 15:02
 */

namespace Davispeixoto\FeatureToggler;

use Noodlehaus\Config;

class FeatureToggler
{
    /**
     * @var array $config
     */
    private $config;

    public function __construct($configFile)
    {
        if (is_readable($configFile)) {
            $this->config = Config::load($configFile);
        } else {
            throw new FeatureTogglerException('Config file does not exists, or cannot be read');
        }
    }

    public function isEnabled($key, $defaultValue = false)
    {
        return $this->config->get($key, $defaultValue);
    }
}
