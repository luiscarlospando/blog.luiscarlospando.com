<nav class="primary_navigation">
    <div class="row">
        <!-- Previous Post Link -->
        <div class="col-6 text-left">
            <?php
            // Get the Photos category ID
            $photos_cat = get_category_by_slug("photos");
            $photos_id = $photos_cat ? $photos_cat->term_id : 0;

            // Check if current post is in "Photos" category
            $in_photos = has_category($photos_id);

            if ($in_photos) {
                // If we're in "Photos", get previous post only from "Photos" category
                $previous_post = get_previous_post(
                    true,
                    "",
                    "category",
                    $photos_id
                );
            } else {
                // For non-photo posts, exclude the "photos" category but allow all other categories
                $previous_post = get_previous_post(
                    false,
                    [$photos_id],
                    "category"
                );
            }

            if (!empty($previous_post)):

                $previous_title = get_the_title($previous_post);
                $previous_url = get_permalink($previous_post);
                ?>
                <a href="<?php echo esc_url($previous_url); ?>"
                   data-toggle="tooltip"
                   data-placement="top"
                   title="<?php echo esc_attr($previous_title); ?>">
                    <h4>
                        <i class="fa-solid fa-arrow-left"></i>
                        Anterior
                    </h4>
                </a>
            <?php
            endif;
            ?>
        </div>

        <!-- Next Post Link -->
        <div class="col-6 text-right">
            <?php
            if ($in_photos) {
                // If we're in "Photos", get next post only from "Photos" category
                $next_post = get_next_post(true, "", "category", $photos_id);
            } else {
                // For non-photo posts, exclude the "photos" category but allow all other categories
                $next_post = get_next_post(false, [$photos_id], "category");
            }

            if (!empty($next_post)):

                $next_title = get_the_title($next_post);
                $next_url = get_permalink($next_post);
                ?>
                <a href="<?php echo esc_url($next_url); ?>"
                   data-toggle="tooltip"
                   data-placement="top"
                   title="<?php echo esc_attr($next_title); ?>">
                    <h4>
                        Siguiente
                        <i class="fa-solid fa-arrow-right"></i>
                    </h4>
                </a>
            <?php
            endif;
            ?>
        </div>
    </div>
</nav>
