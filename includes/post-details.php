<?php
/**
 * Template part for displaying post metadata
 * Shows author, publication/update date, permalink and edit link
 */

// Get post timestamps
$published_timestamp = get_the_time("U");
$modified_timestamp = get_the_modified_time("U");
$ONE_DAY_IN_SECONDS = 86400;

// Check if post was meaningfully modified (more than 24h after publication)
$is_modified =
    $modified_timestamp >= $published_timestamp + $ONE_DAY_IN_SECONDS;

// Common data preparation
global $post;
if (isset($post->post_author)) {
    // Get author's nicename (slug)
    $author_nicename = get_the_author_meta("user_nicename", $post->post_author);

    // Construct the author URL manually with the correct subdomain
    $author_url =
        "https://blog.luiscarlospando.com/author/" . $author_nicename . "/";

    $author_link =
        '<a href="' .
        esc_url($author_url) .
        '" rel="author">' .
        esc_html(get_the_author_meta("display_name", $post->post_author)) .
        "</a>";
} else {
    $author_link = "";
}

$mastodon_url = include "return-mastodon-account.php";
$permalink = get_the_permalink();

// Prepare time-related data
$current_time = current_time("U");
$relative_time = human_time_diff(
    $is_modified ? $modified_timestamp : $published_timestamp,
    $current_time
);

// Prepare the full date format
$date_format = 'l, j \d\e F \d\e Y';
$time_format = "g:i a";
$full_date = $is_modified
    ? get_the_modified_time($date_format)
    : get_the_time($date_format);
$full_time = $is_modified
    ? get_the_modified_time($time_format)
    : get_the_time($time_format);
?>

<div class="post-details">
    <!-- Author -->
    <span class="author">
        <?php echo esc_html_e(
            $is_modified ? "Actualizado por" : "Por",
            "html5blank"
        ); ?>
        <?php echo $author_link; ?>
    </span>

    <!-- Mastodon -->
    <span class="mastodon">
        (<a href="<?php echo esc_url($mastodon_url); ?>"
            data-toggle="tooltip"
            data-placement="bottom"
            title="<?php echo esc_attr__(
                "Sígueme en Mastodon",
                "html5blank"
            ); ?>"
            target="_blank"
            rel="me noopener">
            <i class="fa-brands fa-mastodon" aria-hidden="true"></i>
            <span class="screen-reader-text">Mastodon</span> @mijo
        </a>)
    </span>

    <!-- Date/Time -->
    <time class="date"
          datetime="<?php echo esc_attr(
              $is_modified ? $modified_timestamp : $published_timestamp
          ); ?>"
          data-toggle="tooltip"
          data-placement="bottom"
          title="<?php echo esc_attr("$full_date a la(s) $full_time"); ?>">
        <?php echo sprintf(
            esc_html__("hace %s", "html5blank"),
            $relative_time
        ); ?>
    </time>

    <!-- Separator -->
    <span class="separator" aria-hidden="true">&middot;</span>

    <!-- Permalink -->
    <span class="permalink">
        <a href="<?php echo esc_url($permalink); ?>" rel="bookmark">
            <i class="fa-solid fa-link" aria-hidden="true"></i>
            <span class="screen-reader-text"><?php esc_html_e(
                "Enlace permanente",
                "html5blank"
            ); ?></span>
            Permalink
        </a>
    </span>

    <!-- Edit Link -->
    <?php edit_post_link(
        sprintf(
            '<i class="fa-solid fa-pen-to-square" aria-hidden="true"></i> %s',
            esc_html__("Editar", "html5blank")
        ),
        '<span class="edit-link">',
        "</span>",
        null,
        "btn btn-primary btn-sm ml-2"
    ); ?>
</div>
