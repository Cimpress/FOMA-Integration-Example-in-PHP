# FOMA Integration Example in PHP

A PHP example of how to integrate with the Fulfillment Order Manager

## Examples in this repository

All examples use the popular [Guzzle library](http://docs.guzzlephp.org/en/stable/index.html) for creating http calls

### Authentification

> Found in `src/setup.php`

This file makes an post request to `https://oauth.cimpress.io/v2/token` with the client credentials and returns an authentification token.

This file can not be run and only serves as setup for the other examples.

### Get Item Details

> Found in `src/get-item.php`

If run, this file will get the item details for a specified item, you will have to change this to one of your items in the file itself.

### Get Notifications

> Found in `src/get-notifications.php`

If run, this file will get the new notifications for a specified fulfiller, you will have to change this to your fulfiller.

## Prerequisites

* A working PHP 5.6 (or higher) environment
* JSON extension has to be enabled
* [Composer](https://getcomposer.org/) has to be instaled

## How to Run

1. Run `composer install`
2. Copy and paste `.env.example` to `.env` and fill it out with your client credentials
3. Run either one of the examples with `php src/get-item.php` or `php src/get-notifications.php`
