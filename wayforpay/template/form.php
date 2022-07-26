<?php
require_once __DIR__ . '../vendor/autoload.php';

use WayForPay\SDK\Collection\ProductCollection;
use WayForPay\SDK\Credential\AccountSecretTestCredential;
use WayForPay\SDK\Domain\Client;
use WayForPay\SDK\Domain\Product;
use WayForPay\SDK\Wizard\PurchaseWizard;
use WayForPay\SDK\Domain\MerchantTypes;

// Use test credential or yours
$credential = new AccountSecretTestCredential();
//$credential = new AccountSecretCredential('account', 'secret');

$form = PurchaseWizard::get($credential)
    ->setOrderReference(sha1(microtime(true)))
    ->setAmount(100)
    ->setCurrency('UAH')
    ->setOrderDate(new \DateTime())
    ->setMerchantDomainName('https://Helping-UA-Wariors.com')
//    ->setMerchantTransactionType(MerchantTypes::TRANSACTION_AUTO) 
//    ->setMerchantTransactionType(MerchantTypes::TRANSACTION_AUTH) //  hold
    ->setClient(new Client(
        'Donate',
        'annonimus',
        'john.dou@gmail.com',
        '+380',
        'USA'
    ))
    ->setProducts(new ProductCollection(array(
        new Product('Donate for UA Wariors', 0.01, 1)
    )))
    ->setReturnUrl('http://localhost/')
    ->setServiceUrl('http://localhost/')
    ->getForm()
    ->getAsString();

echo '<html><body>' . $form . '</body></html>';