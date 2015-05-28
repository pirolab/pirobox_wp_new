<div class="wrap">
    <h2>Pirobox General Settings</h2>
    <form id="pirobox-form" method="post" action="options.php"> 
        <?php @settings_fields('pb-style-option'); ?>
        <?php @do_settings_fields('pb-style-option'); ?>

        <?php do_settings_sections('pirobox'); ?>

        <?php @submit_button(); ?>
    </form>

    <div id="pb_img_preview">
        
<!--
        <div>
            <a href="http://localhost/wp_piro/wp-content/uploads/2015/02/2013-india_frost-72x1082.jpg" class="pirobox_gall_grid_4">
                <span class="pb_hover_img_icon" title="Open modal window" style="top: 50%; margin-left: -400px;"></span>
            </a>
            <img class="pb_img" src="http://localhost/wp_piro/wp-content/uploads/2015/02/2013-india_frost-72x1082-400x400_c.jpg" alt="" style="display: inline; width: 100%; top: 0%; left: 0%; opacity: 1;">
            <span class="pb_hover_img" style="left: -105%;">
            </span>
        </div>
-->

        <div id="pb_test_overlay"></div>
        <div id="pb_test_lightbox_container" style="padding: 10px;">
            <a class="piro_close_fake" id="piro_close_fake" title="close" style="display: inline;"></a>
            <div id="pb_test_lightbox" style="padding: 10px; -webkit-box-shadow: rgb(0, 0, 0) 0px 0px 10px; box-shadow: rgb(0, 0, 0) 0px 0px 10px;">
                <img src="http://localhost/wp_piro/wp-content/plugins/pirobox-wp/assets/images/preview.jpg" alt="preview" style="border-radius: 4px;">
            </div>
        </div>
        <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa 
            qui officia deserunt mollit anim id est laborum.""Lorem ipsum dolor sit 
            amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum 
            dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
            "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 
            tempor incididunt ut labore et dolore magna aliqua.
            Lorem ipsum dolor sit 
            amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum 
            dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
            "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 
            tempor incididunt ut labore et dolore magna aliqua."</p>
        <div style="clear:both;"></div>

    </div>
</div>