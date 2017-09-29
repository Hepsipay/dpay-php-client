<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Model\Request;

use Hepsipay\Helper\HashHelper;

class ThreeDSecureCompletePayment extends BaseModel
{
    private $signature;
    private $encryptedThreedResult;
    
    public function getEncryptedThreedResult()
    {
        return $this->encryptedThreedResult;
    }
    
    public function setEncryptedThreedResult($encryptedThreedResult)
    {
        $this->encryptedThreedResult = $encryptedThreedResult;
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
    }
    
    public function toArray()
    {
        return array_merge_recursive(
                    parent::toArray(),
                    array(
                        "EncryptedThreedResult" => $this->getEncryptedThreedResult(),
                        "Signature" => $this->getSignature()
                    )
            );
    }
    
    public function toString()
    {
        return implode('', array(
                    parent::toString(),
                    $this->getEncryptedThreedResult()
                ));
    }
}
