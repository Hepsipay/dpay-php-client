<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Model;

class Card extends BaseModel
{
    private $cardHolderName;
    private $cardNumber;
    private $expireYear;
    private $expireMonth;
    private $securityCode;

    public function getCardHolderName()
    {
        return $this->cardHolderName;
    }

    public function setCardHolderName($cardHolderName)
    {
        $this->cardHolderName = $cardHolderName;
        
        return $this;
    }

    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
        
        return $this;
    }

    public function getExpireYear()
    {
        return $this->expireYear;
    }

    public function setExpireYear($expireYear)
    {
        $this->expireYear = $expireYear;
        
        return $this;
    }

    public function getExpireMonth()
    {
        return $this->expireMonth;
    }

    public function setExpireMonth($expireMonth)
    {
        $this->expireMonth = $expireMonth;
        
        return $this;
    }

    public function getSecurityCode()
    {
        return $this->securityCode;
    }

    public function setSecurityCode($securityCode)
    {
        $this->securityCode = $securityCode;
        
        return $this;
    }

    public function toArray()
    {
        return array(
                "cardHolderName" => $this->getCardHolderName(),
                "cardNumber" => $this->getCardNumber(),
                "expireYear" => $this->getExpireYear(),
                "expireMonth" => $this->getExpireMonth(),
                "securityCode" => $this->getSecurityCode()
            );
    }
    
    public function toString()
    {
        return implode('', array(
                    $this->getCardHolderName(),
                    $this->getCardNumber(),
                    $this->getExpireYear(),
                    $this->getExpireMonth(),
                    $this->getSecurityCode()
                ));
    }
}