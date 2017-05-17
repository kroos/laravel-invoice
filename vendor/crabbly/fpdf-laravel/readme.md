# FPDF - Laravel

A package for Laravel to implement the FPDF class.

FPDF Official Website: 
[www.fpdf.org](http://www.fpdf.org/)


## Installation

### Step 1: Composer

From the command line, run:

```
composer require crabbly/fpdf-laravel
```

### Step 2: Service Provider

For your Laravel app, open `config/app.php` and, within the `providers` array, append:

```
Crabbly\FPDF\FpdfServiceProvider::class
```

This will bootstrap the package into Laravel.


## Usage

You can resolve the FPDF class instance out of the container:

```
$pdf = $this->app('FPDF');

```

## FPDF Documentation

For documentation manual and tutorials, please visit [www.fpdf.org](http://www.fpdf.org/)

## Contribution

Pull requests are welcome.
Please report any issue you find in the issues page.

## License

The package is free software distributed under the terms of the MIT license.
FPDF is a free PHP class, you may use it for any kind of usage and modify it to suit your needs.