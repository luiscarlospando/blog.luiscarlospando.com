<?php get_header(); ?>

	<section id="main-content" class="container site-body">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
				<h1 class="text-center"><?php _e( 'Archives', 'html5blank' ); ?></h1>

				<?php get_template_part('loop'); ?>

				<span class="text-center"><?php get_template_part('pagination'); ?></span>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
