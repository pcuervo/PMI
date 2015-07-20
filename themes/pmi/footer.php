
			</div><!-- main -->
			<section class="[ modal-wrapper modal-nav ][ hide ]">
				<div class="[ modal modal--full ][ diagonal-green-to-blue-gradient ]">
					<div class="[ modal-content ]">
						<article>
							<div class="[ row ][ padding ]">
								<div class="[ xmall-6 ][ pull-right ][ hidden--large-inline ][ inline-block align-middle ]">
									<a class="[ block ][ button--light button--hollow ][ pull-right ][ bg-transparent ][ js-modal-closer ]" data-modal="nav" href="#">
										<span class="[ block ]">
											<img class="[ image-responsive ][ svg icon ][ square--button ][ padding--small ][ light ]" src="<?php echo THEMEPATH; ?>images/close.svg" alt="menu">
										</span>
									</a>
								</div>
							</div><!-- row -->
						</article>

						<nav class="[ center-full ][ hidden--large ]">
							<a href="<?php echo site_url(''); ?>" class="[ nav-item ][ light ][ block ][ text-center uppercase ][ padding ]">Nosotros</a>
							<a href="<?php echo site_url(''); ?>" class="[ nav-item ][ light ][ block ][ text-center uppercase ][ padding ]">Productos</a>
							<a href="<?php echo site_url(''); ?>" class="[ nav-item ][ light ][ block ][ text-center uppercase ][ padding ]">Servicios</a>
							<a href="<?php echo site_url(''); ?>" class="[ nav-item ][ light ][ block ][ text-center uppercase ][ padding ]">Contacto</a>
							<div class="[ nav-item ][ padding ]">
								<div class="[ row ]">
									<div class="[ columna xmall-4 ]">
										<img class="[ image-responsive ]" src="<?php echo THEMEPATH; ?>images/spanish.svg" alt="spanish">
									</div>
									<div class="[ columna xmall-4 ][ opacity-3 ]">
										<img class="[ image-responsive ]" src="<?php echo THEMEPATH; ?>images/english.svg" alt="English">
									</div>
									<div class="[ columna xmall-4 ]">
										<img class="[ image-responsive ]" src="<?php echo THEMEPATH; ?>images/search.svg" alt="search">
									</div>
								</div><!-- row -->
							</div>
						</nav><!-- categorias -->
					</div><!-- modal-content -->
				</div>
			</section>
			<footer class="[ diagonal-dark-blue-to-light-blue ]">
				<div class="[ wrapper ][ padding--top padding--bottom ]">
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
						<div class="[ columna xmall-12 small-6 medium-3 ][ margin-bottom ]">
							<h4 class="[ light ][ uppercase ][ margin-bottom ]">contacto</h4>
							<address>
								<?php echo $address; ?>
							</address>
							<p>
								Tel. <?php echo $telefono ?>
							</p>
						</div>
						<div class="[ columna xmall-12 small-6 medium-3 ][ margin-bottom ]">
							<h4 class="[ light ][ uppercase ][ margin-bottom ]">de venta en</h4>
							<a href="#">
								<img class="[ svg icon icon--large ][ light ]" src="<?php echo THEMEPATH; ?>images/soriana.svg" alt="soriana">
							</a>
							<a href="#">
								<img class="[ svg icon icon--large ][ light ]" src="<?php echo THEMEPATH; ?>images/walmart.svg" alt="walmart">
							</a>
						</div>
						<div class="[ clear--small ]"></div>
						<div class="[ columna xmall-12 small-6 medium-3 ][ margin-bottom ]">
							<h4 class="[ light ][ uppercase ][ margin-bottom ]">síguenos</h4>
							<p>
								<a class="[ light ]" href="<?php echo $facebook ?>" target="_blank">
									<img class="[ svg icon icon--small ][ light ]" src="<?php echo THEMEPATH; ?>images/facebook.svg" alt="facebook"> /PMI
								</a>
							</p>
							<p>
								<a class="[ light ]" href="<?php echo $twitter ?>" target="_blank">
									<img class="[ svg icon icon--small ][ light ]" src="<?php echo THEMEPATH; ?>images/twitter.svg" alt="twitter"> @pmi
								</a>
							</p>
						</div>
						<div class="[ columna xmall-12 small-6 medium-3 ][ margin-bottom ]">
							<h4 class="[ light ][ uppercase ][ margin-bottom ]">newsletter</h4>
							<form class="[ form ]" action="">
								<input class="[ margin-bottom--small ][ xmall-12 ]" type="text" placeholder="correo electrónico"><br />
								<button class="[ button button--secondary ]" type="submit" >suscribirme</button>
							</form>
						</div>
					</div><!-- row -->
					<p class="[ text-center ]">
						<a class="[ light ]" href="#">Aviso de privacidad</a>
					</p>
					<hr class="[ light-separator ]">
					<div class="[ row ]">
						<div class="[ columna xmall-12 ]">
							<h4 class="[ light ][ text-center ][ uppercase ]">Proveedores</h4>
							<div class="[ text-center ]">
								<?php
								// Get all brands
								$marcas_args = array(
									'post_type' 		=> 'marcas',
									'posts_per_page' 	=> -1,
								);
								$query_marcas = new WP_Query( $marcas_args );
								if ( $query_marcas->have_posts() ) : while ( $query_marcas->have_posts() ) : $query_marcas->the_post();
									$producto_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
									echo '<p class="[ inline-block align-middle ][ no-margin padding--small ]">' . get_the_title() . '</p>';
								endwhile; endif; wp_reset_query();
								?>
							</div>
						</div>
					</div><!-- row -->
				</div>
			</footer>

			<?php wp_footer(); ?>

		</div><!-- container -->
	</body>
</html>


