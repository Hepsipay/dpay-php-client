<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Helper;

use Hepsipay\HepsipayOptions;

class HttpHeaderHelper
{
    protected static function checkForOptions()
    {
        $apiKey = HepsipayOptions::getApiKey();
        $secretKey = HepsipayOptions::getSecretKey();
        
        try 
        {
            if(empty($apiKey) or $apiKey == "API_KEY") 
            {
                throw new \Exception('Lütfen API anahtarınızı giriniz!');
            }
            
            if(empty($secretKey) or $secretKey == "SECRET_KEY") 
            {
                throw new \Exception('Lütfen SecretKey bilgisini giriniz!');
            }
        } 
        catch (\Exception $e) 
        {
            exit("Bir hata meydana geldi: " .$e->getMessage(). "\n");
        }        
    }
    
    public static function getDefault()
    {
        $checkForOptions = self::checkForOptions();
        
        $header = array(
            "Accept: application/json",
            "Content-Type: application/json"
        );
        
        return $header;
    }
    
    public static function getBasicAuthorization($request)
    {        
        $header = self::getDefault($request);
        
        array_push($header, "Authorization: " . sprintf("Basic %s", base64_encode(HepsipayOptions::getApiKey() . ':' . HepsipayOptions::getSecretKey())));        
        
        return $header;
    }
    
    public static function getBearerAuthorization($request, $auth)
    {
        $header = self::getDefault($request);
        
        array_push($header, "Authorization: " . sprintf("Bearer %s", $auth->getAccessToken()));        
        
        return $header;
    }
}
