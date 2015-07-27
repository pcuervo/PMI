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

			<section class="[ margin-bottom ][ text-center ][ filtros ]">
				<div class="[ row ]">
					<div class="[ columna xmall-12 xmedium-6 ]">
						<h3 class="[ shown--xmedium ][ uppercase ]">Marcas</h3>
						<button class="[ block ][ xmall-12 ][ button button--hollow diagonal-green-to-blue-gradient ][ margin-bottom ][ hidden--xmedium ][ active ][ js-element-opener ]" data-element="marcas">
							<span class="[ block ][ bg-light ]">
								Marcas
							</span>
						</button>

						<div class="[ filtro-marcas ][ button-group ][ hide ][ element-marcas ]" data-filter-group="marcas">
							<button class="[ button active button--hollow ][ diagonal-green-to-blue-gradient ][ margin-bottom--small margin-sides--small ]" data-filter="">
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
								echo '<button class="[ button button--hollow ][ diagonal-green-to-blue-gradient ][ margin-bottom--small margin-sides--small ]" data-filter=".' . $brand->slug . '">
									<span class="[ block ][ bg-light ]">'
									. $brand->name .
									'</span>
								</button>';


							}
							?>
						</div><!-- filtro-marcas -->
					</div><!-- columna xmall-12 xmedium-6 -->
					<div class="[ columna xmall-12 xmedium-6 ]">
						<h3 class="[ shown--xmedium ][ uppercase ]">Tipo de comida</h3>
						<button class="[ block ][ xmall-12 ][ button button--hollow diagonal-green-to-blue-gradient ][ margin-bottom ][ hidden--xmedium ][ active ][ js-element-opener ]" data-element="tipo-comida">
							<span class="[ block ][ bg-light ]">
								Tipo de comida
							</span>
						</button>

						<div class="[ filtro-tipo-comida ][ button-group ][ hide ][ element-tipo-comida ]" data-filter-group="tipo-comida">
							<button class="[ button active button--hollow ][ diagonal-green-to-blue-gradient ][ margin-bottom--small margin-sides--small ]" data-filter="">
								<span class="[ block ][ bg-light ]">
									Todos
								</span>
							</button>
							<?php

							$tipos_comida = get_terms( 'tipos-comida' );
							foreach( $tipos_comida as $tipo ) {
								echo '<button class="[ button button--hollow ][ diagonal-green-to-blue-gradient ][ margin-bottom--small margin-sides--small ]" data-filter=".' . $tipo->slug . '">
									<span class="[ block ][ bg-light ]">'
									. $tipo->name .
									'</span>
								</button>';
							}
							?>
						</div>
					</div><!-- columna xmall-12 xmedium-6 -->
					<div class="clear"></div>
					<div class="[ columna xmall-12 xmedium-6 ]">
						<h3 class="[ shown--xmedium ][ uppercase ]">Porciones</h3>
						<button class="[ block ][ xmall-12 ][ button button--hollow diagonal-green-to-blue-gradient ][ margin-bottom ][ hidden--xmedium ][ active ][ js-element-opener ]" data-element="porciones">
							<span class="[ block ][ bg-light ]">
								Porciones
							</span>
						</button>

						<div class="[ filtro-porciones ][ button-group ][ hide ][ element-porciones ]" data-filter-group="porciones">
							<button class="[ button active button--hollow ][ diagonal-green-to-blue-gradient ][ margin-bottom--small margin-sides--small ]" data-filter="">
								<span class="[ block ][ bg-light ]">
									Todas
								</span>
							</button>
							<?php

							$porciones = get_terms( 'porciones-recetas' );
							foreach( $porciones as $porcion ) {
								echo '<button class="[ button button--hollow ][ diagonal-green-to-blue-gradient ][ margin-bottom--small margin-sides--small ]" data-filter=".' . $porcion->slug . '">
									<span class="[ block ][ bg-light ]">'
									. $porcion->name .
									'</span>
								</button>';
							}
							?>
						</div>
					</div><!-- columna xmall-12 xmedium-6 -->
					<div class="[ columna xmall-12 xmedium-6 ]">

						<h3 class="[ shown--xmedium ][ uppercase ]">Tipo de producto</h3>
						<button class="[ block ][ xmall-12 ][ button button--hollow diagonal-green-to-blue-gradient ][ margin-bottom ][ hidden--xmedium ][ active ][ js-element-opener ]" data-element="tipo-producto">
							<span class="[ block ][ bg-light ]">
								Tipo de producto
							</span>
						</button>

						<div class="[ filtro-tipo-producto ][ button-group ][ hide ][ element-tipo-producto ]" data-filter-group="tipo-producto">
							<button class="[ button active button--hollow ][ diagonal-green-to-blue-gradient ][ margin-bottom--small margin-sides--small ]" data-filter="">
								<span class="[ block ][ bg-light ]">
									Todos
								</span>
							</button>
							<?php

							$tipos_producto = get_terms( 'tipo-producto' );
							foreach( $tipos_producto as $tipo ) {
								echo '<button class="[ button button--hollow ][ diagonal-green-to-blue-gradient ][ margin-bottom--small margin-sides--small ]" data-filter=".' . $tipo->slug . '">
									<span class="[ block ][ bg-light ]">'
									. $tipo->name .
									'</span>
								</button>';
							}
							?>
						</div>
					</div><!-- columna xmall-12 xmedium-6 -->
				</div><!-- row -->
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
					<div class="[ post ][ columna xmall-6 xmedium-3 ][ margin-bottom--large ][ <?php echo $recipe_filter_classes; ?>]">
						<div class="[ drop-shadow ]">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'medium', array( 'class' => '[ image-responsive ]' ) ); ?>
							</a>
							<div class="[ padding--small ][ bg-primary ]">
								<p class="[ post-title ][ ellipsis ]"><?php the_title() ?></p>
							</div>
						</div>
					</div>
				<?php endwhile; endif; ?>
			</section>
		</div><!-- wrapper -->
	</section><!-- PRODUCTS -->

<?php
	get_footer();
?>