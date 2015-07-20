<?php 
	get_header();
	the_post();
	
	$cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	$contact_info_query = new WP_Query( 'pagename=contacto' );
	if ( $contact_info_query->have_posts() ) : $contact_info_query->the_post();
		$telefono = get_post_meta( $post->ID, '_telefono_meta', TRUE );
		$email = get_post_meta( $post->ID, '_email_meta', TRUE );
		$address = get_post_meta( $post->ID, '_address_meta', TRUE );
	endif;
	wp_reset_query();
?>
	<section class="[ margin-bottom--large ]">
		<div class="[ wrapper ]">
			<div class="[ row ][ contacto ]">
				<h2 class="[ title ][ text-center ][ padding ][ margin-bottom ]"><?php the_title() ?></h2>
				<div class="[ columna xmall-12  ][ center ][ margin-bottom ]">
					<img src="<?php echo $cover_url[0] ?>" class="[ image-responsive ]" />
				</div>
				
				<div class="[ columna xmall-12 medium-8  ][ center ][ margin-bottom ]">
					<ul class="[ list-reset ]">
						<li class="[ ]">
							<p class="[  ]">
								<i class="[ icon-phone ][ inline-block align-middle ]"></i>
								<?php echo $telefono; ?>
							</p>
						</li>
						<li class="[ ]">
							<p class="[  ]">
								<i class="[ icon-address ][ inline-block align-middle ]"></i>
								<?php echo $address; ?>
							</p>
						</li>
						<li class="[ ]">
							<p class="[  ]">
								<i class="[ icon-email ][ inline-block align-middle ]"></i>
								<?php echo $email; ?>
							</p>
						</li>
					</ul>
					<form action="" class="[ columna xmall-12 medium-8 ]">
						<fieldset>
							<label for="name">Nombre</label><br>
							<input type="text" name="name">
						</fieldset>
						<fieldset>
							<label for="email">Correo</label><br>
							<input type="text" name="email">
						</fieldset>
						<fieldset>
							<label for="message">Mensaje</label><br>
							<textarea name="message" id="" cols="30" rows="10"></textarea>
						</fieldset>
						<fieldset>
							<input type="hidden" name="action" value="send_email_contacto">
							<input type="submit" class="[ button ] [ inline-block ]" value="Enviar">
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</section>

<?php
	get_footer();
?>