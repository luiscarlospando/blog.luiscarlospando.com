<div class="grid-item col-6 col-md-4">
    <figure class="figure figure-foto">
        <a href="<?php the_permalink(); ?>"
           data-toggle="tooltip"
           data-placement="top"
           title="<?php echo esc_attr(get_the_title()); ?>"
           data-original-title="<?php echo esc_attr(get_the_title()); ?>">

            <?php
            $thumb_url = get_the_post_thumbnail_url(get_the_ID(), "thumb-foto");
            $thumb_meta = wp_get_attachment_metadata(get_post_thumbnail_id());

            if ($thumb_url && $thumb_meta): ?>
                <img src="<?php echo esc_url($thumb_url); ?>"
                     class="thumb-foto rounded img-fluid"
                     width="<?php echo esc_attr($thumb_meta["width"]); ?>"
                     height="<?php echo esc_attr($thumb_meta["height"]); ?>"
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
