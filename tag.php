<?php
get_header();

$tag = get_queried_object();
$tag_post_count = $tag->count;
?>

	<section id="main-content" class="container site-body">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
				<h1 class="text-center">
                    <span class="badge badge-custom">
                        <?php
                        _e("", "html5blank");
                        echo single_tag_title("#", false);
                        ?>
                    </span>
                </h1>

                <p class="text-center">
                    <?php echo $tag_post_count; ?> post<?php if (
     $tag_post_count > 1
 ) {
     echo "s";
 } ?> etiquetado<?php if ($tag_post_count > 1) {
     echo "s";
 } ?> con <?php echo single_tag_title("#", false); ?>
                </p>

				<?php get_template_part("loop"); ?>

				<?php get_template_part("pagination"); ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
