<?php
/**
 * Plugin Name: Replace Google Libs
 * Plugin URI:  http://www.soulteary.com/2014/06/15/replace-google-libs.html
 * Description: Use Qihoo 360 Open Libs Service to replace Google's.
 * Author:      soulteary
 * Author URI:  http://www.soulteary.com/
 * Version:     1.0
 * License:     GPL
 */


/**
 * Silence is golden
 */
if (!defined('ABSPATH')) exit;

class Replace_Google_Libs
{

    /**
     * init Hook
     */
    public function __construct()
    {
        add_filter('wp_print_scripts', array($this, 'ohMyScript'), 1000, 1);
    }


    /**
     * Use Qihoo 360 Open Libs Service to replace Google's.
     */
    public function ohMyScript()
    {
        global $wp_scripts;
        if($wp_scripts && $wp_scripts->registered){
            foreach ($wp_scripts->registered as $libs){
                $libs->src = str_replace('//ajax.googleapis.com', '//ajax.useso.com/', $libs->src);
            }
        }
    }
}

/**
 * bootstrap
 */
new Replace_Google_Libs;