<!-- post details -->
<?php
$u_time = get_the_time("U");
$u_modified_time = get_the_modified_time("U");

if ($u_modified_time >= $u_time + 86400): ?>
	<div class="post-details">
		<span class="author">
			<?php _e("Actualizado por", "html5blank"); ?> <?php the_author_posts_link(); ?>
		</span>
		<span class="mastodon">(<a href="<?php include "mastodon-account.php"; ?>" data-toggle="tooltip" data-placement="bottom" title="Sígueme en Mastodon" target="_blank">
			<i class="fa-brands fa-mastodon"></i> @mijo</a>)
		</span>
		<time class="date" data-toggle="tooltip" data-placement="bottom" title="<?php the_modified_time(
      'l, j \d\e F \d\e Y'
  ); ?> a la(s) <?php the_modified_time("g:i a"); ?>"><?php echo "hace " .
    human_time_diff(get_the_modified_time("U"), current_time("U")); ?></time>
		&middot;
		<span class="permalink">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<i class="fa-solid fa-link"></i> Permalink
			</a>
		</span>
		<?php edit_post_link(
      '<i class="fa-solid fa-pen-to-square"></i> Editar',
      "",
      "",
      null,
      "btn btn-primary btn-sm ml-2"
  ); ?>
	</div>
<?php else: ?>
	<div class="post-details">
		<span class="author">
			<?php _e("Por", "html5blank"); ?> <?php the_author_posts_link(); ?>
		</span>
		<span class="mastodon">(<a href="<?php include "mastodon-account.php"; ?>" data-toggle="tooltip" data-placement="bottom" title="Sígueme en Mastodon" target="_blank">
			<i class="fa-brands fa-mastodon"></i> @mijo</a>)
		</span>
		<time class="date" data-toggle="tooltip" data-placement="bottom" title="<?php the_time(
      'l, j \d\e F \d\e Y'
  ); ?> a la(s) <?php the_time("g:i a"); ?>"><?php echo "hace " .
    human_time_diff(get_the_time("U"), current_time("U")); ?></time>
		&middot;
		<span class="permalink">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<i class="fa-solid fa-link"></i> Permalink
			</a>
		</span>
		<?php edit_post_link(
      '<i class="fa-solid fa-pen-to-square"></i> Editar',
      "",
      "",
      null,
      "btn btn-primary btn-sm ml-2"
  ); ?>
	</div>
<?php endif;
?>
<!-- /post details -->
