<?php

define('althos_THEME_DIR', get_template_directory());
define('althos_THEME_URI', get_template_directory_uri());
define('althos_THEME_CSS_DIR', althos_THEME_URI . '/assets/css/');
define('althos_THEME_JS_DIR', althos_THEME_URI . '/assets/js/');
define('althos_THEME_INC', althos_THEME_DIR . '/inc/');

// Implement the Theme Assets.
require althos_THEME_INC . 'althos-assets.php';

// Implement the Theme Widgets.
require althos_THEME_INC . 'althos-widgets.php';

// Implement the Theme Setup.
require althos_THEME_INC . 'althos-setup.php';

// Theme require Plugins
require althos_THEME_INC . 'class-tgm-plugin-activation.php';
require althos_THEME_INC . 'add-plugin.php';

// initialize kirki customizer class.
include_once althos_THEME_INC . 'kirki-customizer.php';
include_once althos_THEME_INC . 'althos-kirki.php';

// initialize navwalker
include_once althos_THEME_INC . 'class-navwalker.php';

// initialize breadcrumb
include_once althos_THEME_INC . 'class-breadcrumb.php';

// Custom template helper function for this theme
require althos_THEME_INC . 'template-helper.php';

/**
 * wp body open
 */
if (!function_exists('wp_body_open')) {
    function wp_body_open()
    {
        do_action('wp_body_open');
    }
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function althos_content_width()
{
    // This variable is intended to be overruled from themes.
    $GLOBALS['content_width'] = apply_filters('althos_content_width', 640);
}

add_action('after_setup_theme', 'althos_content_width', 0);


function my_myme_types($mime_types)
{
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    $mime_types['psd'] = 'image/vnd.adobe.photoshop'; //Adding photoshop files
    return $mime_types;
}

add_filter('upload_mimes', 'my_myme_types', 1, 1);


add_action('elementor/frontend/after_register_styles', function () {
    foreach (['solid', 'regular', 'brands'] as $style) {
        wp_deregister_style('elementor-icons-fa-' . $style);
    }
}, 20);


// custom fields

if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_61ccd3f41ece3',
        'title' => 'Offer Content',
        'fields' => array(
            array(
                'key' => 'field_61ccd40522b61',
                'label' => 'Content Col 1 Text 1',
                'name' => 'content_col_1_text_1',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
            array(
                'key' => 'field_61ccd46722b62',
                'label' => 'Content Col 1 Text 2',
                'name' => 'content_col_1_text_2',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
            array(
                'key' => 'field_61ccd4950c0ce',
                'label' => 'Content Col 2 Text 1',
                'name' => 'content_col_2_text_1',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
            array(
                'key' => 'field_61ccd49f0c0cf',
                'label' => 'Content Col 2 Text 2',
                'name' => 'content_col_2_text_2',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
            array(
                'key' => 'field_61ccd4cf0c0d3',
                'label' => 'Content Col 3 Text 1',
                'name' => 'content_col_3_text_1',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
            array(
                'key' => 'field_61ccd4c90c0d2',
                'label' => 'Content Col 3 Text 2',
                'name' => 'content_col_3_text_2',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'offer',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));

    acf_add_local_field_group(array(
        'key' => 'group_61ccd379a6f52',
        'title' => 'Offer Category',
        'fields' => array(
            array(
                'key' => 'field_61ccd3aa6e424',
                'label' => 'Cat Image 1',
                'name' => 'cat_image_1',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'id',
                'preview_size' => 'large',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_61ccd3d86e425',
                'label' => 'Cat Image 2',
                'name' => 'cat_image_2',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'id',
                'preview_size' => 'large',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'offer_category',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));

    acf_add_local_field_group(array(
        'key' => 'group_61cccacfb0ec7',
        'title' => 'Videos',
        'fields' => array(
            array(
                'key' => 'field_61cccad7ab7aa',
                'label' => 'Video Url',
                'name' => 'video_url',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'althos_video',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));

    acf_add_local_field_group(array(
        'key' => 'group_61ccc2f81c074',
        'title' => 'Testimonial',
        'fields' => array(
            array(
                'key' => 'field_61ccc3060fa28',
                'label' => 'Author Desc',
                'name' => 'author_desc',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'testimonial',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));

endif;


// cpt ui

function cptui_register_my_cpts()
{

    /**
     * Post Type: Testimonials.
     */

    $labels = [
        "name" => __("Testimonials", "althos"),
        "singular_name" => __("Testimonials", "althos"),
    ];

    $args = [
        "label" => __("Testimonials", "althos"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "rewrite" => ["slug" => "testimonial", "with_front" => true],
        "query_var" => true,
        "menu_position" => 10,
        "supports" => ["title", "editor", "thumbnail"],
        "taxonomies" => ["offer_category"],
        "show_in_graphql" => false,
    ];

    register_post_type("testimonial", $args);

    /**
     * Post Type: Althos Videos.
     */

    $labels = [
        "name" => __("Althos Videos", "althos"),
        "singular_name" => __("Althos Video", "althos"),
    ];

    $args = [
        "label" => __("Althos Videos", "althos"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => ["slug" => "althos_video", "with_front" => true],
        "query_var" => true,
        "menu_position" => 10,
        "supports" => ["title", "editor", "thumbnail"],
        "show_in_graphql" => false,
    ];

    register_post_type("althos_video", $args);

    /**
     * Post Type: Offers.
     */

    $labels = [
        "name" => __("Offers", "althos"),
        "singular_name" => __("Offer", "althos"),
    ];

    $args = [
        "label" => __("Offers", "althos"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "rewrite" => ["slug" => "offer", "with_front" => true],
        "query_var" => true,
        "menu_position" => 10,
        "supports" => ["title", "editor", "thumbnail"],
        "taxonomies" => ["category"],
        "show_in_graphql" => false,
    ];

    register_post_type("offer", $args);
}

add_action('init', 'cptui_register_my_cpts');

function cptui_register_my_taxes() {

    /**
     * Taxonomy: Offer Categories.
     */

    $labels = [
        "name" => __( "Offer Categories", "althos" ),
        "singular_name" => __( "Offer Category", "althos" ),
    ];


    $args = [
        "label" => __( "Offer Categories", "althos" ),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [ 'slug' => 'offer_category', 'with_front' => true, ],
        "show_admin_column" => true,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "offer_category",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy( "offer_category", [ "offer" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );




