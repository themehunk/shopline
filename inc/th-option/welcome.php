
<!--- tab first -->
<div class="theme_link">
    <h3><?php _e('Setup Home Page','shopline'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
    <p><?php _e('Click button to set theme default home page','shopline'); ?></p>
     <p>
        <?php
        if($this->_check_homepage_setup()){
            $class = "activated";
            $btn_text = __("Home Page Activated",'shopline');
            $Bstyle = "display:none;";
            $style = "display:inline-block;";
        }else{
            $class = "default-home";
             $btn_text = __("Set Home Page",'shopline');
             $Bstyle = "display:inline-block;";
            $style = "display:none;";

        }
        ?>
		
		<button style="<?php echo $Bstyle; ?>"; class="button activate-now <?PHP echo $class; ?>"><?php _e($btn_text,'shopline'); ?></button>
        <a style="<?php echo $style; ?>";  target="_blank" href="<?php echo get_home_url(); ?>" class="button alink button-primary"><?php _e('View Home Page','shopline'); ?></a>
		
         </p>
    <p>
        <a target="_blank" href="https://www.youtube.com/watch?v=DKL1-CM2_I8"><?php _e('Manually Setup','shopline'); ?></a>
    </p>
</div>



<!--- tab second -->
<div class="theme_link">

    <h3><?php _e('Documentation','shopline'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
    <p><?php _e('Our WordPress Theme is well documented, you can go with our documentation and learn to customize Shopline Theme','shopline'); ?></p>
    <p><a target="_blank" href="https://themehunk.com/docs/shopline-theme/"><?php _e("Go to docs","shopline"); ?></a></p>

    
    
</div>
<!--- tab third -->





<!--- tab second -->
<div class="theme_link">
    <h3><?php _e("Customize Your Website","shopline"); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
    <p><?php _e("Shopline theme support live customizer for home page set up. Everything visible at home page can be changed through customize panel","shopline"); ?></p>
    <p>
    <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php _e("Start Customize","shopline"); ?></a>
    </p>
</div>
<!--- tab third -->

  <div class="theme_link">
    <h3><?php _e("Customizer Links","shopline"); ?></h3>
    <div class="card-content">
        <div class="columns">
                <div class="col">
                    <a href="<?php echo admin_url('customize.php?autofocus[control]=custom_logo'); ?>" class="components-button is-link"><?php _e("Upload Logo","shopline"); ?></a>
                    <hr><a href="<?php echo admin_url('customize.php?autofocus[section]=site_color'); ?>" class="components-button is-link"><?php _e("Site Colors","shopline"); ?></a><hr>
                    <a href="<?php echo admin_url('customize.php?autofocus[section]=global_set'); ?>" class="components-button is-link"><?php _e("Global Options","shopline"); ?></a><hr>

                </div>

               <div class="col">
                <a href="<?php echo admin_url('customize.php?autofocus[section]=header_setting'); ?>" class="components-button is-link"><?php _e("Header Options","shopline"); ?></a>
                <hr>

                <a href="<?php echo admin_url('customize.php?autofocus[panel]=front_page_section'); ?>" class="components-button is-link"><?php _e("Front Page Section","shopline"); ?></a><hr>


                 <a href="<?php echo admin_url('customize.php?autofocus[panel]=widgets'); ?>" class="components-button is-link"><?php _e("Footer Widgets","shopline"); ?></a>
                 <hr>
            </div>

        </div>
    </div>

</div>
<!--- tab fourth -->