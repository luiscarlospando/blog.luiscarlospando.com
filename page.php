<?php get_header(); ?>

	<section id="main-content" class="container site-body">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<!-- post title -->
					<h1 class="text-align: center;">
						<?php the_title(); ?>
					</h1>
					<!-- /post title -->
					
					<div class="contenido">

						<?php the_content(); ?>

						<br class="clear">

						<?php edit_post_link('<i class="fa-solid fa-pen-to-square"></i> Editar', '', '', null, 'btn btn-primary'); ?>
						
					</div>

				</article>
				<!-- /article -->

			<?php endwhile; ?>

			<?php else: ?>

				<!-- article -->
				<article>

					<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

				</article>
				<!-- /article -->

			<?php endif; ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
