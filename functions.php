<?php
/**
 * Theme functions.
 *
 * Based on the html5blank starter theme (Todd Motto), heavily customized since.
 */

/*------------------------------------*\
	Theme Setup
\*------------------------------------*/

if (!isset($content_width)) {
    $content_width = 900;
}

if (function_exists("add_theme_support")) {
    add_theme_support("menus");

    add_theme_support("post-thumbnails");
    add_image_size("large", 700, "", true); // Large Thumbnail
    add_image_size("medium", 250, "", true); // Medium Thumbnail
    add_image_size("small", 120, "", true); // Small Thumbnail
    add_image_size("custom-size", 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
    add_image_size("thumb-foto", 600, 9999, false); // Custom Thumbnail Size call using the_post_thumbnail('thumb-foto');

    // Enables post and comment RSS feed links to head
    add_theme_support("automatic-feed-links");

    // Localisation Support
    add_action("after_setup_theme", function () {
        load_theme_textdomain(
            "html5blank",
            get_template_directory() . "/languages",
        );
    });
}

/*------------------------------------*\
	Scripts & Styles
\*------------------------------------*/

// Load scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS["pagenow"] != "wp-login.php" && !is_admin()) {
        wp_register_script(
            "jquery",
            "https://code.jquery.com/jquery-3.7.1.min.js",
            [],
            null,
            true,
        ); // jQuery
        wp_enqueue_script("jquery"); // Enqueue it!

        wp_register_script(
            "clipboardjs",
            "https://luiscarlospando.com/assets/js/clipboard.min.js",
            [],
            null,
            true,
        ); // clipboard.js
        wp_enqueue_script("clipboardjs"); // Enqueue it!

        wp_register_script(
            "luxon",
            "https://luiscarlospando.com/assets/js/luxon.js",
            [],
            null,
            true,
        ); // Luxon.js
        wp_enqueue_script("luxon"); // Enqueue it!

        wp_register_script(
            "app",
            "https://luiscarlospando.com/assets/dist/app.bundle.js",
            [],
            null,
            true,
        ); // App
        wp_enqueue_script("app"); // Enqueue it!
    }
}
add_action("init", "html5blank_header_scripts");

// Localize app script
function localize_app_script()
{
    wp_localize_script("app", "ajaxurl", [
        "url" => admin_url("admin-ajax.php"),
    ]);
}
add_action("wp_enqueue_scripts", "localize_app_script", 20);

// Load styles
function html5blank_styles()
{
    wp_register_style(
        "mmenu",
        "https://luiscarlospando.com/assets/css/jquery.mmenu.all.css",
        [],
        "1.0",
        "all",
    );
    wp_enqueue_style("mmenu"); // Enqueue it!

    wp_register_style(
        "mmenu-themes",
        "https://luiscarlospando.com/assets/css/jquery.mmenu.themes.css",
        [],
        "1.0",
        "all",
    );
    wp_enqueue_style("mmenu-themes"); // Enqueue it!

    wp_register_style(
        "animate-css",
        "https://luiscarlospando.com/assets/css/animate.css",
        [],
        "1.0",
        "all",
    );
    wp_enqueue_style("animate-css"); // Enqueue it!

    wp_register_style(
        "prism",
        "https://luiscarlospando.com/assets/css/prism.css",
        [],
        "1.0",
        "all",
    );
    wp_enqueue_style("prism"); // Enqueue it!

    wp_register_style(
        "main",
        "https://luiscarlospando.com/assets/css/styles.css",
        [],
        "1.0",
        "all",
    );
    wp_enqueue_style("main"); // Enqueue it!
}
add_action("wp_enqueue_scripts", "html5blank_styles");

// Load styles for editor
add_action("enqueue_block_editor_assets", function () {
    wp_enqueue_style(
        "lcp-editor",
        get_template_directory_uri() . "/editor.css",
        [],
        "1.0",
    );
});

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', "", $tag);
}
add_filter("style_loader_tag", "html5_style_remove");

/*------------------------------------*\
	Navigation
\*------------------------------------*/

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus([
        // Using array to specify more menus if needed
        "header-menu" => __("Header Menu", "html5blank"), // Main Navigation
        "sidebar-menu" => __("Sidebar Menu", "html5blank"), // Sidebar Navigation
        "extra-menu" => __("Extra Menu", "html5blank"), // Extra Navigation if needed (duplicate as many as you need!)
    ]);
}
add_action("init", "register_html5_menu");

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = "")
{
    $args["container"] = false;
    return $args;
}
add_filter("wp_nav_menu_args", "my_wp_nav_menu_args");

/*------------------------------------*\
	Head & Body Cleanup
\*------------------------------------*/

remove_action("wp_head", "feed_links_extra", 3); // Display the links to the extra feeds such as category feeds
remove_action("wp_head", "feed_links", 2); // Display the links to the general feeds: Post and Comment Feed
remove_action("wp_head", "rsd_link"); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action("wp_head", "wlwmanifest_link"); // Display the link to the Windows Live Writer manifest file.
remove_action("wp_head", "index_rel_link"); // Index link
remove_action("wp_head", "parent_post_rel_link", 10, 0); // Prev link
remove_action("wp_head", "start_post_rel_link", 10, 0); // Start link
remove_action("wp_head", "adjacent_posts_rel_link", 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action("wp_head", "wp_generator"); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action("wp_head", "adjacent_posts_rel_link_wp_head", 10, 0);
remove_action("wp_head", "rel_canonical");
remove_action("wp_head", "wp_shortlink_wp_head", 10, 0);

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}
add_filter("show_admin_bar", "remove_admin_bar");

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search("blog", $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}
add_filter("body_class", "add_slug_to_body_class");

// Custom Gravatar in Settings > Discussion
function html5blankgravatar($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . "/img/gravatar.jpg";
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}
add_filter("avatar_defaults", "html5blankgravatar");

/*------------------------------------*\
	Widgets & Sidebars
\*------------------------------------*/

// If Dynamic Sidebar Exists
if (function_exists("register_sidebar")) {
    // Define Sidebar Widget Area 1
    register_sidebar([
        "name" => __("Widget Area 1", "html5blank"),
        "description" => __(
            "Description for this widget-area...",
            "html5blank",
        ),
        "id" => "widget-area-1",
        "before_widget" => '<div id="%1$s" class="%2$s">',
        "after_widget" => "</div>",
        "before_title" => "<h3>",
        "after_title" => "</h3>",
    ]);

    // Define Sidebar Widget Area 2
    register_sidebar([
        "name" => __("Widget Area 2", "html5blank"),
        "description" => __(
            "Description for this widget-area...",
            "html5blank",
        ),
        "id" => "widget-area-2",
        "before_widget" => '<div id="%1$s" class="%2$s">',
        "after_widget" => "</div>",
        "before_title" => "<h3>",
        "after_title" => "</h3>",
    ]);
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action("wp_head", [
        $wp_widget_factory->widgets["WP_Widget_Recent_Comments"],
        "recent_comments_style",
    ]);
}
add_action("widgets_init", "my_remove_recent_comments_style");

// Allow shortcodes in Dynamic Sidebar, without the auto <p> tags (better!)
add_filter("widget_text", "do_shortcode");
add_filter("widget_text", "shortcode_unautop");

/*------------------------------------*\
	Comments
\*------------------------------------*/

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (
            is_singular() and
            comments_open() and
            get_option("thread_comments") == 1
        ) {
            wp_enqueue_script("comment-reply");
        }
    }
}
add_action("get_header", "enable_threaded_comments");

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
    $GLOBALS["comment"] = $comment;
    extract($args, EXTR_SKIP);

    if ("div" == $args["style"]) {
        $tag = "div";
        $add_below = "comment";
    } else {
        $tag = "li";
        $add_below = "div-comment";
    }
    ?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag; ?> <?php comment_class(empty($args["has_children"]) ? "" : "parent"); ?> id="comment-<?php comment_ID(); ?>">
	<?php if ("div" != $args["style"]): ?>
	<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args["avatar_size"] != 0) {
     echo get_avatar($comment, $args["180"]);
 } ?>
	<?php printf(
     __('<cite class="fn">%s</cite> <span class="says">says:</span>'),
     get_comment_author_link(),
 ); ?>
	</div>
<?php if ($comment->comment_approved == "0"): ?>
	<em class="comment-awaiting-moderation"><?php _e(
     "Your comment is awaiting moderation.",
 ); ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars(
     get_comment_link($comment->comment_ID),
 ); ?>">
		<?php printf(
      __('%1$s at %2$s'),
      get_comment_date(),
      get_comment_time(),
  ); ?></a><?php edit_comment_link(__("(Edit)"), "  ", ""); ?>
	</div>

	<?php comment_text(); ?>

	<div class="reply">
	<?php comment_reply_link(
     array_merge($args, [
         "add_below" => $add_below,
         "depth" => $depth,
         "max_depth" => $args["max_depth"],
     ]),
 ); ?>
	</div>
	<?php if ("div" != $args["style"]): ?>
	</div>
	<?php endif; ?>
<?php
}

/*------------------------------------*\
	Pagination
\*------------------------------------*/

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
// Called directly from pagination.php
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links([
        "base" => str_replace($big, "%#%", get_pagenum_link($big)),
        "format" => "?paged=%#%",
        "current" => max(1, get_query_var("paged")),
        "total" => $wp_query->max_num_pages,
    ]);
}

/*------------------------------------*\
	Excerpts & Content Filters
\*------------------------------------*/

add_filter("the_excerpt", "shortcode_unautop"); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter("the_excerpt", "do_shortcode"); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
remove_filter("the_excerpt", "wpautop"); // Remove <p> tags from Excerpt altogether

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    return "";
}
add_filter("excerpt_more", "html5_blank_view_article"); // Add 'View Article' button instead of [...] for Excerpts

// Allow the Jetpack Markdown block to contribute to auto-generated excerpts (RSS description, etc.)
function allow_jetpack_markdown_in_excerpt($allowed_blocks)
{
    $allowed_blocks[] = "jetpack/markdown";
    return $allowed_blocks;
}
add_filter("excerpt_allowed_blocks", "allow_jetpack_markdown_in_excerpt");

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}
add_filter("the_category", "remove_category_rel_from_category_list");

// Deactivate wptexturize
add_filter("run_wptexturize", "__return_false");

// Responsive images
function add_image_responsive_class($content)
{
    global $post;
    $pattern = "/<img(.*?)class=\"(.*?)\"(.*?)>/i";
    $replacement = '<img$1class="$2 img-fluid"$3>';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
}
add_filter("the_content", "add_image_responsive_class");

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions($html)
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}
add_filter("post_thumbnail_html", "remove_thumbnail_dimensions", 10); // Remove width and height dynamic attributes to thumbnails
add_filter("image_send_to_editor", "remove_thumbnail_dimensions", 10); // Remove width and height dynamic attributes to post images

// Automatic Shortcodes captions
if (is_admin()) {
    add_filter("image_send_to_editor", "wrap_my_caption", 10, 8);
    function wrap_my_caption(
        $html,
        $id,
        $caption,
        $title,
        $align,
        $url,
        $size,
        $alt,
    ) {
        $completo = 848;
        $grande = 700;
        $pequeno = 250;
        $miniatura = 150;
        if ($size == full) {
            return '[caption id="attachment_' .
                $id .
                '" align="align' .
                $align .
                '" width="' .
                $completo .
                '"]' .
                $html .
                " " .
                $alt .
                "[/caption]";
        } elseif ($size == large) {
            return '[caption id="attachment_' .
                $id .
                '" align="align' .
                $align .
                '" width="' .
                $grande .
                '"]' .
                $html .
                " " .
                $alt .
                "[/caption]";
        } elseif ($size == medium) {
            return '[caption id="attachment_' .
                $id .
                '" align="align' .
                $align .
                '" width="' .
                $pequeno .
                '"]' .
                $html .
                " " .
                $alt .
                "[/caption]";
        } elseif ($size == thumbnail) {
            return '[caption id="attachment_' .
                $id .
                '" align="align' .
                $align .
                '" width="' .
                $miniatura .
                '"]' .
                $html .
                " " .
                $alt .
                "[/caption]";
        }
    }
}

// Remove spaces from wp_tag_cloud()
add_filter("wp_tag_cloud", function ($output) {
    return preg_replace_callback(
        '/(<a[^>]*>)([^<]+)(<\/a>)/',
        function ($matches) {
            $text_without_spaces = str_replace(" ", "", $matches[2]);
            return $matches[1] . $text_without_spaces . $matches[3];
        },
        $output,
    );
});

// Month abbreviations in Spanish
function custom_date_translation($months)
{
    $months["01"] = "ene";
    $months["02"] = "feb";
    $months["03"] = "mar";
    $months["04"] = "abr";
    $months["05"] = "may";
    $months["06"] = "jun";
    $months["07"] = "jul";
    $months["08"] = "ago";
    $months["09"] = "sep";
    $months["10"] = "oct";
    $months["11"] = "nov";
    $months["12"] = "dic";
    return $months;
}
add_filter("month_abbrev", "custom_date_translation");

/*------------------------------------*\
	SEO / Meta Tags
\*------------------------------------*/

// Custom title function
function lcp_custom_title()
{
    if (is_front_page() || is_home()) {
        return "Blog - Luis Carlos Pando";
    } elseif (is_singular()) {
        return single_post_title("", false) . " - Luis Carlos Pando";
    } elseif (is_category()) {
        return single_cat_title("", false) . " - Luis Carlos Pando";
    } elseif (is_tag()) {
        return single_tag_title("", false) . " - Luis Carlos Pando";
    } elseif (is_author()) {
        return "Archivos del blog - Luis Carlos Pando";
    } elseif (is_date()) {
        if (is_year()) {
            return get_the_date("Y") . " - Luis Carlos Pando";
        } elseif (is_month()) {
            return get_the_date("F Y") . " - Luis Carlos Pando";
        } elseif (is_day()) {
            return get_the_date("j F Y") . " - Luis Carlos Pando";
        }
    } elseif (is_search()) {
        return 'Resultados de búsqueda para "' .
            get_search_query() .
            '" - Luis Carlos Pando';
    } elseif (is_404()) {
        return "Página no encontrada - Luis Carlos Pando";
    } elseif (is_archive()) {
        return post_type_archive_title("", false) . " - Luis Carlos Pando";
    } else {
        return wp_title("", false, "right") . " - Luis Carlos Pando";
    }
}

// archive.php title
function lcp_archive_title()
{
    if (is_date()) {
        if (is_year()) {
            return "Archivos (" . get_the_date("Y") . ")";
        } elseif (is_month()) {
            return "Archivos (" . get_the_date("F Y") . ")";
        } elseif (is_day()) {
            return "Archivos (" . get_the_date("j F Y") . ")";
        }
    } else {
        return __("Archivos", "html5blank");
    }
}

// Function to get the meta tag title
function get_meta_title()
{
    $site_name = get_bloginfo("name");
    if (is_category()) {
        return sprintf("%s - %s", single_cat_title("", false), $site_name);
    }
    if (is_tag()) {
        return sprintf("%s - %s", single_tag_title("", false), $site_name);
    }
    if (is_author()) {
        return sprintf("Archivos del blog - %s", $site_name);
    }
    if (is_single() || is_page()) {
        return sprintf("%s - %s", get_the_title(), $site_name);
    }
    return $site_name;
}

// Function to get the meta tag description
function get_meta_description()
{
    global $post;
    if (is_single() || is_page()) {
        // Guardamos el contenido original del post
        $description = get_the_excerpt($post);
        if (empty($description)) {
            $description = wp_trim_words(get_the_content(), 55, "...");
        }
        return $description;
    }
    if (is_author()) {
        return "Estos son todos los posts que he publicado, ordenados por fecha de manera descendente.";
    }
    if (is_category()) {
        return category_description();
    }
    if (is_tag()) {
        return tag_description();
    }
    return get_bloginfo("description");
}

/*------------------------------------*\
	Photos Category
\*------------------------------------*/

// Exclude "Photos" category from main loop except in its own archive
function exclude_photos_category($query)
{
    // Only modify main query and not in admin
    if ($query->is_main_query() && !is_admin()) {
        // Check if we're NOT in the Photos category archive
        if (!is_category("photos") && !is_tag()) {
            $query->set("category__not_in", [986]); // Photos category ID
        }
    }
}
add_action("pre_get_posts", "exclude_photos_category");

// Sort Photos category by date
function sort_photos_category_by_date($query)
{
    if (!is_admin() && $query->is_main_query() && is_category("photos")) {
        $query->set("orderby", "date");
        $query->set("order", "DESC");
        $query->set("posts_per_page", -1); // display all posts
    }
}
add_action("pre_get_posts", "sort_photos_category_by_date");

// Photos Ajax handler
add_action("wp_ajax_load_more_photos", "load_more_photos_callback");
add_action("wp_ajax_nopriv_load_more_photos", "load_more_photos_callback");
function load_more_photos_callback()
{
    // Validate and sanitize inputs
    $offset = isset($_POST["offset"]) ? intval($_POST["offset"]) : 0;
    $year = isset($_POST["year"]) ? intval($_POST["year"]) : 0;
    $posts_per_page = 6;
    $args = [
        "post_type" => "post",
        "posts_per_page" => $posts_per_page,
        "offset" => $offset,
        "category_name" => "photos",
        "date_query" => [
            [
                "year" => $year,
            ],
        ],
        "orderby" => "date",
        "order" => "DESC",
    ];
    $query = new WP_Query($args);
    ob_start();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part("template-parts/photo", "card");
        }
    }
    wp_reset_postdata();
    $html = ob_get_clean();
    wp_send_json_success($html);
    wp_die();
}

/*------------------------------------*\
	Mastodon Integration
\*------------------------------------*/

// Function to save the Mastodon settings
function save_mastodon_settings()
{
    if (!defined("MASTODON_ACCESS_TOKEN")) {
        define(
            "MASTODON_ACCESS_TOKEN",
            "Dp7icijhm9zsnlYVoJAXVHHZiyb0xvVZoUcVHXCdMnY",
        );
    }
}
add_action("init", "save_mastodon_settings");

// Mastodon toot URL fetcher
function get_mastodon_toot_url(
    $post_url,
    $mastodon_instance = "https://social.lol",
    $mastodon_username = "mijo",
) {
    $mastodon_instance = rtrim($mastodon_instance, "/");
    $search_url = $mastodon_instance . "/api/v2/search";
    $search_query = "from:" . $mastodon_username . " " . $post_url;
    $response = wp_remote_get(
        add_query_arg(
            [
                "q" => $search_query,
                "type" => "statuses",
                "limit" => "5",
            ],
            $search_url,
        ),
        ["headers" => ["Authorization" => "Bearer " . MASTODON_ACCESS_TOKEN]],
    );
    if (is_wp_error($response)) {
        return false;
    }
    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);
    if (!empty($data["statuses"])) {
        $post_url_normalized = rtrim($post_url, "/");
        foreach ($data["statuses"] as $status) {
            // URL appears in href attribute even when Mastodon splits it visually with spans
            if (strpos($status["content"], $post_url_normalized) !== false) {
                return $status["url"];
            }
            // Fallback: some toots attach the URL as a preview card without including it in text
            if (
                isset($status["card"]["url"]) &&
                rtrim($status["card"]["url"], "/") === $post_url_normalized
            ) {
                return $status["url"];
            }
        }
    }
    return false;
}

// Hook to automatically check for toot URL when post is published
function check_and_save_mastodon_toot($new_status, $old_status, $post)
{
    if ($new_status !== "publish") {
        return;
    }
    $post_url = get_permalink($post->ID);
    $toot_url = get_mastodon_toot_url($post_url);
    if ($toot_url) {
        update_post_meta($post->ID, "_mastodon_toot_url", $toot_url);
    }
}
add_action("transition_post_status", "check_and_save_mastodon_toot", 10, 3);

// Function to manually check for toot URL
function force_check_mastodon_toot($post_id)
{
    $transient_key = "mastodon_toot_checked_" . $post_id;
    if (get_transient($transient_key)) {
        return false;
    }

    $post_url = get_permalink($post_id);
    $toot_url = get_mastodon_toot_url($post_url);
    if ($toot_url) {
        update_post_meta($post_id, "_mastodon_toot_url", $toot_url);
        return true;
    }

    // Avoid hammering the API on every page load — retry window depends on post age
    $post_age_days = (time() - get_post_time("U", false, $post_id)) / DAY_IN_SECONDS;
    $retry_seconds = $post_age_days < 1 ? HOUR_IN_SECONDS : 12 * HOUR_IN_SECONDS;
    set_transient($transient_key, "not_found", $retry_seconds);
    return false;
}

/*------------------------------------*\
	Webring
\*------------------------------------*/

// Fetch blogblog.es webring participants (excluding our own site), cached to avoid hammering blogblog.es on every page load
function get_blogblog_webring_others()
{
    $cache_key = "blogblog_webring_others";
    $cached = get_transient($cache_key);
    if ($cached !== false) {
        return $cached;
    }

    $own_domain = get_field("dominio", "option");
    $others = [];

    $response = wp_remote_get("https://blogblog.es/blogs.json", ["timeout" => 5]);
    if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
        $blogs = json_decode(wp_remote_retrieve_body($response), true);
        if (is_array($blogs)) {
            foreach ($blogs as $blog) {
                if (empty($blog["Webring"])) {
                    continue;
                }
                if ($own_domain && strpos($blog["Webring"], $own_domain) !== false) {
                    continue;
                }
                $others[] = [
                    "name" => $blog["Nombre"],
                    "url" => $blog["Webring"],
                ];
            }
        }
    }

    if (!empty($others)) {
        set_transient($cache_key, $others, 6 * HOUR_IN_SECONDS);
        update_option("blogblog_webring_others_fallback", $others);
        return $others;
    }

    // blogblog.es didn't respond: fall back to the last known good list and retry sooner
    $fallback = get_option("blogblog_webring_others_fallback", []);
    set_transient($cache_key, $fallback, 15 * MINUTE_IN_SECONDS);
    return $fallback;
}

/*------------------------------------*\
	RSS Feed
\*------------------------------------*/

// RSS text after every item
function add_rss_footer_text($content)
{
    if (is_feed()) {
        $footer_text =
            "<hr>" .
            '<p>Gracias por suscribirte a mi <a href="https://luiscarlospando.com/">blog</a>.</p>' .
            '<p>Si disfrutas lo que hago, puedes <a href="https://buymeacoffee.com/luiscarlospando">comprarme un café</a> si te nace. ☕ ' .
            'También me puedes apoyar siguiéndome en <a href="https://social.lol/@mijo">Mastodon</a> y/o en <a href="https://bsky.app/profile/luiscarlospando.com">Bluesky</a>.</p>' .
            "<p>¡Nos vemos en la próxima! 👋</p>";
        $content .= $footer_text;
    }
    return $content;
}
add_filter("the_content_feed", "add_rss_footer_text");

/*------------------------------------*\
	Reply Context (IndieWeb)
\*------------------------------------*/

// Get the first node's text for an XPath query, or "" if nothing matched
function reply_context_node_text($xpath, $query, $context_node = null)
{
    $nodes = $context_node
        ? $xpath->query($query, $context_node)
        : $xpath->query($query);
    return $nodes->length > 0 ? trim($nodes->item(0)->textContent) : "";
}

// Title fallback chain: microformats2 (h-entry > p-name) -> Open Graph -> <title>
//
// p-name is excluded when it's nested inside a p-author/h-card block — some
// pages (including our own theme, before this was fixed) mark the author's
// name with p-name too, and without this guard that decoy wins just by being
// the first (or only) p-name found inside the h-entry.
function reply_context_extract_title($xpath)
{
    $mf2Title = reply_context_node_text(
        $xpath,
        '//*[contains(concat(" ", normalize-space(@class), " "), " h-entry ")]//*[contains(concat(" ", normalize-space(@class), " "), " p-name ")][not(ancestor::*[contains(concat(" ", normalize-space(@class), " "), " p-author ")])][not(ancestor::*[contains(concat(" ", normalize-space(@class), " "), " h-card ")])]'
    );
    if ($mf2Title) {
        return $mf2Title;
    }

    $ogNodes = $xpath->query('//meta[@property="og:title"]/@content');
    if ($ogNodes->length > 0) {
        return trim($ogNodes->item(0)->nodeValue);
    }

    return reply_context_node_text($xpath, "//title");
}

// Author fallback chain: microformats2 (p-author, with or without a nested p-name) -> Open Graph site name
//
// p-author is looked up *inside the h-entry first* — pages often have an unrelated
// p-author decoration elsewhere (e.g. a "Home" nav link with rel="author"), and that
// would otherwise win just by appearing earlier in the document.
function reply_context_extract_author($xpath)
{
    $entryNodes = $xpath->query(
        '//*[contains(concat(" ", normalize-space(@class), " "), " h-entry ")]'
    );

    $authorNode = null;

    if ($entryNodes->length > 0) {
        $scopedAuthorNodes = $xpath->query(
            './/*[contains(concat(" ", normalize-space(@class), " "), " p-author ")]',
            $entryNodes->item(0)
        );
        if ($scopedAuthorNodes->length > 0) {
            $authorNode = $scopedAuthorNodes->item(0);
        }
    }

    if (!$authorNode) {
        $authorNodes = $xpath->query(
            '//*[contains(concat(" ", normalize-space(@class), " "), " p-author ")]'
        );
        if ($authorNodes->length > 0) {
            $authorNode = $authorNodes->item(0);
        }
    }

    if ($authorNode) {
        $nestedName = reply_context_node_text(
            $xpath,
            './/*[contains(concat(" ", normalize-space(@class), " "), " p-name ")]',
            $authorNode
        );
        return $nestedName ?: trim($authorNode->textContent);
    }

    $ogSiteNodes = $xpath->query('//meta[@property="og:site_name"]/@content');
    if ($ogSiteNodes->length > 0) {
        return trim($ogSiteNodes->item(0)->nodeValue);
    }

    return "";
}

// Fetch a remote post and guess its title + author. Returns false when the
// request fails or no title could be found at all.
function fetch_reply_context($url)
{
    $response = wp_remote_get($url, [
        "timeout" => 8,
        "headers" => [
            "User-Agent" => "Mozilla/5.0 (compatible; ReplyContextBot/1.0; +https://luiscarlospando.com)",
        ],
    ]);

    if (is_wp_error($response) || wp_remote_retrieve_response_code($response) !== 200) {
        return false;
    }

    $html = wp_remote_retrieve_body($response);
    if (empty($html)) {
        return false;
    }

    libxml_use_internal_errors(true);
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    libxml_clear_errors();
    $xpath = new DOMXPath($dom);

    $title = reply_context_extract_title($xpath);
    if (!$title) {
        return false;
    }

    return [
        "title" => $title,
        "author" => reply_context_extract_author($xpath),
    ];
}

// When a post is marked as a reply, auto-fill reply_title / reply_author from
// reply_url — but only the fields the author left empty, never overwriting a
// manual edit. Runs after ACF's own save so the fresh field values are there to read.
function fill_reply_context_from_url($post_id)
{
    if (get_post_type($post_id) !== "post") {
        return;
    }

    $reply_context = get_field("reply_context", $post_id);
    if (empty($reply_context["is_reply"]) || empty($reply_context["reply_url"])) {
        return;
    }

    if (!empty($reply_context["reply_title"]) && !empty($reply_context["reply_author"])) {
        return;
    }

    $fetched = fetch_reply_context($reply_context["reply_url"]);
    if (!$fetched) {
        return;
    }

    // Writing reply_title/reply_author directly by name doesn't reliably
    // resolve for sub-fields of a Group outside of a real ACF form submission
    // (get_field() walks the tree fine, update_field() doesn't). Writing the
    // whole group back at once sidesteps that lookup entirely.
    $changed = false;

    if (empty($reply_context["reply_title"]) && !empty($fetched["title"])) {
        $reply_context["reply_title"] = $fetched["title"];
        $changed = true;
    }

    if (empty($reply_context["reply_author"]) && !empty($fetched["author"])) {
        $reply_context["reply_author"] = $fetched["author"];
        $changed = true;
    }

    if ($changed) {
        update_field("reply_context", $reply_context, $post_id);
    }
}
add_action("acf/save_post", "fill_reply_context_from_url", 20);

// Expose reply_context in the REST API — it's not there by default, and even
// with ACF's "Show in REST" it would come nested under `acf`, not top-level.
// This lets the Jekyll homepage widget (blog-posts.js) request it via
// _fields=...,reply_context alongside the other trimmed fields.
add_action("rest_api_init", function () {
    register_rest_field("post", "reply_context", [
        "get_callback" => function ($post) {
            return get_field("reply_context", $post["id"]) ?: null;
        },
        "schema" => [
            "description" => "IndieWeb reply context (is_reply, reply_url, reply_title, reply_author)",
            "type" => "object",
        ],
    ]);
});
