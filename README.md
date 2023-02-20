# A Laravel wrapper for the Segment API and events tracking.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/binarcode/laravel-segment.svg?style=flat-square)](https://packagist.org/packages/binarcode/laravel-segment)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/binarcode/laravel-segment/run-tests?label=tests)](https://github.com/binarcode/laravel-segment/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/binarcode/laravel-segment/Check%20&%20fix%20styling?label=code%20style)](https://github.com/binarcode/laravel-segment/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/binarcode/laravel-segment.svg?style=flat-square)](https://packagist.org/packages/binarcode/laravel-segment)

Segment simplifies the process of collecting data and connecting new tools, allowing you to spend more time using your data, and less time trying to collect it. You can use Segment to track events that happen when a user interacts with the interfaces. “Interfaces” is Segment’s generic word for any digital properties you own: your website, mobile apps, and processes that run on a server or OTT device.

### [Official documentation](https://segment.com/docs)

## Installation

You can install the package via composer:

```bash
composer require binarcode/laravel-segment
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="segment-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="segment-config"
```

This is the contents of the published config file:

```php
return [
    /**
     * The queue name where the segment events will be dispatched.
     */
    'queue' => env('SEGMENT_QUEUE', env('QUEUE_CONNECTION', 'sync')),

    /**
     * Segment API key [see: https://segment.com/docs/connections/sources/catalog/libraries/server/php/#identify].
     */
    'key' => env('SEGMENT_KEY', ''),
];
```

## Usage

### Track event 

```php
BinarCode\LaravelSegment\Facades\LaravelSegment::track('click')->properties([...])
```

### Alias anonymous id to a real user id
```php
BinarCode\LaravelSegment\Facades\LaravelSegment::alias($previous, $userId);
```
### The Segment Identify
```php
BinarCode\LaravelSegment\Facades\LaravelSegment::identify($userId, $data);
```
The Segment Identify call lets you tie a user to their actions and record traits about them. It includes a unique User ID and any optional traits you know about the user, like their email, name, and more.

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
