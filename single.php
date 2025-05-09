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
                                        get_category_link($category->term_id)
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
                 echo '<a class="badge badge-primary" href="' .
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
					<h2>Comentarios</h2>

					<div class="comments-disclaimer mb-4">
						Si quieres comentar algo debes de tener una cuenta de <a href="<?php include "includes/mastodon-account.php"; ?>" rel="me" target="_blank"><i class="fa-brands fa-mastodon"></i> Mastodon</a> (las razones las explico <a href="https://blog.luiscarlospando.com/coding/2023/02/hay-nuevo-sistema-de-comentarios-en-mi-blog/">aquí</a>) y enviar un <em>reply</em> al <em><?php
$post_id = get_the_ID();
$toot_url = get_post_meta($post_id, "_mastodon_toot_url", true);

// Debug output
error_log("Post ID: " . $post_id);
error_log("Toot URL from meta: " . ($toot_url ? $toot_url : "not found"));

// If no toot URL is found, try to find it now
if (!$toot_url) {
    error_log("No toot URL found, trying to fetch it now...");
    if (force_check_mastodon_toot($post_id)) {
        $toot_url = get_post_meta($post_id, "_mastodon_toot_url", true);
        error_log("Found toot URL after forced check: " . $toot_url);
    }
}

if ($toot_url) {
    echo '<a id="mastodon-toot" href="' .
        esc_url($toot_url) .
        '" target="_blank">toot</a>';
} else {
    // Debug output in HTML (you can remove this later)
    echo "<!-- No Mastodon toot URL found for post ID: " . $post_id . " -->";
}
?>
</em> de este post (todos mis posts son <em>auto-tootéados</em> en Mastodon). Si le das like <em>like</em> o le das <em>boost</em> también aparecerás aquí debajo). Si no tienes cuenta y te gustaría decir algo, checa mi <a href="https://luiscarlospando.com/contacto"><i class="fa-solid fa-address-card"></i> página de contacto</a> o contáctame vía <a href="https://discordapp.com/users/86571896581132288/" rel="me" target="_blank"><i class="fa-brands fa-discord"></i> Discord</a>.
					</div>

					<div id="webmentions-comments-subtitle"></div>

					<div id="webmentions-comments"></div>
					<!-- /comments - replies -->

					<!-- support me -->
					<h3 class="text-center">¿Te gustó este post? <i class="fa-solid fa-heart"></i></h3>

					<div class="share-post card text-center mb-4">
						<div class="card-body">
							Puedes apoyarme <a class="btn btn-primary btn-sm" href="https://buymeacoffee.com/luiscarlospando" target="_blank"><i class="fa-solid fa-mug-hot"></i> Comprándome un café</a>, siguiéndome en <a class="btn btn-primary btn-sm" href="<?php include "includes/mastodon-account.php"; ?>" rel="me" target="_blank"><i class="fa-brands fa-mastodon"></i> Mastodon</a> y/o en <a class="btn btn-primary btn-sm" href="<?php include "includes/bluesky-account.php"; ?>" rel="me" target="_blank"><i class="fa-brands fa-bluesky"></i> Bluesky</a> o suscribiéndote con <a class="btn btn-primary btn-sm" href="https://<?php include "includes/site-domain.php"; ?>/rss/"> <i class="fas fa-rss"></i> RSS</a> para recibir notificaciones.
						</div>
					</div>
					<!-- /suppor me -->

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

					<h1><?php _e("Sorry, nothing to display.", "html5blank"); ?></h1>

				</article>
				<!-- /article -->

			<?php
   endif; ?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
