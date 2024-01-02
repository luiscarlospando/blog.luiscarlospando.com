<?php get_header(); ?>

	<section id="main-content" class="container site-body">
		<div class="row">
			<div class="col-12 col-md-10 offset-md-1">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<!-- the category -->
					<p class="categories">
						<span class="small"><?php _e( '', 'html5blank' ); the_category(', '); // Separated by commas ?></span>
					</p>
					<!-- /the category -->

					<!-- post title -->
					<h1 class="title">
						<?php the_title(); ?>
					</h1>
					<!-- /post title -->

					<!-- post details -->
					<?php include 'includes/post-details.php'; ?>
					<!-- /post details -->

					<!-- content -->
					<?php the_content(); // Dynamic Content ?>

					<?php edit_post_link('<i class="fa-solid fa-pen-to-square"></i> Editar', '', '', null, 'btn btn-primary mb-3'); ?>
					<!-- /content -->

					<!-- hashtags -->
					<div class="hashtag-list">
						<?php
							if( $tags = get_the_tags() ) {
								echo '<em><span class="meta-sep"></span></em>';
								foreach( $tags as $tag ) {
									$sep = ( $tag === end( $tags ) ) ? '' : ' ';
									echo '<span class="badge badge-primary"><a href="' . get_term_link( $tag, $tag->taxonomy ) . '">#' . $tag->name . '</a></span>' . $sep;
								}
							}
						?>
					</div>
					<!-- /hashtags -->

					<!-- kudos -->
					<h2>Kudos</h2>

					<button class="btn btn-primary tinylytics_kudos"></button>
					<!-- kudos -->

					<!-- webmentions -->
					<h2>Comentarios</h2>

					<div class="comments-disclaimer mb-3">
						Para comentar aquí basta con mandarme un <em>reply</em> o interactuar de alguna manera con el toot de este post (darle <em>like</em> o darle <em>boost</em>) vía <a href="<?php include('includes/mastodon-account.php'); ?>" target="_blank"><i class="fa-brands fa-mastodon"></i> Mastodon</a> (las razones las explico <a href="https://blog.luiscarlospando.com/coding/2023/02/hay-nuevo-sistema-de-comentarios-en-mi-blog/">aquí</a>). Si no tienes cuenta y aún así te gustaría decirme algo, entonces me puedes contactar en <a href="https://luiscarlospando.com/contacto"><i class="fa-solid fa-envelope"></i> hey@luiscarlospando.com</a> o <a href="https://discordapp.com/users/86571896581132288/" target="_blank"><i class="fa-brands fa-discord"></i> Discord</a>.
					</div>

					<div id="webmentions-likes-subtitle"></div>

					<ul id="webmentions-likes" class="list-inline"></ul>

					<div id="webmentions-boosts-subtitle"></div>

					<ul id="webmentions-boosts" class="list-inline"></ul>

					<div id="webmentions-comments-subtitle"></div>

					<div id="webmentions-comments"></div>
					<!-- /webmentions -->

					<!-- toot this post -->
					<div class="share-post card text-center mb-4">
						<div class="card-body">
							Si te gustó este post, por favor considera seguir <a class="btn btn-primary btn-sm" href="https://hachyderm.io/@luiscarlospando" target="_blank"><i class="fa-brands fa-mastodon"></i> @luiscarlospando</a> en Mastodon para recibir notificaciones o si prefieres, también te puedes suscribir por <a class="btn btn-primary btn-sm" href="https://blog.luiscarlospando.com/rss/" target="_blank"> <i class="fas fa-rss"></i> RSS</a>.
						</div>
					</div>
					<!-- /toot this post -->

					<!-- prev-next -->
					<div class="primary_navigation">
						<div class="row">
							<div class="col-6 text-left">
							<?php 
								$previous = get_previous_post();
								if( (strlen($previous->post_title) > 0) ) { ?>
								<a href="<?php echo get_permalink($previous); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo get_the_title($previous); ?>">
									<h4><i class="fa-solid fa-arrow-left"></i> Anterior</h4>
								</a>
							<?php } ?>
							</div>
							<div class="col-6 text-right">
							<?php 
								$next = get_next_post();
								if( (strlen($next->post_title) > 0) ) { ?>
								<a href="<?php echo get_permalink($next); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo get_the_title($next); ?>">
									<h4>Siguiente <i class="fa-solid fa-arrow-right"></i></h4>
								</a>
							<?php } ?>
							</div>
						</div>
					</div>
					<!-- /prev-next -->

				</article>
				<!-- /article -->

			<?php endwhile; ?>

			<?php else: ?>

				<!-- article -->
				<article>

					<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

				</article>
				<!-- /article -->

			<?php endif; ?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
