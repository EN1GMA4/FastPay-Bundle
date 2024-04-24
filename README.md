
# FastPay Payment Gatway Integration Bundle / PHP


When I started working with the FastPay API for one of my projects, I noticed they didn't have any PHP bundles available. So, I decided to create one myself to make things more organized and easier to integrate. Feel free to use it, and thank me later.

Coded according to the company's original [documentation](https://developer.fast-pay.iq/website-integration)






## Features

- Initiate Payment
- Validate Payment
- Refund Payment
- Refund Payment Validation


## Installation

Use composer

```
composer require en1gm4a/fastpay-bundle
```

## Usage

### Initialize (Required for next steps)
```php
 $fastpay = new FastPayAPI("your store id","your store password","deploy mode");
```
##### for deploy mode, you can use DEPLOYMODE constant which includes PROD and STAGING

### Initiating Payment:
```php
    $InitiatePayment = new InitiatePayment();
    $InitiatePayment->setOrderId("24214565");
    $InitiatePayment->setCart("[{\"name\": \"Scarf\", \"qty\": 1, \"unit_price\": 5000, \"sub_total\": 5000}]");
    $InitiatePayment->setBillAmount("1000");
    $InitiatePayment->setCurrency("IQD");
    $fastpay->ExecuteInitiate($InitiatePayment);
```
##### it returns response type of `InitiatePaymentResponse` class, which includes code, message, data,..etc can be used like this:
```php
$fastpay->ExecuteInitiate($InitiatePayment)->getRedirectUri(); //to get the payment link
$fastpay->ExecuteInitiate($InitiatePayment)->getData(); //response array data
$fastpay->ExecuteInitiate($InitiatePayment)->getCode(); //reponses code (200|422)
$fastpay->ExecuteInitiate($InitiatePayment)->getMessages(); //responses message
```

### Validating Payment:
```php
 $fastpay->ExecuteVPayment("order id");
```
##### it returns response type of `ValidatePaymentResponse` class, which includes code, message, data, and the response data as objects like this:
```php
 $fastpay->ExecuteVPayment("order id")->getMerchantOrderId(); //returns merchant_order_id
```

### Refunding Payment:
```php
$fastpay->ExecuteRPayment("orderid","amount","refund secret key","msidn (phone num)")
```
##### it returns response type of `RefundPaymentResponse` class, which includes code, message, data, and the response data as objects like this:
```php
 $fastpay->ExecuteRPayment("orderid","amount","refund secret key","msidn (phone num)")->getRecipientName(); //returns reciepient name
```

### Validating Refund:
```php
 $fastpay->ExecuteVRefund("order id");
```
##### it returns response type of `ValidateRefundResponse` class, which includes code, message, data, and the response data as objects like this:
```php
$fastpay->ExecuteVRefund("order id")->isRefundStatusTrue; //returns true if refund was successful
```











## Disclaimer

I hereby declare that I am not affiliated with FastPay in any capacity, and I explicitly disclaim any responsibility for its services, products, or actions. This code bundle is provided "as is," without any warranty or guarantee of fitness for any particular purpose. Users are advised to exercise due diligence and discretion when using this code, and I shall not be held liable for any legal issues, damages, or consequences arising from its use.
