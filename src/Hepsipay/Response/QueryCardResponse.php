<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Response;

class QueryCardResponse extends BaseResponse
{        
    public $merchantCardDtos;
    public $cardCountGrouppedByBank;
    public $pagerState;
}
