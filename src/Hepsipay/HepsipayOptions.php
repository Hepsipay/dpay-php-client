<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay;

class HepsipayOptions
{
    private static $version = "1.7.1";
    private static $hashVersion = "1.1";
    private static $apiKey;
    private static $secretKey;
    private static $testMode = false;
    private static $logFile;
    
    public function __construct($apiKey = null, $secretKey = null, $testMode = false)
    {        
        if($apiKey) 
		{
            self::setApiKey($apiKey);
        }
        
        if($secretKey) 
		{
            self::setSecretKey($secretKey);
        }
        
        self::setTestMode($testMode);
    }
    
    public static function getVersion()
    {
        return self::$version;
    }
    
    public static function getHashVersion()
    {
        return self::$hashVersion;
    }

    public static function getApiKey()
    {
        return self::$apiKey;
    }

    public static function setApiKey($apiKey)
    {
        self::$apiKey = $apiKey;
    }

    public static function getSecretKey()
    {
        return self::$secretKey;
    }

    public static function setSecretKey($secretKey)
    {
        self::$secretKey = $secretKey;
    }

    public static function getTestMode()
    {
        return self::$testMode;
    }

    public static function setTestMode($testMode)
    {
        self::$testMode = filter_var($testMode, FILTER_VALIDATE_BOOLEAN);
    }
    
    public static function getLogFile()
    {
        return self::$logFile;
    }

    public static function setLogFile($logFile)
    {
        self::$logFile = $logFile;
    }
}
