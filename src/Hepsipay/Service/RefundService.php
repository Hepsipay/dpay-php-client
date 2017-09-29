<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Service;

use Hepsipay\Logger;
use Hepsipay\CurlClient;
use Hepsipay\JsonMapper;
use Hepsipay\HepsipayUrls;
use Hepsipay\Helper\HttpHeaderHelper;
use Hepsipay\Response\RefundResponse;

class RefundService
{    
    public static function create($request)
    {
        try 
        {
            $url            = HepsipayUrls::getRefund();
            $header         = HttpHeaderHelper::getDefault();
            $content        = $request->toJsonString();
            $rawResponse    = CurlClient::post($url, $header, $content);
            $return         = JsonMapper::create($rawResponse, new RefundResponse())->map();
            
            return $return;
        } 
        catch(\Exception $e)
        {
            $error = "Refund exception: " . $e->getMessage() . "\n";
            Logger::create()->error($error);            
            exit($error);
        }
        
        return false;
    }
}
