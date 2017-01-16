<?php

namespace App\Controllers;

use App\Database\DB;
use App\Kernel;

class EmailExtract extends Kernel {

    // Store the directory name to be extracted
    protected static $directory;

    /**
     * The E-Mail extractor function
     *
     * @throws \ErrorException
     * @return \ArrayObject
     */
    public function __construct() {
        var_dump("Yo Man Executed");

    }
    private static function extractEmail () {
        var_dump("Extractor Func");
        if (self::$directory) {
            // Get the directory Url
            $query = "SELECT directory_url FROM mailing_extract.directories WHERE directory_id = ?";
            DB::init();

        }
        else {
            throw new \ErrorException('No directory specified');
        }
    }

    private static function extractCompanyName () {

    }

    public static function runTask ($directory) {
        self::$directory = $directory;

        try {
            self::extractEmail();
        }
        catch (\ErrorException $e) {
            echo $e->getMessage();
        }

        try {
            self::extractCompanyName();
        }
        catch (\ErrorException $e) {
            echo $e->getMessage();
        }

    }

}