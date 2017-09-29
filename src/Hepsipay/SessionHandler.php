<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay;

class SessionHandler
{
    private static $instance;
    
    public function __construct()
    {
        if(session_status() == PHP_SESSION_NONE) 
        {
            session_start();
        }
    }
    
    public function __destruct()
    {
        unset($this);
    }
    
    public static function getInstance()
    {
        if(is_null(self::$instance))
        {
            self::$instance = new self();
        }
        
        return self::$instance;
    }

    public function set($key, $value)
    {
        if(isset($_SESSION))
        {
            $_SESSION[$key] = $value;
        }
    }

    public function get($key = null, $default = null)
    {
       if(isset($_SESSION) and !empty($_SESSION)) 
       {
            if($key) 
            {
                if($key and isset($_SESSION[$key]) and !empty($_SESSION[$key])) 
                {
                    return $_SESSION[$key];
                }
            } 
            else 
            {
                return $_SESSION;
            }
        }
        
        return $default;
    }

    public function has($key = null)
    {
        if(isset($_SESSION) and !empty($_SESSION)) 
        {
            if($key) 
            {
                if($key and isset($_SESSION[$key]) and !empty($_SESSION[$key])) 
                {
                    return true;
                }
            } else 
            {
                return true;
            }
        }
        
        return false;
    }
    
    public function remove($key = null)
    {
        if($this->has($key))
        {
            unset($_SESSION[$key]);
             
            return true;
        }
        
        return false;
    }

    public function end()
    {
        if(session_status() == PHP_SESSION_ACTIVE) 
        {
            session_destroy();
            $_SESSION = array();
        }       
    }
}
