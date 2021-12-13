<?php
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

$show_admin_bar = get_field('adminbar', 'option');

if (!is_user_logged_in() || isset($show_admin_bar) && $show_admin_bar == FALSE){
	add_filter('show_admin_bar', '__return_false');
}

add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );
function load_custom_wp_admin_style(){
    wp_enqueue_style( 'admin_css', get_bloginfo('template_directory'). '/core/admin/style-admin.css' );
}