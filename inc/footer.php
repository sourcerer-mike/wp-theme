<?php

add_action(
	'init',
	function () {
		register_post_type(
			'theme_footer',
			[
				'labels'       => [
					'name' => __('Footers'),
					'singular_name' => __('Footer')
				],
				'public'       => true,
				'show_in_menu' => 'themes.php',
                'supports' => array('editor'),
			]
		);
	}
);

add_filter('manage_edit-theme_footer_columns', '_s_edit_theme_footer_columns');

function _s_edit_theme_footer_columns($columns)
{
    $columns[ 'template' ] = __( 'Template' );

    return $columns;
}

add_action( 'manage_theme_footer_posts_custom_column', '_s_manage_theme_footer_columns', 10, 2 );

function _s_manage_theme_footer_columns( $column, $post_id ) {
    switch ( $column ) {
        case 'template':
            echo get_post_meta( $post_id, '_page_template', true );
            break;
    }
}

add_action(
	'add_meta_boxes',
	function () {
		add_meta_box(
			'theme_footer_template_chooser',
			__('For which template is this footer?'),
			function ($post) {
				include get_template_directory() . '/inc/footer.phtml';
			},
			'theme_footer'
		);
	}
);

add_action(
	'save_post',
	function ($post_id) {

		// Check if our nonce is set.
		if (!isset($_POST['cpt_footer_meta_box_nonce'])) {
			return;
		}

		// Verify that the nonce is valid.
		if (!wp_verify_nonce(
			$_POST['cpt_footer_meta_box_nonce'],
			'cpt_footer_meta_box'
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