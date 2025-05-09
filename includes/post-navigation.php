<nav class="primary_navigation">
    <div class="row">
        <!-- Previous Post Link -->
        <div class="col-6 text-left">
            <?php
            // Check if current post is in "Fotos" category
            $in_fotos = has_category("fotos");

            // Get previous post, excluding or including only "Fotos" based on current post
            $previous_post = get_previous_post(!$in_fotos, "", "category");

            // If we're in "Fotos", get previous post only from "Fotos" category
            if ($in_fotos) {
                $previous_post = get_previous_post(true, "", "category");
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
            // Check if current post is in "Fotos" category
            $in_fotos = has_category("fotos");

            // Get next post, excluding or including only "Fotos" based on current post
            $next_post = get_next_post(!$in_fotos, "", "category");

            // If we're in "Fotos", get next post only from "Fotos" category
            if ($in_fotos) {
                $next_post = get_next_post(true, "", "category");
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
