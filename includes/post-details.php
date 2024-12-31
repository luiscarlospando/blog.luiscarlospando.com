<?php
/**
 * Template part for displaying post metadata
 * Shows author, publication/update date, permalink and edit link
 */

// Set timezone explicitly
date_default_timezone_set("America/Mexico_City");

// Set locale for Spanish date formatting
setlocale(LC_TIME, "es_MX.UTF-8", "es_MX", "es", "spanish");

// Get post timestamps with timezone consideration
$published_timestamp = get_post_time("U", true); // true for GMT
$modified_timestamp = get_post_modified_time("U", true); // true for GMT
$ONE_DAY_IN_SECONDS = 86400;

// Check if post was meaningfully modified
$is_modified =
    $modified_timestamp >= $published_timestamp + $ONE_DAY_IN_SECONDS;

// Common data preparation
$author_link = get_the_author_posts_link();
$mastodon_url = include "return-mastodon-account.php";
$permalink = get_the_permalink();

// Create DateTime object with correct timezone
$datetime = new DateTime();
$timestamp_to_use = $is_modified ? $modified_timestamp : $published_timestamp;
$datetime->setTimestamp($timestamp_to_use);
$datetime->setTimezone(new DateTimeZone("America/Mexico_City"));

// Format dates using strftime for Spanish localization
$full_date = strftime("%A, %d de %B de %Y", $datetime->getTimestamp());
$full_time = $datetime->format("g:i a"); // Keep time format as is

// Make first letter lowercase for Spanish style
$full_date = mb_strtolower($full_date, "UTF-8");

// Debug information
echo "Debug:<br>";
echo "Timestamp used: " . $timestamp_to_use . "<br>";
echo "Raw DateTime: " . $datetime->format("Y-m-d H:i:s") . "<br>";
echo "Formatted date: " . $full_date . "<br>";
echo "Formatted time: " . $full_time . "<br>";
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
