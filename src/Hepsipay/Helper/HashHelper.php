<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Helper;

use Hepsipay\HepsipayOptions;

class HashHelper
{
    public static function hashSignature($hashStr)
    {
        if(HepsipayOptions::getHashVersion() == "1.1")
        {
            return self::hashStringHmacSha512($hashStr);
        }
        
        return self::hashStringSha256($hashStr);
    }
    
    public static function hashStringSha256($hashStr)
    {
        return hash('sha256', $hashStr);
    }
    
    public static function hashStringHmacSha512($hashStr)
    {        
        return hash_hmac('sha512', $hashStr, HepsipayOptions::getSecretKey());
    }
}
