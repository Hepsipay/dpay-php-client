<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Model;

class BasketItems extends BaseModel
{
    private $basket = array();

    public function add($basket)
    {
        return $this->basket[] = $basket;
    }

    public function clear()
    {
        $this->basket = array();
        
        return $this;
    }
    
    public function toArray()
    {
        $newArray = array();
        
        if(!empty($this->basket))
        {
            foreach($this->basket as $item)
            {
                if(method_exists($item, 'toArray'))
                {
                    $newArray[] = $item->toArray();
                }
                elseif(is_object($item))
                {
                    $newArray[] = (array) $item;
                }
                else
                {
                    $newArray[] = $item;
                }
            }
        }
        
        return $newArray;
    }
}