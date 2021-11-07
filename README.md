# Identity Card Checker Laravel Validation Rules

[![Latest Stable Version](http://poser.pugx.org/torralbodavid/identity-card-checker/v)](https://packagist.org/packages/torralbodavid/identity-card-checker)
[![Total Downloads](http://poser.pugx.org/torralbodavid/identity-card-checker/downloads)](https://packagist.org/packages/torralbodavid/identity-card-checker)
[![License](http://poser.pugx.org/torralbodavid/identity-card-checker/license)](https://packagist.org/packages/torralbodavid/identity-card-checker) [![PHP Version Require](http://poser.pugx.org/torralbodavid/identity-card-checker/require/php)](https://packagist.org/packages/torralbodavid/identity-card-checker)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/torralbodavid/identity-card-checker/run-tests?label=tests)](https://github.com/torralbodavid/identity-card-checker/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/torralbodavid/identity-card-checker/Check%20&%20fix%20styling?label=code%20style)](https://github.com/torralbodavid/identity-card-checker/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)

Use this package to validate the identity card number from your country

## Installation

You can install the package via composer:

```bash
composer require torralbodavid/identity-card-checker
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Torralbodavid\IdentityCardChecker\IdentityCardCheckerServiceProvider" --tag="identity-card-checker-config"
```

## Usage

🇪🇸 Currently we are only supporting validation of Spanish documents: DNI, NIE and CIF.

Feel free to open an issue if you want your country id to be supported or also open a pull request.

Add the following rule on your form validation:

```php
    'id_validation' => new IdCardES()
```

```php
    use Torralbodavid\IdentityCardChecker\Rules\IdCardES;

    
    $request->validate([
        ...
        'id_validation' => new IdCardES(),
    ]);
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

If you discover any security related issues, please email davidtorralboperez@gmail.com instead of using the issue tracker.

## Credits

- [David Torralbo](https://github.com/torralbodavid)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
