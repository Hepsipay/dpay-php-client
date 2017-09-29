<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Service;

use Hepsipay\Logger;
use Hepsipay\CurlClient;
use Hepsipay\JsonMapper;
use Hepsipay\SessionHandler;
use Hepsipay\HepsipayUrls;
use Hepsipay\Helper\HttpHeaderHelper;
use Hepsipay\Response\RegisterCardResponse;
use Hepsipay\Response\DeleteCardResponse;
use Hepsipay\Response\QueryCardResponse;
use Hepsipay\Response\UpdateCardResponse;
use Hepsipay\Model\Request\Auth;

class CardService
{
    public static function register($request)
    {
        try 
        {
            $authResponse   = AuthService::create(new Auth());
            
            if($authResponse !== false)
            {
                $url            = HepsipayUrls::getCard();
                $header         = HttpHeaderHelper::getBearerAuthorization($request, $authResponse);
                $content        = $request->toJsonString();
                $rawResponse    = CurlClient::post($url, $header, $content);
                $return         = JsonMapper::create($rawResponse, new RegisterCardResponse())->map();
                
                if($return->getMessageCode() == 3171)
                {
                    SessionHandler::getInstance()->remove('hp_card_bearer');
                    
                    return false;
                }
                
                return $return;
            }            
        } 
        catch(\Exception $e)
        {
            $error = "Card register exception: " . $e->getMessage() . "\n";
            Logger::create()->error($error);            
            exit($error);
        }
        
        return false;
    }
    
    public static function delete($request)
    {
        try 
        {
            $authResponse   = AuthService::create(new Auth());
            
            if($authResponse !== false)
            {
                $url            = HepsipayUrls::getCard();
                $header         = HttpHeaderHelper::getBearerAuthorization($request, $authResponse);
                $content        = $request->toJsonString();
                $rawResponse    = CurlClient::delete($url, $header, $content);
                $return         = JsonMapper::create($rawResponse, new DeleteCardResponse())->map();
                
                if($return->getMessageCode() == 3171)
                {
                    SessionHandler::getInstance()->remove('hp_card_bearer');
                    
                    return false;
                }
                
                return $return;
            }            
        } 
        catch(\Exception $e)
        {
            $error = "Card delete exception: " . $e->getMessage() . "\n";
            Logger::create()->error($error);            
            exit($error);
        }
        
        return false;
    }
    
    public static function query($request)
    {
        try 
        {
            $authResponse   = AuthService::create(new Auth());
            
            if($authResponse !== false)
            {
                $url            = HepsipayUrls::getCard('query');
                $header         = HttpHeaderHelper::getBearerAuthorization($request, $authResponse);
                $content        = $request->toJsonString();
                $rawResponse    = CurlClient::post($url, $header, $content);
                $return         = JsonMapper::create($rawResponse, new QueryCardResponse())->map();
                
                if($return->getMessageCode() == 3171)
                {
                    SessionHandler::getInstance()->remove('hp_card_bearer');
                    
                    return false;
                }
                
                return $return;
            }            
        } 
        catch(\Exception $e)
        {
            $error = "Card query exception: " . $e->getMessage() . "\n";
            Logger::create()->error($error);            
            exit($error);
        }
        
        return false;
    }
    
    public static function update($request)
    {
        try 
        {
            $authResponse   = AuthService::create(new Auth());
            
            if($authResponse !== false)
            {
                $url            = HepsipayUrls::getCard();
                $header         = HttpHeaderHelper::getBearerAuthorization($request, $authResponse);
                $content        = $request->toJsonString();
                $rawResponse    = CurlClient::put($url, $header, $content);
                $return         = JsonMapper::create($rawResponse, new UpdateCardResponse())->map();
                
                if($return->getMessageCode() == 3171)
                {
                    SessionHandler::getInstance()->remove('hp_card_bearer');
                    
                    return false;
                }
                
                return $return;
            }            
        } 
        catch(\Exception $e)
        {
            $error = "Card update exception: " . $e->getMessage() . "\n";
            Logger::create()->error($error);            
            exit($error);
        }
        
        return false;
    }
}
