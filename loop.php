<?php if (have_posts()):
    while (have_posts()):
        the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    	<!-- the post date & categories -->
        <ul class="list-inline mt-4 mb-1">
            <li class="list-inline-item">
                <a href="<?php echo get_permalink(); ?>" class="badge badge-dark">
                    <time datetime="<?php echo get_the_date("c"); ?>"
                            itemprop="datePublished"
                            pubdate>
                        <?php
                        $post_date = get_the_date("U");
                        if ($post_date) {
                            echo strtolower(
                                wp_date("d M, Y", $post_date, wp_timezone())
                            );
                        } else {
                            echo strtolower(
                                wp_date(
                                    "d M, Y",
                                    current_time("timestamp"),
                                    wp_timezone()
                                )
                            );
                        }
                        ?>
                    </time>
                </a>
            </li>
            <?php
            $categories = get_the_category();
            if ($categories) {
                foreach ($categories as $category) {
                    echo '<li class="list-inline-item">';
                    echo '<a href="' .
                        esc_url(get_category_link($category->term_id)) .
                        '" class="badge badge-secondary">';
                    echo esc_html($category->name);
                    echo "</a>";
                    echo "</li>";
                }
            }
            ?>
        </ul>
        <!-- /the post date & categories -->

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
