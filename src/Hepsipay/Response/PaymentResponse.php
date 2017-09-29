<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Response;

class PaymentResponse extends BaseResponse
{        
    public $transactionId;
    public $transactionTime;
    public $signature;
    public $extras;
    public $amount;
    public $installment;
    public $currency;
    public $cardId;
}
