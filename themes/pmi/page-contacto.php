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
				<div class="[ bg-image ][ margin-bottom ][ xmall-12 xmedium-10 ][ center ]" style="background-image: url('<?php echo $cover_url[0] ?>')">
					<div class="[ diagonal-green-to-blue-gradient ][ padding--large ]">
						<span class="[ block ][ padding--large ]">&nbsp;</span><br />
						<span class="[ padding--large ][ shown--large ]">&nbsp;</span><br />
						<span class="[ padding--large ][ shown--large ]">&nbsp;</span><br />
					</div>
				</div>

				<div class="[ xmall-12 medium-8 xmedium-6 ][ center ]">
					<ul class="[ list-reset ][ margin-bottom ]">
						<li class="[ ]">
							<p class="[  ]">
								<img class="[ svg icon icon--small ][ secondary ][ inline-block align-middle ]" src="<?php echo THEMEPATH; ?>images/phone.svg" alt="phone">
								<?php echo $telefono; ?>
							</p>
						</li>
						<li class="[ ]">
							<p class="[  ]">
								<img class="[ svg icon icon--small ][ secondary ][ inline-block align-middle ]" src="<?php echo THEMEPATH; ?>images/house.svg" alt="address">
								<?php echo $address; ?>
							</p>
						</li>
						<li class="[ ]">
							<p class="[  ]">
								<img class="[ svg icon icon--small ][ secondary ][ inline-block align-middle ]" src="<?php echo THEMEPATH; ?>images/email.svg" alt="email">
								<?php echo $email; ?>
							</p>
						</li>
					</ul>
					<form action="" class="[ js-contacto ]">
						<fieldset class="[ margin-bottom ]">
							<label class="[ secondary ]" for="name">Nombre</label><br>
							<input class="[ xmall-12 ]" type="text" name="name">
						</fieldset>
						<fieldset class="[ margin-bottom ]">
							<label class="[ secondary ]" for="email">Correo</label><br>
							<input class="[ xmall-12 ]" type="text" name="email">
						</fieldset>
						<fieldset class="[ margin-bottom ]">
							<label class="[ secondary ]" for="message">Mensaje</label><br>
							<textarea class="[ xmall-12 ]" name="message" id="" rows="7"></textarea>
						</fieldset>
						<fieldset class="[ text-center ]">
							<input type="hidden" name="action" value="send_email_contacto">
							<button type="submit" class="[ inline-block ][ button--hollow ][ diagonal-green-to-blue-gradient ]">
								<span class="[ block ][ bg-light ][ padding--small ]">
									Enviar
								</span>
							</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</section>

<?php
	get_footer();
?>