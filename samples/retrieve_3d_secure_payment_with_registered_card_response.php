<?php

require_once('config.php');

/**
 * Retrive 3D Payment Response
 * 3D Ödeme Yanıtını Al
 */
$response = \Hepsipay\Service\PaymentService::retrieveDirect();

/**
 * Print 3D Payment Response
 * 3D Ödeme Yanıtını Yazdır
 */
echo "<pre>";
echo "\nYANIT\n\n";
print_r($response); // Response
echo "</pre>";