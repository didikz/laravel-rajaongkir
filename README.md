# :package_description

[![Latest Version on Packagist](https://img.shields.io/packagist/v/:vendor_name/:package_name.svg?style=flat-square)](https://packagist.org/packages/:vendor_name/:package_name)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/:vendor_name/:package_name/run-tests?label=tests)](https://github.com/:vendor_name/:package_name/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/:vendor_name/:package_name.svg?style=flat-square)](https://packagist.org/packages/:vendor_name/:package_name)

![alt text](https://banners.beyondco.de/Laravel%20Rajaongkir.png?theme=light&packageName=didikz%2Flaravel-rajaongkir&pattern=ticTacToe&style=style_1&description=Rajaongkir+API+simple+wrapper+for+Laravel&md=1&fontSize=100px&images=truck "Laravel RajaOngkir Logo")


## Installation

You can install the package via composer:

```bash
composer require didikz/laravel-rajaongkir
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Didikz\LaravelRajaongkir\LaravelRajaongkirServiceProvider" --tag="config"
```

Add api key to your `.env` file:

```bash
RAJAONGKIR_API_KEY=apikeyfromrajaongkir
```

## Usage

### Get All Provinces
``` php
use Didikz\LaravelRajaOngkir\Location;

$location = new Location(config('laravel-rajaongkir.api_key');
$location->province();
```

### Get Province by Id
``` php
use Didikz\LaravelRajaOngkir\Location;

$location = new Location(config('laravel-rajaongkir.api_key');
$location->province(1);
```

### Get All Cities by Province Id
``` php
use Didikz\LaravelRajaOngkir\Location;

$provinceId = 1;
$location = new Location(config('laravel-rajaongkir.api_key');
$location->city($provinceId);
```

### Get city 
``` php
use Didikz\LaravelRajaOngkir\Location;

$provinceId = 6;
$cityId = 152;
$location = new Location(config('laravel-rajaongkir.api_key');
$location->city($provinceId, $cityId);
```

### Calculate Cost

Check [Available Couriers](https://rajaongkir.com/dokumentasi#daftar-kurir) based on their plan

``` php
use Didikz\LaravelRajaOngkir\Cost;

$cost = new Cost(config('laravel-rajaongkir.api_key');
$cost->destination(152)->origin(155)->weight(2000)->courier('jne')->calculate();
```

## Testing

``` bash
./vendor/bin/phpunit
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Didik Tri S](https://github.com/didikz)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
