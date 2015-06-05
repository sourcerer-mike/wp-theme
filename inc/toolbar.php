<?php

if ( is_admin() )
{
    return;
}

add_action(
    'admin_bar_menu',
    function ( $wp_admin_bar )
    {
        // header
        if ( $header = theme_get_header() )
        {
            $wp_admin_bar->add_node(
                array(
                    'id'     => 'theme-edit-header',
                    'title'  => __( 'Edit header' ),
                    'parent' => 'edit',
                    'href'   => admin_url( 'post.php?post=' . $header->ID . '&action=edit' )
                )
            );
        }

        if ( ! $header )
        {
            $wp_admin_bar->add_node(
                array(
                    'id'     => 'theme-edit-header',
                    'title'  => __( 'New header' ),
                    'parent' => 'edit',
                    'href'   => admin_url( 'post-new.php?post_type=theme_header' )
                )
            );
        }

        // sidebar left
        if ( $left_sidebar = theme_get_left_sidebar() )
        {
            $wp_admin_bar->add_node(
                array(
                    'id'     => 'theme-edit-left-sidebar',
                    'title'  => __( 'Edit left sidebar' ),
                    'parent' => 'edit',
                    'href'   => admin_url( 'post.php?post=' . $left_sidebar->ID . '&action=edit' )
                )
            );
        }

        if ( ! $left_sidebar )
        {
            $wp_admin_bar->add_node(
                array(
                    'id'     => 'theme-edit-left-sidebar',
                    'title'  => __( 'New left sidebar' ),
                    'parent' => 'edit',
                    'href'   => admin_url( 'post-new.php?post_type=theme_left_sidebar' )
                )
            );
        }

        if (is_page() || is_single()) {
            // content
            $wp_admin_bar->add_node(
                array(
                    'id'     => 'theme-edit-content',
                    'title'  => __( 'Edit content' ),
                    'parent' => 'edit',
                    'href'   => admin_url( 'post.php?post=' . get_the_ID() . '&action=edit' ),
                )
            );
        }

        // sidebar right
        if ( $right_sidebar = theme_get_right_sidebar() )
        {
            $wp_admin_bar->add_node(
                array(
                    'id'     => 'theme-edit-right-sidebar',
                    'title'  => __( 'Edit right sidebar' ),
                    'parent' => 'edit',
                    'href'   => admin_url( 'post.php?post=' . $right_sidebar->ID . '&action=edit' )
                )
            );
        }

        if ( ! $right_sidebar )
        {
            $wp_admin_bar->add_node(
                array(
                    'id'     => 'theme-edit-right-sidebar',
                    'title'  => __( 'New right sidebar' ),
                    'parent' => 'edit',
                    'href'   => admin_url( 'post-new.php?post_type=theme_right_sidebar' )
                )
            );
        }

        // footer
        if ( $footer = theme_get_footer() )
        {
            $wp_admin_bar->add_node(
                array(
                    'id'     => 'theme-edit-footer',
                    'title'  => __( 'Edit footer' ),
                    'parent' => 'edit',
                    'href'   => admin_url( 'post.php?post=' . $footer->ID . '&action=edit' )
                )
            );
        }

        if ( ! $footer )
        {
            $wp_admin_bar->add_node(
                array(
                    'id'     => 'theme-edit-footer',
                    'title'  => __( 'New footer' ),
                    'parent' => 'edit',
                    'href'   => admin_url( 'post-new.php?post_type=theme_footer' )
                )
            );
        }
    },
    999
);