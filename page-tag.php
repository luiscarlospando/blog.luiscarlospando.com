<?php
/*
Template Name: Hashtag Template
*/
get_header(); ?>

	<section id="main-content" class="container site-body">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
			<?php if (have_posts()):
       while (have_posts()):
           the_post(); ?>

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<!-- post title -->
					<h1 class="text-center">
						<?php the_title(); ?>
					</h1>
					<!-- /post title -->

					<div class="contenido" style="margin-bottom: 0;">

						<?php the_content(); ?>

						<div class="hashtags-container">
                            <?php
                            $tags = get_tags([
                                "orderby" => "name",
                                "order" => "ASC",
                                "hide_empty" => true,
                            ]);
                            if ($tags) {
                                $counts = array_column($tags, "count");
                                $min_count = min($counts);
                                $max_count = max($counts);
                                $min_size = 11;
                                $max_size = 36;

                                foreach ($tags as $tag) {
                                    if ($max_count === $min_count) {
                                        $size = $min_size;
                                    } else {
                                        $size =
                                            $min_size +
                                            (($tag->count - $min_count) /
                                                ($max_count - $min_count)) *
                                                ($max_size - $min_size);
                                    }
                                    $size = round($size, 1);
                                    $name = str_replace(" ", "", $tag->name);
                                    echo '<a class="badge badge-custom" href="' .
                                        get_term_link($tag) .
                                        '" style="font-size:' .
                                        $size .
                                        'px;">#' .
                                        esc_html($name) .
                                        "</a> ";
                                }
                            }
                            ?>
                        </div>

						<br class="clear">

						<?php edit_post_link(
          '<i class="fa-solid fa-pen-to-square"></i> Editar',
          "",
          "",
          null,
          "btn btn-primary mb-3",
      ); ?>

					</div>

				</article>
				<!-- /article -->

			<?php
       endwhile; ?>

			<?php
   else:
        ?>

				<!-- article -->
				<article>

					<h2><?php _e("Sorry, nothing to display.", "html5blank"); ?></h2>

				</article>
				<!-- /article -->

			<?php
   endif; ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
