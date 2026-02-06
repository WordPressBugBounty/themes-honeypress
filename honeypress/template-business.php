<?php 
// Template Name: Business Template
	get_header();

	if ( function_exists( 'spiceb_honeypress_slider' ) ) {
		spiceb_honeypress_slider();
	}
	//editor content
	if( get_theme_mod('gutenberg_editor_section_enable','on') == 'on'){
		the_content();
		honeypress_edit_link();
	}

	if (function_exists('spiceb_honeypress_service')) {
	 	spiceb_honeypress_service();
	}

    if (function_exists('spiceb_honeypress_testimonial')) {
	 	spiceb_honeypress_testimonial();
	}

	get_template_part('index','news');

    get_footer();	