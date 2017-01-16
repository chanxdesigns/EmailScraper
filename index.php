<?php

require_once 'vendor/autoload.php';


////print_r(\App\Kernel::class);
//print_r(\App\Kernel::bootstrap());
//print_r(\App\Kernel::initRoutes());
//
//print_r(\App\EmailExtract::runTask('esomar'));'
print_r(new \App\Config\Router());