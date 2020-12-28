<?php 
    // Check if admiin
    if(is_admin())
    {
        // Add admin scripts
        function mtl_add_admin_script()
        {
            wp_enqueue_style( 'mtl-admin-style', MTL_PLUGIN_CSS . 'style-admin.css');
        }
        add_action('admin_init', 'mtl_add_admin_script');
    }

    // add front js and css
    function mtl_add_script()
    {
        wp_enqueue_style( 'mtl-style', MTL_PLUGIN_CSS . 'style.css');
        wp_enqueue_script( 'mtl-js', MTL_PLUGIN_JS . 'main.js');
    }
    add_action('wp_enqueue_scripts', 'mtl_add_script')
?>