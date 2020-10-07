<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utilitarienne_site_utilities_upd {

    public $version = '1.0.0';

    public function install()
    {

        $data = array(
            'module_name'           => 'Utilitarienne_site_utilities',
            'module_version'        => $this->version,
            'has_cp_backend'        => 'y',
            'has_publish_fields'    => 'n'
        );

        ee()->db->insert('modules', $data);



        return true;

    }

    public function update($current = '')
    {

        return true;

    }

    public function uninstall()
    {

        ee()->db->where('module_name', 'Utilitarienne_site_utilities');

        ee()->db->delete('modules');



        return true;

    }

}