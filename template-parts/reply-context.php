<?php
/**
 * Template part for displaying the "Respondiendo a" (reply context) indicator.
 * Relies on the current loop post — include only after the_post().
 */

$reply_context = get_field("reply_context");

// "por Autor" is redundant when replying to my own blog — skip it there.
$own_domain = get_field("dominio", "option");
$is_own_domain =
    !empty($reply_context["reply_url"]) &&
    $own_domain &&
    strpos($reply_context["reply_url"], $own_domain) !== false;
?>

<?php if (!empty($reply_context["is_reply"]) && !empty($reply_context["reply_url"])): ?>
<div class="reply-context">
    <p class="mb-0">
        <small>
            <i class="fa-solid fa-comments reply-context-icon"></i>
            Respondiendo a
            <a class="u-in-reply-to" href="<?php echo esc_url($reply_context["reply_url"]); ?>" target="_blank" rel="noopener">&ldquo;<?php echo esc_html($reply_context["reply_title"]); ?>&rdquo;</a><?php if (!empty($reply_context["reply_author"]) && !$is_own_domain): ?> por <?php echo esc_html($reply_context["reply_author"]); ?><?php endif; ?>
        </small>
    </p>
</div>
<?php endif; ?>
