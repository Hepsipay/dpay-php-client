<?php

require_once('config.php');

// Eğer canlı modda değil iseniz (test aşamasında iseniz) TRUE olarak işaretleyin. Canlı ortama geçtiğinizde FALSE işaretleyin yada bu satırı silin
\Hepsipay\HepsipayOptions::setLogFile(__DIR__ . '/logs/hepsipay.log');

/**
 * Create Payment Request
 * Ödeme İsteği Oluştur
 */
$request = new \Hepsipay\Model\Request\Payment();

/**
 * Set Request
 * İsteği Ayarla
 */
$request
        ->setTransactionTime()    // Ödeme İşlem Zamanı, Varsayılan zaman ise şuan.
        ->setTransactionId("tx_" . rand(100000, 999999))    // Ödemeye Ait Tekil Kodu (Maksimum 40 karakterdir)
        ->setDescription("E-Ticaret Ödemesi") // Açıklama alanıdır
        ->setAmount("12099") // Toplam Ödeme Tutarı
        ->setCurrency(\Hepsipay\Model\Currency::TL) // Toplam Ödeme Tutar Birimi
        ->setInstallment(9); // Ödeme Taksit Sayısı

/**
 * Credit Card Info
 * Kredi Kartı Bilgileri
 */
$card = new \Hepsipay\Model\Card();
$card
    ->setCardHolderName("John Doe") // Kart İsim Soyisim
    ->setCardNumber("4531444531442283") // Kart Numarası
    ->setExpireMonth("12") // Kart Son Kullanım Tarihi
    ->setExpireYear("18") // Kart Son Kullanım Tarihi
    ->setSecurityCode("001"); // Kart CVV
$request->setCard($card);

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
 * Fatura Adresi
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
        ->setCount("1") // Ürün miktarı (Maksimum 3 haneli nümerik değerdir.)
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
$response = \Hepsipay\Service\PaymentService::create($request);

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