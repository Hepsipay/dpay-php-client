<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Model\Request;

use Hepsipay\Helper\HashHelper;

class Refund extends BaseModel
{
    private $transactionId;
    private $referenceTransactionId;
    private $transactionTime;
    private $amount;
    private $currency;
    private $signature;

    public function getTransactionId()
    {
        return $this->transactionId;
    }

    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
        
        return $this;
    }
    
    public function getReferenceTransactionId()
    {
        return $this->referenceTransactionId;
    }

    public function setReferenceTransactionId($referenceTransactionId)
    {
        $this->referenceTransactionId = $referenceTransactionId;
        
        return $this;
    }
    
    public function getTransactionTime()
    {
        if(empty($this->transactionTime)) 
        {
            $this->setTransactionTime();
        }
        
        return $this->transactionTime;
    }

    public function setTransactionTime($transactionTime = null)
    {
        $this->transactionTime = $transactionTime ? $transactionTime : time();
        
        return $this;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
        
        return $this;
    }
    
    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
        
        return $this;
    }
    
    public function getSignature()
    {
        if(empty($this->signature))
        {
            $this->setSignature();
        }
        
        return $this->signature;
    }
    
    public function setSignature($signature = null)
    {
        $this->signature = ($signature ? $signature : (HashHelper::hashSignature($this->toString())));
        
        return $this;
    }
    
    public function toArray()
    {
        return array_merge_recursive(
                    parent::toArray(),
                    array(
                        "TransactionId" => $this->getTransactionId(),
                        "ReferenceTransactionId" => $this->getReferenceTransactionId(),
                        "TransactionTime" => $this->getTransactionTime(),
                        "Signature" => $this->getSignature(),
                        "Amount" => $this->getAmount(),
                        "Currency" => $this->getCurrency()
                    )
            );
    }
    
    public function toString()
    {
        return implode('', array(
                    $this->getTransactionId(),
                    $this->getReferenceTransactionId(),
                    $this->getTransactionTime(),
                    $this->getAmount(),
                    $this->getCurrency()
                ));
    }
}
