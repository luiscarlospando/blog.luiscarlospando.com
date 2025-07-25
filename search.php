<?php get_header(); ?>

	<section id="main-content" class="container site-body animated fadeIn">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
				<h1 class="text-center"><?php _e(
        "Resultados de búsqueda",
        "html5blank"
    ); ?></h1>

                <div class="alert alert-info" role="alert">
					<p><strong><?php _e("Resultados de búsqueda", "html5blank"); ?></strong></p>
                    <p><?php
                    echo sprintf(
                        __("Buscaste ", "html5blank"),
                        $wp_query->found_posts
                    );
                    printf('"%s"', get_search_query());
                    ?> y esto fue lo que se encontró en los archivos. 👇</p>
				</div>

				<?php get_template_part("loop"); ?>

				<?php get_template_part("pagination"); ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
