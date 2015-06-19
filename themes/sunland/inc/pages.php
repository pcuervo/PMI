<?php


// CUSTOM PAGES //////////////////////////////////////////////////////////////////////


	add_action('init', function(){

		// INFO FOR HOME
		if( ! get_page_by_path('info-home') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'La más alta calidad',
				'post_name'   => 'info-home',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}
		
	});
