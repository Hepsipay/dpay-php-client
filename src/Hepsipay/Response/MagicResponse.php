<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Response;

class MagicResponse
{
    public function __call($name, $arguments) 
    {
        if(property_exists(get_class($this), $name))
        {
            if (count($arguments) == 1) 
            {
                $this->$name = $arguments[0];
            } 
            else if (count($arguments) > 1) 
            {
                throw new \Exception("Setter for {$name} only accepts one parameter.");
            }

            return $this->$name;
        }
        
        $prefix = substr($name, 0, 3);
        $property = lcfirst(strtolower($name[3]) . substr($name, 4));
        
        switch ($prefix) 
        {
            case 'get':
                return $this->{$property};
                break;
            case 'set':
                if (count($arguments) != 1) 
                {
                    throw new \Exception("Setter for $name requires exactly one parameter.");
                }
                
                $this->$property = $arguments[0];
                
                return $this->{$name};
            default:
                throw new \Exception("Property {$name} doesn't exist.");
                break;
        }
    }
    
    public function __isset($key)
    {
        return property_exists($this, lcfirst($key));
    }
}
