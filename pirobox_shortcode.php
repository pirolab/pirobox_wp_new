<?php

if (!class_exists('Pirobox_Shortcode')) {

    /**
     * A PostTypeTemplate class that provides 3 additional meta fields
     */
    class Pirobox_Shortcode {

        private $galleryPosts = '';

        public function __construct() {
            // register actions
            add_shortcode('pirobox_gallery', array(&$this, 'pirobox_gallery'));
            add_shortcode('pirobox_slider', array(&$this, 'pirobox_slider'));
            add_shortcode('pirobox_carousel', array(&$this, 'pirobox_carousel'));

            add_action('admin_enqueue_scripts', array(&$this, 'admin_enqueue_scripts'));
            add_action('wp_enqueue_scripts', array(&$this, 'wp_enqueue_scripts'));
            
            
            add_action('admin_init', array(&$this, 'admin_init'));
        }

// END public function __construct()

        public function admin_init() {
            add_action('add_meta_boxes', array(&$this, 'add_meta_boxes'));
        }

// END public function admin_init()

        public function add_meta_boxes() {
            //add_meta_box( $id, $title, $callback, $screen, $context, $priority, $callback_args );
            $post_type = array('post', 'page');

            // @TODO add custom post type
            
            add_meta_box(
                'pb_shortcode_generator', //id
                'Pirobox shortcode', //title
                array(&$this, 'add_inner_meta_boxes'), //callback
                $post_types // post type
            );
        }

// END public function add_meta_boxes()

        function admin_enqueue_scripts($hook_suffix) {
            wp_enqueue_style('pirobox-metabox-style', plugins_url('/css/pirobox_meta_box.css', __FILE__));
            wp_enqueue_script('pirobox-metabox-script', plugins_url('/js/pirobox_meta_box.js', __FILE__), array(), false, true);
        } // END admin_enqueue_scripts($hook_suffix)
        
        function wp_enqueue_scripts($hook_suffix) {
            // @TODO frontend script + dipendenze
           wp_enqueue_script('pirobox-frontend', plugins_url('/js/pirobox_frontend.js', __FILE__), array(), false, true);
        } // END admin_enqueue_scripts($hook_suffix)

        public function add_inner_meta_boxes($post) {
            $args = array('post_type' => 'pirobox-gallery');
            $galleryPosts = get_posts($args);

            // Render the job order metabox
            include(sprintf("%s/templates/metabox_pirobox_gallery.php", dirname(__FILE__)));
        }

// END public function add_inner_meta_boxes($post)

        public function metabox_pirobox_form_height($section, $default) {
            print '<input name="pb_' . $section . '_height" type="text" id="pb_' . $section . '_height" value="' . $default . '">';
        }

        public function metabox_pirobox_form_column($section) {
            print '<select id="pb_' . $section . '_columns" name="pb_' . $section . '_columns">
                <option value="1">One column</option>
                <option value="2">Two columns</option>
                <option value="3" selected="selected">Tree columns</option>
                <option value="4">Four columns</option>
                <option value="5">Five columns</option>
                <option value="6">Six columns</option>
            </select>';
        }

        public function metabox_pirobox_form_animation_duration($section) {
            print '<select id="pb_' . $section . '_animation_duration" name="pb_' . $section . '_animation_duration">
                    <option value="400">400ms</option>
                    <option value="600">600ms</option>
                    <option value="800">800ms</option>
                    <option value="1000" selected="selected">1000ms</option>
                    <option value="1200">1200ms</option>
            </select>';
        }

        public function metabox_pirobox_form_autoplay_delay($section) {
            print '<select id="pb_' . $section . '_autoplay_delay" name="pb_' . $section . '_autoplay_delay">
                <option value="1500" selected="selected">1.5s</option>
                <option value="3000">3s</option>
                <option value="4000">4s</option>
                <option value="5000">5s</option>
                <option value="6000">6s</option>
                <option value="7000">7s</option>
                <option value="8000">8s</option>
                <option value="9000">9s</option>
                <option value="10000">10s</option>
                <option value="11000">11s</option>
                <option value="12000">12s</option>
            </select>';
        }

        public function metabox_pirobox_form_checkbox($section, $field, $checked = true) {
            if ($checked)
                print '<input name="pb_' . $section . '_' . $field . '" type="checkbox" id="pb_' . $section . '_' . $field . '" value="true" checked="checked">';
            else
                print '<input name="pb_' . $section . '_' . $field . '" type="checkbox" id="pb_' . $section . '_' . $field . '" value="true">';
        }

        public function metabox_pirobox_form_controls($section) {
            print '<label title="bottom"><input type="radio" name="pb_' . $section . '_controls" checked="checked" value="bottom"> <span>Bottom</span></label><br>
            <label title="top"><input type="radio" name="pb_' . $section . '_controls" value="top"> <span>Top</span></label>';
        }

        public function metabox_pirobox_form_gallery_id($section) {
            $out = '<select id="pb_' . $section . '_gallery_id" name="pb_' . $section . '_gallery_id">';

            $args = array('post_type' => 'pirobox-gallery');
            $galleryPosts = get_posts($args);

            foreach ($galleryPosts as $post) {
                $out = $out . '<option value="' . $post->ID . '">Gallery #' . $post->ID . '  -  ' . $post->post_name . '</option>';
            }
            $out = $out . '</select>';

            print $out;
        }

        public function pirobox_gallery($atts) {
            $atts = shortcode_atts(array(
                'gallery_id' => $post->ID,
                'columns' => '3',
                'shadow' => 'true' // TODO sul vecchio plugin non funziona..
                    ), $atts);

            $gallery_post = get_post_meta($atts['gallery_id']);
            $style_option = $this->get_pb_options();
            
            include(sprintf("%s/templates/pirobox_gallery_shortcode.php", dirname(__FILE__)));
        }

// END public function pirobox_gallery

        public function pirobox_slider($atts) {
            $atts = shortcode_atts(array(
                'gallery_id' => $post->ID,
                'shadow' => 'true',
                'slider_height' => '350',
                'speed_animation' => '1000',
                'animation_delay' => '1500',
                'control_position' => 'bottom',
                'autoplay' => 'true',
                'pagination' => 'false'
                    ), $atts);

            $gallery_post = get_post_meta($atts['gallery_id']);
            $style_option = $this->get_pb_options();

            include(sprintf("%s/templates/pirobox_slider_shortcode.php", dirname(__FILE__)));
        }

// END public function pirobox_slider

        public function pirobox_carousel($atts) {
            $atts = shortcode_atts(array(
                'gallery_id' => $post->ID,
                'columns' => '3',
                'shadow' => 'true',
                'carousel_height' => '220',
                'speed_animation' => '1000',
                'animation_delay' => '1500',
                'control_position' => 'bottom',
                'autoplay' => 'true',
                'pagination' => 'false'
                    ), $atts);

            $gallery_post = get_post_meta($atts['gallery_id']);
            $style_option = $this->get_pb_options();

            include(sprintf("%s/templates/pirobox_carousel_shortcode.php", dirname(__FILE__)));
        }

// END public function pirobox_carousel

        public function get_pb_options() {
            $opt = array(
                'pb_base_color' => get_option('pb_base_color'),
                'pb_base_color' => get_option('pb_hover_color'),
                'pb_base_color' => get_option('pb_box_color'),
                'pb_base_color' => get_option('pb_box_border_width'),
                'pb_base_color' => get_option('pb_box_border_radius'),
                'pb_base_color' => get_option('pb_box_border_opacity'),
                'pb_base_color' => get_option('pb_shadow_color'),
                'pb_base_color' => get_option('pb_shadow_width'),
                'pb_base_color' => get_option('pb_shadow_opacity'),
                'pb_base_color' => get_option('pb_background_color'),
                'pb_base_color' => get_option('pb_background_opacity')
            );

            return $opt;
        } // END public function get_pb_options 
    } // END class Pirobox_Shortcode
} // END if(!class_exists('Pirobox_Shortcode'))
