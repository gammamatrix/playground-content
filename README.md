# Playground Http

[![Playground CI Workflow](https://github.com/gammamatrix/playground-http/actions/workflows/ci.yml/badge.svg?branch=develop)](https://raw.githubusercontent.com/gammamatrix/playground-http/testing/develop/testdox.txt)
[![Test Coverage](https://raw.githubusercontent.com/gammamatrix/playground-http/testing/develop/coverage.svg)](tests)
[![PHPStan Level 9](https://img.shields.io/badge/PHPStan-level%209-brightgreen)](.github/workflows/ci.yml#L120)

The Playground Http package for [Laravel](https://laravel.com/docs/11.x) applications.

Read more on using Playground Http [at the Read the Docs for Playground.](https://gammamatrix-playground.readthedocs.io/)

## Installation

You can install the package via composer:

```bash
composer require gammamatrix/playground-http
```

**NOTE:** This package is required by [Playground: Http](https://github.com/gammamatrix/playground-login-blade)

## `artisan about`

Playground Http provides information in the `artisan about` command.

<!-- <img src="resources/docs/artisan-about-playground-http.png" alt="screenshot of artisan about command with Playground Http."> -->


## Configuration

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Playground\Http\ServiceProvider" --tag="playground-config"
```

See the contents of the published config file: [config/playground-http.php](config/playground-http.php)


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
