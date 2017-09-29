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
use Hepsipay\PostHandler;
use Hepsipay\Helper\JsonHelper;
use Hepsipay\Helper\HttpHeaderHelper;
use Hepsipay\Response\PaymentResponse;
use Hepsipay\Response\ThreeDSecurePaymentResponse;
use Hepsipay\Response\ThreeDSecurePaymentCompleteResponse;
use Hepsipay\Model\Request\ThreeDSecureCompletePayment;

class PaymentService
{    
    public static function create($request)
    {        
        try 
        {
            $url            = HepsipayUrls::getPayment();
            $header         = HttpHeaderHelper::getDefault();
            $content        = $request->toJsonString();
            $rawResponse    = CurlClient::post($url, $header, $content);
            $return         = JsonMapper::create($rawResponse, new PaymentResponse())->map();
            
            return $return;
        } 
        catch(\Exception $e)
        {
            $error = "Payment exception: " . $e->getMessage() . "\n";
            Logger::create()->error($error);            
            exit($error);
        }
        
        return false;
    }
    
    public static function createThreeD($request)
    {
        try 
        {
            $url            = HepsipayUrls::getThreeDSecurePayment();
            $header         = HttpHeaderHelper::getDefault();
            $content        = $request->toJsonString();
            $rawResponse    = CurlClient::post($url, $header, $content);
            
            if(!JsonHelper::isJson($rawResponse))
            {
                return $rawResponse;
            }
            
            $return = JsonMapper::create($rawResponse, new ThreeDSecurePaymentResponse())->map();
            
            return $return;
        } 
        catch(\Exception $e)
        {
            $error = "3D payment exception: " . $e->getMessage() . "\n";
            Logger::create()->error($error);            
            exit($error);
        }
    }
    
    public static function retrieve()
    {
        try 
        {
            if(PostHandler::hasPost() !== false) 
            {
                $data           = PostHandler::get();
                $jsonData       = JsonHelper::encode($data);
                $response       = JsonMapper::create($jsonData, new ThreeDSecurePaymentCompleteResponse())->map();
                
                if($encryptedThreedResult = $response->getEncryptedThreedResult())
                {
                    $request = new ThreeDSecureCompletePayment();
                    $request->setEncryptedThreedResult($encryptedThreedResult);
                    
                    $url            = HepsipayUrls::getThreeDSecureComplete();
                    $header         = HttpHeaderHelper::getDefault();
                    $content        = $request->toJsonString();
                    $rawResponse    = CurlClient::post($url, $header, $content);
                    $return         = JsonMapper::create($rawResponse, new ThreeDSecurePaymentCompleteResponse())->map();                    

                    return $return;
                }
            }
        } 
        catch(\Exception $e)
        {
            $error = "Payment retrieve exception: " . $e->getMessage() . "\n";
            Logger::create()->error($error);            
            exit($error);
        }
        
        return false;
    }
    
    public static function retrieveDirect()
    {
        try 
        {
            if(PostHandler::hasPost() !== false) 
            {
                $data       = PostHandler::get();
                $jsonData   = JsonHelper::encode($data);
                $return     = JsonMapper::create($jsonData, new ThreeDSecurePaymentCompleteResponse())->map();
                
                return $return;
            }
        } 
        catch(\Exception $e)
        {
            $error = "Payment retrieve direct exception: " . $e->getMessage() . "\n";
            Logger::create()->error($error);            
            exit($error);
        }
        
        return false;
    }
}
