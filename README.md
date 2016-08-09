# PHP Feature Toggle

This package provides a simple feature toggle mechanism for PHP applications.

[![Latest Stable Version](https://img.shields.io/packagist/v/davispeixoto/featuretoggle.svg)](https://packagist.org/packages/davispeixoto/featuretoggle)
[![Total Downloads](https://img.shields.io/packagist/dt/davispeixoto/featuretoggle.svg)](https://packagist.org/packages/davispeixoto/featuretoggle)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/davispeixoto/FeatureToggler/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/davispeixoto/FeatureToggler/?branch=master)
[![Build Status](https://travis-ci.org/davispeixoto/FeatureToggler.svg)](https://travis-ci.org/davispeixoto/FeatureToggler)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/eda8ae67-d805-4436-838a-fdf40c7e7088/big.png)](https://insight.sensiolabs.com/projects/eda8ae67-d805-4436-838a-fdf40c7e7088)

## Installation

The package can be installed via [Composer](http://getcomposer.org) by requiring the
`davispeixoto/featuretoggle` package in your project's `composer.json`.

```json
{
    "require": {
        "davispeixoto/featuretoggle": "~1.0"
    }
}
```

And running a composer update from your terminal:
```sh
php composer.phar update
```



## Configuration

Just put your features into the config file, with their respective state (true or false):
```php
return [
    'my_feature' => true,
    'my_other_feature' => [
        'pt_br' => true,
        'en_us' => true,
        'es_es' => false
    ],
    ...
];
```

## Usage

That's it! You're all set to go. Just use:

```php
    Davispeixoto\FeatureToggler\FeatureToggler;
    ...

    $toggler = new FeatureToggler('path/to/my_config_file.php');

    if($toggler->isEnabled('my_feature')) {
        // do the feature here
    }

    ...
    // for multidimensional config array
    if($toggler->isEnabled('my_other_feature', 'en_us')) {
        // new code here
    } else {
        // old code here
    }
```

## License

This software is licensed under the [MIT license](http://opensource.org/licenses/MIT)

## Versioning

This project follows the [Semantic Versioning](http://semver.org/)

## Thanks

An amazing "Thank you, guys!" for [Jetbrains](https://www.jetbrains.com/) folks, 
who kindly empower this project with a free open-source license for [PhpStorm](https://www.jetbrains.com/phpstorm/) which can bring a whole new level of joy for coding.

[![Jetbrains][2]][1]

[![PhpStorm][4]][3]

  [1]: https://www.jetbrains.com/
  [2]: https://www.jetbrains.com/company/docs/logo_jetbrains.png
  [3]: https://www.jetbrains.com/phpstorm/
  [4]: https://d3nmt5vlzunoa1.cloudfront.net/phpstorm/files/2015/12/PhpStorm_400x400_Twitter_logo_white.png

