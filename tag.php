<?php get_header(); ?>

	<section id="main-content" class="container site-body">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
				<h1 class="text-center">
                    <span class="badge badge-primary">
                        <?php
                        _e("", "html5blank");
                        echo single_tag_title("#", false);
                        ?>
                    </span>
                </h1>

				<?php get_template_part("loop"); ?>

				<?php get_template_part("pagination"); ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
