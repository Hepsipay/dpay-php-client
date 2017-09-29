<?php

require_once('config.php');

/**
 * Delete Card Request
 * Kart Silme İsteği Oluştur
 */
$request = new \Hepsipay\Model\Request\DeleteCard();

/**
 * Set Request
 * İsteği Ayarla
 */
$request
    ->setId("ad0b0515-bf7c-4cc0-aeed-a79c00e87493")
    ->setMerchantUserId("User_2") // Kullanıcı kodu
    ->setMerchantUserCardId("Bankxxx_yyy_kartı"); // Kullanıcı kartı bilgisi kodu

/**
 * Make Request
 * İsteği Oluştur
 */
$response = \Hepsipay\Service\CardService::delete($request);

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