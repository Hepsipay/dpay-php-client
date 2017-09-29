<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay;

class PostHandler
{
    private static $instance;
    
    public static function getInstance()
    {
        if(is_null(self::$instance))
        {
            self::$instance = new self();
        }
        
        return self::$instance;
    }
    
    public static function set($key, $value)
    {
        $_POST[$key] = $value;
    }

    public static function get($key = null, $default = null)
    {
       if(isset($_POST) and !empty($_POST)) 
       {
            if($key) 
            {
                if($key and isset($_POST[$key]) and !empty($_POST[$key])) 
                {
                    return $_POST[$key];
                }
            } 
            else 
            {
                return $_POST;
            }
        }
        
        return $default;
    }

    public static function hasPost($key = null)
    {
        if(isset($_POST) and !empty($_POST)) 
        {
            if($key) 
            {
                if($key and isset($_POST[$key]) and !empty($_POST[$key])) 
                {
                    return true;
                }
            } 
            else 
            {
                return true;
            }
        }
        
        return false;
    }
}
