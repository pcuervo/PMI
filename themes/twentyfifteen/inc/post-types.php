<?php


// CUSTOM POST TYPES /////////////////////////////////////////////////////////////////


	add_action('init', function(){

		// FEATURES
		$labels = array(
			'name'          => 'Features',
			'singular_name' => 'Feature',
			'add_new'       => 'Nueva sección Feature',
			'add_new_item'  => 'Nueva sección Feature',
			'edit_item'     => 'Editar Feature',
			'new_item'      => 'Nuevo Feature',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver Feature',
			'search_items'  => 'Buscar Nosotros',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Features'
		);
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'feature' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'feature', $args );

		// PRODUCT
		$labels = array(
				'name'          => 'Products',
				'singular_name' => 'Products',
				'add_new'       => 'Nueva Product',
				'add_new_item'  => 'Nueva Product',
				'edit_item'     => 'Editar Product',
				'new_item'      => 'Nuevo Product',
				'all_items'     => 'Todas',
				'view_item'     => 'Ver Feature',
				'search_items'  => 'Buscar Products',
				'not_found'     => 'No se encontró',
				'menu_name'     => 'Products'
			);
			$args = array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'product' ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => 6,
				'taxonomies'         => array( 'category' ),
				'supports'           => array( 'title', 'editor', 'thumbnail' )
			);
			register_post_type( 'product', $args );

	});