# Add multiple addresses for a User

[![Latest Version on Packagist](https://img.shields.io/packagist/v/aecor/addressable.svg?style=flat-square)](https://packagist.org/packages/aecor/addressable)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/aecor/addressable/run-tests?label=tests)](https://github.com/aecor/addressable/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/aecor/addressable.svg?style=flat-square)](https://packagist.org/packages/aecor/addressable)

## Installation

You can install the package via composer:

```bash
composer require aecor/addressable
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Aecor\Address\AddressServiceProvider" --tag="migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Aecor\Address\AddressServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
    'table-name' => 'addresses'
];
```

## Usage and few examples
Prepare your model
``` php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Aecor\Address\Traits\HasAddress;

class YourModel extends Model
{
    use HasAddress;
}
```

Get instance of your model
``` php
$user = \App\Models\User::find(1);
```

Add a single contact
``` php
$user->addAddress([
    'type' => 'office',
    'unit' => 'A',
    'house_number' => '10',
    'street' => 'Some street',
    'suburb' => 'Some suburb',
    'postcode' => '123',
    'custom_attributes' => [
        'open_at' => '09:00',
        'close_at' => '06:00'
    ],                          // Optional field
    'order_column' => 1         // Optional field
]);
```

All the common fields are available in database given below, additionally you can store your own details as json in 'custom_attributes' field. All the fields are kept nullable to make it easy implementation.
``` php
'type'
'unit'
'house_number'
'street'
'suburb'
'postcode'
'state'
'latitude'
'longitude'
'custom_attributes' // json field to add any additional data
'order_column'
```

Add multiple contacts
``` php
$user->addManyAddresses([
    [
        'type' => 'home',
        'unit' => 'A',
        'house_number' => '10',
        'street' => 'Some street 1',
        'suburb' => 'Some suburb 1',
        'postcode' => '123',
    ],
    [
        'type' => 'office',
        'unit' => 'B',
        'house_number' => '1',
        'street' => 'Some street 2',
        'suburb' => 'Some suburb 2',
        'postcode' => '456',
    ]
]);
```

Get all contacts
``` php
$user->addresses;
```

Get contacts with condition
``` php
$user->addresses()->where('type', 'home')->get();
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Abrar Dhalwala](https://github.com/adhalwala)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
