<?php
/**
 * althos customizer
 *
 * @package althos
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


/**
 * Added Panels & Sections
 */
function althos_customizer_panels_sections($wp_customize)
{

    //Add panel
    $wp_customize->add_panel('althos_customizer', array(
        'priority' => 10,
        'title' => esc_html__('althos Customizer', 'althos'),
    ));


    /**
     * Customizer Section
     */

    $wp_customize->add_section('section_header_logo', array(
        'title' => esc_html__('Header Setting', 'althos'),
        'description' => '',
        'priority' => 12,
        'capability' => 'edit_theme_options',
        'panel' => 'althos_customizer',
    ));

//	$wp_customize->add_section('blog_setting', array(
//        'title'       => esc_html__( 'Blog Setting', 'althos' ),
//        'description' => '',
//        'priority'    => 13,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'althos_customizer',
//    ));
//
//    $wp_customize->add_section('header_side_setting', array(
//        'title'       => esc_html__( 'Side Info', 'althos' ),
//        'description' => '',
//        'priority'    => 14,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'althos_customizer',
//    ));

    $wp_customize->add_section('breadcrumb_setting', array(
        'title' => esc_html__('Breadcrumb Setting', 'althos'),
        'description' => '',
        'priority' => 15,
        'capability' => 'edit_theme_options',
        'panel' => 'althos_customizer',
    ));

//    $wp_customize->add_section('blog_setting', array(
//        'title'       => esc_html__( 'Blog Setting', 'althos' ),
//        'description' => '',
//        'priority'    => 16,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'althos_customizer',
//    ));

    $wp_customize->add_section('footer_social', array(
        'title' => esc_html__('Footer Social', 'althos'),
        'description' => '',
        'priority' => 15,
        'capability' => 'edit_theme_options',
        'panel' => 'althos_customizer',
    ));

    $wp_customize->add_section('footer_setting', array(
        'title' => esc_html__('Footer Settings', 'althos'),
        'description' => '',
        'priority' => 16,
        'capability' => 'edit_theme_options',
        'panel' => 'althos_customizer',
    ));

//    $wp_customize->add_section('color_setting', array(
//        'title'       => esc_html__( 'Color Setting', 'althos' ),
//        'description' => '',
//        'priority'    => 17,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'althos_customizer',
//    ));
//
//    $wp_customize->add_section('404_page', array(
//        'title'       => esc_html__( '404 Page', 'althos' ),
//        'description' => '',
//        'priority'    => 18,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'althos_customizer',
//    ));
//
//    $wp_customize->add_section('rtl_setting', array(
//        'title'       => esc_html__( 'RTL Setting', 'althos' ),
//        'description' => '',
//        'priority'    => 18,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'althos_customizer',
//    ));

}

add_action('customize_register', 'althos_customizer_panels_sections');


/*
Footer Social
 */
function _footer_social_fields($fields)
{
    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_facebook_url',
        'label' => esc_html__('Facebook Url', 'althos'),
        'section' => 'footer_social',
        'default' => esc_html__('#', 'althos'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_twitter_url',
        'label' => esc_html__('Twitter Url', 'althos'),
        'section' => 'footer_social',
        'default' => esc_html__('#', 'althos'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_instagram_url',
        'label' => esc_html__('Instagram Url', 'althos'),
        'section' => 'footer_social',
        'default' => esc_html__('#', 'althos'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_youtube_url',
        'label' => esc_html__('Youtube Url', 'althos'),
        'section' => 'footer_social',
        'default' => esc_html__('#', 'althos'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_linkedin_url',
        'label' => esc_html__('Linkedin Url', 'althos'),
        'section' => 'footer_social',
        'default' => esc_html__('#', 'althos'),
        'priority' => 10,
    );

    return $fields;
}

add_filter('kirki/fields', '_footer_social_fields');

/*
Header Settings
 */
function _header_header_fields($fields)
{

    $fields[] = array(
        'type' => 'image',
        'settings' => 'logo',
        'label' => esc_html__('Header Logo', 'althos'),
        'description' => esc_html__('Upload Your Logo.', 'althos'),
        'section' => 'section_header_logo',
        'default' => get_template_directory_uri() . '/assets/img/logo/logo.png'
    );

    $fields[] = array(
        'type' => 'image',
        'settings' => 'secondary_logo',
        'label' => esc_html__('Header Second Logo', 'althos'),
        'description' => esc_html__('Header Black Logo', 'althos'),
        'section' => 'section_header_logo',
        'default' => get_template_directory_uri() . '/assets/img/logo/logo.png'
    );

    $fields[] = array(
        'type' => 'image',
        'settings' => 'favicon_url',
        'label' => esc_html__('Favicon', 'althos'),
        'description' => esc_html__('Favicon Icon', 'althos'),
        'section' => 'section_header_logo',
        'default' => get_template_directory_uri() . '/assets/img/logo/favicon.png'
    );

    $fields[] = array(
        'type' => 'switch',
        'settings' => 'althos_header_right',
        'label' => esc_html__('Header Button On/Off', 'althos'),
        'section' => 'section_header_logo',
        'default' => '1',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'althos'),
            'off' => esc_html__('Disable', 'althos'),
        ],
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_header_text',
        'label' => esc_html__('Button Text', 'althos'),
        'section' => 'section_header_logo',
        'default' => esc_html__('Mon espace', 'althos'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_header_text_2',
        'label' => esc_html__('Button Text', 'althos'),
        'section' => 'section_header_logo',
        'default' => esc_html__('Rejoindre le club', 'althos'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_header_link',
        'label' => esc_html__('Button Link', 'althos'),
        'section' => 'section_header_logo',
        'default' => '#',
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_header_num',
        'label' => esc_html__('Number Text', 'althos'),
        'section' => 'section_header_logo',
        'default' => esc_html__('01 44 95 08 72', 'althos'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_header_num_link',
        'label' => esc_html__('Number Link', 'althos'),
        'section' => 'section_header_logo',
        'default' => 'tel:0144950872',
        'priority' => 10,
    );

    return $fields;
}

add_filter('kirki/fields', '_header_header_fields');

/*
Header Side Info
 */
function _header_side_fields($fields)
{
    // side info settings 
    $fields[] = array(
        'type' => 'switch',
        'settings' => 'althos_hamburger_hide',
        'label' => esc_html__('Show Hamburger On/Off', 'althos'),
        'section' => 'header_side_setting',
        'default' => '1',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'althos'),
            'off' => esc_html__('Disable', 'althos'),
        ],
    );
    $fields[] = array(
        'type' => 'image',
        'settings' => 'althos_extra_info_logo',
        'label' => esc_html__('Logo Side', 'althos'),
        'description' => esc_html__('Logo Side', 'althos'),
        'section' => 'header_side_setting',
        'default' => get_template_directory_uri() . '/assets/img/logo/logo-white.png'
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_extra_about_title',
        'label' => esc_html__('About Us Title', 'althos'),
        'section' => 'header_side_setting',
        'default' => esc_html__('About Us Title', 'althos'),
        'priority' => 10,
    );
    $fields[] = array(
        'type' => 'textarea',
        'settings' => 'althos_extra_about_text',
        'label' => esc_html__('About Us Desc..', 'althos'),
        'section' => 'header_side_setting',
        'default' => esc_html__('About Us Desc...', 'althos'),
        'priority' => 10,
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_extra_button',
        'label' => esc_html__('Button Text', 'althos'),
        'section' => 'header_side_setting',
        'default' => esc_html__('Contact Us', 'althos'),
        'priority' => 10,
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_extra_button_url',
        'label' => esc_html__('Button URL', 'althos'),
        'section' => 'header_side_setting',
        'default' => esc_html__('#', 'althos'),
        'priority' => 10,
    );
    // contact   
    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_contact_title',
        'label' => esc_html__('Contact Title', 'althos'),
        'section' => 'header_side_setting',
        'default' => esc_html__('Contact Title', 'althos'),
        'priority' => 10,
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_extra_address',
        'label' => esc_html__('Office Address', 'althos'),
        'section' => 'header_side_setting',
        'default' => esc_html__('123/A, Miranda City Likaoli Prikano, Dope United States', 'althos'),
        'priority' => 10,
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_extra_phone',
        'label' => esc_html__('Phone Number', 'althos'),
        'section' => 'header_side_setting',
        'default' => esc_html__('+0989 7876 9865 9', 'althos'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_extra_email',
        'label' => esc_html__('Email ID', 'althos'),
        'section' => 'header_side_setting',
        'default' => esc_html__('info@basictheme.net', 'althos'),
        'priority' => 10,
    );
    return $fields;
}

add_filter('kirki/fields', '_header_side_fields');

/*
_header_page_title_fields
 */
function _header_page_title_fields($fields)
{
    // Breadcrumb Setting 
    $fields[] = array(
        'type' => 'image',
        'settings' => 'breadcrumb_bg_img',
        'label' => esc_html__('Breadcrumb Background Image', 'althos'),
        'description' => esc_html__('Breadcrumb Background Image', 'althos'),
        'section' => 'breadcrumb_setting',
        'default' => get_template_directory_uri() . '/assets/img/bg/page-title-bg.jpg'
    );
    return $fields;
}

add_filter('kirki/fields', '_header_page_title_fields');

/*
Header Social
 */
function _header_blog_fields($fields)
{
// Blog Setting
    $fields[] = array(
        'type' => 'switch',
        'settings' => 'althos_blog_btn_switch',
        'label' => esc_html__('Blog BTN On/Off', 'althos'),
        'section' => 'blog_setting',
        'default' => '1',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'althos'),
            'off' => esc_html__('Disable', 'althos'),
        ],
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_blog_btn',
        'label' => esc_html__('Blog Button text', 'althos'),
        'section' => 'blog_setting',
        'default' => esc_html__('Read More', 'althos'),
        'priority' => 10,
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_blog_btn_rtl',
        'label' => esc_html__('Blog Button text rtl', 'althos'),
        'section' => 'blog_setting',
        'default' => esc_html__('Read More', 'althos'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label' => esc_html__('Blog Title', 'althos'),
        'section' => 'blog_setting',
        'default' => esc_html__('Blog', 'althos'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'breadcrumb_blog_title_details',
        'label' => esc_html__('Blog Details Title', 'althos'),
        'section' => 'blog_setting',
        'default' => esc_html__('Blog Details', 'althos'),
        'priority' => 10,
    );
    return $fields;
}

add_filter('kirki/fields', '_header_blog_fields');

/*
Footer
 */
function _header_footer_fields($fields)
{

    $fields[] = array(
        'type' => 'image',
        'settings' => 'althos_footer_logo',
        'label' => esc_html__('Footer Logo.', 'althos'),
        'description' => esc_html__('Footer Logo.', 'althos'),
        'section' => 'footer_setting',
        'default' => get_template_directory_uri() . '/assets/img/logo/logo.png'
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_contact_text',
        'label' => esc_html__('Contact Text', 'althos'),
        'section' => 'footer_setting',
        'default' => esc_html__('Contact Us', 'althos'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_contact_link',
        'label' => esc_html__('Contact Link', 'althos'),
        'section' => 'footer_setting',
        'default' => '#',
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'repeater',
        'settings' => 'althos_footer_contact_info',
        'label' => esc_html__('Info', 'althos'),
        'section' => 'footer_setting',
        'priority' => 10,
        'row_label' => [
            'type' => 'field',
            'value' => esc_html__('Contact Info', 'althos'),
//			'field' => 'info_text',
        ],
        'button_label' => esc_html__('"Add new" info ', 'althos'),
        'default' => [
            [
                'info_title' => 'Urbana',
                'info_desc' => '1007 W Nevada St,<br> Urbana, IL 61801',
                'info_number' => '(217) 333-3340',
            ],
            [
                'info_title' => 'Chicago',
                'info_desc' => '1007 W Nevada St,<br> Urbana, IL 61801',
                'info_number' => '(217) 333-3340',
            ],
            [
                'info_title' => 'Springfield',
                'info_desc' => '1007 W Nevada St,<br> Urbana, IL 61801',
                'info_number' => '(217) 333-3340',
            ],
        ],
        'fields' => [
            'info_title' => [
                'type' => 'text',
                'label' => esc_html__('Info Title', 'althos'),
                'default' => '',
            ],
            'info_desc' => [
                'type' => 'textarea',
                'label' => esc_html__('Info Description', 'althos'),
                'default' => '',
            ],
            'info_number' => [
                'type' => 'text',
                'label' => esc_html__('Info Number', 'althos'),
                'default' => '',
            ],
        ]
    );

    $fields[] = array(
        'type' => 'switch',
        'settings' => 'althos_footer_social',
        'label' => esc_html__('Footer Social On/Off', 'althos'),
        'section' => 'footer_setting',
        'default' => '1',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'althos'),
            'off' => esc_html__('Disable', 'althos'),
        ],
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_social_title',
        'label' => esc_html__('Social Title', 'althos'),
        'section' => 'footer_setting',
        'default' => esc_html__('Follow IGPA', 'althos'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_social_btn_text',
        'label' => esc_html__('Social Btn Text', 'althos'),
        'section' => 'footer_setting',
        'default' => esc_html__('All Social Media', 'althos'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_social_btn_link',
        'label' => esc_html__('Social Btn Link', 'althos'),
        'section' => 'footer_setting',
        'default' => '#',
        'priority' => 10,
    );


    $fields[] = array(
        'type' => 'textarea',
        'settings' => 'althos_copyright',
        'label' => esc_html__('Copy Right', 'althos'),
        'section' => 'footer_setting',
        'default' => esc_html__('Althos Patrimoine © 2021', 'althos'),
        'priority' => 10,
    );

    return $fields;
}

add_filter('kirki/fields', '_header_footer_fields');

// color
function althos_color_fields($fields)
{
    // Color Settings
    $fields[] = array(
        'type' => 'color',
        'settings' => 'althos_color_option',
        'label' => __('Theme Color', 'althos'),
        'description' => esc_html__('This is a Theme color control.', 'althos'),
        'section' => 'color_setting',
        'default' => '#ff5e14',
        'priority' => 10,
    );
    $fields[] = array(
        'type' => 'color',
        'settings' => 'althos_header_bg_color',
        'label' => __('THeader BG Color', 'althos'),
        'description' => esc_html__('This is a Header bg color control.', 'althos'),
        'section' => 'color_setting',
        'default' => '#00235A',
        'priority' => 10,
    );
    return $fields;
}

add_filter('kirki/fields', 'althos_color_fields');

// 404 
function althos_404_fields($fields)
{
    // 404 settings
    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_error_404_text',
        'label' => esc_html__('400 Text', 'althos'),
        'section' => '404_page',
        'default' => esc_html__('404', 'althos'),
        'priority' => 10,
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_error_title',
        'label' => esc_html__('Not Found Title', 'althos'),
        'section' => '404_page',
        'default' => esc_html__('Page not found', 'althos'),
        'priority' => 10,
    );
    $fields[] = array(
        'type' => 'textarea',
        'settings' => 'althos_error_desc',
        'label' => esc_html__('404 Description Text', 'althos'),
        'section' => '404_page',
        'default' => esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted', 'althos'),
        'priority' => 10,
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'althos_error_link_text',
        'label' => esc_html__('404 Link Text', 'althos'),
        'section' => '404_page',
        'default' => esc_html__('Back To Home', 'althos'),
        'priority' => 10,
    );
    return $fields;

}

add_filter('kirki/fields', 'althos_404_fields');

/**
 * Added Fields
 */
function althos_rtl_fields($fields)
{
    // rtl settings
    $fields[] = array(
        'type' => 'switch',
        'settings' => 'rtl_switch',
        'label' => esc_html__('RTL On/Off', 'althos'),
        'section' => 'rtl_setting',
        'default' => '0',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'althos'),
            'off' => esc_html__('Disable', 'althos'),
        ],
    );
    return $fields;
}

add_filter('kirki/fields', 'althos_rtl_fields');


/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function althos_theme_option($name)
{
    $value = '';
    if (class_exists('althos'))
        $value = Kirki::get_option(althos_get_theme(), $name);

    return apply_filters('althos_theme_option', $value, $name);
}

/**
 * Get config ID
 *
 * @return string
 */
function althos_get_theme()
{
    return 'althos';
}