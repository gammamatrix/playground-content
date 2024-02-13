# Playground Content

[![Playground CI Workflow](https://github.com/gammamatrix/playground-content/actions/workflows/ci.yml/badge.svg?branch=develop)](https://raw.githubusercontent.com/gammamatrix/playground-content/testing/develop/testdox.txt)
[![Test Coverage](https://raw.githubusercontent.com/gammamatrix/playground-content/testing/develop/coverage.svg)](tests)
[![PHPStan Level 9](https://img.shields.io/badge/PHPStan-level%209-brightgreen)](.github/workflows/ci.yml#L120)

The Playground Content package for [Laravel](https://laravel.com/docs/10.x) applications.

More information is available [on the Playground Content wiki.](https://github.com/gammamatrix/playground-content/wiki)

## Installation

You can install the package via composer:

```bash
composer require gammamatrix/playground-content
```

**NOTE:** This package is required by [Playground: Login Blade](https://github.com/gammamatrix/playground-login-blade)

## `artisan about`

Playground Content provides information in the `artisan about` command.

<img src="resources/docs/artisan-about-playground-content.png" alt="screenshot of artisan about command with Playground Content.">


## Configuration

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Playground\Content\ServiceProvider" --tag="playground-config"
```

See the contents of the published config file: [config/playground-content.php](config/playground-content.php)

### Environment Variables



## PHPStan

Tests at level 9 on:
- `config/`
- `database/`
- `lang/`
- `resources/views/`
- `src/`
- `tests/Feature/`
- `tests/Unit/`

```sh
composer analyse
```

## Coding Standards

```sh
composer format
```

## Testing

```sh
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Jeremy Postlethwaite](https://github.com/gammamatrix)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
