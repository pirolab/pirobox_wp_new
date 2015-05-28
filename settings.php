<?php

if (!class_exists('Pirobox_Settings')) {

    class Pirobox_Settings {

        public function __construct() {
            // register actions
            add_action('admin_enqueue_scripts', array(&$this, 'admin_enqueue_scripts'));
            add_action('admin_init', array(&$this, 'admin_init'));
            add_action('admin_menu', array(&$this, 'admin_menu'));
        } // END public function __construct

        public function admin_init() {            
            // register your plugin's settings
            // register_setting( $option_group, $option_name, $sanitize_callback );
            register_setting('pb-style-option', 'pb_base_color');
            register_setting('pb-style-option', 'pb_hover_color');
            
            register_setting('pb-style-option', 'pb_box_color');
            register_setting('pb-style-option', 'pb_box_border_width');
            register_setting('pb-style-option', 'pb_box_border_radius');
            register_setting('pb-style-option', 'pb_box_border_opacity');

            register_setting('pb-style-option', 'pb_shadow_color');
            register_setting('pb-style-option', 'pb_shadow_width');
            register_setting('pb-style-option', 'pb_shadow_opacity');
            
            register_setting('pb-style-option', 'pb_background_color');
            register_setting('pb-style-option', 'pb_background_opacity');

            
            // add your settings section
            // add_settings_section( $id, $title, $callback, $page ); 
            add_settings_section( 'pirobox-base', 'General Style', array(&$this, 'settings_section_pirobox'), 'pirobox' );
            add_settings_section( 'pirobox-lightbox', 'Lightbox Style', array(&$this, 'settings_section_pirobox'), 'pirobox' );
            add_settings_section( 'pirobox-shadow', 'Shadow Style', array(&$this, 'settings_section_pirobox'), 'pirobox' );
            add_settings_section( 'pirobox-background', 'Background Style', array(&$this, 'settings_section_pirobox'), 'pirobox' );


            // add your setting's fields
            // add_settings_field( $id, $title, $callback, $page, $section, $args );
            // BASE 
            add_settings_field( 'pirobox-base_color', 'Base Color', array(&$this, 'settings_field_input_color'), 'pirobox', 'pirobox-base', array( 'field' => 'pb_base_color', 'default' => '#000000' ));
            add_settings_field( 'pirobox-hover_color', 'Hover Color', array(&$this, 'settings_field_input_color'), 'pirobox', 'pirobox-base', array( 'field' => 'pb_hover_color', 'default' => '#ff5500' ));
            
            // LIGHTBOX
            add_settings_field( 'pirobox-box_color', 'Image box color', array(&$this, 'settings_field_input_color'), 'pirobox', 'pirobox-lightbox', array( 'field' => 'pb_box_color', 'default' => '#000000' ));
            
            $width_array = [
                'min' => 0,
                'max' => 50,
                'step' => 5,
                'unity' => 'px'
            ];
            add_settings_field( 'pirobox-box_border_width', 'Image box border', array(&$this, 'settings_field_input_slider'), 'pirobox', 'pirobox-lightbox', array_merge(array( 'field' => 'pb_box_border_width', 'default' => '10' ), $width_array));
            add_settings_field( 'pirobox-box_border_radius', 'Image box border radius', array(&$this, 'settings_field_input_slider'), 'pirobox', 'pirobox-lightbox', array_merge(array( 'field' => 'pb_box_border_radius', 'default' => '5' ), $width_array));

            $opacity_array = [
                'min' => 0,
                'max' => 100,
                'step' => 10,
                'unity' => '%'
            ];
            add_settings_field( 'pirobox-box_border_opacity', 'Image box border opacity', array(&$this, 'settings_field_input_slider'), 'pirobox', 'pirobox-lightbox', array_merge(array( 'field' => 'pb_box_border_opacity', 'default' => '100' ), $opacity_array));

            // SHADOW
            add_settings_field( 'pirobox-shadow_color', 'Shadow color', array(&$this, 'settings_field_input_color'), 'pirobox', 'pirobox-shadow', array( 'field' => 'pb_shadow_color', 'default' => '#000000' ));
            add_settings_field( 'pirobox-shadow_width', 'Shadow width', array(&$this, 'settings_field_input_slider'), 'pirobox', 'pirobox-shadow', array_merge(array( 'field' => 'pb_shadow_width', 'default' => '10' ), $width_array));
            add_settings_field( 'pirobox-shadow_opacity', 'Shadow opacity', array(&$this, 'settings_field_input_slider'), 'pirobox', 'pirobox-shadow', array_merge(array( 'field' => 'pb_shadow_opacity', 'default' => '50' ), $opacity_array));

            // BACKGROUND
            add_settings_field( 'pirobox-background_color', 'Background color', array(&$this, 'settings_field_input_color'), 'pirobox', 'pirobox-background', array( 'field' => 'pb_background_color', 'default' => '#ffffff' ));
            add_settings_field( 'pirobox-background_opacity', 'Background opacity', array(&$this, 'settings_field_input_slider'), 'pirobox', 'pirobox-background', array_merge(array( 'field' => 'pb_background_opacity', 'default' => '50' ), $opacity_array));

            
        } // END public static function admin_init

        function admin_enqueue_scripts($hook_suffix) {
            // first check that $hook_suffix is appropriate for your admin page
            // @TODO check script
            wp_enqueue_style('wp-color-picker');
            wp_enqueue_style('jquery-ui-slider');
            wp_enqueue_script('iris', admin_url('js/iris.min.js'), array('jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch'), false, true);
            wp_enqueue_script('pirobox-settings-script', plugins_url('/js/pirobox_settings.js', __FILE__), array('iris'), false, true);
            wp_enqueue_style('pirobox-settings-style', plugins_url('/css/pirobox_settings.css', __FILE__));
        }

        public function settings_section_pirobox() {
            // Think of this as help text for the section.
            // echo 'These settings do things for the WP Plugin Template.';
        }

        // TEXT input
        public function settings_field_input_text($args) {
            $field = $args['field'];
            $default_value = $args['default'];
            $value = get_option($field);
            
            echo sprintf('<input type="text" name="%s" id="%s" value="%s" />', $field, $field, $value);
        }

        // COLOR input
        public function settings_field_input_color($args) {
            $field = $args['field'];
            $default_value = $args['default'];
            $value = get_option($field);
            if( $value == '' )
                $value = $default_value;
            
            echo sprintf('<div class="color-picker-preview"></div><input type="text" name="%s" id="%s" value="%s" class="pb-color-picker-field" data-default="%s" />', $field, $field, $value, $default_value);
        }

        // SLIDER input
        public function settings_field_input_slider($args) {
            $field = $args['field'];
            $default_value = $args['default'];
            $min = $args['min'];
            $max = $args['max'];
            $unity = $args['unity'];
            $step = $args['step'];
            $value = get_option($field);
            
            if( $value == '' )
                $value = $default_value;
            
            echo sprintf('<select class="pb-range-field" name="%s" id="%s" data-min="%s" data-max="%s" data-step="%s" data-default="%s" data-unity="%s">', $field, $field, $min, $max, $step, $default_value, $unity );
            
            for ( $i = $min ; $i <= $max ; $i = $i + $step ) {
                echo sprintf('<option value="%s" %s>%s</option>', $i, $i == $value? 'selected' : '', "$i$unity" ); 
            }
            
            echo '</select>';
            
        } // END public function settings_field_input_text($args)
        
        // Add Menu 
        public function admin_menu() {
            // Add a page to manage this plugin's settings
            // add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);
            add_options_page('Pirobox General Settings', 'Pirobox Template', 'manage_options', 'pirobox', array(&$this, 'plugin_settings_page'));

            wp_register_script('pirobox-settings-script', plugins_url('js/pirobox_settings.js', __FILE__));
        } // END public function admin_menu()

        public function plugin_settings_page() {
            if (!current_user_can('manage_options')) {
                wp_die(__('You do not have sufficient permissions to access this page.'));
            }

            // Render the settings template
            include(sprintf("%s/templates/settings.php", dirname(__FILE__)));
        } // END public function plugin_settings_page()
    } // END class Pirobox_Settings
} // END if(!class_exists('Pirobox_Settings'))
