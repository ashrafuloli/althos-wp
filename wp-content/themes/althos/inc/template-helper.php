<?php

/**
 * favicon logo
 */
function althos_favicon()
{
    $althos_favicon = get_template_directory_uri() . '/assets/img/logo/favicon.png';
    $althos_favicon_url = get_theme_mod('favicon_url', $althos_favicon);
    ?>
    <link rel="shortcut icon" type="image/x-icon" href="<?php print esc_url($althos_favicon_url); ?>">
    <?php
}

add_action('wp_head', 'althos_favicon');

/**
 * header logo
 */
function althos_header_logo()
{
    ?>
    <?php
    $althos_logo_on = function_exists('get_field') ? get_field('is_enable_sec_logo') : null;
    $althos_logo = get_template_directory_uri() . '/assets/img/logo/logo.png';
    $althos_logo_white = get_template_directory_uri() . '/assets/img/logo/logo.png';

    $althos_customizer_logo = get_theme_mod('logo', $althos_logo);
    $althos_secondary_logo = get_theme_mod('secondary_logo', $althos_logo_white);

    $althos_page_logo = function_exists('get_field') ? get_field('althos_page_logo') : '';
    $althos_site_logo = !empty($althos_page_logo['url']) ? $althos_page_logo['url'] : $althos_customizer_logo;
    ?>

    <?php
    if (has_custom_logo()) {
        the_custom_logo();
    } else {

        if (!empty($althos_logo_on)) { ?>
            <a class="standard-logo-white" href="<?php print esc_url(home_url('/')); ?>">
                <img src="<?php print esc_url($althos_secondary_logo); ?>"
                     alt="<?php print esc_attr('logo', 'althos'); ?>"/>
            </a>
            <?php
        } else { ?>
            <a class="standard-logo" href="<?php print esc_url(home_url('/')); ?>">
                <img src="<?php print esc_url($althos_site_logo); ?>"
                     alt="<?php print esc_attr('logo', 'althos'); ?>"/>
            </a>
            <?php
        }
    }
    ?>
    <?php
}

/**
 * pagination
 */
if (!function_exists('althos_pagination')) {

    function _althos_pagi_callback($pagination)
    {
        return $pagination;
    }

    //page navigation
    function althos_pagination($prev, $next, $pages, $args)
    {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if (!$pages) {
                $pages = 1;
            }
        }

        $pagination = array(
            'base' => add_query_arg('paged', '%#%'),
            'format' => '',
            'total' => $pages,
            'current' => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type' => 'array'
        );

        //rewrite permalinks
        if ($wp_rewrite->using_permalinks()) {
            $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');
        }

        if (!empty($wp_query->query_vars['s'])) {
            $pagination['add_args'] = array('s' => get_query_var('s'));
        }

        $pagi = '';
        if (paginate_links($pagination) != '') {
            $paginations = paginate_links($pagination);
            $pagi .= '<ul>';
            foreach ($paginations as $key => $pg) {
                $pagi .= '<li>' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _althos_pagi_callback($pagi);
    }
}


function althos_check_header()
{
    $header_style = get_post_meta(get_the_ID(), 'header_style', true);
    if ($header_style == 'header_style_1') {
        althos_header_style();
    } else {
        althos_header_style();
    }
}

add_action('althos_header_style', 'althos_check_header', 10);

/**
 * header style
 */

function althos_header_style()
{
    $althos_header_right = get_theme_mod('althos_header_right', true);
    $althos_header_num = get_theme_mod('althos_header_num', '01 44 95 08 72');
    $althos_header_num_link = get_theme_mod('althos_header_num_link', 'tel:0144950872');
    $althos_header_text = get_theme_mod('althos_header_text', 'Mon espace');
    $althos_header_text_2 = get_theme_mod('althos_header_text_2', 'Rejoindre le club');
    $althos_header_link = get_theme_mod('althos_header_link', '#');
    ?>
    <header class="header-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-5">
                    <div class="logo">
                        <?php althos_header_logo(); ?>
                    </div>
                </div>
                <div class="col-xxl-10 col-xl-10  d-xl-flex d-none justify-content-between align-items-center">
                    <div class="main-menu-wrapper">
                        <?php althos_header_menu(); ?>
                    </div>
                    <?php if (!empty($althos_header_right)): ?>
                        <div class="header-right">
                            <?php if (!empty($althos_header_text)): ?>
                                <a href="<?php echo esc_url($althos_header_link) ?>" class="header-btn">
                                    <span class="normal"><?php echo $althos_header_text; ?></span>
                                    <span class="stycky"><?php echo $althos_header_text_2; ?></span>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-10 col-md-9 col-7 text-end d-block d-xl-none">
                    <?php if (!empty($althos_header_right)): ?>
                        <div class="header-right">
                            <?php if (!empty($althos_header_text)): ?>
                                <a href="<?php echo esc_url($althos_header_link) ?>" class="header-btn">
                                    <?php echo $althos_header_text; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="open-mobile-menu">
                        <a href="#"><i class="fal fa-bars"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <aside class="slide-bar">
        <div class="close-mobile-menu">
            <a href="javascript:void(0);"><i class="fas fa-times"></i></a>
        </div>
        <?php althos_mobile_menu(); ?>
        <div class="sidebar-btns">
            <?php if (!empty($althos_header_num)): ?>
                <a href="<?php echo $althos_header_num_link; ?>" class="num">
                    <?php echo $althos_header_num ?>
                </a>
            <?php endif; ?>
            <?php if (!empty($althos_header_text)): ?>
                <a href="<?php echo esc_url($althos_header_link) ?>" class="header-btn">
                    <?php echo $althos_header_text; ?>
                </a>
            <?php endif; ?>
        </div>
    </aside>
    <div class="body-overlay"></div>
    <?php
}


/**
 * althos_header_menu description
 */
function althos_header_menu()
{
    $althos_menu = wp_nav_menu(array(
        'theme_location' => 'main-menu',
        'menu_class' => '',
        'container' => 'div',
        'container_class' => 'main-menu',
        'fallback_cb' => 'Navwalker_Class::fallback',
        'walker' => new Navwalker_Class,
        'depth' => 2,
        'echo' => false
    ));

//	$althos_menu = str_replace("menu-item-has-children", "menu-item-has-children", $althos_menu);

    echo wp_kses_post($althos_menu);
}

/**
 * althos_top_left_menu description
 */
function althos_top_left_menu()
{
    $althos_menu = wp_nav_menu(array(
        'theme_location' => 'top-left-menu',
        'menu_class' => '',
        'container' => 'div',
        'container_class' => 'top-menu',
        'fallback_cb' => 'Navwalker_Class::fallback',
        'walker' => new Navwalker_Class,
        'depth' => 0,
        'echo' => false
    ));

//	$althos_menu = str_replace("menu-item-has-children", "menu-item-has-children", $althos_menu);

    echo wp_kses_post($althos_menu);
}


/**
 * althos_top_right_menu description
 */
function althos_top_right_menu()
{
    $althos_menu = wp_nav_menu(array(
        'theme_location' => 'top-right-menu',
        'menu_class' => '',
        'container' => 'div',
        'container_class' => 'top-menu',
        'fallback_cb' => 'Navwalker_Class::fallback',
        'walker' => new Navwalker_Class,
        'depth' => 0,
        'echo' => false
    ));

//	$althos_menu = str_replace("menu-item-has-children", "menu-item-has-children", $althos_menu);

    echo wp_kses_post($althos_menu);
}


/**
 * althos_mobile_menu description
 */
function althos_mobile_menu()
{
    $althos_menu = wp_nav_menu(array(
        'theme_location' => 'main-menu',
        'menu_id' => 'mobile-menu-active',
        'container' => 'nav',
        'container_class' => 'side-mobile-menu',
        'depth' => 2,
        'echo' => false
    ));

    $althos_menu = str_replace("menu-item-has-children", "menu-item-has-children has-dropdown", $althos_menu);

    echo wp_kses_post($althos_menu);
}


/**
 * althos_breadcrumb_callback
 * @return string
 */
function althos_breadcrumb_callback()
{
    $args = array(
        'show_browse' => false,
        'post_taxonomy' => array('product' => 'product_cat')
    );
    $breadcrumb = new Breadcrumb_Class($args);

    return $breadcrumb->trail();
}


/**
 * althos_breadcrumb_func
 */
function althos_breadcrumb_func()
{

    $breadcrumb_class = '';
    $breadcrumb_show = 1;

    if (is_front_page() && is_home()) {
        $title = get_theme_mod('breadcrumb_blog_title', esc_html__('Blog', 'althos'));
        $breadcrumb_class = 'home_front_page';

    } elseif (is_front_page()) {
        $title = get_theme_mod('breadcrumb_blog_title', esc_html__('Blog', 'althos'));
//		$breadcrumb_show = 0;
    } elseif (is_home()) {
        if (get_option('page_for_posts')) {
            $title = get_the_title(get_option('page_for_posts'));
        }
    } elseif (is_single() && 'post' == get_post_type()) {
        $title = get_the_title();
    } elseif (is_single() && 'product' == get_post_type()) {
        $title = get_theme_mod('breadcrumb_product_details', esc_html__('Shop', 'althos'));
    } elseif (is_single() && 'althos-department' == get_post_type()) {
        if (rtl_enable()) {
            $title = get_theme_mod('breadcrumb_department_details_rtl', esc_html__('Department', 'althos'));
        } else {
            $title = get_theme_mod('breadcrumb_department_details', esc_html__('Department', 'althos'));
        }

    } elseif (is_single() && 'althos-doctor' == get_post_type()) {
        if (rtl_enable()) {
            $title = get_theme_mod('breadcrumb_doctor_details_rtl', esc_html__('Doctor', 'althos'));
        } else {
            $title = get_theme_mod('breadcrumb_doctor_details', esc_html__('Doctor', 'althos'));
        }

    } elseif (is_single() && 'althos-case_study' == get_post_type()) {
        if (rtl_enable()) {
            $title = get_theme_mod('breadcrumb_case_study_details_rtl', esc_html__('Gallery', 'althos'));
        } else {
            $title = get_theme_mod('breadcrumb_case_study_details', esc_html__('Gallery', 'althos'));
        }

    } elseif (is_search()) {
        $title = esc_html__('Search Results for : ', 'althos') . get_search_query();
    } elseif (is_404()) {
        $title = esc_html__('Page not Found', 'althos');
    } elseif (function_exists('is_woocommerce') && is_woocommerce()) {
        $title = get_theme_mod('breadcrumb_shop', esc_html__('Shop', 'althos'));
    } elseif (is_archive()) {
        $title = get_the_archive_title();
    } else {
        $title = get_the_title();
    }

    $is_breadcrumb = function_exists('get_field') ? get_field('is_it_invisible_breadcrumb') : '';

    if (empty($is_breadcrumb) && $breadcrumb_show == 1) {
        $bg_img_from_page = function_exists('get_field') ? get_field('breadcrumb_background_image') : '';
        $hide_bg_img = function_exists('get_field') ? get_field('hide_breadcrumb_background_image') : '';
        $back_title = function_exists('get_field') ? get_field('breadcrumb_back_title') : '';

        // get_theme_mod
        $bg_img = get_theme_mod('breadcrumb_bg_img');


        if ($hide_bg_img) {
            $bg_img = '';
        } else {
            $bg_img = !empty($bg_img_from_page) ? $bg_img_from_page['url'] : $bg_img;
        }
        if (!empty($bg_img)) {
            $breadcrumb_class .= ' page-title-overlay';
        }
        ?>

        <div class="page-title-area breadcrumb-bg breadcrumb-spacings <?php print esc_attr($breadcrumb_class); ?>"
             data-background="<?php print esc_attr($bg_img); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="page-title-wrapper">
                            <h3 class="breadcrumb-title">
                                <?php echo wp_kses_post($title); ?>
                            </h3>
                            <div class="breadcrumb-menu">
                                <?php althos_breadcrumb_callback(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

//add_action( 'althos_before_main_content', 'althos_breadcrumb_func' );


/**
 * althos_check_footer
 */
function althos_check_footer()
{
    althos_footer_style();
}

add_action('althos_footer_style', 'althos_check_footer', 10);

/**
 * footer  style 1
 */
function althos_footer_style()
{
    $althos_footer_social = get_theme_mod('althos_footer_social', true);
    $althos_contact_text = get_theme_mod('althos_contact_text', 'Contact Us');
    $althos_contact_link = get_theme_mod('althos_contact_link', '#');
    $althos_footer_social = get_theme_mod('althos_footer_social', true);
    $althos_social_title = get_theme_mod('althos_social_title', 'Follow IGPA');
    $althos_social_btn_text = get_theme_mod('althos_social_btn_text', 'All Social Media');
    $althos_social_btn_link = get_theme_mod('althos_social_btn_link', '#');
    ?>
    <footer class="footer-area pt-70 pb-70 pt-md-50 pb-md-30 pt-xs-50 pb-xs-30">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="footer-wrap">
                        <div class="f-logo">
                            <?php althos_footer_logo(); ?>
                        </div>
                        <p>
                            <?php althos_copyright_text(); ?>
                            <a href="#"><i class="fas fa-phone-alt"></i> 01 44 95 08 72</a>
                            <a href="#"><i class="fas fa-envelope"></i> contact@althos-patrimoine.com</a>
                            <a href="#">Mentions legales </a> <span class="divide">-</span> <a href="#">Protection des données</a>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/brand-4.png"
                                 alt="shape">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/brand-5.png"
                                 alt="shape">
                            <span>Suivez nous</span>
                            <span class="social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php
}

/**
 * copyright text
 */
function althos_copyright_text()
{
    print get_theme_mod('althos_copyright', esc_html__('Althos Patrimoine © 2021', 'althos'));
}

/**
 * althos_footer_menu
 */
function althos_footer_menu()
{
    $althos_menu = wp_nav_menu(array(
        'theme_location' => 'footer-menu',
        'menu_class' => '',
        'container' => 'div',
        'container_class' => 'footer-menu',
        'fallback_cb' => 'Navwalker_Class::fallback',
        'walker' => new Navwalker_Class,
        'depth' => 1,
        'echo' => false
    ));
    echo wp_kses_post($althos_menu);
}

/**
 * althos_widget_menu
 */
function althos_widget_menu()
{
    $althos_menu = wp_nav_menu(array(
        'theme_location' => 'widget-menu',
        'menu_class' => '',
        'container' => 'div',
        'container_class' => 'footer-widget-menu',
        'fallback_cb' => 'Navwalker_Class::fallback',
        'walker' => new Navwalker_Class,
        'depth' => 1,
        'echo' => false
    ));
    echo wp_kses_post($althos_menu);
}


/**
 * footer_social
 */
function footer_social()
{
    $althos_facebook_url = get_theme_mod('althos_facebook_url', '#');
    $althos_twitter_url = get_theme_mod('althos_twitter_url', '#');
    $althos_instagram_url = get_theme_mod('althos_instagram_url', '#');
    $althos_youtube_url = get_theme_mod('althos_youtube_url', '#');
    $althos_linkedin_url = get_theme_mod('althos_linkedin_url', '#');
    ?>
    <div class="social-link">
        <?php if (!empty($althos_facebook_url)): ?>
            <a href="<?php echo esc_url($althos_facebook_url); ?>">
                <i class="fab fa-facebook-f"></i>
            </a>
        <?php endif; ?>
        <?php if (!empty($althos_twitter_url)): ?>
            <a href="<?php echo esc_url($althos_twitter_url); ?>">
                <i class="fab fa-twitter"></i>
            </a>
        <?php endif; ?>
        <?php if (!empty($althos_instagram_url)): ?>
            <a href="<?php echo esc_url($althos_instagram_url); ?>">
                <i class="fab fa-instagram"></i>
            </a>
        <?php endif; ?>
        <?php if (!empty($althos_youtube_url)): ?>
            <a href="<?php echo esc_url($althos_youtube_url); ?>">
                <i class="fab fa-youtube"></i>
            </a>
        <?php endif; ?>
        <?php if (!empty($althos_linkedin_url)): ?>
            <a href="<?php echo esc_url($althos_linkedin_url); ?>">
                <i class="fab fa-linkedin-in"></i>
            </a>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * footer logo
 */
function althos_footer_logo()
{
    $althos_logo = get_template_directory_uri() . '/assets/img/logo/logo.png';
    $althos_footer_logo = get_theme_mod('althos_footer_logo', $althos_logo);
    ?>
    <a class="footer-logo" href="<?php print esc_url(home_url('/')); ?>">
        <img src="<?php print esc_url($althos_footer_logo); ?>"
             alt="<?php print esc_attr('logo', 'althos'); ?>"/>
    </a>
    <?php
}

/**
 * althos_get_tag
 */
function althos_get_tag()
{
    $html = '';
    if (has_tag()) {
        $html .= '<div class="blog-post-tag"><span>' . esc_html__('Post Tags', 'gocart') . '</span>';
        $html .= get_the_tag_list('', ' ', '');
        $html .= '</div>';
    }

    return $html;
}