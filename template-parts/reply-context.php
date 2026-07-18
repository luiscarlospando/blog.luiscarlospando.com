<?php
/**
 * Template part for displaying the "Respondiendo a" (reply context) indicator.
 * Relies on the current loop post — include only after the_post().
 */

$reply_context = get_field("reply_context");
?>

<?php if (!empty($reply_context["is_reply"]) && !empty($reply_context["reply_url"])): ?>
<p class="reply-context text-muted">
    <i class="fa-solid fa-reply"></i>
    Respondiendo a
    <a class="u-in-reply-to" href="<?php echo esc_url($reply_context["reply_url"]); ?>" target="_blank" rel="noopener">&ldquo;<?php echo esc_html($reply_context["reply_title"]); ?>&rdquo;</a><?php if (!empty($reply_context["reply_author"])): ?> de <?php echo esc_html($reply_context["reply_author"]); ?><?php endif; ?>
</p>
<?php endif; ?>
