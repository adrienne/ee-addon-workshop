<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utilitarienne_site_utilities_mcp {

    public function index()
    {

        $html = '<p>Time to make magic</p>';

        return [
            'body'  => $html,
            'breadcrumb' => [
                ee('CP/URL')->make('addons/settings/utilitarienne_site_utilities')->compile() => lang('utilitarienne_site_utilities_module_name')
            ],
            'heading' => lang('utilitarienne_site_utilities_settings'),
        ];

    }

}