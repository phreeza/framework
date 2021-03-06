<?php

/*
 * TF OPTIONS: MOBILE
 * 
 * Provide easy to use options for Theme Force users.
 * 
 */

// Register Page

function themeforce_mobile_addpage() {
    add_submenu_page('themes.php', 'Mobile', 'Mobile', 'manage_options', 'themeforce_mobile', 'themeforce_mobile_page');
}

add_action( 'admin_menu', 'themeforce_mobile_addpage' );


// Create Page


function themeforce_mobile_page() {
    ?>
    <div class="wrap" id="tf-options-page">
    <div id="tf-options-panel">
    <form class="form-table" action="options.php" method="post">
   
    <?php 
    
    // List of Options used within Dropdowns, etc.
    
    $shortname = "tf";
    
    $nav_menus = wp_get_nav_menus( array('orderby' => 'name') );
    foreach( (array) $nav_menus as $_nav_menu ) :
        $options_menus[] = $_nav_menu->name;
    endforeach;
    
    $phone = get_option( 'tf_business_phone' );
    
    // Options

    $options = array (
 
        array( 'name' => 'Mobile Settings', 'type' => 'title'),

        array( 'type' => 'open'),  
        
        array( 'name' => 'Backgroung Image',
                'desc' => 'We by default take your first Slider Image, but you may wish',
                'id' => $shortname.'_mobilebg',
                'std' => '',
                'type' => 'image'),
        
         array( 
		'name' => 'Navigation Menu',
		'desc' => 'If you\'d like to display a shorter or different Navigation Menu, select it here.',
		'id' => 'tf_mobilemenu',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $options_menus), 
      
	array( 'type' => 'close'), 
 
);

    tf_display_settings( $options );
    ?> 
	 <input type="submit" class="tf-button tf-major right" name="options_submit" value=" <?php _e( 'Save Changes' )  ?>" />
         <div style="clear:both;"></div>
    </form>
        <div id="tf-tip">
            <h3>Why is Mobile important?</h3>
            <p>We've specifically tailored our mobile site to not only load faster, but also be easier to use on smaller screens, increasing the chance of engaging a user positively. Just whip out your mobile and give it a try!</p>
        </div>    
    </div>
    <?php
        
}	
?>