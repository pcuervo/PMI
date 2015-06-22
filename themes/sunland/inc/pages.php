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

		if( ! get_page_by_path('duo_rages_constructio') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Duo Rage Constructio',
				'post_name'   => 'duo_rages_constructio',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}
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

		if( ! get_page_by_path('services') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Services',
				'post_name'   => 'services',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

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
