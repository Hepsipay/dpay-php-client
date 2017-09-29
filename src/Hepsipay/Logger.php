<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay;

class Logger
{       
    private $logFile;
          
    function __construct() 
    {
        if($logFile = HepsipayOptions::getLogFile())
        {
            $this->logFile = $logFile;
            
            if(!file_exists($this->logFile))
            {
                touch($this->logFile);
            }

            if(!is_writable($this->logFile))
            {
                throw new \Exception("Logger Exception: Can't write to log", 1);
            }
        }
    }
    
    public static function create($logFile = null)
    {
        return new Logger($logFile);
    } 
    
    public function debug($message)
    {
        $this->writeLogFile("DEBUG", $message);
    }
      
    public function error($message)
    {
        $this->writeLogFile("ERROR", $message);            
    }

     
    public function warning($message)
    {
        $this->writeLogFile("WARNING", $message);            
    }
       
    public function info($message)
    {
        $this->writeLogFile("INFO", $message);            
    }
    
    private function writeLogFile($status, $message)
    {
        if(!is_null($this->logFile))
        {
            $date = date('Y-m-d H:i:s');
            $msg = "[{$date}] : [{$status}] - {$message}" . PHP_EOL;
            return file_put_contents($this->logFile, $msg, FILE_APPEND);
        }
        
        return false;
    }
}
