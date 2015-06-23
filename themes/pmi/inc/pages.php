<?php


/*------------------------------------*\
	CUSTOM PAGES
\*------------------------------------*/



	add_action('init', function(){

		// HOME
		if( ! get_page_by_path('inicio') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Inicio',
				'post_name'   => 'inicio',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// BLOG
		if( ! get_page_by_path('blog') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Blog',
				'post_name'   => 'blog',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// PRODUCTS
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

		// SERVICES
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

		// ABOUT US
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

		// CONTACT
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

	    // Duo Rages Constructio
		if( ! get_page_by_path('duo_rages_constructio') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Duo Rages Constructio',
				'post_name'   => 'duo_rages_constructio',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		 // Quae Probabilia Videantur
		if( ! get_page_by_path('quae_probabilia_videantur') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Quae Probabilia Videantur',
				'post_name'   => 'quae_probabilia_videantur',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		 // Asesoria comercial
		if( ! get_page_by_path('asesoria_comercial') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Asesoria comercial',
				'post_name'   => 'asesoria_comercial',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		 // Importacion y exportacion
		if( ! get_page_by_path('importacion_y_exportacion') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Importacion y exportacion',
				'post_name'   => 'importacion_y_exportacion',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

	
	});
