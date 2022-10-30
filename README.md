# Omnipay: QvaPay

**QvaPay** driver for the Omnipay PHP payment processing library
![Banner](https://banners.beyondco.de/Omnipay%20QvaPay.png?theme=dark&packageManager=composer+require&packageName=ynievespuntonetsurl%2Fomnipay-qvapay&pattern=architect&style=style_2&description=QvaPay+driver+for+the+Omnipay+PHP+payment+processing+library.&md=1&showWatermark=1&fontSize=100px&images=https%3A%2F%2Fwww.php.net%2Fimages%2Flogos%2Fnew-php-logo.svg&widths=auto)

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment processing library for PHP. This package implements PayPal support for Omnipay.

## Installation

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply require `ynievespuntonetsurl/omnipay-qvapay` with Composer:

```bash
#!/bin/bash
composer require ynievespuntonetsurl/omnipay-qvapay
```

## Basic Usage

The following gateways are provided by this package:

* QvaPay (QvaPay Rest API)

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay) repository.

## Quirks

The transaction reference obtained from the purchase() response can't be used to refund a purchase. The transaction reference from the completePurchase() response is the one that should be used.

## Out Of Scope

Omnipay does not cover recurring payments or billing agreements, and so those features are not included in this package. Extensions to this gateway are always welcome.

## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release anouncements, discuss ideas for the project, or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/thephpleague/omnipay-paypal/issues), or better yet, fork the library and submit a pull request.
