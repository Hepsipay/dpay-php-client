# dpay-php-client

# Kullanım

### 3D’siz Satış İşlemi

#### Request

```PHP

?php 

require_once('config.php');

/**
 * Create Payment Request
 * Ödeme İsteği Oluştur
 */
$request = new \Hepsipay\Request\CreatePaymentRequest();

/**
 * Set Options
 * Ayarları Set Et
 */
$request->setOptions($options);


$request->setTransactionTime();    // Ödeme İşlem Zamanı, Varsayılan zaman ise şuan.
$request->setTransactionId("tx_" . rand(100000, 999999));    // Ödemeye Ait Tekil Kodu (Maksimum 40 karakterdir)
$request->setDescription("E-Ticaret Ödemesi"); // Açıklama alanıdır (Maksimum 40 karakterdir)
$request->setAmount("12099"); // Toplam Ödeme Tutarı (120,99 TL için 12099 girilmesi gerekmektedir. Diğer örnek: 1 TL için 100 giriniz.)
$request->setCurrency(\Hepsipay\Model\Currency::TL); // Toplam Ödeme Tutar Birimi
$request->setInstallment(1); // Ödeme Taksit Sayısı (1'den 12'ye kadar taksit değeridir)

/**
 * Credit Card Info
 * Kredi Kartı Bilgileri
 */
$card = new \Hepsipay\Model\Card();
$card->setCardHolderName("John Doe"); // Kart İsim Soyisim (Maksimum 40 karakterdir. Sadece alfabetik karakterler ve boşluk kabul eder)
$card->setCardNumber("4355084355084358"); // Kart Numarası (15 veya 16 haneli nümerik değerdir)
$card->setExpireMonth("12"); // Kart Son Kullanım Tarihi (2 haneli nümerik değerdir.)
$card->setExpireYear("18"); // Kart Son Kullanım Tarihi (2 haneli nümerik değerdir.)
$card->setSecurityCode("000"); // Kart CVV (3 veya 4 haneli nümerik değerdir.)
$request->setCard($card);

/**
 * Customer Info
 * Müşteri Bilgileri
 */
$customer = new \Hepsipay\Model\Customer();
$customer->setName("Ali"); // Müşteri İsim (Maksimum 20 karakterdir. Sadece alfabetik karakterler ve boşluk kabul eder.)
$customer->setSurName("Veli"); // Müşteri Soyisim (Maksimum 20 karakterdir. Sadece alfabetik karakterler ve boşluk kabul eder.)
$customer->setEmail("ali.veli@alivelimarket.com.tr"); // Müşteri Mail (Eposta adresidir.)
$customer->setIpAddress("72.125.165.16"); // Müşteri IP Adresi (IP adresidir.)
$customer->setPhoneNumber("+905350000000"); // Müşteri Telefon Numarası (Maksimum 13 karakterdir. Sadece nümerik ve + değerlerini alabilir.)
$customer->setCode("7cefdf61-38cd-4b35-b5f0-4c98c5805d41"); // Müşteri Kodu (Maksimum 36 karakterdir.)
$customer->setTckn("12345678910"); // Müşteri Kimik Numarısı (TC Kimlik numarasıdır.)
$customer->setVatNumber("12345678910"); // Müşteri Vergi Numarası (Şirketlere ve firmalara tekil vergi numarası)
$customer->setMemberSince("20151124"); // Müşteri Üyelik tarihi (Müşteri üyelik tarihi formatı YYYYMMDD’dır.)
$customer->setBirthDate("19781123"); // Müşteri Doğum tarihi (Müşteri üyelik tarihi formatı YYYYMMDD’dır.)
$request->setCustomer($customer);

/**
 * Shipping Address
 * Teslimat/Nakliye Adresi
 */
$shippingAddress = new \Hepsipay\Model\Address();
$shippingAddress->setName("Ali Veli"); // Sipariş Teslimatının yapılacağı kişi adı ve soyadı (Maksimum 40 karakterdir. Sadece alfabetik karakterler ve boşluk kabul eder.)
$shippingAddress->setAddress("Kuştepe Mahallesi Mecidiyeköy Yolu Cad. No:12 Trump Towers Kule:2 Kat:11 Mecidiyeköy"); // Siparişin teslim edileceği adres (Maksimum 500 karakterdir. Sadece alfanümerik karakterler, &.,/: ve boşluk karakterini kabul eder.)
$shippingAddress->setCountry("Türkiye"); // Sipariş teslimatının yapılacağı ülke (Maksimum 20 karakterdir. Sadece alfabetik olabilir.)
$shippingAddress->setCountryCode("TUR"); // Sipariş teslimatının yapılacağı ülke (2 veya 3 haneli ISO ülke kodudur.Sadece alfabetik olabilir.)
$shippingAddress->setCity("Istanbul"); // Sipariş teslimatının yapılacağı şehir (Maksimum 20 karakterdir.Sadece alfabetik olabilir.)
$shippingAddress->setCityCode("34"); // Sipariş teslimatının yapılacağı şehir (Şehire ait ulusal veya uluslararası kod alanıdır. Türkiye için plaka kodu kullanılabilir.)
$shippingAddress->setZipCode("34580"); // Sipariş teslimatının yapılacağı posta kodu (Uluslararası posta kodu alanıdır.)
$shippingAddress->setDistrict("Şişli"); // Sipariş teslimatının yapılacağı ilçe (İlçe alanıdır.)
$shippingAddress->setDistrictCode(""); // Sipariş teslimatının yapılacağı ilçe kodu (İlçe kodu alanıdır.)
$shippingAddress->setShippingCompany("XXX"); // Taşıyıcı kargo bilgisi (Taşıyıcı kargo bilgisi alanıdır.)
$request->setShippingAddress($shippingAddress);

/**
 * Invoice Address
 * Fature Adresi
 */
$invoceAddress = new \Hepsipay\Model\Address();
$invoceAddress->setName("Ali Veli"); // Fatura kesilecek kişi veya kurum adı (Maksimum 40 karakterdir. Sadece alfanümerik karakterler, & . ve boşluk karakterini kabul eder.)
$invoceAddress->setAddress("Kuştepe Mahallesi Mecidiyeköy Yolu Cad. No:12 Trump Towers Kule:2 Kat:11 Şişli"); // Fatura adresi (Maksimum 500 karakterdir. Sadece alfanümerik karakterler, &.,/: ve boşluk karakterini kabul eder.)
$invoceAddress->setCountry("Türkiye"); // Fatura ülkesi (Maksimum 20 karakterdir. Sadece alfabetik olabilir.)
$invoceAddress->setCountryCode("TUR"); // Fatura ülkesi (2 veya 3 haneli ISO ülke kodudur. Sadece alfabetik olabilir.)
$invoceAddress->setCity("Istanbul"); // Fatura şehri (Maksimum 20 karakterdir. Sadece alfabetik olabilir.)
$invoceAddress->setCityCode("34"); // Fatura şehri (Şehire ait ulusal veya uluslararası kod alanıdır. Türkiye için plaka kodu kullanılabilir.)
$invoceAddress->setZipCode("34580"); // Fatura zip code (Uluslararası posta kodu alanıdır.)
$invoceAddress->setDistrict("Şişli"); // Sipariş teslimatının yapılacağı ilçe (İlçe alanıdır.)
$invoceAddress->setDistrictCode(""); // Sipariş teslimatının yapılacağı ilçe kodu (İlçe kodu alanıdır.)
$invoceAddress->setShippingCompany("XXX"); // Taşıyıcı kargo bilgisi (Taşıyıcı kargo bilgisi alanıdır.)
$request->setInvoiceAddress($invoceAddress);

/**
 * Cart
 * Sepet
 */
$basketItems = array();
$firstBasketItem = new \Hepsipay\Model\BasketItem();
$firstBasketItem->setDescription("Boyama Kalem Seti"); // Ürün ismi (Maksimum 40 karakterdir.)
$firstBasketItem->setProductCode("7cefdf61-38cd-4b35-b5f0-4c98c5805d41"); // Ürün kodu (Maksimum 36 karakterdir.)
$firstBasketItem->setAmount("8750"); // Ürün fiyatı (Nokta ve virgülden arındırılmış double değerdir.)
$firstBasketItem->setVatRatio("18"); // Tutarın KDV içerip içermediğini belirtir (0, 8 veya 18 değerlerini alabilir.)
$firstBasketItem->setCount("1"); // Ürün miktarı (Maksimum 3 haneli nümerik değerdir.)
$firstBasketItem->setUrl("http://www.alivelimarket.com.tr/boyama-kalem-seti"); // Ürün web adresi (Web URL'idir)
$firstBasketItem->setBasketItemType(\Hepsipay\Model\BasketItemType::PHYSICAL); // Ürün tipi (Ürünler için PHYSICAL, Kargo bilgisi için SHIPPING.)
$firstBasketItem->setBasketItemId("basket_1");  // Ürün kodu (Maksimum 40 karakterdir.)
$basketItems[] = $firstBasketItem;

$secondBasketItem = new \Hepsipay\Model\BasketItem();
$secondBasketItem->setDescription("Boyama Kitabı");
$secondBasketItem->setProductCode("7cefdf61-38cd-4b35-b5f0-4c98c5805d41");
$secondBasketItem->setAmount("2550");
$secondBasketItem->setVatRatio("18");
$secondBasketItem->setCount("3");
$secondBasketItem->setUrl("http://www.alivelimarket.com.tr/boyama-kitabi");
$secondBasketItem->setBasketItemType(\Hepsipay\Model\BasketItemType::PHYSICAL);
$secondBasketItem->setBasketItemId("basket_2");
$basketItems[1] = $secondBasketItem;

$thirdBasketItem = new \Hepsipay\Model\BasketItem();
$thirdBasketItem->setDescription("KargoBedeli");
$thirdBasketItem->setAmount("1000");
$thirdBasketItem->setVatRatio("18");
$thirdBasketItem->setCount("1");
$thirdBasketItem->setBasketItemType(\Hepsipay\Model\BasketItemType::SHIPPING);
$thirdBasketItem->setBasketItemId("basket_3");
$basketItems[] = $thirdBasketItem;

$request->setBasketItems($basketItems);

/**
 * Make Request
 * İsteği Oluştur
 */
$response = \Hepsipay\Model\Payment::create($request);

/**
 * Print Response ve Request Details
 * Yanıtı ve İstek Detaylarını Yazdır
 */
echo "<pre>";
echo "\nRESPONSE\n\n";
print_r($response); // Response
echo "\nREQUEST\n\n";
print_r($request->toJsonString()); // Request
echo "</pre>";


```

#### Response
```JSON
{ 
  "Amount": 12300,
  "TransactionType": 0, 
  "Installment": 9, 
  "ApiKey": "1ca71cb09c7f4a2188fbddfa90efb481",
  "TransactionId": "tx_121345678912345", 
  "TransactionTime": "1447752023",
  "Signature": "8480954d54d94e5f272c53caa69efdcb0b678e837d3997eec42c4dbfa636cdde",
  "Currency": "TRY", 
  "Extras": [ { "Key": "INT_SPRS_KODU", "Value": "spr_123456789" } ],
  "Success": true, 
  "MessageCode": "0000", 
  "Message": "Başarılı", 
  "UserMessage": "İşleminiz başarıyla gerçekleştirildi."
  }
```

### 3D'li Satış İşlemi

#### Request

```PHP

<?php 

require_once('config.php');

/**
 * Create 3D Payment Request
 * 3D Ödeme İsteği Oluştur
 */
$request = new \Hepsipay\Request\CreateThreeDSecurePaymentRequest();

/**
 * Set Options
 * Ayarları Set Et
 */
$request->setOptions($options);

$request->setTransactionTime();    // Ödeme İşlem Zamanı, Varsayılan zaman ise şuan.
$request->setTransactionId("tx_" . rand(100000, 999999));    // Ödemeye Ait Tekil Kodu (Maksimum 40 karakterdir)
$request->setDescription("3D E-Ticaret Ödemesi"); // Açıklama alanıdır (Maksimum 40 karakterdir)
$request->setAmount("12099"); // Toplam Ödeme Tutarı (120,99 TL için 12099 girilmesi gerekmektedir. Diğer örnek: 1 TL için 100 giriniz.)
$request->setCurrency(\Hepsipay\Model\Currency::TL); // Toplam Ödeme Tutar Birimi
$request->setInstallment(1); // Ödeme Taksit Sayısı (1'den 12'ye kadar taksit değeridir)
$request->setSuccessUrl("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']). "/retrieve_threed_secure_payment_response.php?status=success"); // 3d secure işlemler için zorunlu bir alandır.İşlemin başarılı olması durumunda üye işyerine tarafından geliştirilmiş sayfanın URL'si yazılmalıdır.
$request->setFailUrl("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) . "/retrieve_threed_secure_payment_response.php?status=fail"); // 3d secure işlemler için zorunlu bir alandır.İşlemin başarılı olması durumunda üye işyerine tarafından geliştirilmiş sayfanın URL'si yazılmalıdır.

/**
 * Credit Card Info
 * Kredi Kartı Bilgileri
 */
$card = new \Hepsipay\Model\Card();
$card->setCardHolderName("John Doe"); // Kart İsim Soyisim (Maksimum 40 karakterdir. Sadece alfabetik karakterler ve boşluk kabul eder)
$card->setCardNumber("4355084355084358"); // Kart Numarası (15 veya 16 haneli nümerik değerdir)
$card->setExpireMonth("12"); // Kart Son Kullanım Tarihi (2 haneli nümerik değerdir.)
$card->setExpireYear("18"); // Kart Son Kullanım Tarihi (2 haneli nümerik değerdir.)
$card->setSecurityCode("000"); // Kart CVV (3 veya 4 haneli nümerik değerdir.)
$request->setCard($card);

/**
 * Customer Info
 * Müşteri Bilgileri
 */
$customer = new \Hepsipay\Model\Customer();
$customer->setName("Ali"); // Müşteri İsim (Maksimum 20 karakterdir. Sadece alfabetik karakterler ve boşluk kabul eder.)
$customer->setSurName("Veli"); // Müşteri Soyisim (Maksimum 20 karakterdir. Sadece alfabetik karakterler ve boşluk kabul eder.)
$customer->setEmail("ali.veli@alivelimarket.com.tr"); // Müşteri Mail (Eposta adresidir.)
$customer->setIpAddress("72.125.165.16"); // Müşteri IP Adresi (IP adresidir.)
$customer->setPhoneNumber("+905350000000"); // Müşteri Telefon Numarası (Maksimum 13 karakterdir. Sadece nümerik ve + değerlerini alabilir.)
$customer->setCode("7cefdf61-38cd-4b35-b5f0-4c98c5805d41"); // Müşteri Kodu (Maksimum 36 karakterdir.)
$customer->setTckn("12345678910"); // Müşteri Kimik Numarısı (TC Kimlik numarasıdır.)
$customer->setVatNumber("12345678910"); // Müşteri Vergi Numarası (Şirketlere ve firmalara tekil vergi numarası)
$customer->setMemberSince("20151124"); // Müşteri Üyelik tarihi (Müşteri üyelik tarihi formatı YYYYMMDD’dır.)
$customer->setBirthDate("19781123"); // Müşteri Doğum tarihi (Müşteri üyelik tarihi formatı YYYYMMDD’dır.)
$request->setCustomer($customer);

/**
 * Shipping Address
 * Teslimat/Nakliye Adresi
 */
$shippingAddress = new \Hepsipay\Model\Address();
$shippingAddress->setName("Ali Veli"); // Sipariş Teslimatının yapılacağı kişi adı ve soyadı (Maksimum 40 karakterdir. Sadece alfabetik karakterler ve boşluk kabul eder.)
$shippingAddress->setAddress("Kuştepe Mahallesi Mecidiyeköy Yolu Cad. No:12 Trump Towers Kule:2 Kat:11 Mecidiyeköy"); // Siparişin teslim edileceği adres (Maksimum 500 karakterdir. Sadece alfanümerik karakterler, &.,/: ve boşluk karakterini kabul eder.)
$shippingAddress->setCountry("Türkiye"); // Sipariş teslimatının yapılacağı ülke (Maksimum 20 karakterdir. Sadece alfabetik olabilir.)
$shippingAddress->setCountryCode("TUR"); // Sipariş teslimatının yapılacağı ülke (2 veya 3 haneli ISO ülke kodudur.Sadece alfabetik olabilir.)
$shippingAddress->setCity("Istanbul"); // Sipariş teslimatının yapılacağı şehir (Maksimum 20 karakterdir.Sadece alfabetik olabilir.)
$shippingAddress->setCityCode("34"); // Sipariş teslimatının yapılacağı şehir (Şehire ait ulusal veya uluslararası kod alanıdır. Türkiye için plaka kodu kullanılabilir.)
$shippingAddress->setZipCode("34580"); // Sipariş teslimatının yapılacağı posta kodu (Uluslararası posta kodu alanıdır.)
$shippingAddress->setDistrict("Şişli"); // Sipariş teslimatının yapılacağı ilçe (İlçe alanıdır.)
$shippingAddress->setDistrictCode(""); // Sipariş teslimatının yapılacağı ilçe kodu (İlçe kodu alanıdır.)
$shippingAddress->setShippingCompany("XXX"); // Taşıyıcı kargo bilgisi (Taşıyıcı kargo bilgisi alanıdır.)
$request->setShippingAddress($shippingAddress);

/**
 * Invoice Address
 * Fature Adresi
 */
$invoceAddress = new \Hepsipay\Model\Address();
$invoceAddress->setName("Ali Veli"); // Fatura kesilecek kişi veya kurum adı (Maksimum 40 karakterdir. Sadece alfanümerik karakterler, & . ve boşluk karakterini kabul eder.)
$invoceAddress->setAddress("Kuştepe Mahallesi Mecidiyeköy Yolu Cad. No:12 Trump Towers Kule:2 Kat:11 Şişli"); // Fatura adresi (Maksimum 500 karakterdir. Sadece alfanümerik karakterler, &.,/: ve boşluk karakterini kabul eder.)
$invoceAddress->setCountry("Türkiye"); // Fatura ülkesi (Maksimum 20 karakterdir. Sadece alfabetik olabilir.)
$invoceAddress->setCountryCode("TUR"); // Fatura ülkesi (2 veya 3 haneli ISO ülke kodudur. Sadece alfabetik olabilir.)
$invoceAddress->setCity("Istanbul"); // Fatura şehri (Maksimum 20 karakterdir. Sadece alfabetik olabilir.)
$invoceAddress->setCityCode("34"); // Fatura şehri (Şehire ait ulusal veya uluslararası kod alanıdır. Türkiye için plaka kodu kullanılabilir.)
$invoceAddress->setZipCode("34580"); // Fatura zip code (Uluslararası posta kodu alanıdır.)
$invoceAddress->setDistrict("Şişli"); // Sipariş teslimatının yapılacağı ilçe (İlçe alanıdır.)
$invoceAddress->setDistrictCode(""); // Sipariş teslimatının yapılacağı ilçe kodu (İlçe kodu alanıdır.)
$invoceAddress->setShippingCompany("XXX"); // Taşıyıcı kargo bilgisi (Taşıyıcı kargo bilgisi alanıdır.)
$request->setInvoiceAddress($invoceAddress);

/**
 * Cart
 * Sepet
 */
$basketItems = array();
$firstBasketItem = new \Hepsipay\Model\BasketItem();
$firstBasketItem->setDescription("Boyama Kalem Seti"); // Ürün ismi (Maksimum 40 karakterdir.)
$firstBasketItem->setProductCode("7cefdf61-38cd-4b35-b5f0-4c98c5805d41"); // Ürün kodu (Maksimum 36 karakterdir.)
$firstBasketItem->setAmount("8750"); // Ürün fiyatı (Nokta ve virgülden arındırılmış double değerdir.)
$firstBasketItem->setVatRatio("18"); // Tutarın KDV içerip içermediğini belirtir (0, 8 veya 18 değerlerini alabilir.)
$firstBasketItem->setCount("1"); // Ürün miktarı (Maksimum 3 haneli nümerik değerdir.)
$firstBasketItem->setUrl("http://www.alivelimarket.com.tr/boyama-kalem-seti"); // Ürün web adresi (Web URL'idir)
$firstBasketItem->setBasketItemType(\Hepsipay\Model\BasketItemType::PHYSICAL); // Ürün tipi (Ürünler için PHYSICAL, Kargo bilgisi için SHIPPING.)
$firstBasketItem->setBasketItemId("basket_1");  // Ürün kodu (Maksimum 40 karakterdir.)
$basketItems[] = $firstBasketItem;

$secondBasketItem = new \Hepsipay\Model\BasketItem();
$secondBasketItem->setDescription("Boyama Kitabı");
$secondBasketItem->setProductCode("7cefdf61-38cd-4b35-b5f0-4c98c5805d41");
$secondBasketItem->setAmount("2550");
$secondBasketItem->setVatRatio("18");
$secondBasketItem->setCount("3");
$secondBasketItem->setUrl("http://www.alivelimarket.com.tr/boyama-kitabi");
$secondBasketItem->setBasketItemType(\Hepsipay\Model\BasketItemType::PHYSICAL);
$secondBasketItem->setBasketItemId("basket_2");
$basketItems[] = $secondBasketItem;

$thirdBasketItem = new \Hepsipay\Model\BasketItem();
$thirdBasketItem->setDescription("KargoBedeli");
$thirdBasketItem->setAmount("1000");
$thirdBasketItem->setVatRatio("18");
$thirdBasketItem->setCount("1");
$thirdBasketItem->setBasketItemType(\Hepsipay\Model\BasketItemType::SHIPPING);
$thirdBasketItem->setBasketItemId("basket_3");
$basketItems[] = $thirdBasketItem;

$request->setBasketItems($basketItems);

/**
 * Make Request
 * İsteği Oluştur
 */
$response = \Hepsipay\Model\ThreeDSecurePayment::create($request);

/**
 * Print Response ve Request Details
 * Yanıtı ve İstek Detaylarını Yazdır
 */
echo "<pre>";
echo "\nRESPONSE\n\n";
print_r($response); // Response
echo "\nREQUEST\n\n";
print_r($request->toJsonString()); // Request
echo "</pre>";


/**
 * Get HTML Codes
 * HTML Kodu Al
 *
 * Yorum satırını devredışı bırakıp bu kodu çalıştırdığınızda javascript çalışacağı için sayfa otomatik olarak ödeme sayfasında yönlenecektir
 */
 
echo $response->getHtmlCodes();

```

#### Response
```JSON
{ 
  "Amount": 12300,
  "TransactionType": 0, 
  "Installment": 1, 
  "ApiKey": "1ca71cb09c7f4a2188fbddfa90efb481",
  "TransactionId": "tx_121345678912345", 
  "TransactionTime": "1447752023",
  "Signature": "8480954d54d94e5f272c53caa69efdcb0b678e837d3997eec42c4dbfa636cdde",
  "Currency": "TRY", 
  "Extras": [ { "Key": "INT_SPRS_KODU", "Value": "spr_123456789" } ],
  "Success": true, 
  "MessageCode": "0000", 
  "Message": "Başarılı", 
  "UserMessage": "İşleminiz başarıyla gerçekleştirildi."
  }
```

### İade İşlemi

#### Request

```PHP

?php 

require_once('config.php');

/**
 * Create Refund Request
 * İade İsteği Oluştur
 */
$request = new \Hepsipay\Request\CreateRefundRequest();

/**
 * Set Options
 * Ayarları Set Et
 */
$request->setOptions($options);

$request->setTransactionTime(time()); // İşlem Zamanı, Varsayılan zaman ise şuan.
$request->setTransactionId("tx_" . rand(100000, 999999)); // Ödemeye Ait Tekil Kodu (Maksimum 40 karakterdir)
$request->setReferenceTransactionId("tx_532998"); // İade Edilecek Ödemeye Ait Tekil Kod (Maksimum 40 karakterdir)
$request->setAmount("12099"); // Toplam İade Tutarı (120,99 TL için 12099 girilmesi gerekmektedir. Diğer örnek: 1 TL için 100 giriniz.)
$request->setCurrency(\Hepsipay\Model\Currency::TL); // Toplam Ödeme Tutar Birimi

/**
 * Make Request
 * İsteği Oluştur
 */
$response = \Hepsipay\Model\Refund::create($request);

/**
 * Print Response ve Request Details
 * Yanıtı ve İstek Detaylarını Yazdır
 */
echo "<pre>";
echo "\nRESPONSE\n\n";
print_r($response); // Response
echo "\nREQUEST\n\n";
print_r($request->toJsonString()); // Request
echo "</pre>";


```

#### Response
```JSON

{
  "ApiKey": "1ca71cb09c7f4a2188fbddfa90efb481",  
  "TransactionId": " tx_123456789",  
  "ReferenceTransactionId": "tx_12345678",  
  "TransactionTime": "1447752023",  
  "Signature": "8480954d54d94e5f272c53caa69efdcb0b678e837d3997eec42c4dbfa636cdde",  
  "Currency": "TRY", 
  "amount": 100,  
  "MessageCode": "0000",  
  "Message": "Başarılı",
  "UserMessage": "İşleminiz başarıyla gerçekleştirildi"  
	}  

```

### Test Kartları


Kart No          | Banka        | Son Kullanma Tarihi	| CVV		| 3D Secure
-----------      | ----         | -------------------	| ---    	| ---------				
4531444531442283 | Halkbank     | 12/18 				| 001  	 	| Var
5818775818772285 | Halkbank     | 12/18  				| 001	 	| Var
9792004525458548 | Halkbank     | 12/20                 | 001 	 	| Var
5571135571135575 | Akbank       | 12/18                 | 000		| Var
4355084355084358 | Akbank       | 12/18                 | 000       | Var
9792087721232551 | Akbank       | 12/20                 | 000       | Var
375622005485014  | Garanti		| 07/19				    | 123       | Var
4282209004348015 | Garanti		| 07/19				    | 123       | Var
4282209027132016 | Garanti		| 05/18			        | 358       | Yok
4824894728063019 | Garanti		| 06/17				    | 959       | Yok
5289394722895016 | Garanti		| 08/17			        | 820       | Var
5549604734932029 | Garanti		| 03/18		            | 119       | Yok
4508034508034509 | İşbank       | 12/20				    | 000       | Var
5406675406675403 | İşbank       | 12/20				    | 000       | Var
9792042022562362 | İşbank       | 12/20				    | 000       | Var
5400610093155852 | Yapı Kredi	| 02/20				    | 000       | Var
5400617049774124 | Yapı Kredi	| 02/20				    | 000       | Var
5400637003737156 | Yapı Kredi	| 02/20				    | 000       | Var
4506347011448053 | Yapı Kredi	| 02/20				    | 000       | Var
4506347022052795 | Yapı Kredi	| 02/20				    | 000       | Var
4506347031187533 | Yapı Kredi	| 02/20				    | 000       | Var
4506347043358536 | Yapı Kredi	| 02/20				    | 000       | Var
4022774022774026 | FinansBank	| 12/18				    | 000       | Var
5456165456165454 | FinansBank	| 12/18				    | 000       | Var
9792031125125565 | FinansBank	| 12/20				    | 000       | Var

### Cevap Kodları

Cevap Kodu		     | Kullanıcı Mesajı																															| Teknik Mesaj
-------------------  | -----------------								  																						| -------------
0000                 | İşleminiz başarıyla gerçekleşmiştir.				  																						| İşleminiz başarıyla gerçekleşmiştir.
1007		         | Lütfen girdiğiniz kart bilgilerini kontrol edip tekrar deneyiniz.																		| Geçersiz güvenlik kodu.
1009                 | Lütfen girdiğiniz kart bilgilerini kontrol edip tekrar deneyiniz.																		| Kart bilgisi geçersiz.
1021                 | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.																| Sanal Pos Banka tarafında kapalıdır
1028		         | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.																| İadesi Yapılmış İşlem Tekrar İade Edilemez.
1029                 | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.																| Kart Hatası.
1501                 | Kartınızın yetkileri ya da kısıtlamalarından dolayı hata almaktasınız.Kartınızın bankası ile iletişime geçmenizi rica ederiz.			| Kart Hatası.
1503		         | Lütfen girdiğiniz kart bilgilerini kontrol edip tekrar deneyiniz.																		| Kart bilgisi geçersiz.
1504                 | Kartınız online işleme kapalıdır. Kartınız online işlemlere açıldığında tekrar denemenizi rica ederiz.									| Kart Hatası
1505                 | Kartınızın yetkileri ya da kısıtlamalarından dolayı hata almaktasınız.Kartınızın bankası ile iletişime geçmenizi rica ederiz.            | Kart Hatası
1506		         | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.							                                    | Tanım Hatası
1507                 | Kartınızın yetkileri ya da kısıtlamalarından dolayı hata almaktasınız.Kartınızın bankası ile iletişime geçmenizi rica ederiz.   			| Kart Hatası
1508                 | Kartınızın yetkileri ya da kısıtlamalarından dolayı hata almaktasınız.Kartınızın bankası ile iletişime geçmenizi rica ederiz. 	        | Kart Hatası
1517		         | Kartınızın yetkileri ya da kısıtlamalarından dolayı hata almaktasınız.Kartınızın bankası ile iletişime geçmenizi rica ederiz.            | Kart Hatası
1518                 | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Tanım Hatası
1520                 | Kartınız üzerinde bu işlem için yeterli bakiyeniz bulunmamaktadır.                                                                       | Hesap müsait değil.
1521		         | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Tanım Hatası
1523                 | İzin verilen şifre giriş sayısı aşıldı.Kartınızın bankası ile iletişime geçmeniz gerekmektedir.                        	                | Kart Hatası
1525                 | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Geçersiz PIN.
1526		         | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | ARQC hatası.
1530                 | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Kart Hatası
1532                 | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Banka İşlemlere Cevap Vermiyor
1544                 | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Tanım Hatası
1577		         | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Kredi kartı blacklist'te bulunmaktadır.
3025                 | Kartınız taksitli işlemlere kapalı olduğu için işleminiz gerçekleştirilemiyor.Lütfen bankanız ile iletişime geçiniz.                     | Kredi kartı taksitli işleme kapalı.
3032                 | Lütfen girdiğiniz kart bilgilerini kontrol edip tekrar deneyiniz.                                                                        | Kart bilgileri hatalı.
3065		         | Eklenmek istenilen kredi kartı daha önceden eklendiği için işleminizi gerçekleştiremiyoruz. Lütfen yeni bir kart numarası ekleyiniz.     | Kaydedilmek istenilen kart daha önceden kaydedilmiş.
3066                 | Aradığınız kriterlere uygun sonuç bulunamadı.		                                                                                    | Aranan değerlere göre kurumunuza ait kayıtlı kart bulunamamıştır.
1000,1001,1003,1015  | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Genel sistem hatası
1016,1020,1025,1032  | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Genel sistem hatası 
1032,1041,1043,1510  | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Genel sistem hatası
1511,1513,1514,1522  | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Genel sistem hatası
1527,1528,1531,1533  | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Genel sistem hatası
1534,1535,1536,1537  | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Genel sistem hatası
1539,1540,1541,1542  | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Genel sistem hatası
1546,1547,1548,1549  | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Genel sistem hatası
1550,1551,1553,1554  | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Genel sistem hatası
1559,1560,1561,1562  | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Genel sistem hatası
1563,1567,1568,1569  | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Genel sistem hatası
1571,1574,1575,1576  | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Genel sistem hatası
1578,1579,1580,1581  | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Genel sistem hatası
1582,1583,2000,2011  | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Genel sistem hatası
3093,3094,4022,4023  | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Genel sistem hatası
4024,4027,4032, 4034 | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Genel sistem hatası 
6000				 | Şu anda işleminizi gerçekleştiremiyoruz. Lütfen daha sonra tekrar deneyiniz.                                                             | Genel sistem hatası 

```
