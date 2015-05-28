<?php

if (!class_exists('Pirobox_Gallery_PT')) {

    /**
     * A PostTypeTemplate class that provides 3 additional meta fields
     */
    class Pirobox_Gallery_PT {

        const POST_TYPE = "pirobox-gallery";

        private $_meta = array(
            'gallery_object_array'
        );
        
        private $base_object_structure = array(
            type => 'image', // or 'video' or 'map'
            title => '',
            details => '', // image#id if type=='image'
                           // video URL if type=='video'
                           // map URL if type=='map'
            link => '' // or page/article link 
        );
    

        public function __construct() {
            // register actions
            add_action('admin_enqueue_scripts', array(&$this, 'admin_enqueue_scripts'));
            add_action('init', array(&$this, 'init'));
            add_action('admin_init', array(&$this, 'admin_init'));
            add_action( 'wp_ajax_pirobox_gallery', array(&$this, 'wp_ajax_pirobox_gallery') );
        } // END public function __construct()

        /**
         * hook into WP's init action hook
         */
        public function init() {
            // Initialize Post Type
            $this->create_post_type();
            add_action('save_post', array(&$this, 'save_post'));
        } // END public function init()

        public function create_post_type() {
            register_post_type(self::POST_TYPE, array(
                'labels' => array(
                    'name' => __(sprintf('%ss', ucwords(str_replace("_", " ", self::POST_TYPE)))), // TODO nome plurale
                    'singular_name' => __(ucwords(str_replace("_", " ", self::POST_TYPE)))
                ),
                'public' => true,
                'has_archive' => true,
                'description' => __("Items container for Pirobox Gallery / Slider / Carousel display"),
                'supports' => array(
                    'title'
                ),
            ));
        }

        public function save_post($post_id) {
            // verify if this is an auto save routine. 
            // If it is our form has not been submitted, so we dont want to do anything
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                return;
            }

            if (isset($_POST['post_type']) && $_POST['post_type'] == self::POST_TYPE && current_user_can('edit_post', $post_id)) {
                // TODO singolarizzare la cosa
                foreach ($this->_meta as $field_name) {
                    // Update the post's meta field
                    update_post_meta($post_id, $field_name, $_POST[$field_name]);
                }
            } else {
                return;
            } // if($_POST['post_type'] == self::POST_TYPE && current_user_can('edit_post', $post_id))
        } // END public function save_post($post_id)

        public function admin_init() {
            // Add metaboxes
            add_action('add_meta_boxes', array(&$this, 'add_meta_boxes'));
        } // END public function admin_init()

        public function add_meta_boxes() {
            //add_meta_box( $id, $title, $callback, $screen, $context, $priority, $callback_args );
            add_meta_box(
                   'pb_gallery_generator', 
                    sprintf('%s Information', ucwords(str_replace("_", " ", self::POST_TYPE))), //title
                    array(&$this, 'add_inner_meta_boxes'), //callback
                    self::POST_TYPE //screen
            );
        } // END public function add_meta_boxes()

        public function add_inner_meta_boxes($post) {
            // Render the job order metabox
            include(sprintf("%s/templates/post_type_pirobox_gallery.php", dirname(__FILE__)));
        } // END public function add_inner_meta_boxes($post)
        
        function admin_enqueue_scripts($hook_suffix) {
            wp_enqueue_media();
            wp_enqueue_style('jquery-ui-sortable');
            wp_enqueue_style('thickbox');
            wp_enqueue_script('pirobox-posttype-script', plugins_url('/js/pirobox_post_type.js', __FILE__), array('jquery-ui-sortable', 'thickbox'), false, true);
            wp_enqueue_style('pirobox-posttype-style', plugins_url('/css/pirobox_post_type.css', __FILE__));
        } // END admin_enqueue_scripts($hook_suffix)
        
        function wp_ajax_pirobox_gallery() {
            global $wpdb; // this is how you get access to the database
            $galleryArray = $_POST['gallery'];

            if( $galleryArray != array() ){
                echo json_encode($galleryArray);
            }
            
            wp_die(); // this is required to terminate immediately and return a proper response
    }
        
    } // END class Pirobox_Gallery_PT
} // END if(!class_exists('Pirobox_Gallery_PT'))
