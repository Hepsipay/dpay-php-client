<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay;

class HepsipayUrls
{    
    // Live URLs
    const LIVE_PAYMENT_URL = 'https://api.hepsipay.com/payments/pay'; // Payment, Pre Authorization
    const LIVE_THREEDSECURE_URL = 'https://www.hepsipay.com/payment/ThreeDSecureV2'; // New 3D Payment
    const LIVE_THREEDSECURE_COMPLETE_URL = 'https://www.hepsipay.com/payments/complete3dpayment'; // 3D Payment Completion
    const LIVE_REFUND_URL = 'https://api.hepsipay.com/payments/refund'; // Refund, Cancel Pre Authorization
    const LIVE_OAUTH_URL = 'https://api.hepsipay.com/oauth/token'; // OAuth Token
    const LIVE_CARD_URL = 'https://api.hepsipay.com/cards/%s'; // Card actions
    const LIVE_PRE_AUTHORIZATION_CLOSURE_URL = 'https://api.hepsipay.com/payments/postauth'; // Pre Authorization Closure
    const LIVE_PRE_CHECK_FRAUD_URL = 'https://fraud.hepsipay.com/fraud/getbasketdetail'; // Pre Check Fraud
    const LIVE_CHECK_FRAUD_URL = 'https://fraud.hepsipay.com/fraud/checkfraudresult'; // Check Fraud
    const LIVE_COMMON_PAYMENT_URL = 'https://odemeapi.hepsipay.com/commonpayments/save'; // Common Payment
    const LIVE_COMMON_PAYMENT_PAGE_URL = 'https://odemeapi.hepsipay.com/%s'; // Common Payment Page
    const LIVE_COMMON_PAYMENT_QUERY_URL = 'https://odemeapi.hepsipay.com/commonpayments/query'; // Common Payment Query
    
    // Test URLs
    const TEST_PAYMENT_URL = 'https://apientgr.hepsipay.com/payments/pay';
    const TEST_THREEDSECURE_URL = 'https://entgr.hepsipay.com/payment/ThreeDSecureV2';
    const TEST_THREEDSECURE_COMPLETE_URL = 'https://apientgr.hepsipay.com/payments/complete3dpayment';
    const TEST_REFUND_URL = 'https://apientgr.hepsipay.com/payments/refund';
    const TEST_OAUTH_URL = 'https://apientgr.hepsipay.com/oauth/token';
    const TEST_CARD_URL = 'https://apientgr.hepsipay.com/cards/%s';
    const TEST_PRE_AUTHORIZATION_CLOSURE_URL = 'https://apientgr.hepsipay.com/payments/postauth';
    const TEST_PRE_CHECK_FRAUD_URL = 'https://fraudentgr.hepsipay.com/fraud/getbasketdetail';
    const TEST_CHECK_FRAUD_URL = 'https://fraudentgr.hepsipay.com/fraud/checkfraudresult';
    const TEST_COMMON_PAYMENT_URL = 'https://odemeapientgr.hepsipay.com/commonpayments/save';
    const TEST_COMMON_PAYMENT_PAGE_URL = 'https://odemeentgr.hepsipay.com/%s';
    const TEST_COMMON_PAYMENT_QUERY_URL = 'https://odemeapientgr.hepsipay.com/commonpayments/query';
    
    public static function getPayment()
    {
        return HepsipayOptions::getTestMode() ? self::TEST_PAYMENT_URL : self::LIVE_PAYMENT_URL;
    }
    
    public static function getThreeDSecurePayment()
    {
        return HepsipayOptions::getTestMode() ? self::TEST_THREEDSECURE_URL : self::LIVE_THREEDSECURE_URL;
    }
    
    public static function getThreeDSecureComplete()
    {
        return HepsipayOptions::getTestMode() ? self::TEST_THREEDSECURE_COMPLETE_URL : self::LIVE_THREEDSECURE_COMPLETE_URL;
    }
    
    public static function getRefund()
    {
        return HepsipayOptions::getTestMode() ? self::TEST_REFUND_URL : self::LIVE_REFUND_URL;
    }
    
    public static function getOAuth()
    {
        return HepsipayOptions::getTestMode() ? self::TEST_OAUTH_URL : self::LIVE_OAUTH_URL;
    }
    
    public static function getCard($uri = null)
    {
        return sprintf((HepsipayOptions::getTestMode() ? self::TEST_CARD_URL : self::LIVE_CARD_URL), $uri);
    }
    
    public static function getPreAuthorizationClosure()
    {
        return HepsipayOptions::getTestMode() ? self::TEST_PRE_AUTHORIZATION_CLOSURE_URL : self::LIVE_PRE_AUTHORIZATION_CLOSURE_URL;
    }
    
    public static function getPreCheckFraud()
    {
        return HepsipayOptions::getTestMode() ? self::TEST_PRE_CHECK_FRAUD_URL : self::LIVE_PRE_CHECK_FRAUD_URL;
    }
    
    public static function getCheckFraud()
    {
        return HepsipayOptions::getTestMode() ? self::TEST_CHECK_FRAUD_URL : self::LIVE_CHECK_FRAUD_URL;
    }
    
    public static function getCommonPayment()
    {
        return HepsipayOptions::getTestMode() ? self::TEST_COMMON_PAYMENT_URL : self::LIVE_COMMON_PAYMENT_URL;
    }
    
    public static function getCommonPaymentPage($uri = null)
    {
        return sprintf((HepsipayOptions::getTestMode() ? self::TEST_COMMON_PAYMENT_PAGE_URL : self::LIVE_COMMON_PAYMENT_PAGE_URL), $uri);
    }
    
    public static function getCommonPaymentQuery()
    {
        return HepsipayOptions::getTestMode() ? self::TEST_COMMON_PAYMENT_QUERY_URL : self::LIVE_COMMON_PAYMENT_QUERY_URL;
    }
}
