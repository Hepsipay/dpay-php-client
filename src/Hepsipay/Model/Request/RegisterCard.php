<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Model\Request;

class RegisterCard extends BaseModel
{
    private $fullName;
    private $cardNumber;
    private $expireMonth;
    private $expireYear;
    private $merchantUserId;
    private $merchantUserCardId;

    public function getFullName()
    {
        return $this->fullName;
    }

    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
        
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
    
    public function getExpireMonth()
    {
        return $this->expireMonth;
    }

    public function setExpireMonth($expireMonth)
    {
        $this->expireMonth = $expireMonth;
        
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
    
    public function getMerchantUserId()
    {
        return $this->merchantUserId;
    }

    public function setMerchantUserId($merchantUserId)
    {
        $this->merchantUserId = $merchantUserId;
        
        return $this;
    }
    
    public function getMerchantUserCardId()
    {
        return $this->merchantUserCardId;
    }

    public function setMerchantUserCardId($merchantUserCardId)
    {
        $this->merchantUserCardId = $merchantUserCardId;
        
        return $this;
    }
    
    public function toArray()
    {
        return array_merge_recursive(
                    parent::toArray(),
                    array(
                        "FullName" => $this->getFullName(),
                        "CardNumber" => $this->getCardNumber(),
                        "ExpireMonth" => $this->getExpireMonth(),
                        "ExpireYear" => $this->getExpireYear(),
                        "MerchantUserId" => $this->getMerchantUserId(),
                        "MerchantUserCardId" => $this->getMerchantUserCardId()
                    )
            );
    }
    
    public function toString()
    {
        return implode('', array(
                    $this->getFullName(),
                    $this->getCardNumber(),
                    $this->getExpireMonth(),
                    $this->getExpireYear(),
                    $this->getMerchantUserId(),
                    $this->getMerchantUserCardId()
                ));
    }
}
