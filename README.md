# laravel-stomp

Laravel Stomp package for message queue integration via STOMP protocol.

## Installation

```bash
composer require wuwx/laravel-stomp
```

## Configuration

Publish the configuration file:

```bash
php artisan vendor:publish --provider="Wuwx\LaravelStomp\StompServiceProvider" --tag="config"
```

## Usage

```php
use Stomp;

// Use the Stomp facade
Stomp::someMethod();
```

## Requirements

- PHP 7.4+
- Laravel 6.0+
- ext-stomp (recommended)

## License

MIT