<?php

require_once __DIR__.'/vendor/autoload.php';

print_r(\App\Kernel::bootstrap());

print_r(\App\EmailExtract::runTask('esomar'));