<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utilitarienne_site_utilities {

    public function hello_world()
    {
        return "Hello World!";
    }


    public function custom_order()
    {
        $entryIdsArray = [5, 42, 3, 8];
        
        // fixed_order="5|42|3|8"
        $orderedOutput = implode("|", $entryIdsArray);

        var_dump($orderedOutput);

    }


}