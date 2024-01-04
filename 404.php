<?php get_header(); ?>

	<section id="main-content" class="container site-body">
		<div class="row">
			<div class="col-12 col-md-10 offset-md-1">
				<h1 class="text-center"><?php _e( 'Error 404 - Página no encontrada 😵', 'html5blank' ); ?></h1>

				<div class="alert alert-warning" role="alert">
					<p><strong><?php _e( 'Error 404 - Página no encontrada 😵', 'html5blank' ); ?></strong></p>
					<p>Hubo un error al intentar mostrar la página que solicitaste. Puede que la página haya cambiado de ubicación, que ya no exista o de plano que nunca haya existido.</p>
				</div>

				<hr>

				<h2>Estatus del sistema</h2>

				<p>El estatus del sistema <a href="https://luiscarlospando.instatus.com/" target="_blank">se puede consultar aquí</a>, si algo no anda bien por favor <a href="<?php include('includes/site-domain.php'); ?>/contacto">házmelo saber</a>.</p>

				<div class="text-center">
					<a class="btn btn-primary mb-3" href="<?php echo home_url(); ?>">
						<i class="fa-solid fa-chevron-left"></i> Regresar a la portada del blog
					</a>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
