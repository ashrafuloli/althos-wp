<?php


/**
 * Register Widgets Area.
 */
function althos_widgets_init()
{
	// blog sidebar
	register_sidebar(array(
		'name' => esc_html__('Sidebar', 'althos'),
		'id' => 'blog-sidebar',
		'before_widget' => '<div id="%1$s" class="widget mb-30 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget_title"><h5>',
		'after_title' => '</h5></div>',

	));
}

add_action('widgets_init', 'althos_widgets_init');