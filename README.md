# laravel VfdPlus
VfdPlus Easy Fiscal Receipt Issuing,
a system that sends electronic invoices/receipts to the TRA in real time receiving a validation response from the tax authority.

<a href="https://www.vfdplus.co.tz" target="_blank">www.vfdplus.co.tz</a>

<a href="https://www.vfdplus.co.tz" target="_blank">
    <img src="https://www.vfdplus.co.tz/assets/img/vfd_img2.png" alt="Thumb" />
</a>

## Installation

You can install the package via composer:

```bash
composer require ibrahimbougaoua/laravel-vfdplus
```

This is the contents of the published config file:

```php
return [
    'home' => 'https://app.vfdplus.co.tz/vfd-thirdparty-api/',
    'post_fiscal_receipt' => 'post_fiscal_receipt',
    'post_fiscal' => 'post_fiscal',
    'serial_info' => 'serial_info',
    'account_info' => 'account_info',
    'vfdplus_api_key' => 'DEMO-KEY-0001',
    'qrserver' => 'https://api.qrserver.com/v1/create-qr-code',
    'verify' => 'https://verify.tra.go.tz/',
];
```

## Usage

Load Account Info
``` 

$loadCredentialInfo = new \IbrahimBougaoua\LaravelVfdplus\Actions\LoadPostedReceipt();
$loadCredentialInfo->initData("ID","dghgfjghghjh");
$loadCredentialInfo->load();
$receipt = $loadCredentialInfo->getResponse();
dd($receipt);
```

Load Account Info
```  
$loadCredentialInfo = new \IbrahimBougaoua\LaravelVfdplus\Actions\LoadAccountInfo();
$loadCredentialInfo->loadInfo();
$accountInfo = $loadCredentialInfo->getResponse();
dd($accountInfo);
```

Load Credential Info
```  
$loadCredentialInfo = new \IbrahimBougaoua\LaravelVfdplus\Actions\LoadCredentialInfo();
$loadCredentialInfo->loadInfo();
$serialCode = $loadCredentialInfo->getSerialCode();
dd($serialCode);
```

Post Fiscal Receipt
```  
$postFiscalReceipt = new \IbrahimBougaoua\LaravelVfdplus\Actions\PostFiscalReceipt();

$postFiscalReceipt->initData($serialCode,"","","DC-DEMO.004","2022-06-04","02:43:37",);

$postFiscalReceipt->setCustomerInfo("CASH","6","NIL","","","","");

$postFiscalReceipt->setPaymentMethods([
    [
        "pmt_type" => "CASH",
        "pmt_amount" => 10000.0
    ]
]);

$postFiscalReceipt->setCartTotals(1,10000.0,10000.0,0.0);

$postFiscalReceipt->setCartItems([
    [
      "vat_rate_code" => "A",
      "vat_rate_id" => 1,
      "item_name" => "VITUMBUA",
      "item_barcode" => "-1",
      "item_qty" => 10.0,
      "usp" => 1000.0,
      "sp" => 1000.0,
      "unit_discount_perc" => 0.0,
      "unit_discount_amt" => 0.0,
      "total_item_discount" => 0.0
    ]
]);

$postFiscalReceipt->setUserInfo(2,"grandx","TILL01");

$response = $postFiscalReceipt->post();

dd($response);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [ibrahimBougaoua](https://github.com/)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
