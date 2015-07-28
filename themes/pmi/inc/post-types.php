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
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'marcas', $args );

		// EXPERT OPINION
		$labels = array(
			'name'          => 'Opiniones de los expertos',
			'singular_name' => 'Opinión de los expertos',
			'add_new'       => 'Nueva opinión de los expertos',
			'add_new_item'  => 'Nueva opinión de los expertos',
			'edit_item'     => 'Editar opinión de los expertos',
			'new_item'      => 'Nueva opinión de los expertos',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver opinión de los expertos',
			'search_items'  => 'Buscar opinión de los expertoss',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Opiniones de los expertos'
		);
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'opiniones-expertos' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'opiniones-expertos', $args );

		// SELLING POINTS
		$labels = array(
			'name'          => 'Puntos de venta',
			'singular_name' => 'Punto de venta',
			'add_new'       => 'Nuevo punto de venta',
			'add_new_item'  => 'Nuevo punto de venta',
			'edit_item'     => 'Editar punto de venta',
			'new_item'      => 'Nuevo punto de venta',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver puntos de venta',
			'search_items'  => 'Buscar puntos de venta',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Puntos de venta'
		);
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'puntos-venta' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'puntos-venta', $args );

	});