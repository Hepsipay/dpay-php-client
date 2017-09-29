<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Response;

class RegisterCardResponse extends BaseResponse
{        
    public $id;
    public $expireMonth;
    public $expireYear;
    public $maskedCardNumber;
    public $fullName;
    public $merchantUserId;
    public $merchantCardUserId;
    public $isSuccess;
}
