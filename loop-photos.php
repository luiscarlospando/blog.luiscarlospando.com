<?php
$current_year = "";

if (have_posts()):
    while (have_posts()):

        the_post();

        $post_year = get_the_date("Y");

        // If year has changed, output new heading and open masonry grid
        if ($post_year !== $current_year):
            if ($current_year !== ""):
                // Close previous masonry grid
                echo "</div>";
            endif;

            // Output year heading OUTSIDE the grid
            echo '<h2 class="year-heading mb-3">' .
                esc_html($post_year) .
                "</h2>";

            // Open new masonry grid for this year
            echo '<div class="masonry-grid">';
            echo '<div class="grid-sizer col-6 col-md-4"></div>';

            $current_year = $post_year;
        endif;
        ?>

        <!-- photo -->
        <div class="grid-item col-6 col-md-4">
            <figure class="figure figure-foto">
                <a href="<?php the_permalink(); ?>"
                   data-toggle="tooltip"
                   data-placement="top"
                   title="<?php echo esc_attr(get_the_title()); ?>"
                   data-original-title="<?php echo esc_attr(
                       get_the_title()
                   ); ?>">

                    <?php
                    $thumb_url = get_the_post_thumbnail_url(
                        get_the_ID(),
                        "thumb-foto"
                    );
                    $thumb_meta = wp_get_attachment_metadata(
                        get_post_thumbnail_id()
                    );

                    if ($thumb_url && $thumb_meta): ?>
                        <img src="<?php echo esc_url($thumb_url); ?>"
                            class="thumb-foto rounded img-fluid"
                            width="<?php echo esc_attr(
                                $thumb_meta["width"]
                            ); ?>"
                            height="<?php echo esc_attr(
                                $thumb_meta["height"]
                            ); ?>"
                            alt="<?php the_title_attribute(); ?>"
                            title="<?php the_title_attribute(); ?>" />
                    <?php endif;
                    ?>
                </a>
                <figcaption class="figure-caption text-center">
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
                </figcaption>
            </figure>
        </div>
        <!-- /photo -->

    <?php
    endwhile;

    // Close the last masonry grid
    echo "</div>";
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
