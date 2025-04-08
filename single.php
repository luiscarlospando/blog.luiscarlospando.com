<?php get_header(); ?>

	<section id="main-content" class="container site-body">
		<div class="row">
			<div class="col-12 col-md-10 offset-md-1">
			<?php if (have_posts()):
       while (have_posts()):
           the_post(); ?>
				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(["h-entry"]); ?>>

					<!-- the category -->
					<p class="categories">
						<span class="small"><?php
      _e("", "html5blank");
      the_category(", ");

           // Separated by commas
           ?></span>
					</p>
					<!-- /the category -->

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
                 echo '<a class="badge badge-dark" href="' .
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

					<button class="btn btn-primary tinylytics_kudos mb-3"></button>

					<div id="webmentions-likes-subtitle"></div>

					<ul id="webmentions-likes" class="list-inline"></ul>

					<div id="webmentions-boosts-subtitle"></div>

					<ul id="webmentions-boosts" class="list-inline"></ul>
					<!-- /likes & boosts -->

					<!-- comments - replies -->
					<h2>Comentarios</h2>

					<div class="comments-disclaimer mb-3">
						Para comentar aquí basta con mandarme un <em>reply</em> o interactuar de alguna manera con el toot de este post (darle <em>like</em> o darle <em>boost</em>) vía <a href="<?php include "includes/mastodon-account.php"; ?>" rel="me" target="_blank"><i class="fa-brands fa-mastodon"></i> Mastodon</a> (las razones las explico <a href="https://blog.luiscarlospando.com/coding/2023/02/hay-nuevo-sistema-de-comentarios-en-mi-blog/">aquí</a>). Si no tienes cuenta y aún así te gustaría decirme algo, me puedes contactar en <a href="https://luiscarlospando.com/contacto"><i class="fa-solid fa-address-card"></i> mi página de contacto</a> o por <a href="https://discordapp.com/users/86571896581132288/" rel="me" target="_blank"><i class="fa-brands fa-discord"></i> Discord</a>.
					</div>

					<div id="webmentions-comments-subtitle"></div>

					<div id="webmentions-comments"></div>
					<!-- /comments - replies -->

					<!-- support me -->
					<h3 class="text-center">¿Te gustó este post? <i class="fa-solid fa-heart"></i></h3>

					<div class="share-post card text-center mb-4">
						<div class="card-body">
							Puedes apoyarme <a class="btn btn-primary btn-sm" href="https://donate.stripe.com/6oEdThfw66PddDG144?locale=es-419" target="_blank"><i class="fa-solid fa-circle-dollar-to-slot"></i> Donando</a> lo que gustes. Otra forma de ayudarme es siguiéndome en <a class="btn btn-primary btn-sm" href="<?php include "includes/mastodon-account.php"; ?>" rel="me" target="_blank"><i class="fa-brands fa-mastodon"></i> Mastodon</a> o suscribirte con <a class="btn btn-primary btn-sm" href="https://blog.luiscarlospando.com/rss/" target="_blank"> <i class="fas fa-rss"></i> RSS</a> para recibir notificaciones.
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
