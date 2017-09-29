<?php

/**
 * Get Your Server IP Address
 * Sunucu IP Adresini Öğren
 */
if(isset($_SERVER['SERVER_ADDR'])) 
{
    $ipaddress = $_SERVER['SERVER_ADDR'];
} 
else 
{
    $ipaddress = 'UNKNOWN';
}

print("Sunucu Ip Adresiniz: {$ipaddress}");