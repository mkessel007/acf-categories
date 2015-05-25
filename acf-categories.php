<?php
    /*
    Plugin Name: Advanced Custom Fields: Categories
    Plugin URI: https://github.com/cubeweb/acf-addons
    Description: Categories is custom field that generates a multi drop down with all the categories or taxonomies from your wordpress site
    Version: 2.0.0.8
    Author: Cubeweb
    Author URI: http://www.cubeweb.gr
    License: GPLv2 or later
    License URI: http://www.gnu.org/licenses/gpl-2.0.html
    */


    // 1. set text domain
    // Reference: https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
    load_plugin_textdomain( 'categories', FALSE, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );


    // 2. Include field type for ACF5
    // $version = 5 and can be ignored until ACF6 exists
    function include_field_types_categories( $version ) {

        include_once( 'categories-v5.php' );

    }

    add_action( 'acf/include_field_types', 'include_field_types_categories' );


// 3. Include field type for ACF4
    function register_fields_categories() {

        include_once( 'categories-v4.php' );

    }

    add_action( 'acf/register_fields', 'register_fields_categories' );