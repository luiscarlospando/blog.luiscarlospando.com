<?php get_header(); ?>

<section id="main-content" class="container site-body">
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <h1 class="text-center"><?php
            _e("", "html5blank");
            single_cat_title();
            ?></h1>

            <p class="text-center">
                Algunas fotos que tomo con mi teléfono o fotos que me ha tomado alguien más.
            </p>

            <p class="text-center">
                <a class="btn btn-primary btn-sm" href="https://subscribeopenly.net/subscribe/?url=<?php echo site_url(); ?>/photos/rss" rel="me">
                    <i class="fa-solid fa-rss"></i> Suscribirse
                </a>
            </p>

            <?php get_template_part("loop-photos"); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
