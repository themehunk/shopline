
<!--- tab first -->
<div class="theme_link">
    <h3><?php _e('1. Install Recommended Plugins','shopline'); ?></h3>
    <p><?php _e('We highly Recommend to install Themehunk Customizer plugin to get all customization options in Shopline theme. Also install recommended plugins available in recommended tab.','shopline'); ?></p>
</div>
<div class="theme_link">
    <h3><?php _e('2. Setup Home Page','shopline'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
        <p><?php _e('To set up the HomePage in Shopline theme, Just follow the below given Instructions.','shopline'); ?> </p>
<p><?php _e('Go to Wp Dashboard > Pages > Add New > Create a Page using “Home Page Template” available in Page attribute.','shopline'); ?> </p>
<p><?php _e('Now go to Settings > Reading > Your homepage displays > A static page (select below) and set that page as your homepage.','shopline'); ?> </p>
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
		
         </p>
		 	 
		 
    <p>
        <a target="_blank" href="https://themehunk.com/docs/shopline-pro-theme/#homepage-setting" class="button"><?php _e('Go to Doc','shopline'); ?></a>
    </p>
</div>

<!--- tab third -->





<!--- tab second -->
<div class="theme_link">
    <h3><?php _e('3. Customize Your Website','shopline'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
    <p><?php _e('Shopline theme support live customizer for home page set up. Everything visible at home page can be changed through customize panel','shopline'); ?></p>
    <p>
    <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php _e("Start Customize","shopline"); ?></a>
    </p>
</div>
<!--- tab third -->

  <div class="theme_link">
    <h3><?php _e("4. Customizer Links","shopline"); ?></h3>
    <div class="card-content">
        <div class="columns">
                <div class="col">
                    <a href="<?php echo admin_url('customize.php?autofocus[control]=custom_logo'); ?>" class="components-button is-link"><?php _e("Upload Logo","shopline"); ?></a>
                    <hr><a href="<?php echo admin_url('customize.php?autofocus[panel]=header_options'); ?>" class="components-button is-link"><?php _e("Header Options(Hero)","shopline"); ?></a><hr>
                    <a href="<?php echo admin_url('customize.php?autofocus[panel]=woocommerce'); ?>" class="components-button is-link"><?php _e("Woocommerce","shopline"); ?></a><hr>

                </div>

               <div class="col">
                <a href="<?php echo admin_url('customize.php?autofocus[section]=footer_setting'); ?>" class="components-button is-link"><?php _e("footer Setting","shopline"); ?></a>
                <hr>

                <a href="<?php echo admin_url('customize.php?autofocus[panel]=front_page_section'); ?>" class="components-button is-link"><?php _e("Frontpage Section","shopline"); ?></a><hr>


                 <a href="<?php echo admin_url('customize.php?autofocus[panel]=widgets'); ?>" class="components-button is-link"><?php _e("Widgets","shopline"); ?></a><hr>
            </div>

        </div>
    </div>

</div>
<!--- tab fourth -->