<?php
$post_id = get_the_ID();
$toot_url = get_post_meta($post_id, "_mastodon_toot_url", true);

if (!$toot_url) {
    force_check_mastodon_toot($post_id);
    $toot_url = get_post_meta($post_id, "_mastodon_toot_url", true);
}

if ($toot_url) {
    echo '<a id="mastodon-toot" href="' .
        esc_url($toot_url) .
        '" target="_blank"><i class="fa-solid fa-reply"></i> Envía un reply aquí para comentar</a>';
} else {
    // For posts without a corresponding Mastodon toot
    echo "Una disculpa, no hay un toot asociado a este post en Mastodon 😐, por lo tanto no puedes comentar ni interactuar de ninguna manera.";
}
