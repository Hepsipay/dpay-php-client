<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Model;

class Basket extends BaseModel
{
    private $basketId;
    private $basketAmount;

    public function getBasketId()
    {
        return $this->basketId;
    }

    public function setBasketId($basketId)
    {
        $this->basketId = $basketId;
        
        return $this;
    }
    
    public function getBasketAmount()
    {
        return $this->basketAmount;
    }

    public function setBasketAmount($basketAmount)
    {
        $this->basketAmount = $basketAmount;
        
        return $this;
    }

    public function toArray()
    {
        return array(
                "BasketId" => $this->getBasketId(),
                "BasketAmount" => $this->getBasketAmount()
            );
    }
    
    public function toString()
    {
        return implode('', array(
                    $this->getBasketId(),
                    $this->getBasketAmount()
                ));
    }
}