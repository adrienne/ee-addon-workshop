<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shortcodes
{

    private $shortcodes = [];

    public function __construct()
    {
        ee()->load->helper(['parameters']);

        $this->_makeShortcode(
            'SEASON', 
            function ($match) {
                $month = date('n');
                if(in_array($month, [12, 1, 2])) {
                    return 'Winter';
                } elseif(in_array($month, [3, 4, 5])) {
                    return 'Spring';
                } elseif(in_array($month, [6, 7, 8])) {
                    return 'Summer';
                } else {
                    return 'Autumn';
                }
            }, 
            false
        );

        $this->_makeShortcode(
            'DATE', 
            function ($match) {
                // the whole parameter string will always be in $match[1]
                if(isset($match[1])) {
                    $parameters = parameterize($match[1]);
                    $format = str_replace('%', '', $parameters['format']);
                } else {
                    $format = 'Y-M-d H:i';
                }
                return date($format);
            }, 
            true
        );
    }

    public function parser($text)
    {
        $matches = [];
        $count = 0;
        return preg_replace_callback_array($this->shortcodes, $text, -1, $count);
    }

    private function _makeShortcode($shortcode, $function, $hasParams = false)
    {
        $code = $hasParams ? sprintf('/\[\[(?:%s)(?:\s?([^\]]+?))?\]\]/imsU', $shortcode) : sprintf('/\[\[(?:%s)\]\]/ims', $shortcode);
        $this->shortcodes[$code] = $function;
    }

}
