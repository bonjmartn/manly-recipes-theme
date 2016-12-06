<?php

function create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

function aboutbox_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '<div class="aboutbox">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

function footer_widgets( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="footer-widget-title">',
		'after_title' => '</h3>'
	));
}

function social_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '<div class="social-icons">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="footer-widget-title">',
		'after_title' => '</h3>'
	));
}

function social_widget_footer( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '<div class="footer-social">',
		'after_widget' => '</div>',
	));
}

// Homepage Widgets

aboutbox_widget( 'About Box', 'about-box', 'Displays on the homepage under the carousel' );
social_widget( 'Social Media Icons', 'social-icons', 'Displays on the homepage under the About Box' );

// Create Widget areas for Pages and Blog Posts

create_widget( 'Page Sidebar', 'page', 'Displays on the side of pages' );
create_widget( 'Blog Sidebar', 'blog', 'Displays on the right of blog posts' );

// Social Icons Footer Widget

social_widget_footer( 'Social Icons Footer', 'social-icons-footer', 'Social icons that display in the footer. If you dont want to show one of the icons, leave the URL field blank.' );

// Create Widget areas for Footer

footer_widgets( 'Footer 1', 'footer-1', 'Displays first in the footer' );
footer_widgets( 'Footer 2', 'footer-2', 'Displays second in the footer' );
footer_widgets( 'Footer 3', 'footer-3', 'Displays third in the footer' );
footer_widgets( 'Footer 4', 'footer-4', 'Displays fourth in the footer.' );

?>