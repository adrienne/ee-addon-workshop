<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function parameterize($string)
{
    $string       = trim(preg_replace('/\R/u', ' ', $string));
    $parameters   = [];

    preg_match_all('/([[:alnum:]_]+)\=(?:[\'\"](.+)[\'\"])/isU', $string, $parameters);
    $extracted    = array_map(function($key, $item) { return [$key => $item]; }, $parameters[1], $parameters[2]);
 
    $outputparams = [];
    array_walk_recursive($extracted, function($value, $key) use (&$outputparams) { $outputparams[$key] = $value; });
    return $outputparams;
}