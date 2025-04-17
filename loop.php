<?php if (have_posts()):
    while (have_posts()):
        the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    	<!-- the categories -->
    	<ul class="list-inline mt-4 mb-1">
            <?php
            $categories = get_the_category();
            if ($categories) {
                foreach ($categories as $category) {
                    echo '<li class="list-inline-item">';
                    echo '<a href="' .
                        esc_url(get_category_link($category->term_id)) .
                        '" class="badge badge-dark">';
                    echo esc_html($category->name);
                    echo "</a>";
                    echo "</li>";
                }
            }
            ?>
        </ul>
        <!-- /the categoies -->

		<!-- post title -->
		<h2 class="title">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h2>
		<!-- /post title -->

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
