<?php
	get_header();
?>
	<!-- PRODUCTS -->
	<section class="[]">
		<div class="[ wrapper ]">
			<div class="[ columna xmall-12 medium-8 ][ center ][ margin-bottom ]">
				<h2 class="[ text-center ][ margin-bottom ]">Recetas</h2>
				<p>Aquí va el texto de recetas...</p>
			</div>
			<div class="[ row ]">

				<section class="[ columna xmall-12 medium-8 ][ center ][ margin-bottom ][ filtros ]">
					<h3>Marcas</h3>
					<div class="[ margin-bottom ][ filtro-marcas ][ button-group ]" data-filter-group="marcas">
						<button class="[ button button--hollow ][ diagonal-green-to-blue-gradient ]" data-filter="">
							<span class="[ block ][ bg-light ]">
								Todas
							</span>
						</button>
						<?php
						$args = array(
							'orderby'		=> 'name',
							'hide_empty'	=> true,
							);
						$brands = get_terms( 'marcas', $args );

						foreach( $brands as $brand ) {
							echo '<button class="[ button button--hollow ][ diagonal-green-to-blue-gradient ]" data-filter=".' . $brand->slug . '">
								<span class="[ block ][ bg-light ]">'
								. $brand->name .
								'</span>
							</button>';


						}
						?>
					</div><!-- filtro-marcas -->

					<h3>Tipo de comida</h3>
					<div class="[ margin-bottom ][ filtro-tipo-comida ][ button-group ]" data-filter-group="tipo-comida">
						<button class="[ button button--hollow ][ diagonal-green-to-blue-gradient ]" data-filter="">
							<span class="[ block ][ bg-light ]">
								Todos
							</span>
						</button>
						<?php

						$tipos_comida = get_terms( 'tipos-comida' );
						foreach( $tipos_comida as $tipo ) {
							echo '<button class="[ button button--hollow ][ diagonal-green-to-blue-gradient ]" data-filter=".' . $tipo->slug . '">
								<span class="[ block ][ bg-light ]">'
								. $tipo->name .
								'</span>
							</button>';
						}
						?>
					</div>

					<h3>Porciones</h3>
					<div class="[ margin-bottom ][ filtro-porciones ][ button-group ]" data-filter-group="porciones">
						<button class="[ button button--hollow ][ diagonal-green-to-blue-gradient ]" data-filter="">
							<span class="[ block ][ bg-light ]">
								Todas
							</span>
						</button>
						<?php

						$porciones = get_terms( 'porciones-recetas' );
						foreach( $porciones as $porcion ) {
							echo '<button class="[ button button--hollow ][ diagonal-green-to-blue-gradient ]" data-filter=".' . $porcion->slug . '">
								<span class="[ block ][ bg-light ]">'
								. $porcion->name .
								'</span>
							</button>';
						}
						?>
					</div>

					<h3>Tipo de producto</h3>
					<div class="[ margin-bottom ][ filtro-tipo-producto ][ button-group ]" data-filter-group="tipo-producto">
						<button class="[ button button--hollow ][ diagonal-green-to-blue-gradient ]" data-filter="">
							<span class="[ block ][ bg-light ]">
								Todos
							</span>
						</button>
						<?php

						$tipos_producto = get_terms( 'tipo-producto' );
						foreach( $tipos_producto as $tipo ) {
							echo '<button class="[ button button--hollow ][ diagonal-green-to-blue-gradient ]" data-filter=".' . $tipo->slug . '">
								<span class="[ block ][ bg-light ]">'
								. $tipo->name .
								'</span>
							</button>';
						}
						?>
					</div>
				</section><!-- filtros -->

				<section class="[ isotope-container ]">
					<?php
					if ( have_posts()) : while ( have_posts() ) : the_post();
						$recipe_filter_info = get_recipe_filter_info( $post->ID );
						$recipe_filter_classes = '';
						foreach ( $recipe_filter_info as $key => $value ) {
							$recipe_filter_classes .= $value . ' ';
						}
					?>
						<div class="[ post ][ columna xmall-6 medium-4 large-3 ][ margin-bottom--large ][ <?php echo $recipe_filter_classes; ?>]">
							<div class="[ drop-shadow ]">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'medium', array( 'class' => '[ image-responsive ] [ margin-bottom ]' ) ); ?>
								</a>
								<div class="[ padding--small ][ bg-primary ]">
									<p class="[ post-title ]"><?php the_title() ?></p>
								</div>
							</div>
						</div>
					<?php endwhile; endif; ?>
				</section>
			</div><!-- row -->
		</div><!-- wrapper -->
	</section><!-- PRODUCTS -->

<?php
	get_footer();
?>