<?php

include __DIR__ .'/../vendor/autoload.php';
include __DIR__ .'/setup.php';

/**
 * Example variable
 */

$itemId = 'M63H814003';

/**
 * Create a Guzzle Client with an auth token
 */

$token = setup\getToken();
$fomaUrl = setup\getFomaUrl();

$client = new GuzzleHttp\Client([
    'base_uri' => $fomaUrl,
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
