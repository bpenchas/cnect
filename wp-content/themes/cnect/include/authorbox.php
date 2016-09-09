<?php
	function author_box_init() {
	    wp_enqueue_script('jquery');
	    wp_enqueue_script(
	        'responsive',
	        // get_stylesheet_directory_uri() . '/responsive.js?' . time(),
	        get_stylesheet_directory_uri() . '/responsive.js'
	        // array( 'jquery' )

	    );
	}