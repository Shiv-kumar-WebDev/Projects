<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 // --------------------------------------------------------------------------------
    if (!function_exists('date_time')) {
        function date_time($datetime) 
        {
           return date('j F, Y',strtotime($datetime));
        }
    }
    
    ?>