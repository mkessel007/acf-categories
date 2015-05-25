<?php

    class acf_field_categories extends acf_field {


        /*
        *  __construct
        *
        *  This function will setup the field type data
        *
        *  @type	function
        *  @date	5/03/2014
        *  @since	5.0.0
        *
        *  @param	n/a
        *  @return	n/a
        */

        function __construct() {

            /*
            *  name (string) Single word, no spaces. Underscores allowed
            */

            $this->name = 'categories';


            /*
            *  label (string) Multiple words, can include spaces, visible when selecting a field type
            */

            $this->label = __( 'Categories', 'acf-categories' );


            /*
            *  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
            */

            $this->category = 'relational';


            /*
            *  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
            */

            $this->defaults = array(
                'type'         => 'Posts',
                'child_of'     => '',
                'parent_id'    => '',
                'orderby'      => 'id',
                'order'        => 'Asc',
                'hide_empty'   => '1',
                'hierarchical' => '1',
                'taxonomy'     => 'Categories',
                'include'      => '',
                'exclude'      => '',
                'multiple'     => '1',
                'start_state'  => 'Closed',
                'post_count'   => '1',
                'update_cat'   => '0'
            );


            /*
            *  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
            *  var message = acf._e('categories', 'error');
            */

            $this->l10n = array(
                'error' => __( 'Error! Please enter a higher value', 'acf-categories' ),
            );


            // do not delete!
            parent::__construct();

        }


        /*
        *  render_field_settings()
        *
        *  Create extra settings for your field. These are visible when editing a field
        *
        *  @type	action
        *  @since	3.6
        *  @date	23/01/13
        *
        *  @param	$field (array) the $field being edited
        *  @return	n/a
        */

        function render_field_settings( $field ) {

            /*
            *  acf_render_field_setting
            *
            *  This function will create a setting for your field. Simply pass the $field parameter and an array of field settings.
            *  The array of settings does not require a `value` or `prefix`; These settings are found from the $field array.
            *
            *  More than one setting can be added by copy/paste the above code.
            *  Please note that you must also have a matching $defaults value for the field name (font_size)
            */

            $args       = array(
                'public' => TRUE
            );
            $post_types = get_post_types( $args, 'objects', 'and' );
            $types      = array();

            foreach ( $post_types as $post_type ) {
                $types[ $post_type->name ] = $post_type->label;
            }

            $args       = array(
                'public' => TRUE
            );
            $post_types = get_taxonomies( $args, 'objects' );
            $taxonomies = array();

            foreach ( $post_types as $post_type ) {
                $taxonomies[ $post_type->name ] = $post_type->label;
            }


            // Render options
            acf_render_field_setting( $field, array(
                'label'        => __( 'Type', 'acf-categories' ),
                'instructions' => __( '<a href="http://codex.wordpress.org/Function_Reference/get_categories" target="_blank">See Documentation </a>', 'acf-categories' ),
                'type'         => 'select',
                'name'         => 'post_type',
                'choices'      => $types
            ) );
            unset( $types );

            acf_render_field_setting( $field, array(
                'label'        => __( 'Child Of', 'acf-categories' ),
                'instructions' => __( '<a href="http://codex.wordpress.org/Function_Reference/get_categories" target="_blank">See Documentation </a>', 'acf-categories' ),
                'type'         => 'text',
                'name'         => 'child_of'
            ) );

            acf_render_field_setting( $field, array(
                'label'        => __( 'Parent', 'acf-categories' ),
                'instructions' => __( '<a href="http://codex.wordpress.org/Function_Reference/get_categories" target="_blank">See Documentation </a>', 'acf-categories' ),
                'type'         => 'text',
                'name'         => 'parent_id'
            ) );

            acf_render_field_setting( $field, array(
                'label'        => __( 'Order By', 'acf-categories' ),
                'instructions' => __( '<a href="http://codex.wordpress.org/Function_Reference/get_categories" target="_blank">See Documentation </a>', 'acf-categories' ),
                'type'         => 'select',
                'name'         => 'orderby',
                'choices'      => array(
                    'id'    => 'Category ID',
                    'name'  => 'Category Title',
                    'slug'  => 'Category Slug',
                    'count' => 'Categories Count'
                )
            ) );

            acf_render_field_setting( $field, array(
                'label'        => __( 'Order', 'acf-categories' ),
                'instructions' => __( '<a href="http://codex.wordpress.org/Function_Reference/get_categories" target="_blank">See Documentation </a>', 'acf-categories' ),
                'type'         => 'radio',
                'name'         => 'order',
                'choices'      => array(
                    'ASC'  => 'Asc',
                    'DESC' => 'Desc',
                ),
                'layout'       => 'horizontal'
            ) );

            acf_render_field_setting( $field, array(
                'label'        => __( 'Hide Empty', 'acf-categories' ),
                'instructions' => __( '<a href="http://codex.wordpress.org/Function_Reference/get_categories" target="_blank">See Documentation </a>', 'acf-categories' ),
                'type'         => 'radio',
                'name'         => 'hide_empty',
                'choices'      => array(
                    '1' => 'Yes',
                    '0' => 'No',
                ),
                'layout'       => 'horizontal'
            ) );

            acf_render_field_setting( $field, array(
                'label'        => __( 'Hierarchical', 'acf-categories' ),
                'instructions' => __( '<a href="http://codex.wordpress.org/Function_Reference/get_categories" target="_blank">See Documentation </a>', 'acf-categories' ),
                'type'         => 'radio',
                'name'         => 'hierarchical',
                'choices'      => array(
                    '1' => 'Yes',
                    '0' => 'No',
                ),
                'layout'       => 'horizontal'
            ) );

            acf_render_field_setting( $field, array(
                'label'        => __( 'Taxonomy', 'acf-categories' ),
                'instructions' => __( '<a href="http://codex.wordpress.org/Function_Reference/get_categories" target="_blank">See Documentation </a>', 'acf-categories' ),
                'type'         => 'select',
                'name'         => 'taxonomy',
                'choices'      => $taxonomies
            ) );
            unset( $taxonomies );

            acf_render_field_setting( $field, array(
                'label'        => __( 'Include Categories', 'acf-categories' ),
                'instructions' => __( '<a href="http://codex.wordpress.org/Function_Reference/get_categories" target="_blank">See Documentation </a>', 'acf-categories' ),
                'type'         => 'text',
                'name'         => 'include'
            ) );

            acf_render_field_setting( $field, array(
                'label'        => __( 'Exclude Categories', 'acf-categories' ),
                'instructions' => __( '<a href="http://codex.wordpress.org/Function_Reference/get_categories" target="_blank">See Documentation </a>', 'acf-categories' ),
                'type'         => 'text',
                'name'         => 'exclude'
            ) );


            acf_render_field_setting( $field, array(
                'label'        => __( 'Multiple Values', 'acf-categories' ),
                'instructions' => __( '<a href="http://codex.wordpress.org/Function_Reference/get_categories" target="_blank">See Documentation </a>', 'acf-categories' ),
                'type'         => 'radio',
                'name'         => 'multiple',
                'choices'      => array(
                    '1' => 'Yes',
                    '0' => 'No',
                ),
                'layout'       => 'horizontal'
            ) );

            acf_render_field_setting( $field, array(
                'label'        => __( 'Start State', 'acf-categories' ),
                'instructions' => __( 'If multiple values you have a slide down layout. This option indicates whether the layout should start opened or closed', 'acf-categories' ),
                'type'         => 'radio',
                'name'         => 'start_state',
                'choices'      => array(
                    '1' => 'Opened',
                    '0' => 'Closed',
                ),
                'layout'       => 'horizontal'
            ) );

            acf_render_field_setting( $field, array(
                'label'        => __( 'Display Posts Count', 'acf-categories' ),
                'instructions' => __( 'Display a post count indicator next to each category', 'acf-categories' ),
                'type'         => 'radio',
                'name'         => 'post_count',
                'choices'      => array(
                    '1' => 'Yes',
                    '0' => 'No',
                ),
                'layout'       => 'horizontal'
            ) );

            acf_render_field_setting( $field, array(
                'label'        => __( 'Update Post Categories', 'acf-categories' ),
                'instructions' => __( '<a href="https://codex.wordpress.org/Function_Reference/wp_set_post_terms" target="_blank">See Documentation </a>', 'acf-categories' ),
                'type'         => 'radio',
                'name'         => 'update_cat',
                'choices'      => array(
                    '1' => 'Yes',
                    '0' => 'No',
                ),
                'layout'       => 'horizontal'
            ) );
        }


        /*
        *  render_field()
        *
        *  Create the HTML interface for your field
        *
        *  @param	$field (array) the $field being rendered
        *
        *  @type	action
        *  @since	3.6
        *  @date	23/01/13
        *
        *  @param	$field (array) the $field being edited
        *  @return	n/a
        */

        function render_field( $field ) {


            /*
            *  Review the data of $field.
            *  This will show what data is available
            */


            /*
            *  Create a simple text input using the 'font_size' setting.
            */

            $field[ 'value' ] = isset( $field[ 'value' ] ) ? $field[ 'value' ] : '';
            $taxonomy         = ( isset( $field[ 'taxonomy' ] ) ) ? ( empty( $field[ 'taxonomy' ] ) ? 'category' : $field[ 'taxonomy' ] ) : 'category';
            $multiple         = isset( $field[ 'multiple' ] ) ? $field[ 'multiple' ] : '0';
            $start_state      = isset( $field[ 'start_state' ] ) ? $field[ 'start_state' ] : '1';
            $post_count       = isset( $field[ 'post_count' ] ) ? $field[ 'post_count' ] : '0';

            $args = array(
                'type'         => $field[ 'post_type' ],
                'child_of'     => $field[ 'child_of' ],
                'parent'       => $field[ 'parent_id' ],
                'hide_empty'   => $field[ 'hide_empty' ],
                'hierarchical' => $field[ 'hierarchical' ],
                'exclude'      => $field[ 'exclude' ],
                'include'      => $field[ 'include' ],
                'taxonomy'     => $field[ 'taxonomy' ],
                'orderby'      => $field[ 'orderby' ],
                'order'        => $field[ 'order' ]
            );

            $categories = get_categories( $args );
            $value      = $field[ 'value' ];

            ?>
            <div class="acf-categories">
                <!-- Single Value -->
                <?php if ( $multiple == 0 ) : ?>
                    <label for="<?php echo $field[ 'name' ] ?>"></label>
                    <select id="<?php echo $field[ 'name' ] ?>" class="<?php echo $field[ 'class' ] ?>" name="<?php echo $field[ 'name' ]; ?>">
                        <?php foreach ( $categories as $category ) : ?>
                            <?php
                            if ( $post_count == 1 ) {
                                $cat_count = ' (' . $category->category_count . ')';
                            } else {
                                $cat_count = '';
                            }
                            ?>

                            <?php if ( $category->term_id == $value ) {
                                $is_selected = 'selected="selected"';
                            } else {
                                $is_selected = '';
                            } ?>
                            <option value="<?php echo $category->term_id; ?>" <?php echo $is_selected; ?>><?php echo $category->name . '' . $cat_count; ?></option>
                        <?php endforeach ?>
                    </select>
                <?php endif; ?>
                <!-- End of Single Value -->

                <!-- Multiple Values -->
                <?php if ( $multiple == 1 ) : ?>
                    <?php
                    if ( $start_state == 1 ) {
                        $start_state_class = 'block';
                        $start_state_label = '- Hide Categories';
                    } else {
                        $start_state_class = 'none';
                        $start_state_label = '+ Show Categories';
                    }
                    ?>

                    <div class="cat-toggle">
                        <a href="#" class="cat-toggle-btn"><?php echo $start_state_label; ?></a>
                    </div>

                    <div class="cat-container" style="display: <?php echo $start_state_class; ?>">
                        <div class="cat-buttons">
                            <a href="#" class="select-all">Select All</a>
                            <a href="#" class="deselect-all">Clear All</a>
                            <a href="#" class="select-main">Select Main Categories</a>
                        </div>

                        <ul class="acf-categories-list">
                            <?php foreach ( $categories as $category ) : ?>
                                <?php $is_subcategory = $category->category_parent ? TRUE : FALSE; ?>
                                <?php
                                if ( $category->count == 1 ) {
                                    $cat_count = '<a href="' . admin_url() . '/edit.php?category_name=' . $category->slug . '"><span class="cat-post-count">' . $category->category_count . '</span></a>';
                                } else {
                                    $cat_count = '';
                                }
                                ?>
                                <?php $subcategory_class = $category->category_parent ? '<span class="acf-subcategory">-</span>' : ''; ?>

                                <?php if ( is_array( $value ) && in_array( $category->term_id, $value ) ) {
                                    $is_selected = 'checked';
                                } else {
                                    $is_selected = '';
                                } ?>

                                <li>
                                    <label for="<?php echo $field[ 'name' ] ?>"></label>
                                    <input id="<?php echo $field[ 'name' ] ?>" type="checkbox" class="cat-categories-check <?php echo $is_subcategory ? 'cat-subcategories-check' : ''; ?>" value="<?php echo $category->term_id; ?>" name="<?php echo $field[ 'name' ] . '[]' ?>" <?php echo $is_selected ?>/><?php echo $subcategory_class . '' . $category->name . '' . $cat_count; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <!-- End of Multiple Values -->
            </div>
            <?php
        }


        /*
        *  input_admin_enqueue_scripts()
        *
        *  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
        *  Use this action to add CSS + JavaScript to assist your render_field() action.
        *
        *  @type	action (admin_enqueue_scripts)
        *  @since	3.6
        *  @date	23/01/13
        *
        *  @param	n/a
        *  @return	n/a
        */


        function input_admin_enqueue_scripts() {

            $dir = plugin_dir_url( __FILE__ );


            // register & include JS
            wp_register_script( 'acf-categories', "{$dir}js/input.js" );
            wp_enqueue_script( 'acf-categories' );


            // register & include CSS
            wp_register_style( 'acf-categories', "{$dir}css/input.css" );
            wp_enqueue_style( 'acf-categories' );

        }


        /*
        *  input_admin_head()
        *
        *  This action is called in the admin_head action on the edit screen where your field is created.
        *  Use this action to add CSS and JavaScript to assist your render_field() action.
        *
        *  @type	action (admin_head)
        *  @since	3.6
        *  @date	23/01/13
        *
        *  @param	n/a
        *  @return	n/a
        */

        /*

        function input_admin_head() {



        }

        */


        /*
           *  input_form_data()
           *
           *  This function is called once on the 'input' page between the head and footer
           *  There are 2 situations where ACF did not load during the 'acf/input_admin_enqueue_scripts' and
           *  'acf/input_admin_head' actions because ACF did not know it was going to be used. These situations are
           *  seen on comments / user edit forms on the front end. This function will always be called, and includes
           *  $args that related to the current screen such as $args['post_id']
           *
           *  @type	function
           *  @date	6/03/2014
           *  @since	5.0.0
           *
           *  @param	$args (array)
           *  @return	n/a
           */

        /*

        function input_form_data( $args ) {



        }

        */


        /*
        *  input_admin_footer()
        *
        *  This action is called in the admin_footer action on the edit screen where your field is created.
        *  Use this action to add CSS and JavaScript to assist your render_field() action.
        *
        *  @type	action (admin_footer)
        *  @since	3.6
        *  @date	23/01/13
        *
        *  @param	n/a
        *  @return	n/a
        */

        /*

        function input_admin_footer() {



        }

        */


        /*
        *  field_group_admin_enqueue_scripts()
        *
        *  This action is called in the admin_enqueue_scripts action on the edit screen where your field is edited.
        *  Use this action to add CSS + JavaScript to assist your render_field_options() action.
        *
        *  @type	action (admin_enqueue_scripts)
        *  @since	3.6
        *  @date	23/01/13
        *
        *  @param	n/a
        *  @return	n/a
        */

        /*

        function field_group_admin_enqueue_scripts() {

        }

        */


        /*
        *  field_group_admin_head()
        *
        *  This action is called in the admin_head action on the edit screen where your field is edited.
        *  Use this action to add CSS and JavaScript to assist your render_field_options() action.
        *
        *  @type	action (admin_head)
        *  @since	3.6
        *  @date	23/01/13
        *
        *  @param	n/a
        *  @return	n/a
        */

        /*

        function field_group_admin_head() {

        }

        */


        /*
        *  load_value()
        *
        *  This filter is applied to the $value after it is loaded from the db
        *
        *  @type	filter
        *  @since	3.6
        *  @date	23/01/13
        *
        *  @param	$value (mixed) the value found in the database
        *  @param	$post_id (mixed) the $post_id from which the value was loaded
        *  @param	$field (array) the field array holding all the field options
        *  @return	$value
        */

        /*

        function load_value( $value, $post_id, $field ) {

            return $value;

        }

        */


        /*
        *  update_value()
        *
        *  This filter is applied to the $value before it is saved in the db
        *
        *  @type	filter
        *  @since	3.6
        *  @date	23/01/13
        *
        *  @param	$value (mixed) the value found in the database
        *  @param	$post_id (mixed) the $post_id from which the value was loaded
        *  @param	$field (array) the field array holding all the field options
        *  @return	$value
        */


        function update_value( $value, $post_id, $field ) {

            $update_cat = ( isset( $field[ 'update_cat' ] ) ) ? ( empty( $field[ 'update_cat' ] ) ? '0' : $field[ 'update_cat' ] ) : '0';
            $taxonomy   = ( isset( $field[ 'taxonomy' ] ) ) ? ( empty( $field[ 'taxonomy' ] ) ? 'category' : $field[ 'taxonomy' ] ) : 'category';

            if ( $update_cat == 1 ) {
                wp_set_post_terms( $post_id, $value, $taxonomy );
            }

            return $value;
        }


        /*
        *  format_value()
        *
        *  This filter is appied to the $value after it is loaded from the db and before it is returned to the template
        *
        *  @type	filter
        *  @since	3.6
        *  @date	23/01/13
        *
        *  @param	$value (mixed) the value which was loaded from the database
        *  @param	$post_id (mixed) the $post_id from which the value was loaded
        *  @param	$field (array) the field array holding all the field options
        *
        *  @return	$value (mixed) the modified value
        */


        function format_value( $value, $post_id, $field ) {

            // Note: This function can be removed if not used
            $multiple        = isset( $field[ 'multiple' ] ) ? $field[ 'multiple' ] : '0';
            $taxonomy        = ( isset( $field[ 'taxonomy' ] ) ) ? ( empty( $field[ 'taxonomy' ] ) ? 'category' : $field[ 'taxonomy' ] ) : 'category';
            $selected_values = $value;
            $object          = array();
            $ret_value       = '';

            if ( $multiple == 1 ) {
                if ( is_array( $selected_values ) ) {
                    if ( !empty( $selected_values ) ) {
                        foreach ( $selected_values as $selected_value ) {
                            array_push( $object, get_term_by( 'id', $selected_value, $taxonomy ) );
                        }
                    }
                }

                if ( !empty( $object ) ) {
                    $ret_value = $object;
                }

            } else {
                $ret_value = get_term_by( 'id', $value, $taxonomy );
            }

            return $ret_value;
        }



        /*
        *  validate_value()
        *
        *  This filter is used to perform validation on the value prior to saving.
        *  All values are validated regardless of the field's required setting. This allows you to validate and return
        *  messages to the user if the value is not correct
        *
        *  @type	filter
        *  @date	11/02/2014
        *  @since	5.0.0
        *
        *  @param	$valid (boolean) validation status based on the value and the field's required setting
        *  @param	$value (mixed) the $_POST value
        *  @param	$field (array) the field array holding all the field options
        *  @param	$input (string) the corresponding input name for $_POST value
        *  @return	$valid
        */

        /*

        function validate_value( $valid, $value, $field, $input ){

            // Basic usage
            if( $value < $field['custom_minimum_setting'] )
            {
                $valid = false;
            }


            // Advanced usage
            if( $value < $field['custom_minimum_setting'] )
            {
                $valid = __('The value is too little!','acf-categories'),
            }


            // return
            return $valid;

        }

        */


        /*
        *  delete_value()
        *
        *  This action is fired after a value has been deleted from the db.
        *  Please note that saving a blank value is treated as an update, not a delete
        *
        *  @type	action
        *  @date	6/03/2014
        *  @since	5.0.0
        *
        *  @param	$post_id (mixed) the $post_id from which the value was deleted
        *  @param	$key (string) the $meta_key which the value was deleted
        *  @return	n/a
        */

        /*

        function delete_value( $post_id, $key ) {



        }

        */


        /*
        *  load_field()
        *
        *  This filter is applied to the $field after it is loaded from the database
        *
        *  @type	filter
        *  @date	23/01/2013
        *  @since	3.6.0
        *
        *  @param	$field (array) the field array holding all the field options
        *  @return	$field
        */

        /*

        function load_field( $field ) {

            return $field;

        }

        */


        /*
        *  update_field()
        *
        *  This filter is applied to the $field before it is saved to the database
        *
        *  @type	filter
        *  @date	23/01/2013
        *  @since	3.6.0
        *
        *  @param	$field (array) the field array holding all the field options
        *  @return	$field
        */

        /*

        function update_field( $field ) {

            return $field;

        }

        */


        /*
        *  delete_field()
        *
        *  This action is fired after a field is deleted from the database
        *
        *  @type	action
        *  @date	11/02/2014
        *  @since	5.0.0
        *
        *  @param	$field (array) the field array holding all the field options
        *  @return	n/a
        */

        /*

        function delete_field( $field ) {



        }

        */


    }


    // create field
    new acf_field_categories();

?>
