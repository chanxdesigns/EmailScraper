<?php

namespace App;

use App\Config\Router;

/**
 * Initialise Router
 */
$route = new Router('/Email_Scraper');

/**
 * Specify App Routes
 */
$route->route('/esomar', 'GET', 'EmailExtract@extractC');
$route->route('/greenbook', 'GET', 'EmailExtract@makeMeHappy');

/**
 * Make the routes accessible
 */
$route->dispatch();