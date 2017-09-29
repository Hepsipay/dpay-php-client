<?php

require_once('config.php');

/**
 * Create 3D Payment Request
 * 3D Ödeme İsteği Oluştur
 */
$request = new \Hepsipay\Model\Request\ThreeDSecurePayment();

/**
 * Set Request
 * İsteği Ayarla
 */
$request
        ->setTransactionTime()  // Ödeme İşlem Zamanı, Varsayılan zaman ise şuan.
        ->setTransactionId("tx_" . rand(100000, 999999))   // Ödemeye Ait Tekil Kodu
        ->setDescription("3D E-Ticaret Ödemesi") // Açıklama alanıdır
        ->setAmount("12099") // Toplam Ödeme Tutarı
        ->setCurrency(\Hepsipay\Model\Currency::TL) // Toplam Ödeme Tutar Birimi
        ->setInstallment(9) // Ödeme Taksit Sayısı (1'den 12'ye kadar taksit değeridir)
        ->setSuccessUrl("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']). "/retrieve_3d_secure_payment_with_registered_card_response.php?status=success") // 3d secure işlemler için zorunlu bir alandır.İşlemin başarılı olması durumunda üye işyerine tarafından geliştirilmiş sayfanın URL'si yazılmalıdır.
        ->setFailUrl("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) . "/retrieve_3d_secure_payment_with_registered_card_response.php?status=fail"); // 3d secure işlemler için zorunlu bir alandır.İşlemin başarılı olması durumunda üye işyerine tarafından geliştirilmiş sayfanın URL'si yazılmalıdır.

/**
 * Registered Card Info
 * Kayıtlı Kart Bilgileri
 */
$request->setMerchantCardId("e62d8563-0376-44f8-bf3c-a71a0103a3a6");

/**
 * Customer Info
 * Müşteri Bilgileri
 */
$customer = new \Hepsipay\Model\Customer();
$customer
        ->setName("Ali") // Müşteri İsim
        ->setSurName("Veli") // Müşteri Soyisim
        ->setEmail("ali.veli@alivelimarket.com.tr") // Müşteri Mail
        ->setIpAddress("72.125.165.16") // Müşteri IP Adresi
        ->setPhoneNumber("+905350000000") // Müşteri Telefon Numarası
        ->setCode("7cefdf61-38cd-4b35-b5f0-4c98c5805d41") // Müşteri Kodu
        ->setTckn("12345678910") // Müşteri Kimik Numarısı
        ->setVatNumber("12345678910") // Müşteri Vergi Numarası
        ->setMemberSince("20151124") // Müşteri Üyelik tarihi
        ->setBirthDate("19781123"); // Müşteri Doğum tarihi
$request->setCustomer($customer);

/**
 * Shipping Address
 * Teslimat/Nakliye Adresi
 */
$shippingAddress = new \Hepsipay\Model\Address();
$shippingAddress
            ->setName("Ali Veli") // Sipariş Teslimatının yapılacağı kişi adı ve soyadı
            ->setAddress("Kuştepe Mahallesi Mecidiyeköy Yolu Cad. No:12 Trump Towers Kule:2 Kat:11 Mecidiyeköy") // Siparişin teslim edileceği adres
            ->setCountry("Türkiye") // Sipariş teslimatının yapılacağı ülke
            ->setCountryCode("TUR") // Sipariş teslimatının yapılacağı ülke
            ->setCity("Istanbul") // Sipariş teslimatının yapılacağı şehir
            ->setCityCode("34") // Sipariş teslimatının yapılacağı şehir
            ->setZipCode("34580") // Sipariş teslimatının yapılacağı posta kodu
            ->setDistrict("Şişli") // Sipariş teslimatının yapılacağı ilçe
            ->setDistrictCode("") // Sipariş teslimatının yapılacağı ilçe kodu
            ->setShippingCompany("XXX"); // Taşıyıcı kargo bilgisi
$request->setShippingAddress($shippingAddress);

/**
 * Invoice Address
 * Fature Adresi
 */
$invoceAddress = new \Hepsipay\Model\Address();
$invoceAddress
            ->setName("Ali Veli") // Fatura kesilecek kişi veya kurum adı
            ->setAddress("Kuştepe Mahallesi Mecidiyeköy Yolu Cad. No:12 Trump Towers Kule:2 Kat:11 Şişli") // Fatura adresi
            ->setCountry("Türkiye") // Fatura ülkesi
            ->setCountryCode("TUR") // Fatura ülkesi
            ->setCity("Istanbul") // Fatura şehri
            ->setCityCode("34") // Fatura şehri
            ->setZipCode("34580") // Fatura posta kodu
            ->setDistrict("Şişli") // Sipariş teslimatının yapılacağı ilçe
            ->setDistrictCode("") // Sipariş teslimatının yapılacağı ilçe kodu
            ->setShippingCompany("XXX"); // Taşıyıcı kargo bilgisi
$request->setInvoiceAddress($invoceAddress);

/**
 * Basket
 * Sepet
 */
$basketItems = new \Hepsipay\Model\BasketItems();

$basketItem = new \Hepsipay\Model\BasketItem();
$basketItem
        ->setDescription("Boyama Kalem Seti") // Ürün ismi
        ->setProductCode("7cefdf61-38cd-4b35-b5f0-4c98c5805d41") // Ürün kodu
        ->setAmount("8750") // Ürün fiyatı
        ->setVatRatio("18") // Tutarın KDV içerip içermediğini belirtir 
        ->setCount("1") // Ürün miktarı
        ->setUrl("http://www.alivelimarket.com.tr/boyama-kalem-seti") // Ürün web adresi
        ->setBasketItemType(\Hepsipay\Model\BasketItemType::PHYSICAL) // Ürün tipi (Ürünler için PHYSICAL, Kargo bilgisi için SHIPPING.)
        ->setBasketItemId("basket_1");  // Ürün kodu
$basketItems->add($basketItem);

$basketItem = new \Hepsipay\Model\BasketItem();
$basketItem
        ->setDescription("Boyama Kitabı")
        ->setProductCode("7cefdf61-38cd-4b35-b5f0-4c98c5805d41")
        ->setAmount("2550")
        ->setVatRatio("18")
        ->setCount("3")
        ->setUrl("http://www.alivelimarket.com.tr/boyama-kitabi")
        ->setBasketItemType(\Hepsipay\Model\BasketItemType::PHYSICAL)
        ->setBasketItemId("basket_2");
$basketItems->add($basketItem);

$basketItem = new \Hepsipay\Model\BasketItem();
$basketItem
        ->setDescription("KargoBedeli")
        ->setAmount("1000")
        ->setVatRatio("18")
        ->setCount("1")
        ->setBasketItemType(\Hepsipay\Model\BasketItemType::SHIPPING)
        ->setBasketItemId("basket_3");
$basketItems->add($basketItem);

$request->setBasketItems($basketItems);

/**
 * Make Request
 * İsteği Oluştur
 */
$response = \Hepsipay\Service\PaymentService::createThreeD($request);

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


/**
 * Get HTML Codes
 * HTML Kodu Al
 *
 * Yorum satırını devredışı bırakıp bu kodu çalıştırdığınızda javascript çalışacağı için sayfa otomatik olarak ödeme sayfasında yönlenecektir
 */
 
echo $response->getHtmlCodes();