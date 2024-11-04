<?php if (have_posts()):
    while (have_posts()):
        the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<!-- the category -->
		<p class="categories small">
			<?php
   _e("", "html5blank");
   the_category(", ");

        // Separated by commas
        ?>
		</p>
		<!-- /the category -->

		<!-- post title -->
		<h2 class="title">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h2>
		<!-- /post title -->

		<!-- post details -->
		<?php include "includes/post-details.php"; ?>
		<!-- /post details -->

	</article>
	<!-- /article -->

	<hr>

<?php
    endwhile; ?>

<?php
else:
     ?>

	<!-- article -->
	<article>

		<p class="title text-center">
			<?php _e("Sorry, nothing to display.", "html5blank"); ?> 😵
		</p>

	</article>
	<!-- /article -->

<?php
endif; ?>
