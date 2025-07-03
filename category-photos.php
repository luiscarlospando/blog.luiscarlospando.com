<?php get_header(); ?>

<section id="main-content" class="container site-body">
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <h1 class="text-center"><?php
            _e("", "html5blank");
            single_cat_title();
            ?></h1>

            <p class="text-center">
                Fotos que he tomado con mi iPhone o que me han tomado.<br>
                También puede haber algunas que haya visto en redes sociales.
            </p>

            <!-- Remove the row div since masonry will handle the grid -->
            <div class="masonry-grid">
                <div class="grid-sizer col-6 col-md-4"></div>
                <?php get_template_part("loop-photos"); ?>
            </div>

            <?php get_template_part("pagination"); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
