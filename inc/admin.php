<?php

add_action(
    'admin_enqueue_scripts',
    function ()
    {
        wp_register_style( 'theme_admin_css', get_template_directory_uri() . '/admin.css', false, '1.0.0' );
        wp_enqueue_style( 'theme_admin_css' );
    }
);