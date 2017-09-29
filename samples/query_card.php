<?php

require_once('config.php');

/**
 * Query Registered Card Request
 * Kayıtlı Kartları Sorgulama İsteği Oluştur
 */
$request = new \Hepsipay\Model\Request\QueryCard();

/**
 * Set Request
 * İsteği Ayarla
 */
$request
    ->setId("84095ee7-232a-4134-8be1-a6dd0135bff8") // Kartı bilgisi tekil kodu
    ->setCardNumber("4508034508034509") // Kart Numarası
    ->setMaskedCardNumber("450803*****4509") // Maskelenmiş kart bilgisi
    ->setExpireMonth("12") // Kart Son Kullanım Tarihi
    ->setExpireYear("20") // Kart Son Kullanım Tarihi
    ->setMerchantUserId("User_2") // Kullanıcı kodu
    ->setMerchantUserCardId("Bankxxx_yyy_kartı") // Kullanıcı kartı bilgisi kodu
    ->setCompanyId("9149379b-1b10-4f8e-a2df-a4d500961230"); // Şirkete bilgisi tekil kodu


/**
 * Make Request
 * İsteği Oluştur
 */
$response = \Hepsipay\Service\CardService::query($request);

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
