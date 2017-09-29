<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay;

use Hepsipay\Helper\JsonHelper;

class JsonMapper
{
    private $jsonString;
    private $jsonObject;
    private $mapObject;
    private $propertiesObject = array();
    
    public function __construct($jsonString, $mapObject)
    {
        $this->jsonString  = $jsonString;
        $this->mapObject   = $mapObject;
        $this->jsonObject  = JsonHelper::decode($jsonString);
    }
    
    public static function create($jsonString, $mapObject)
    {
        return new JsonMapper($jsonString, $mapObject);
    } 
    
    public function map()
    {
        foreach(get_object_vars($this->mapObject) as $property => $value)
        {
            $this->propertiesObject[$property] = strtolower($property);
        }
        
        foreach($this->jsonObject as $key => $value)
        {
            $fieldName = strtolower($key);
            $fieldName = str_replace('_', '', $fieldName);
            
            if($field = array_search($fieldName, $this->propertiesObject))
            {
                $this->mapObject->{$field} = $value;
            }
        }
        
        if(property_exists($this->mapObject, 'rawResponse'))
        {
            $this->mapObject->rawResponse = $this->jsonString;
        }
        
        return $this->mapObject;
    }    
}
