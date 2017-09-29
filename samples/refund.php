<?php

require_once('config.php');

/**
 * Create Refund Request
 * İade İsteği Oluştur
 */
$request = new \Hepsipay\Model\Request\Refund();

/**
 * Set Request
 * İsteği Ayarla
 */
$request
    ->setTransactionTime(time()) // İşlem Zamanı, Varsayılan zaman ise şuan.
    ->setTransactionId("tx_" . rand(100000, 999999)) // Ödemeye Ait Tekil Kodu
    ->setReferenceTransactionId("tx_532998") // İade Edilecek Ödemeye Ait Tekil Kod
    ->setAmount("12099") // Toplam İade Tutarı
    ->setCurrency(\Hepsipay\Model\Currency::TL); // Toplam Ödeme Tutar Birimi

/**
 * Make Request
 * İsteği Oluştur
 */
$response = \Hepsipay\Service\RefundService::create($request);

/**
 * Print Response ve Request Details
 * Yanıtı ve İstek Detaylarını Yazdır
 */
echo "<pre>";
echo "\nYANIT\n\n";
print_r($response); // Response
echo "\nİSTEK\n\n";
print_r($request->toJsonString()); // Request
echo "</pre>";