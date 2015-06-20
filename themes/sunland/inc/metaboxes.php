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

		

	});



?>