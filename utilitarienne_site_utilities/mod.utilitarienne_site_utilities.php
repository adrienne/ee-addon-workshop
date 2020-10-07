<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utilitarienne_site_utilities {

    public function hello_world()
    {
        return "Hello World!";
    }


    public function custom_order()
    {
        // https://docs.expressionengine.com/latest/development/services/model/fetching.html
        // $query = ee('Model')->get('ChannelEntry')->with('Channel')->fields('entry_id', 'title')->filter('ChannelEntry.channel_id', 4);
        // $entries = $query->all();
        
        // OR
        $sql = "SELECT entry_id, title from exp_channel_titles WHERE channel_id = ?;";
        $results = ee('db')->query($sql, [4])->result_array();

        var_dump($results); die();
        
        // fixed_order="5|42|3|8"
        $orderedOutput = implode("|", $entryIdsArray);

        $this->return_data = $this->make_channel_entries_loop($orderedOutput);
        return $this->return_data;

    }


    public function date_shortcodes()
    {
        ee()->load->add_package_path(PATH_THIRD.'utilitarienne_site_utilities', true);
        ee()->load->library(['shortcodes']);

        $tagdata = ee()->TMPL->tagdata;
        return ee()->shortcodes->parser($tagdata);

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
        return $C->entries();
    }

}