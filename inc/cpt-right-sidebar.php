<?php

add_action(
    'init',
    function () {
	    $post_type = 'theme_right_sidebar';
        register_post_type(
            $post_type,
            [
                'labels'       => [
                    'name'          => __('Right Sidebars'),
                    'singular_name' => __('Right Sidebar')
                ],
                'public'       => true,
                'show_in_menu' => 'themes.php',
	            'show_in_admin_bar' => false,
            ]
        );

	    remove_post_type_support( $post_type, 'title' );
    }
);

add_action(
    'add_meta_boxes',
    function () {
        add_meta_box(
            'theme_right_sidebar_template_chooser',
            __('Target template'),
            function ($post) {
                include get_template_directory() . '/inc/cpt-right-sidebar.phtml';
            },
            'theme_right_sidebar',
	        'side'
        );
    }
);

add_action(
    'save_post',
    function ($post_id) {

        // Check if our nonce is set.
        if (!isset($_POST['cpt_right_sidebar_meta_box_nonce'])) {
            return;
        }

        // Verify that the nonce is valid.
        if (!wp_verify_nonce(
            $_POST['cpt_right_sidebar_meta_box_nonce'],
            'cpt_right_sidebar_meta_box'
        )
        ) {
            return;
        }

        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        // Check the user's permissions.
        if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {

            if (!current_user_can('edit_page', $post_id)) {
                return;
            }

        }
        else {

            if (!current_user_can('edit_post', $post_id)) {
                return;
            }
        }

        /* OK, it's safe for us to save the data now. */

        // Make sure that it is set.
        if (!isset($_POST['_page_template'])) {
            return;
        }

        // Update the meta field in the database.
        update_post_meta(
            $post_id,
            '_page_template',
            $_POST['_page_template']
        );
    }
);

$rmp_theme_get_right_sidebar = null;
function theme_get_right_sidebar() {
    global $rmp_theme_get_right_sidebar;

    if (null !== $rmp_theme_get_right_sidebar) {
        return $rmp_theme_get_right_sidebar;
    }

    $rmp_theme_get_right_sidebar = get_posts(
        [
            'post_type'  => 'theme_right_sidebar',
            'meta_key'   => '_page_template',
            'meta_value' => get_page_template_slug()
        ]
    );

    if (!$rmp_theme_get_right_sidebar) {
        $rmp_theme_get_right_sidebar = get_posts(
            [
                'post_type'  => 'theme_right_sidebar',
                'meta_key'   => '_page_template',
                'meta_value' => '_default'
            ]
        );
    }

    if ($rmp_theme_get_right_sidebar) {
        $rmp_theme_get_right_sidebar = current($rmp_theme_get_right_sidebar);
    }

    return $rmp_theme_get_right_sidebar;
}