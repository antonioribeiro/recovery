# recovery

[![Latest Stable Version](https://img.shields.io/packagist/v/pragmarx/recovery.svg?style=flat-square)](https://packagist.org/packages/pragmarx/recovery)
[![Software License][ico-license]](LICENSE.md)
[![Build Status](https://scrutinizer-ci.com/g/antonioribeiro/recovery/badges/build.png?b=master)](https://scrutinizer-ci.com/g/antonioribeiro/recovery/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/antonioribeiro/recovery/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/antonioribeiro/recovery/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/antonioribeiro/recovery/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/antonioribeiro/recovery/?branch=master)
[![StyleCI](https://styleci.io/repos/103568219/shield)](https://styleci.io/repos/103568219)

Generate recovery/backup codes to provide a way for your users to recover lost accounts.

## Install

Via Composer

``` bash
$ composer require pragmarx/recovery
```

## Usage

#### Basic array usage

``` php
$this->recovery = new PragmaRX\Recovery();

$this->recovery->toArray();
```

#### Json result

``` php
$this->recovery->toJson();
```

Should give you 

``` json
[  
   "C0r2Xp4o1v-oG3pteKXw3",
   "oLuSmVeJ7D-t4wnJVwkuC",
   "XdPXXJy3J6-Gl3d0EwWt7",
   "Bn8twjUJRt-Lv3KaAFwjR",
   "SrnMagyGRg-eC7WPyFQ17",
   "mRO4WPJpRN-hgfrUZqqZd",
   "xBZtyFOrJZ-Tbpg0pSvzf",
   "eiPFmwvJp0-oSqdNKclDH"
]
```

#### Changing the result values/sizes

``` php
$this->recovery
     ->setCount(8)     // Generate 8 codes
     ->setBlocks(5)    // Every code must have 7 blocks
     ->setChars(16)    // Each block must have 16 chars
     ->toArray();
```

Should give you

``` json
[  
   "Tu0rFHft8072e6Ev-99TJxD5Zy5q2sv1y-J0W3JnXAFUo1RPz9-8V88cmaKJOHYgXoD-V2H1xISB8nxeX6Pi",
   "CSB4d6p6dt4Kg5e8-1evc13EWMek37tVK-jk1KodSlcV19Fm7w-TsztesVXRBCa2mRy-5OVY7wGZPx4MZZTD",
   "Jensx9TXkiVuG2Kl-XeMnFEDtlRmlDDyz-yHOoTrGgy3ADnqTX-cjh31XYg1I6OQ93f-joXh6vAkKGZCixYY"
]
```

#### Numeric or alpha?

``` php
$this->recovery
     ->numeric()       // Generate numeric only codes
     ->toArray();
     
$this->recovery
     ->alpha()        // Get back to default alpha generation
     ->toArray();
```

#### Upper, lower and mixed case

``` php
$this->recovery
     ->lowercase()    // All lower
     ->toArray();
     
$this->recovery
     ->uppercase()    // All lower
     ->toArray();
     
$this->recovery
     ->mixedcase()    // Get back to default mixed case
     ->toArray();
```

#### Block separator

``` php
$this->recovery->setBlockSeparator('|')->toJson();
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer update
$ vendor/bin/phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email acr@antoniocarlosribeiro.com instead of using the issue tracker.

## Credits

- [Antonio Carlos Ribeiro][link-author]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/pragmarx/recovery.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/pragmarx/recovery/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/pragmarx/recovery.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/pragmarx/recovery.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/pragmarx/recovery.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/pragmarx/recovery
[link-travis]: https://travis-ci.org/pragmarx/recovery
[link-scrutinizer]: https://scrutinizer-ci.com/g/pragmarx/recovery/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/pragmarx/recovery
[link-downloads]: https://packagist.org/packages/pragmarx/recovery
[link-author]: https://github.com/antonioribeiro
[link-contributors]: ../../contributors
