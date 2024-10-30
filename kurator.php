<?php
/*
Plugin Name: Kurator
Plugin URI: https://kurator.fr
Description: Share your curation post on your blog
Version: 1.0
Author: iSoluce
Author URI: https://isoluce.net
*/

    defined('ABSPATH') || exit;
    require_once(ABSPATH.'wp-admin/includes/plugin.php');

    define( 'KURATOR_URL', plugin_dir_url ( __FILE__ ) ); 
    define( 'KURATOR_DIR', plugin_dir_path( __FILE__ ) ); 
    define( 'KURATOR_VERSION', '1.0' ); 
    define( 'KURATOR_OPTION', 'ku_ext' );

    // Function for easy load files
    function kurator_load_files($dir, $files, $prefix = '') {
        foreach ($files as $file) {
            if ( is_file($dir . $prefix . $file . ".php") ) {
                require_once($dir . $prefix . $file . ".php");
            }
        } 
    }

    function Kurator_Init() {
        // Admin
        if ( is_admin() ) {
            kurator_load_files( KURATOR_DIR.'/', array( 'Kurator_Admin' ) );
        }
        else {
            kurator_load_files( KURATOR_DIR.'/', array( 'Kurator_Client' ) );
        }
    }
    add_action( 'plugins_loaded', 'Kurator_Init');

