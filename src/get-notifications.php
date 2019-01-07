<?php

include __DIR__ .'/../vendor/autoload.php';
include __DIR__ .'/setup.php';

/**
 * Example variable
 */

$fulfillerId = 'kmr0f5gfvd';

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

$response = $client->get("/v1/notifications?fulfillerId=$fulfillerId");
$notifications = json_decode($response->getBody())->notifications;

/**
 * Pretty Print some of the output
 */

echo 'There are ',count($notifications),' new notifications',PHP_EOL;
echo "Here are the first 3:",PHP_EOL;

$firstThreeNotifications = array_slice($notifications, 0, 3, true);

foreach ($firstThreeNotifications as $notification) {
    $itemIds = implode(', ', array_map(function($c) {
        return $c->itemId;
    }, $notification->items));

    echo 'Type: ',$notification->type,' - Status: ',$notification->status,' - Affected Items: ',$itemIds,PHP_EOL;
}
