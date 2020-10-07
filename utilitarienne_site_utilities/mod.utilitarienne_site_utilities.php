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

        $C = $this->make_channel_entries_loop($orderedOutput);
        var_dump($C->entries());
        die();

    }

    

    private function make_channel_entries_loop($ordered)
    {
        // If we don't have a value, just bomb out
        if(!$ordered || trim($ordered) == '')
        {
            return false;
        }

        // Include the class if it isn't included
        if(!class_exists('Channel')) {
            require_once(PATH_ADDONS.'channel/mod.channel.php');
        }

        ee()->TMPL->tagparams['fixed_order'] = $ordered;
        ee()->TMPL->tagparams['dynamic'] = 'no';

        // {exp:channel:entries fixed_order="blah" dynamic="no"}

        $C = new Channel();
        return $C;
    }

}