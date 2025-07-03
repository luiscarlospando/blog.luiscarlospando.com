<?php get_header(); ?>

	<section id="main-content" class="container site-body">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
				<h1 class="text-center"><?php
    _e("", "html5blank");
    single_cat_title();
    ?></h1>

				<?php get_template_part("loop"); ?>

				<?php get_template_part("pagination"); ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
