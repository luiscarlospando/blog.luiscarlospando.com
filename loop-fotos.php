<?php if (have_posts()):
    while (have_posts()):
        the_post(); ?>

        <div class="col-md-4 mb-4">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail("thumb-foto", [
                    "class" => "thumb-foto rounded img-fluid",
                ]); ?>
            </a>
        </div>
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
