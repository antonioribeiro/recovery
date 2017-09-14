# recovery

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

**Note:** Replace ```Antonio Carlos Ribeiro``` ```antonioribeiro``` ```https://antoniocarlosribeiro.com``` ```acr@antoniocarlosribeiro.com``` ```pragmarx``` ```recovery``` ```Create recovery codes for two factor auth``` with their correct values in [README.md](README.md), [CHANGELOG.md](CHANGELOG.md), [CONTRIBUTING.md](CONTRIBUTING.md), [LICENSE.md](LICENSE.md) and [composer.json](composer.json) files, then delete this line. You can run `$ php prefill.php` in the command line to make all replacements at once. Delete the file prefill.php as well.

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Structure

If any of the following are applicable to your project, then the directory structure should follow industry best practises by being named the following.

```
bin/        
config/
src/
tests/
vendor/
```


## Install

Via Composer

``` bash
$ composer require pragmarx/recovery
```

## Usage

``` php
$skeleton = new PragmaRX\Recovery();
echo $skeleton->echoPhrase('Hello, League!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email acr@antoniocarlosribeiro.com instead of using the issue tracker.

## Credits

- [Antonio Carlos Ribeiro][link-author]
- [All Contributors][link-contributors]

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
