<?php if (have_posts()):
    while (have_posts()):
        the_post(); ?>

        <div class="col-md-4 mb-4">
            <figure class="figure">
                <a href="<?php the_permalink(); ?>"
                   data-toggle="tooltip"
                   data-placement="top"
                   title="<?php echo esc_attr(get_the_title()); ?>"
                   data-original-title="<?php echo esc_attr(
                       get_the_title()
                   ); ?>">

                    <?php the_post_thumbnail("thumb-foto", [
                        "class" => "thumb-foto rounded img-fluid",
                        "alt" => get_the_title(),
                        "title" => get_the_title(),
                        "caption" => get_the_title(),
                    ]); ?>
                </a>
                <figcaption class="figure-caption text-center">
                    <?php echo get_the_title(); ?>
                </figcaption>
            </figure>
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
