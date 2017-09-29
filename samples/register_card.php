<?php

require_once('config.php');

/**
 * Register Card Request
 * Kart Kayıt Etme İsteği Oluştur
 */
$request = new \Hepsipay\Model\Request\RegisterCard();

/**
 * Set Request
 * İsteği Ayarla
 */
$request
    ->setFullName("John Doe") // Kart İsim Soyisim
    ->setCardNumber("4355084355084358") // Kart Numarası
    ->setExpireMonth("02") // Kart Son Kullanım Tarihi
    ->setExpireYear("20") // Kart Son Kullanım Tarihi
    ->setMerchantUserId("User_2") // Kullanıcı kodu
    ->setMerchantUserCardId("Bankxxx_yyy_kartı"); // Kullanıcı kartı bilgisi kodu

/**
 * Make Request
 * İsteği Oluştur
 */
$response = \Hepsipay\Service\CardService::register($request);

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