<?php

namespace App\Controllers;

use App\Config\ControllerResolver;
use App\Database\DB;

class EmailExtract extends ControllerResolver {

    // Store the directory name to be extracted
    protected static $directory;

    /**
     * The E-Mail extractor function
     *
     * @throws \ErrorException
     */

    public function __construct(DB $n) {

    }
    public function extractEmail () {
        return $this->view(dirname(__DIR__).'/view/name.html');
    }

    public function extractC () {
        echo "<h3>Dude</h3>";
    }
}