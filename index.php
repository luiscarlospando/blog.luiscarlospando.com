<?php get_header(); ?>

	<section id="main-content" class="container site-body">
		<div class="row">
			<div class="col-12 col-md-10 offset-md-1">
				<h1 class="text-center"><?php _e("Blog", "html5blank"); ?></h1>

				<ul class="list-inline mb-4 text-center">
                    <li class="list-inline-item">
                        <a class="btn btn-primary btn-sm" href="https://subscribeopenly.net/subscribe/?url=https://blog.luiscarlospando.com/rss" rel="me noopener">
                            <i class="fa-solid fa-rss"></i> Suscribirse
                        </a>
                    </li>
                </ul>

				<?php get_template_part("loop"); ?>

				<?php get_template_part("pagination"); ?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
