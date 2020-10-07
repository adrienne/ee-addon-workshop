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
        die();

    }

    

    private make_channel_entries_loop($ordered)
    {
        // Include the class if it isn't included
        if(!class_exists('Channel')) {
            require_once(PATH_ADDONS.'channel/mod.channel.php');
        }

        ee()->TMPL->tagparams['fixed_order'] = $ordered;
        ee()->TMPL->tagparams['show_future_entries'] = 'yes';
        ee()->TMPL->tagparams['status'] = 'open';
        ee()->TMPL->tagparams['dynamic'] = 'no';

        $C = new Channel();
        return $C->entries();
    }

}