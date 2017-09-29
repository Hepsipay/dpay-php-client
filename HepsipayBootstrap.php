<?php

/**
 * Hepsipay Spl class autoloader
 *
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 *
 * @author Ahmet Bora <ahmetbora@pixelturk.net> <https://github.com/afbora>
 */
class HepsipayBootstrap
{
    private static $extension = '.php';
    private static $path = 'src';
    private static $seperator = '\\';
    
    public static function load()
    {        
        spl_autoload_register(function ($class) {
            $filename = __DIR__ . DIRECTORY_SEPARATOR . self::$path . DIRECTORY_SEPARATOR . str_replace(self::$seperator, DIRECTORY_SEPARATOR, $class) . self::$extension;
            
            if(file_exists($filename))
            {
                require $filename;
            }
        });
    }
}
