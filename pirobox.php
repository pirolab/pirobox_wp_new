<?php

/*
  Plugin Name: Pirobox 4 Wordpress
  Plugin URI: http://www.pirolab.it/wp_pirobox/
  Description: Highly customize-able and stylish jQuery responsive lightbox, slider, carousel and grid generator.
  Author: Diego Valobra & Benedetta Sferrella
  Author URI: http://www.pirolab.it/wp_pirobox/
  Version: 2
  test: test github
  git command : git pull origin master && git add . --all && git commit -am "fix Diego" && git push origin  master
  
 */
if (!class_exists('Pirobox')) {

    class Pirobox {
        const VERSION = '2';
    

        /**
         * Construct the plugin object
         */
        public function __construct() {
            // Initialize Settings
            require_once(sprintf("%s/settings.php", dirname(__FILE__)));
            $Pirobox_Settings = new Pirobox_Settings();

            // Register custom post types
            require_once(sprintf("%s/post_type_pirobox_gallery.php", dirname(__FILE__)));
            $Pirobox_Gallery_PT = new Pirobox_Gallery_PT();
            
            // Register shotcode
            require_once(sprintf("%s/pirobox_meta_box.php", dirname(__FILE__)));
            $Pirobox_MetaBox = new Pirobox_MetaBox();
            
            // Register shotcode
            require_once(sprintf("%s/pirobox_shortcode.php", dirname(__FILE__)));
            $Pirobox_Shortcode = new Pirobox_Shortcode();

            $plugin = plugin_basename(__FILE__);
            add_filter("plugin_action_links_$plugin", array($this, 'plugin_settings_link'));
        }

// END public function __construct

        /**
         * Activate the plugin
         */
        public static function activate() {
            
        }

// END public static function activate

        /**
         * Deactivate the plugin
         */
        public static function deactivate() {
            
        }

// END public static function deactivate
        // Add the settings link to the plugins page
        function plugin_settings_link($links) {
            $settings_link = '<a href="options-general.php?page=pirobox">Settings</a>';
            array_unshift($links, $settings_link);
            return $links;
        }

    }

    // END class Pirobox
} // END if(!class_exists('Pirobox'))

if (class_exists('Pirobox')) {
    // Installation and uninstallation hooks
    register_activation_hook(__FILE__, array('Pirobox', 'activate'));
    register_deactivation_hook(__FILE__, array('Pirobox', 'deactivate'));

    // instantiate the plugin class
    $pirobox = new Pirobox();
}
