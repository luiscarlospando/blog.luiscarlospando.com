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
        '" target="_blank" rel="noopener noreferrer">a este post en <i class="fa-brands fa-mastodon"></i> Mastodon</a>';
} else {
    // For posts without a corresponding Mastodon toot
    echo "en <i class='fa-brands fa-mastodon'></i> Mastodon (este post no tiene un toot asociado en Mastodon 😐)";
}
