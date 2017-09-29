<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Model\Request;

use Hepsipay\Helper\HashHelper;

class Payment extends BaseModel
{
    private $transactionTime;
    private $transactionId;
    private $signature;
    private $description;
    private $amount;
    private $currency;
    private $customer;
    private $card = array();
    private $merchantCardId;
    private $shippingAddress = array();
    private $invoiceAddress = array();
    private $basketItems = array();
    private $extras = array();
    private $installment = 1;
    
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
    
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
        
        return $this;
    }
    
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        
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
    
    public function getInstallment()
    {
        return $this->installment;
    }

    public function setInstallment($installment)
    {
        $this->installment = $installment;
        
        return $this;
    }
    
    public function getCustomer()
    {
        return $this->customer;
    }

    public function setCustomer($customer)
    {
        $this->customer = $customer;
        
        return $this;
    }
    
    public function getCard()
    {
        return $this->card;
    }

    public function setCard($card)
    {
        $this->card = $card;
        
        return $this;
    }
    
    public function getMerchantCardId()
    {
        return $this->merchantCardId;
    }

    public function setMerchantCardId($merchantCardId)
    {
        $this->merchantCardId = $merchantCardId;
        
        return $this;
    }
    
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
        
        return $this;
    }
    
    public function getInvoiceAddress()
    {
        return $this->invoiceAddress;
    }

    public function setInvoiceAddress($invoiceAddress)
    {
        $this->invoiceAddress = $invoiceAddress;
        
        return $this;
    }
    
    public function getBasketItems()
    {
        return $this->basketItems;
    }

    public function setBasketItems($basketItems)
    {
        $this->basketItems = $basketItems;
        
        return $this;
    }
    
    public function getExtras()
    {
        return $this->extras;
    }

    public function setExtras($extras)
    {
        $this->extras = $extras;
        
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
                        "TransactionTime" => $this->getTransactionTime(),
                        "TransactionId" => $this->getTransactionId(),
                        "Description" => $this->getDescription(),
                        "Amount" => $this->getAmount(),
                        "TransactionTime" => $this->getTransactionTime(),
                        "Currency" => $this->getCurrency(),
                        "Installment" => $this->getInstallment(),
                        "Signature" => $this->getSignature(),
                        "MerchantCardId" => $this->getMerchantCardId(),
                        "Card" => $this->getCard() ? $this->getCard()->toArray() : NULL,
                        "Customer" => $this->getCustomer() ? $this->getCustomer()->toArray() : NULL,
                        "ShippingAddress" => $this->getShippingAddress() ? $this->getShippingAddress()->toArray() : NULL,
                        "InvoiceAddress" => $this->getInvoiceAddress() ? $this->getInvoiceAddress()->toArray() : NULL,
                        "BasketItems" => $this->getBasketItems() ? $this->getBasketItems()->toArray() : NULL,
                        "Extras" => $this->getExtras()
                    )
            );
    }

    
    public function toString()
    {
        return implode('', array(
                    parent::toString(),
                    $this->getTransactionId(),
                    $this->getTransactionTime(),
                    $this->getAmount(),
                    $this->getCurrency(),
                    $this->getInstallment()
                ));
    }
}