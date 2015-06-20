<?php


/*------------------------------------*\
	CUSTOM PAGES
\*------------------------------------*/



	add_action('init', function(){

		// PRODUCTOS
		if( ! get_page_by_path('productos') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Productos',
				'post_name'   => 'productos',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// SERVICIOS
		if( ! get_page_by_path('servicios') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Servicios',
				'post_name'   => 'servicios',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// NOSOTROS
		if( ! get_page_by_path('nosotros') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Nosotros',
				'post_name'   => 'nosotros',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// CONTACTO
		if( ! get_page_by_path('contacto') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Contacto',
				'post_name'   => 'contacto',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}
		
	});
