<?php

require_once('config.php');

/**
 * Update Card Request
 * Kart Güncelleme İsteği Oluştur
 */
$request = new \Hepsipay\Model\Request\UpdateCard();

/**
 * Set Request
 * İsteği Ayarla
 */
$request
    ->setId("84095ee7-232a-4134-8be1-a6dd0135bff8") // Kartı bilgisi tekil kodu
    ->setExpireMonth("12") // Kart Son Kullanım Tarihi
    ->setExpireYear("18") // Kart Son Kullanım Tarihi
    ->setMerchantUserId("User_2") // Kullanıcı kodu
    ->setMerchantUserCardId("Bankxxx_yyy_kartı"); // Kullanıcı kartı bilgisi kodu

/**
 * Make Request
 * İsteği Oluştur
 */
$response = \Hepsipay\Service\CardService::update($request);

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