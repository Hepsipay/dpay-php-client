<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Model\Request;

class Auth extends BaseModel
{
    private $grantType = 'password';

    public function getGrantType()
    {
        return $this->grantType;
    }

    public function setGrantType($grantType)
    {
        $this->grantType = $grantType;
        
        return $this;
    }

    public function toArray()
    {
        return array(
                "Grant_Type" => $this->getGrantType()
            );
    }
    
    public function toString()
    {
        return http_build_query(array(
                        "grant_type" => $this->getGrantType()
                    ));
    }
}
