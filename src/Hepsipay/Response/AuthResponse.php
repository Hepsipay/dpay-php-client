<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Response;

class AuthResponse extends MagicResponse
{        
    public $error;
    public $accessToken;
    public $tokenType;
    public $expiresIn;
    public $expiresOn;
    public $rawResponse;
}
