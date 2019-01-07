<?php

include __DIR__ .'/../vendor/autoload.php';
include __DIR__ .'/setup.php';

/**
 * Example variable
 */

$itemId = 'M63H814003';

/**
 * Some setup
 */

$token = setup\getToken();
$client = new GuzzleHttp\Client([
    'base_uri' => 'https://fulfillment.at.cimpress.io',
    'headers' => [
        'content-type' => 'application/json',
        'Authorization' => "Bearer $token"
    ]
]);

/**
 * Get Item Data
 */

$response = $client->get("/v1/items/$itemId");
$itemData = json_decode($response->getBody());

/**
 * Pretty Print some of the output
 */

echo 'Product Name: ',$itemData->product->name;