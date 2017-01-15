<?php

namespace App;

class Config extends Kernel {

    public function __construct() {
        $dotenv = new $this->services['Dotenv'](dirname(__DIR__));
    }

}