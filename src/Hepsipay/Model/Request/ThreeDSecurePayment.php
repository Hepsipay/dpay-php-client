<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Model\Request;

class ThreeDSecurePayment extends Payment
{
    private $successUrl;
    private $failUrl;
    
    public function getSuccessUrl()
    {
        return $this->successUrl;
    }
    
    public function setSuccessUrl($successUrl)
    {
        $this->successUrl = $successUrl;
        
        return $this;
    }
    
    public function getFailUrl()
    {
        return $this->failUrl;
    }
    
    public function setFailUrl($failUrl)
    {
        $this->failUrl = $failUrl;
        
        return $this;
    }
    
    public function toArray()
    {
        return array_merge_recursive(
                    parent::toArray(),
                    array(
                        "SuccessUrl" => $this->getSuccessUrl(),
                        "FailUrl" => $this->getFailUrl()
                    )
            );
    }
    
    public function toString()
    {
        return implode('', array(
                    parent::toString()
                ));
    }
}
