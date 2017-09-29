<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Model\Request;

class QueryCard extends BaseModel
{
    private $id;
    private $cardNumber;
    private $maskedCardNumber;
    private $expireMonth;
    private $expireYear;
    private $merchantUserId;
    private $merchantUserCardId;
    private $firstSixCharOfPan;
    private $companyId;
    private $lastFourCharOfPan;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        
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
    
    public function getMaskedCardNumber()
    {
        return $this->maskedCardNumber;
    }

    public function setMaskedCardNumber($maskedCardNumber)
    {
        $this->maskedCardNumber = $maskedCardNumber;
        
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
    
    public function getFirstSixCharOfPan()
    {
        return $this->firstSixCharOfPan;
    }

    public function setFirstSixCharOfPan($firstSixCharOfPan)
    {
        $this->firstSixCharOfPan = $firstSixCharOfPan;
        
        return $this;
    }
    
    public function getCompanyId()
    {
        return $this->companyId;
    }

    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
        
        return $this;
    }
    
    public function getLastFourCharOfPan()
    {
        return $this->lastFourCharOfPan;
    }

    public function setLastFourCharOfPan($lastFourCharOfPan)
    {
        $this->lastFourCharOfPan = $lastFourCharOfPan;
        
        return $this;
    }
    
    public function toArray()
    {
        return array_merge_recursive(
                    parent::toArray(),
                    array(
                        "Id" => $this->getId(),
                        "CardNumber" => $this->getCardNumber(),
                        "MaskedCardNumber" => $this->getMaskedCardNumber(),
                        "ExpireMonth" => $this->getExpireMonth(),
                        "ExpireYear" => $this->getExpireYear(),
                        "MerchantUserId" => $this->getMerchantUserId(),
                        "MerchantUserCardId" => $this->getMerchantUserCardId(),
                        "FirstSixCharOfPan" => $this->getFirstSixCharOfPan(),
                        "CompanyId" => $this->getCompanyId(),
                        "LastFourCharOfPan" => $this->getLastFourCharOfPan()
                    )
            );
    }
    
    public function toString()
    {
        return implode('', array(
                    $this->getId(),
                    $this->getCardNumber(),
                    $this->getMaskedCardNumber(),
                    $this->getExpireMonth(),
                    $this->getExpireYear(),
                    $this->getMerchantUserId(),
                    $this->getMerchantUserCardId(),
                    $this->getFirstSixCharOfPan(),
                    $this->getCompanyId(),
                    $this->getLastFourCharOfPan()
                ));
    }
}
