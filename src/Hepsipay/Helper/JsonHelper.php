<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Helper;

class JsonHelper
{
    public static function isJson($string)
    {
        json_decode($string);
        
        return (json_last_error() == JSON_ERROR_NONE);
    }
    
    public static function encode($data)
    {
        return json_encode($data);
    }

    public static function decode($str, $asArray = false)
    {
        return json_decode($str, $asArray);
    }
}
