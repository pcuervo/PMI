<?php

/*------------------------------------*\
	CUSTOM POST TYPES
\*------------------------------------*/



	add_action('init', function(){

		// PRODUCTS
		$labels = array(
			'name'          => 'Productos',
			'singular_name' => 'Productos',
			'add_new'       => 'Nuevo producto',
			'add_new_item'  => 'Nuevo producto',
			'edit_item'     => 'Editar producto',
			'new_item'      => 'Nuevo producto',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver producto',
			'search_items'  => 'Buscar productos',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Productos'
		);
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'productos' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'productos', $args );

		// RECIPES
		$labels = array(
			'name'          => 'Recetas',
			'singular_name' => 'Recetas',
			'add_new'       => 'Nueva receta',
			'add_new_item'  => 'Nueva receta',
			'edit_item'     => 'Editar receta',
			'new_item'      => 'Nueva receta',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver receta',
			'search_items'  => 'Buscar recetas',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Recetas'
		);
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'recetas' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'recetas', $args );

		// BRANDS
		$labels = array(
			'name'          => 'Marcas',
			'singular_name' => 'Marca',
			'add_new'       => 'Nueva marca',
			'add_new_item'  => 'Nueva marca',
			'edit_item'     => 'Editar marca',
			'new_item'      => 'Nueva marca',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver marca',
			'search_items'  => 'Buscar marcas',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Marcas'
		);
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'marcas' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'marcas', $args );

	});