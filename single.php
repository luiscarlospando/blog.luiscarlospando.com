<?php get_header(); ?>

	<section id="main-content" class="container site-body">
		<div class="row">
			<div class="col-12 col-md-10 offset-md-1">
			<?php if (have_posts()):
       while (have_posts()):
           the_post(); ?>
				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(["h-entry"]); ?>>

					<!-- the categories -->
					<ul class="list-inline mt-4 mb-1">
                        <?php
                        $categories = get_the_category();
                        if ($categories) {
                            foreach ($categories as $category) {
                                echo '<li class="list-inline-item">';
                                echo '<a href="' .
                                    esc_url(
                                        get_category_link($category->term_id),
                                    ) .
                                    '" class="badge badge-secondary">';
                                echo esc_html($category->name);
                                echo "</a>";
                                echo "</li>";
                            }
                        }
                        ?>
                    </ul>
					<!-- /the categoies -->

					<!-- post title -->
					<h1 class="title">
						<?php the_title(); ?>
					</h1>
					<!-- /post title -->

					<!-- post details -->
					<?php include "includes/post-details.php"; ?>
					<!-- /post details -->

					<!-- content -->
					<div class="e-content">
					   <?php the_content(); ?>
					</div>
					<!-- /content -->

					<!-- h-card -->
					<div class="p-author h-card d-none">
                        <a class="u-url p-name" href="https://<?php include "includes/site-domain.php"; ?>/">Luis Carlos Pando</a>
                        <img class="u-photo" src="https://<?php include "includes/site-domain.php"; ?>/assets/images/avatar.webp">
					</div>
					<!-- /h-card -->

					<!-- hashtags -->
					<div class="hashtag-list">
    					<?php if ($tags = get_the_tags()) {
             echo '<em><span class="meta-sep"></span></em>';
             foreach ($tags as $tag) {
                 $sep = $tag === end($tags) ? "" : " ";
                 echo '<a class="badge badge-custom" href="' .
                     get_term_link($tag, $tag->taxonomy) .
                     '">#' .
                     $tag->name .
                     "</a>" .
                     $sep;
             }
         } ?>
					</div>
					<!-- /hashtags -->

					<!-- likes & boosts -->
					<ul class="list-inline mb-0">
						<li class="list-inline-item">
							<h3 class="mt-0">Likes</h3>
						</li>
					</ul>

					<button class="btn btn-primary tinylytics_kudos"></button>

					<div id="webmentions-likes-subtitle" class="mt-3"></div>

    				<ul id="webmentions-likes" class="list-inline"></ul>

					<div id="webmentions-boosts-subtitle" class="mt-3"></div>

    				<ul id="webmentions-boosts" class="list-inline"></ul>
					<!-- /likes & boosts -->

					<!-- comments - replies -->
					<ul class="comments-title list-inline">
	                    <li class="list-inline-item">
							<h2>Comentarios</h2>
						</li>
					</ul>

					<div class="comments-disclaimer mb-4">
						 <a href="https://blog.luiscarlospando.com/coding/2025/09/en-busqueda-de-nuevo-sistema-de-comentarios-para-mi-blog/">Sigo evaluando</a> una manera de volver a implementar sistema de comentarios en mi sitio. Pero por mientras puedes interactuar dando <i class="fa-solid fa-thumbs-up"></i> <em>like</em> o <i class="fa-solid fa-rocket"></i> <em>boost</em> <?php include "includes/fetched-toot-link.php"; ?> para aparecer aquí arriba. Si quieres decirme algo que no tenga nada que ver con este post entonces ve a mi <a href="https://<?php include "includes/site-domain.php"; ?>/contact"><i class="fa-solid fa-address-card"></i> página de contacto</a> o contáctame vía <a href="https://discordapp.com/users/86571896581132288/" rel="me" target="_blank"><i class="fa-brands fa-discord"></i> Discord</a>.
					</div>

					<div id="webmentions-comments-subtitle"></div>

					<div id="webmentions-comments"></div>
					<!-- /comments - replies -->

					<!-- support me -->
					<h3 class="text-center">¿Te gustó este post? <i class="fa-solid fa-heart"></i></h3>

					<div class="share-post card text-center mb-4">
                       	<div class="card-body">
                            <p>Entonces te invito a leer más posts del <a class="btn btn-primary btn-sm" href="https://blog.<?php include "includes/site-domain.php"; ?>/"><i class="fa-solid fa-file-pen"></i> Blog</a>, o a checar mi <a class="btn btn-primary btn-sm" href="https://<?php include "includes/site-domain.php"; ?>/now"><i class="fa-solid fa-clock"></i> Now</a> para saber en qué ando, o a pasar a dejarme un saludo en mi <a class="btn btn-primary btn-sm" href="https://<?php include "includes/site-domain.php"; ?>/guestbook"><i class="fa-solid fa-file-signature"></i> Guestbook</a>.</p>

                            <br>

                            <p>También me puedes apoyar
                            <a class="btn btn-primary btn-sm" href="https://buymeacoffee.com/luiscarlospando" target="_blank">
                                <i class="fa-solid fa-mug-hot"></i> Comprándome un café
                            </a>,

                            <?php if (
                                $mastodon = get_field("mastodon", "option")
                            ): ?>
                                siguiéndome en
                                <a class="btn btn-primary btn-sm" href="<?= esc_url(
                                    $mastodon,
                                ) ?>" rel="me" target="_blank">
                                    <i class="fa-brands fa-mastodon"></i> Mastodon
                                </a>
                            <?php endif; ?>

                            <?php if (
                                $bluesky = get_field("bluesky", "option")
                            ): ?>
                                <?= $mastodon
                                    ? " y/o en "
                                    : "siguiéndome en " ?>
                                <a class="btn btn-primary btn-sm" href="<?= esc_url(
                                    $bluesky,
                                ) ?>" rel="me" target="_blank">
                                    <i class="fa-brands fa-bluesky"></i> Bluesky
                                </a>
                            <?php endif; ?>

                            o
                            <a class="btn btn-primary btn-sm" href="https://<?php include "includes/site-domain.php"; ?>/subscribe/">
                                <i class="fas fa-rss"></i> Suscribiéndote
                            </a> a mi sitio.</p>
                        </div>
					</div>
					<!-- /support me -->

					<!-- prev-next -->
					<?php include "includes/post-navigation.php"; ?>
					<!-- /prev-next -->

				</article>
				<!-- /article -->

			<?php
       endwhile; ?>

			<?php
   else:
        ?>

				<!-- article -->
				<article>

					<h1><?php _e(
         "Sorry, nothing to display.",

         "html5blank",
     ); ?></h1>

				</article>
				<!-- /article -->

			<?php
   endif; ?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
