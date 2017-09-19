# Recovery Codes

[![Latest Stable Version](https://img.shields.io/packagist/v/pragmarx/recovery.svg?style=flat-square&update=123)](https://packagist.org/packages/pragmarx/recovery)
[![Software License][ico-license]](LICENSE.md)
[![Build Status](https://img.shields.io/scrutinizer/build/g/antonioribeiro/recovery.svg?style=flat-square)](https://scrutinizer-ci.com/g/antonioribeiro/recovery/build-status/master)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/antonioribeiro/recovery.svg?style=flat-square)](https://scrutinizer-ci.com/g/antonioribeiro/recovery/?branch=master)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/antonioribeiro/recovery.svg?style=flat-square)](https://scrutinizer-ci.com/g/antonioribeiro/recovery/?branch=master)
[![StyleCI](https://styleci.io/repos/103568219/shield)](https://styleci.io/repos/103568219)

Generate recovery/backup codes to provide a way for your users to recover from a lost two factor auth, or any problem with it.

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

#### Collection

If you are using Laravel or install a package like [Collect](https://github.com/tightenco/collect), you can:

``` php
$this->recovery->toCollection();
```

You can also define a different collection function to be used:

``` php
$this->recovery->collectionFunction('alternateCollection');

$this->recovery->setCount(8)->toCollection();
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
   "0ldZb4vhamHEd8B3-Tmri54Lb0t52wefR-gbJaHTN44O9C1igf-HRdF185SXxDwcdRf",
   "sFyrtezhjbFhCube-MszCKzvdsNL7QEY1-IY5OtpsFqM5d7jA7-t2mjCViRMHcMDdNZ",
   "bjKMlcsPhNrpFpSN-IbJR2ebOeXCxXVVb-omZLu3Ki9ImIEqZh-1sK74zOADl86GGRs",
   "wpa23eFj8PJcPdMG-E8A4LCwmd8iF8jt4-bVi2ltUEv29zoPJJ-pSetq2GD6euvZ9RA",
   "EJ3SRDQlddr2e2hT-eF79n1lqndwhRM7G-HrjHEVyA9zHSLi8g-TrHzl5oaqPi1NgCT",
   "lL7p4zjFxhQLND24-MEV1lmmyEKObjhhT-ldRWbOEnJLjBHmuc-Iex10bYAZ3NBljo2",
   "uomVxkrjGYqOqmdm-AtI9MiqFEJjTlSRi-AUNEwwUfrJVP5iaH-uyrsFCrqzC3WcaAa"
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
     ->uppercase()    // All upper
     ->toArray();
     
$this->recovery
     ->mixedcase()    // Get back to default mixed case
     ->toArray();
```

#### Block separator

Usually `-` is used as a block separator, but you can change it with:

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
