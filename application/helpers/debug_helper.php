<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('dd')) {
    function dd($var)
    {
        var_dump($var);
        die();
    }
}
