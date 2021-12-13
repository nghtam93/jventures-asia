<?php
/**
 * Register Custom Post Type Service
 * @author Đoàn Nguyễn
 */
function product_post_type() {
    $labels = array(
        'name'                  => _x( 'J Ventures TV', 'J Ventures TV General Name', 'dntheme' ),
        'singular_name'         => _x( 'J Ventures TV', 'J Ventures TV Singular Name', 'dntheme' ),
        'menu_name'             => __( 'J Ventures TV', 'dntheme' ),
        'name_admin_bar'        => __( 'J Ventures TV', 'dntheme' ),
        'add_new_item'          => __( 'Thêm mới', 'dntheme' ),
        'add_new'               => __( 'Thêm mới', 'dntheme' ),
        'new_item'              => __( 'Thêm', 'dntheme' ),

    );

    $args = array(
        'label'                 => __( 'J Ventures TV', 'dntheme' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'thumbnail','editor','excerpt' ,'revisions' ),
        'public'                => true,
        'menu_position'         => 10,
        'can_export'            => true,
        'has_archive'           => true,
        'menu_icon' => 'dashicons-category',
        'rewrite' => array('slug' => 'j-ventures-tv','with_front' => false),
    );
    register_post_type( 'video', $args );

    $labels = array(
        'name'              => _x( 'Danh mục J Ventures TV', 'Taxonomy General Name', 'dntheme' ),
        'singular_name'     => _x( 'Danh mục J Ventures TV', 'Taxonomy Singular Name', 'dntheme' ),
        'menu_name'         => __( 'Danh mục', 'dntheme' ),
    );


    register_taxonomy( 'video_cat', 'video',
        array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_admin_column' =>true,
            'rewrite' => array( 'slug' => __('danh-muc-video') )
        )
    );
    flush_rewrite_rules();
}

add_action( 'init', 'product_post_type', 5 );