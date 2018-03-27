Webgriffe UnicreditImprese PHP library
==========================================

[![Run Status](https://travis-ci.org/webgriffe/lib-unicredit-imprese.svg?branch=master)](https://travis-ci.org/webgriffe/lib-unicredit-imprese)

This library provides an integration with the WebServices of Unicredit PagOnline Imprese payment gateway.
It was developed by following the technical documentation v.07 of 07/02/2017 provided by Unicredit.

Installation
------------

In order to use this library you have to import it through composer:

```
composer require webgriffe/lib-unicredit-imprese
```

Usage
-----

**Payment Initialization**

First of all, get an instance of the *Webgriffe\LibUnicreditImprese\Client* class. Then, before starting the actual payment, call the *init()* method to set a few basic values, such as whether the library must work in test mode or live mode, the ksig key (provided by Unicredit), the terminal id (provided by Unicredit) and the WSDL URL (which changes between the live and test environments). This call will prepare the client for the actual work.

After executing the *init()* call, you can call the *paymentInit()* method to initiate an actual payment request. This method takes a number of arguments including the transaction type (authorize-only or authorize-and-capture), the payment amount, the payment page language code, the payment currency and so on. The notifyUrl argument is the URL that Unicredit will redirect the customer to if the payment is succesful. However, if a serious error occurs, the customer will be redirected to the error URL.

The *paymentInit()* method takes care to format all arguments in the correct way, sign them using the secret ksig value and send them to Unicredit. Afterwards the returning response is received and parsed, and the result of this operation is a *Webgriffe\LibUnicreditImprese\PaymentInit\Response* object. This ibject contains the outcome of the *paymentInit()* operation; If an error occurred, the *getError()* and *getErrorDesc()* methods of this object van be used to check what error occurred. If there was no error, then Unicredit will return a payment id and a redirect URL, which can be accessed using the *getPaymentId()* and *getRedirectUrl()* methods of the Response object.

If the *paymentInit()* operation is succesful, then the payment id contained in the response should be saved and the user should be redirected to the URL provided by Unicredit. This will take the user to a page where he/she will be asked to provide the actual payment information required to complete the transaction (credit card number and the like).

After this phase, if an error occurs, then the user is redirected to the error URL. Otherwise he/she is redirected to the notify URL. In the latter case it's necessary to verify the payment outcome manually, even if the customer reaches the notify URL.

**Payment verification**

To verify the status of a payment it's possible to use the *paymentVerify()* method. This method requires a shop-id (a manually-generated transaction identifier, usually an order id) and the payment id that was provided by Unicredit with the *paymentInit()* call.

With these values the *paymentVerify()* method can check the state of the corresponding payment, returning it as a *Webgriffe\LibUnicreditImprese\PaymentVerify\Response* object. Once again, the *getError()* and *getErrorDesc()* methods can be used to check for errors, but here it's possibile to use the *getRc()*, *getTranId()*, *getAuthCode()*, *getEnrStatus()* and *getAuthStatus()* methods to retrieve pieces of information from the verification result.

Unlike other payment gateways, Unicredit does not perform a server-to-server call to notify about payment approvals. Instead it is the responsibility of the merchant to periodically check the status of each payment. This can be easily done using the aforementioned *paymentVerify()* method.

Contributing
------------

Fork this repository, make your changes and submit a pull request.
Please run the tests and the coding standards checks before submitting a pull request. You can do it with:

```
composer install
vendor/bin/phpspec run
vendor/bin/phpcs
```

License
-------

This library is under the MIT license. See the complete license in the LICENSE file.

Credits
-------

Developed by [Webgriffe®](http://www.webgriffe.com/).

