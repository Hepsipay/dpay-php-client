<?php

/*
 * Kütüphaneyi Composer ile yüklemediyseniz elle yüklemek için 
 * HepsipayBootstrap.php dosyasını çekin ve load() metodunu çağırarak kütüphaneyi yükleyin.
 * 
 * Eğer kütüphaneyi Composer ile yüklediyseniz aşağıdaki 2 satıra gerek yoktur, 
 * composer kütüphaneyi yükleme işlemlerini otomatik olarak yapmaktadır.
 *
 */
require_once('../HepsipayBootstrap.php');
HepsipayBootstrap::load();


// Hepsipay tarafından size verilmiş olan API anahtarını giriniz
\Hepsipay\HepsipayOptions::setApiKey('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJyb2xlIjoxLCJhcGlLZXkiOiJjNWVhMGE1YTAxNjk0NjEyYmRmOTE4YjBhZDc3YjkwOCJ9.wPL9s79A4Jdpk_0D9p-wOgiNhcULg8xb4BaqrU3MrHk');

// Hepsipay tarafından size verilmiş olan SecretKey bilgisini giriniz
\Hepsipay\HepsipayOptions::setSecretKey('2637f4bb');

// Eğer canlı modda değil iseniz (test aşamasında iseniz) TRUE olarak işaretleyin. Canlı ortama geçtiğinizde FALSE işaretleyin yada bu satırı silin
\Hepsipay\HepsipayOptions::setTestMode(true);

/*
* Alternative setting options
* Alternatif ayar yapılandırma
*
* $options = new \Hepsipay\HepsipayOptions("API_KEY", "SECRET_KEY", true);
*
*/