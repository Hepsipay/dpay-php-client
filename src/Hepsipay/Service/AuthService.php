<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Service;

use Hepsipay\CurlClient;
use Hepsipay\Logger;
use Hepsipay\JsonMapper;
use Hepsipay\SessionHandler;
use Hepsipay\HepsipayUrls;
use Hepsipay\Helper\JsonHelper;
use Hepsipay\Helper\HttpHeaderHelper;
use Hepsipay\Response\AuthResponse;

class AuthService
{    
    public static function create($request)
    {
        try 
        {            
            if($hpCardBearer = SessionHandler::getInstance()->get('hp_card_bearer')) 
            {
                $jsonString = JsonHelper::encode($hpCardBearer);
                $response   = JsonMapper::create($jsonString, new AuthResponse())->map();
                
                if($response->getExpiresOn() > time()) 
                {
                    return $response;
                }            
            }
            
            $url            = HepsipayUrls::getOAuth();
            $header         = HttpHeaderHelper::getBasicAuthorization($request);
            $content        = $request->toString();
            $rawResponse    = CurlClient::post($url, $header, $content);
            $return         = JsonMapper::create($rawResponse, new AuthResponse())->map();            
            
            if(empty($return->getError()) and $return->getExpiresIn() > 0)
            {                
                SessionHandler::getInstance()->set('hp_card_bearer', array('access_token' => $return->getAccessToken(), 'token_type' => $return->getTokenType(), 'expires_in' => $return->getExpiresIn()));
                
                return $return;
            }
        
            
            return $return;
        } 
        catch(\Exception $e)
        {
            $error = "Auth exception: " . $e->getMessage() . "\n";
            Logger::create()->error($error);            
            exit($error);
        }
        
        return false;
    }
}
