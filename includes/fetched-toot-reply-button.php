<?php
$post_id = get_the_ID();
$toot_url = get_post_meta($post_id, "_mastodon_toot_url", true);

if (!$toot_url) {
    force_check_mastodon_toot($post_id);
    $toot_url = get_post_meta($post_id, "_mastodon_toot_url", true);
}

if ($toot_url) {
    echo '<li class="list-inline-item"><a class="btn btn-primary btn-sm" id="btn-mastodon-toot" href="' .
        esc_url($toot_url) .
        '" title="Enviar comentario" target="_blank" style="vertical-align: super;"><i class="fa-solid fa-reply"></i> Enviar comentario</a></li>';
} else {
    // For posts without a corresponding Mastodon toot
    echo "";
}
