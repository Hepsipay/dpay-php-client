<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Model\Request;

class DeleteCard extends BaseModel
{
    private $id;
    private $merchantUserId;
    private $merchantUserCardId;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        
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
                        "Id" => $this->getId(),
                        "MerchantUserId" => $this->getMerchantUserId(),
                        "MerchantUserCardId" => $this->getMerchantUserCardId()
                    )
            );
    }
    
    public function toString()
    {
        return implode('', array(
                    $this->getId(),
                    $this->getMerchantUserId(),
                    $this->getMerchantUserCardId()
                ));
    }
}
