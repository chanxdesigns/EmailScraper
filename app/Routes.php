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
$route->route('/esomar', 'GET', 'EmailExtract@extractEmail');
$route->route('/greenbook', 'GET', 'EmailExtract@extractC');

/**
 * Make the routes accessible
 */
$route->dispatch();