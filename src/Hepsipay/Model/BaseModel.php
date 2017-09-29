<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Model;

use Hepsipay\Helper\JsonHelper;

class BaseModel
{
    public function toJsonString()
    {
        return JsonHelper::encode($this->toArray());
    }
}
