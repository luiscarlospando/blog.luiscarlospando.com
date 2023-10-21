<?php get_header(); ?>

	<section id="main-content" class="container site-body">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
			<?php if (have_posts()): the_post(); ?>

				<h1 class="text-center"><?php _e( 'Archivos del blog', 'html5blank' ); ?></h1>

				<p class="text-center">Estos son todos los posts que he escrito, ordenados por fecha de manera descendente.</p>

			<?php rewind_posts(); while (have_posts()) : the_post(); ?>

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<!-- the category -->
					<p class="categories">
						<span class="small"><?php _e( '', 'html5blank' ); the_category(', '); // Separated by commas ?></span>
					</p>
					<!-- /the category -->

					<!-- post title -->
					<h2 class="title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h2>
					<!-- /post title -->

					<?php include 'includes/post-details.php'; ?>

					<!-- <br class="clear"> -->

					<?php edit_post_link(); ?>
				</article>
				<!-- /article -->

				<hr>

			<?php endwhile; ?>

			<?php else: ?>

				<!-- article -->
				<article>
					<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
				</article>
				<!-- /article -->

			<?php endif; ?>

				<span class="text-center"><?php get_template_part('pagination'); ?></span>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
