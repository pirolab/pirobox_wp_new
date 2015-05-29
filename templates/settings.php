<div class="wrap">
    <h2>Pirobox General Settings</h2>
    <form id="pirobox-form" method="post" action="options.php"> 
        <?php @settings_fields('pb-style-option'); ?>
        <?php @do_settings_fields('pb-style-option'); ?>

        <?php do_settings_sections('pirobox'); ?>

        <?php @submit_button(); ?>
    </form>

    <div id="pb_img_preview">
       

        <div id="pb_test_overlay"></div>
        <div id="pb_test_lightbox_container" style="padding: 10px;">
            <a class="piro_close_fake" id="piro_close_fake" title="close" style="display: inline;"></a>
            <div id="pb_test_lightbox" style="padding: 10px; -webkit-box-shadow: rgb(0, 0, 0) 0px 0px 10px; box-shadow: rgb(0, 0, 0) 0px 0px 10px;">
                <img src="<?php echo plugins_url('../images/preview.jpg', __FILE__); ?>" alt="preview" style="border-radius: 4px;">
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