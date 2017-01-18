<?php

namespace App\Controllers;

use App\Config\ControllerResolver;
use Goutte\Client;
use PHPHtmlParser\Dom;

class EmailExtract extends ControllerResolver {
    /**
     * The E-Mail extractor function
     *
     * @throws \ErrorException
     */
    public function extractEsomar() {

        $scrapper = new Dom();
        $scrapper->loadFromUrl('https://directory.esomar.org');
        $europe = $scrapper->find('#location_europe .list-countries li');
        //$n = $europe->nextChild();

        $a = 0;
        foreach ($europe as $country) {
            $n = $country->find('li a')->getAttribute('href');
            $a++;
        }
        var_dump($a);


    }

    public function makeMeHappy () {
        $this->view('Yeah');
    }

}