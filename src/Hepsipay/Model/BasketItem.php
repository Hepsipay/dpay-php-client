<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Model;

class BasketItem extends BaseModel
{
    private $description;
    private $productCode;
    private $storeCode;
    private $productTypeCode;
    private $amount;
    private $productAmount;
    private $vatRatio;
    private $subMerchantId;
    private $subMerchantName;
    private $count;
    private $url;
    private $basketItemType;
    private $basketItemId;

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        
        return $this;
    }
    
    public function getProductCode()
    {
        return $this->productCode;
    }

    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;
        
        return $this;
    }
    
    public function getStoreCode()
    {
        return $this->storeCode;
    }

    public function setStoreCode($storeCode)
    {
        $this->storeCode = $storeCode;
        
        return $this;
    }
    
    public function getProductTypeCode()
    {
        return $this->productTypeCode;
    }

    public function setProductTypeCode($productTypeCode)
    {
        $this->productTypeCode = $productTypeCode;
        
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
    
    public function getProductAmount()
    {
        return $this->productAmount;
    }

    public function setProductAmount($productAmount)
    {
        $this->productAmount = $productAmount;
        
        return $this;
    }
    
    public function getVatRatio()
    {
        return $this->vatRatio;
    }

    public function setVatRatio($vatRatio)
    {
        $this->vatRatio = $vatRatio;
        
        return $this;
    }
    
    public function getSubMerchantId()
    {
        return $this->subMerchantId;
    }

    public function setSubMerchantId($subMerchantId)
    {
        $this->subMerchantId = $subMerchantId;
        
        return $this;
    }
    
    public function getSubMerchantName()
    {
        return $this->subMerchantName;
    }

    public function setSubMerchantName($subMerchantName)
    {
        $this->subMerchantName = $subMerchantName;
        
        return $this;
    }
    
    public function getCount()
    {
        return $this->count;
    }

    public function setCount($count)
    {
        $this->count = $count;
        
        return $this;
    }
    
    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
        
        return $this;
    }
    
    public function getBasketItemType()
    {
        return $this->basketItemType;
    }

    public function setBasketItemType($basketItemType)
    {
        $this->basketItemType = $basketItemType;
        
        return $this;
    }
    
    public function getBasketItemId()
    {
        return $this->basketItemId;
    }

    public function setBasketItemId($basketItemId)
    {
        $this->basketItemId = $basketItemId;
        
        return $this;
    }
    
    public function toArray()
    {
        return array(
                "Description" => $this->getDescription(),
                "ProductCode" => $this->getProductCode(),
                "StoreCode" => $this->getStoreCode(),
                "ProductTypeCode" => $this->getProductTypeCode(),
                "Amount" => $this->getAmount(),
                "ProductAmount" => $this->getProductAmount(),
                "VatRatio" => $this->getVatRatio(),
                "SubMerchantId" => $this->getSubMerchantId(),
                "SubMerchantName" => $this->getSubMerchantName(),
                "Count" => $this->getCount(),
                "Url" => $this->getUrl(),
                "BasketItemType" => $this->getBasketItemType(),
                "BasketItemId" => $this->getBasketItemId()
            );
    }
    
    public function toString()
    {
        return implode('', array(
                    $this->getDescription(),
                    $this->getProductCode(),
                    $this->getStoreCode(),
                    $this->getProductTypeCode(),
                    $this->getAmount(),
                    $this->getVatRatio(),
                    $this->getSubMerchantId(),
                    $this->getSubMerchantName(),
                    $this->getCount(),
                    $this->getUrl(),
                    $this->getBasketItemType(),
                    $this->getBasketItemId()
                ));
    }
}