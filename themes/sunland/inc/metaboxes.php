<?php

// CUSTOM METABOXES //////////////////////////////////////////////////////////////////

add_action('add_meta_boxes', function(){
		// global $post;

		// add_meta_box( 'fecha_evento', 'Fecha del evento', 'metabox_fecha_evento', 'eventos', 'advanced', 'high' );
		// switch ( $post->post_name ) {
		// 	case 'product':
		// 		add_meta_box( 'social', 'Redes sociales', 'metabox_social', 'page', 'advanced', 'high' );
		// 		add_meta_box( 'telefono', 'Teléfonos', 'metabox_telefono', 'page', 'advanced', 'high' );
		// 		add_meta_box( 'email', 'E-mail de contacto', 'metabox_email', 'page', 'advanced', 'high' );
		// 		add_meta_box( 'direccion', 'Dirección', 'metabox_direccion', 'page', 'advanced', 'high' );
		// 		add_meta_box( 'motivo_contacto', 'Motivo de contacto', 'metabox_motivo_contacto', 'page', 'advanced', 'high' );		
		// 		break;
		// 	case 'sunland-express':
		// 		add_meta_box( 'descripcion_home', 'Descripción página de inicio', 'metabox_home_express', 'page', 'advanced', 'high' );
		// 		break;
		// 	default:
		// 		break;
		// }
		
				add_meta_box( 'weight', 'Weight', 'metabox_weight', 'product', 'advanced', 'high' );
				add_meta_box( 'indications', 'Indications', 'metabox_indications', 'product', 'advanced', 'high' );
				add_meta_box( 'portions', 'Portions', 'metabox_portions', 'product', 'advanced', 'high' );
				add_meta_box( 'ingredients', 'Ingredients', 'metabox_ingredients', 'product', 'advanced', 'high' );

				add_meta_box( 'quantity', 'Quantity', 'metabox_quantity', 'recipe', 'advanced', 'high' );
				add_meta_box( 'time', 'Time', 'metabox_time', 'recipe', 'advanced', 'high' );
				add_meta_box( 'instructions', 'instructions', 'metabox_instructions', 'recipe', 'advanced', 'high' );
				add_meta_box( 'ingredients_for_recipe', 'ingredients', 'metabox_ingredients_for_recipe', 'recipe', 'advanced', 'high' );
				add_meta_box( 'nutrition_facts', 'nutrition_facts', 'metabox_nutrition_facts', 'recipe', 'advanced', 'high' );
				add_meta_box( 'percentage_per_serving', 'percentage_per_serving', 'metabox_percentage_per_serving', 'recipe', 'advanced', 'high' );

	});

	function metabox_weight($post){
		$weight = get_post_meta($post->ID, '_weight_meta', true);
		wp_nonce_field(__FILE__, '_weight_meta_nonce');

echo <<<END

	<label>Weight:</label>
	<input type="text" class="[ widefat ]" name="_weight_meta" value="$weight" />

END;
	}// metabox_weight

	function metabox_indications($post){
		$indications = get_post_meta($post->ID, '_indications_meta', true);
		wp_nonce_field(__FILE__, '_indications_meta_nonce');

echo <<<END

	<label>Indications:</label>
	<input type="text" class="[ widefat ]" name="_indications_meta" value="$indications" />

END;
	}// metabox_indications

	function metabox_ingredients($post){
		$ingredients = get_post_meta($post->ID, '_ingredients_meta', true);
		wp_nonce_field(__FILE__, '_ingredients_meta_nonce');

echo <<<END

	<label>Ingredients:</label>
	<input type="text" class="[ widefat ]" name="_ingredients_meta" value="$ingredients" />

END;
	}// metabox_ingredients

	function metabox_portions($post){
		$portions = get_post_meta($post->ID, '_portions_meta', true);
		wp_nonce_field(__FILE__, '_portions_meta_nonce');

echo <<<END

	<label>Portions:</label>
	<input type="text" class="[ widefat ]" name="_portions_meta" value="$portions" />

END;
	}// metabox_portions


	function metabox_quantity($post){
		$quantity = get_post_meta($post->ID, '_quantity_meta', true);
		wp_nonce_field(__FILE__, '_quantity_meta_nonce');

echo <<<END

	<label>quantity:</label>
	<input type="text" class="[ widefat ]" name="_quantity_meta" value="$quantity" />

END;
	}// metabox_quantity


	function metabox_time($post){
		$time = get_post_meta($post->ID, '_time_meta', true);
		wp_nonce_field(__FILE__, '_time_meta_nonce');

echo <<<END

	<label>time:</label>
	<input type="text" class="[ widefat ]" name="_time_meta" value="$time" />

END;
	}// metabox_time	


function metabox_instructions($post){
		$instructions = get_post_meta($post->ID, '_instructions_meta', true);
		wp_nonce_field(__FILE__, '_instructions_meta_nonce');

echo <<<END

	<label>instructions:</label>
	<input type="text" class="[ widefat ]" name="_instructions_meta" value="$instructions" />

END;
	}// metabox_instructions

	
function metabox_ingredients_for_recipe($post){
		$ingredients_for_recipe = get_post_meta($post->ID, '_ingredients_for_recipe_meta', true);
		wp_nonce_field(__FILE__, '_ingredients_for_recipe_meta_nonce');

echo <<<END

	<label>ingredients_for_recipe:</label>
	<input type="text" class="[ widefat ]" name="_ingredients_for_recipe_meta" value="$ingredients_for_recipe" />

END;
	}// metabox_ingredients_for_recipe

	
function metabox_nutrition_facts($post){
		$nutrition_facts = get_post_meta($post->ID, '_nutrition_facts_meta', true);
		wp_nonce_field(__FILE__, '_nutrition_facts_meta_nonce');

echo <<<END

	<label>nutrition_facts:</label>
	<input type="text" class="[ widefat ]" name="_nutrition_facts_meta" value="$nutrition_facts" />

END;
	}// metabox_nutrition_facts

	
function metabox_percentage_per_serving($post){
		$percentage_per_serving = get_post_meta($post->ID, '_percentage_per_serving_meta', true);
		wp_nonce_field(__FILE__, '_percentage_per_serving_meta_nonce');

echo <<<END

	<label>percentage_per_serving:</label>
	<input type="text" class="[ widefat ]" name="_percentage_per_serving_meta" value="$percentage_per_serving" />

END;
	}// metabox_percentage_per_serving






/*
** FUNCTION TO SAVE POST'S TAXONOMIES VALUES INTO DATABASE
*/
add_action('save_post', function($post_id){


		if ( ! current_user_can('edit_page', $post_id)) 
			return $post_id;

		if ( defined('DOING_AUTOSAVE') and DOING_AUTOSAVE ) 
			return $post_id;
		
		if ( wp_is_post_revision($post_id) OR wp_is_post_autosave($post_id) ) 
			return $post_id;

		if ( isset($_POST['_weight_meta']) and check_admin_referer(__FILE__, '_weight_meta_nonce') ){
			update_post_meta($post_id, '_weight_meta', $_POST['_weight_meta']);
		}
		if ( isset($_POST['_indications_meta']) and check_admin_referer(__FILE__, '_indications_meta_nonce') ){
			update_post_meta($post_id, '_indications_meta', $_POST['_indications_meta']);
		}
		if ( isset($_POST['_ingredients_meta']) and check_admin_referer(__FILE__, '_ingredients_meta_nonce') ){
			update_post_meta($post_id, '_ingredients_meta', $_POST['_ingredients_meta']);
		}
		if ( isset($_POST['_portions_meta']) and check_admin_referer(__FILE__, '_portions_meta_nonce') ){
			update_post_meta($post_id, '_portions_meta', $_POST['_portions_meta']);
		}
		if ( isset($_POST['_quantity_meta']) and check_admin_referer(__FILE__, '_quantity_meta_nonce') ){
			update_post_meta($post_id, '_quantity_meta', $_POST['_quantity_meta']);
		}
		if ( isset($_POST['_time_meta']) and check_admin_referer(__FILE__, '_time_meta_nonce') ){
			update_post_meta($post_id, '_time_meta', $_POST['_time_meta']);
		}
		if ( isset($_POST['_instructions_meta']) and check_admin_referer(__FILE__, '_instructions_meta_nonce') ){
			update_post_meta($post_id, '_instructions_meta', $_POST['_instructions_meta']);
		}
		if ( isset($_POST['_ingredients_for_recipe_meta']) and check_admin_referer(__FILE__, '_ingredients_for_recipe_meta_nonce') ){
			update_post_meta($post_id, '_ingredients_for_recipe_meta', $_POST['_ingredients_for_recipe_meta']);
		}
		if ( isset($_POST['_nutrition_facts_meta']) and check_admin_referer(__FILE__, '_nutrition_facts_meta_nonce') ){
			update_post_meta($post_id, '_nutrition_facts_meta', $_POST['_nutrition_facts_meta']);
		}
		if ( isset($_POST['_percentage_per_serving_meta']) and check_admin_referer(__FILE__, '_percentage_per_serving_meta_nonce') ){
			update_post_meta($post_id, '_percentage_per_serving_meta', $_POST['_percentage_per_serving_meta']);
		}


	});



?>