<?php
	/*
	Plugin Name: Advanced Custom Fields: Categories
	Plugin URI: https://github.com/cubeweb/acf-addons
	Description: Categories is custom field that generates a multi drop down with all the categories or taxonomies from your wordpress site
	Version: 2.0.0.1 Beta
	Author: Cubeweb
	Author URI: http://www.cubeweb.gr
	License: GPLv2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html
	*/

	/*
 	This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
	*/


	class acf_field_categories_plugin {
		/*
		*  Construct
		*
		*  @description:
		*  @since: 3.6
		*  @created: 1/04/13
		*/

		function __construct() {
			// set text domain
			/*
			$domain = 'acf-{{field_name}}';
			$mofile = trailingslashit(dirname(__File__)) . 'lang/' . $domain . '-' . get_locale() . '.mo';
			load_textdomain( $domain, $mofile );
			*/


			// version 4+
			add_action( 'acf/register_fields', array( $this,
													  'register_fields' ) );


			// version 3-
			add_action( 'init', array( $this,
									   'init' ) );
		}


		/*
		*  Init
		*
		*  @description:
		*  @since: 3.6
		*  @created: 1/04/13
		*/

		function init() {

		}

		/*
		*  register_fields
		*
		*  @description:
		*  @since: 3.6
		*  @created: 1/04/13
		*/

		function register_fields() {
			include_once( 'categories-v4.php' );
		}

	}

	new acf_field_categories_plugin();

?>