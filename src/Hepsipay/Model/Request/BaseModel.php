<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Model\Request;

use Hepsipay\HepsipayOptions;
use Hepsipay\Helper\JsonHelper;

class BaseModel
{
    public function toArray()
    {
        return array(
                "Version" => HepsipayOptions::getVersion(),
                "ApiKey" => HepsipayOptions::getApiKey(),
                "HashVersion" => HepsipayOptions::getHashVersion()
            );
    }
    
    public function toString()
    {
        return implode('', array(
                    HepsipayOptions::getSecretKey()
                ));
    }
    
    public function toJsonString()
    {
        return JsonHelper::encode($this->toArray());
    }
}