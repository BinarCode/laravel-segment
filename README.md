# A Laravel wrapper for the Segment API and events tracking.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/binarcode/laravel-segment.svg?style=flat-square)](https://packagist.org/packages/binarcode/laravel-segment)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/binarcode/laravel-segment/run-tests?label=tests)](https://github.com/binarcode/laravel-segment/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/binarcode/laravel-segment/Check%20&%20fix%20styling?label=code%20style)](https://github.com/binarcode/laravel-segment/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/binarcode/laravel-segment.svg?style=flat-square)](https://packagist.org/packages/binarcode/laravel-segment)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require binarcode/laravel-segment
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-segment-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-segment-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-segment-views"
```

## Usage

## Added

### Track event 

```php
BinarCode\LaravelSegment\Facades\LaravelSegment::track('click')->properties([...])
```

### Alias anonymous id to a real user id
```php
BinarCode\LaravelSegment\Facades\LaravelSegment::alias($previous, $userId);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Eduard Lupacescu](https://github.com/binaryk)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
