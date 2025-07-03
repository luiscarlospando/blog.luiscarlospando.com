<?php get_header(); ?>

	<section id="main-content" class="container site-body">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
                <h1 class="text-center"><?php _e(
                    "Archivos del blog",
                    "html5blank"
                ); ?></h1>

				<p class="text-center">Estos son todos los posts que he escrito, ordenados por fecha de manera descendente.</p>

				<?php get_template_part("loop"); ?>

				<?php get_template_part("pagination"); ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
