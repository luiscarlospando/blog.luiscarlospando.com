<nav class="primary_navigation">
    <div class="row">
        <!-- Previous Post Link -->
        <div class="col-6 text-left">
            <?php
            $previous_post = get_previous_post();
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
            $next_post = get_next_post();
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
