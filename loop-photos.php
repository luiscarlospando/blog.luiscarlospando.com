<?php
$current_year = "";
$posts_by_year = [];

if (have_posts()) {
    while (have_posts()) {
        the_post();
        $post_year = get_the_date("Y");
        $posts_by_year[$post_year][] = get_the_ID();
    }

    global $post;

    foreach ($posts_by_year as $year => $post_ids):
        echo '<h2 class="year-heading mb-3">' . esc_html($year) . "</h2>";
        echo '<div class="masonry-grid" data-year="' . esc_attr($year) . '">';
        echo '<div class="grid-sizer col-6 col-md-4"></div>';

        $initial_posts = array_slice($post_ids, 0, 6);
        foreach ($initial_posts as $post_id):
            $post = get_post($post_id);
            setup_postdata($post);
            get_template_part("includes/photo-card");
        endforeach;

        echo "</div>"; // .masonry-grid

        if (count($post_ids) > 6):
            echo '<div class="pagination text-center mt-3" data-year="' .
                esc_attr($year) .
                '">';
            echo '<button class="btn btn-primary load-more-btn" data-year="' .
                esc_attr($year) .
                '" data-offset="6">';
            echo '<i class="fa-solid fa-arrow-rotate-right fa-spin d-none"></i> Cargar más fotos';
            echo "</button>";
            echo "</div>";
        endif;
    endforeach;

    wp_reset_postdata();
} else {
     ?>
    <article>
        <p class="title text-center"><?php _e(
            "Sorry, nothing to display.",
            "html5blank"
        ); ?> 😵</p>
    </article>
<?php
}
?>
