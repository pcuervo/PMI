
			</div><!-- main -->
			<footer>
				<div class="[ wrapper ] [ padding ]">
					<div class="[ row ]">
						<?php 
							$contact_info_query = new WP_Query( 'pagename=contacto' );
							if ( $contact_info_query->have_posts() ) : $contact_info_query->the_post(); 
								$facebook = get_post_meta( $post->ID, '_facebook_meta', TRUE );
								$twitter = get_post_meta( $post->ID, '_twitter_meta', TRUE );
								$telefono = get_post_meta( $post->ID, '_telefono_meta', TRUE );
								$email = get_post_meta( $post->ID, '_email_meta', TRUE );
								$address = get_post_meta( $post->ID, '_address_meta', TRUE );
							endif;
							wp_reset_query();
						?>
						<div class="[ columna xmall-12 medium-3 ][ margin-bottom ]">
							<h4 class="[ light ]">contacto</h4>
							<address>
								<?php echo $address; ?>
							</address>
							<p>
								Tel. <?php echo $telefono ?>
							</p>
						</div>
						<div class="[ columna xmall-12 medium-3 ][ margin-bottom ]">
							<h4 class="[ light ]">de venta en</h4>
							<a href="#">
								<img src="#" alt="Soriana">
							</a>
							<a href="#">
								<img src="#" alt="Walmart">
							</a>
						</div>
						<div class="[ columna xmall-12 medium-3 ][ margin-bottom ]">
							<h4 class="[ light ]">síguenos</h4>
							<a href="<?php echo $facebook ?>" target="_blank">
								<i class="[ icon-facebook ] [ icon-medium ]"></i>
							</a>
							<a href="<?php echo $twitter ?>" target="_blank">
								<i class="[ icon-twitter ] [ icon-medium ]"></i>
							</a>
						</div>
						<div class="[ columna xmall-12 medium-3 ][ margin-bottom ]">
							<h4 class="[ light ]">newsletter</h4>
							<form action="">
								<fieldset>
									<input type="text" placeholder="correo electrónico">
									<input type="submit" value="suscribirme">
								</fieldset>
							</form>
						</div>
						<div class="clear"></div>
						<div class="[ columna xmall-12 center block ] [ text-center ]">
							<a href="#">Aviso de privacidad</a>
						</div>
						<hr class="[  ]">
						<div class="[ columna xmall-12 ][ margin-bottom ]">
							<h4 class="[ light ][ text-center ]">Proveedores</h4>
							<ul>
								<?php
								// Get all brands
								$marcas_args = array(
									'post_type' 		=> 'marcas',
									'posts_per_page' 	=> -1,
								);
								$query_marcas = new WP_Query( $marcas_args );
								if ( $query_marcas->have_posts() ) : while ( $query_marcas->have_posts() ) : $query_marcas->the_post();
									$producto_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
									echo '<li>' . the_title() . '</li>';
								endwhile; endif; wp_reset_query();
								?>
							</ul>
						</div>
					</div>
				</div>
			</footer>
			
			<?php wp_footer(); ?>

		</div><!-- container -->
	</body>
</html>


