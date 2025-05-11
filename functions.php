<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width)) {
    $content_width = 900;
}

if (function_exists("add_theme_support")) {
    // Add Menu Support
    add_theme_support("menus");

    // Add Thumbnail Theme Support
    add_theme_support("post-thumbnails");
    add_image_size("large", 700, "", true); // Large Thumbnail
    add_image_size("medium", 250, "", true); // Medium Thumbnail
    add_image_size("small", 120, "", true); // Small Thumbnail
    add_image_size("custom-size", 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
    add_image_size("thumb-foto", 800, 800, true); // Custom Thumbnail Size call using the_post_thumbnail('fotos');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support("automatic-feed-links");

    // Localisation Support
    load_theme_textdomain(
        "html5blank",
        get_template_directory() . "/languages"
    );
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
    wp_nav_menu([
        "theme_location" => "header-menu",
        "menu" => "",
        "container" => "div",
        "container_class" => "menu-{menu slug}-container",
        "container_id" => "",
        "menu_class" => "menu",
        "menu_id" => "",
        "echo" => true,
        "fallback_cb" => "wp_page_menu",
        "before" => "",
        "after" => "",
        "link_before" => "",
        "link_after" => "",
        "items_wrap" => '<ul>%3$s</ul>',
        "depth" => 0,
        "walker" => "",
    ]);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS["pagenow"] != "wp-login.php" && !is_admin()) {
        wp_register_script(
            "jquery",
            "https://code.jquery.com/jquery-3.7.1.min.js",
            [],
            null,
            true
        ); // jQuery
        wp_enqueue_script("jquery"); // Enqueue it!

        wp_register_script(
            "clipboardjs",
            "https://luiscarlospando.com/assets/js/clipboard.min.js",
            [],
            null,
            true
        ); // clipboard.js
        wp_enqueue_script("clipboardjs"); // Enqueue it!

        wp_register_script(
            "luxon",
            "https://luiscarlospando.com/assets/js/luxon.js",
            [],
            null,
            true
        ); // Luxon.js
        wp_enqueue_script("luxon"); // Enqueue it!

        wp_register_script(
            "app",
            "https://luiscarlospando.com/assets/js/app.bundle.js",
            [],
            null,
            true
        ); // App
        wp_enqueue_script("app"); // Enqueue it!
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page("pagenamehere")) {
        wp_register_script(
            "scriptname",
            get_template_directory_uri() . "/js/scriptname.js",
            ["jquery"],
            "1.0.0"
        ); // Conditional script(s)
        wp_enqueue_script("scriptname"); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    // wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    // wp_enqueue_style('normalize'); // Enqueue it!

    // wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    // wp_enqueue_style('html5blank'); // Enqueue it!

    wp_register_style(
        "mmenu",
        "https://luiscarlospando.com/assets/css/jquery.mmenu.all.css",
        [],
        "1.0",
        "all"
    );
    wp_enqueue_style("mmenu"); // Enqueue it!

    wp_register_style(
        "mmenu-themes",
        "https://luiscarlospando.com/assets/css/jquery.mmenu.themes.css",
        [],
        "1.0",
        "all"
    );
    wp_enqueue_style("mmenu-themes"); // Enqueue it!

    wp_register_style(
        "animate-css",
        "https://luiscarlospando.com/assets/css/animate.css",
        [],
        "1.0",
        "all"
    );
    wp_enqueue_style("animate-css"); // Enqueue it!

    wp_register_style(
        "prism",
        "https://luiscarlospando.com/assets/css/prism.css",
        [],
        "1.0",
        "all"
    );
    wp_enqueue_style("prism"); // Enqueue it!

    wp_register_style(
        "main",
        "https://luiscarlospando.com/assets/css/main.css",
        [],
        "1.0",
        "all"
    );
    wp_enqueue_style("main"); // Enqueue it!
}

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

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = "")
{
    $args["container"] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? [] : "";
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

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

// If Dynamic Sidebar Exists
if (function_exists("register_sidebar")) {
    // Define Sidebar Widget Area 1
    register_sidebar([
        "name" => __("Widget Area 1", "html5blank"),
        "description" => __(
            "Description for this widget-area...",
            "html5blank"
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
            "html5blank"
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

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
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

// Custom Excerpts
function html5wp_index($length)
{
    // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create 60 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_excerpt');
function html5wp_custom_excerpt($length)
{
    return 60;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = "", $more_callback = "")
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter("excerpt_length", $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter("excerpt_more", $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters("wptexturize", $output);
    $output = apply_filters("convert_chars", $output);
    $output = "<p>" . $output . "</p>";
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return "";
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', "", $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions($html)
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . "/img/gravatar.jpg";
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

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
     get_comment_author_link()
 ); ?>
	</div>
<?php if ($comment->comment_approved == "0"): ?>
	<em class="comment-awaiting-moderation"><?php _e(
     "Your comment is awaiting moderation."
 ); ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars(
     get_comment_link($comment->comment_ID)
 ); ?>">
		<?php printf(
      __('%1$s at %2$s'),
      get_comment_date(),
      get_comment_time()
  ); ?></a><?php edit_comment_link(__("(Edit)"), "  ", ""); ?>
	</div>

	<?php comment_text(); ?>

	<div class="reply">
	<?php comment_reply_link(
     array_merge($args, [
         "add_below" => $add_below,
         "depth" => $depth,
         "max_depth" => $args["max_depth"],
     ])
 ); ?>
	</div>
	<?php if ("div" != $args["style"]): ?>
	</div>
	<?php endif; ?>
<?php
} /*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/ // Add Actions
add_action("init", "html5blank_header_scripts");
// Add Custom Scripts to wp_head
add_action("wp_print_scripts", "html5blank_conditional_scripts"); // Add Conditional Page Scripts
add_action("get_header", "enable_threaded_comments"); // Enable Threaded Comments
add_action("wp_enqueue_scripts", "html5blank_styles"); // Add Theme Stylesheet
add_action("init", "register_html5_menu"); // Add HTML5 Blank Menu
// add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action("widgets_init", "my_remove_recent_comments_style"); // Remove inline Recent Comment Styles from wp_head()
add_action("init", "html5wp_pagination"); // Add our HTML5 Pagination
// Remove Actions
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
remove_action("wp_head", "wp_shortlink_wp_head", 10, 0); // Add Filters
add_filter("avatar_defaults", "html5blankgravatar"); // Custom Gravatar in Settings > Discussion
add_filter("body_class", "add_slug_to_body_class"); // Add slug to body class (Starkers build)
add_filter("widget_text", "do_shortcode"); // Allow shortcodes in Dynamic Sidebar
add_filter("widget_text", "shortcode_unautop");
// Remove <p> tags in Dynamic Sidebars (better!)
add_filter("wp_nav_menu_args", "my_wp_nav_menu_args"); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter("the_category", "remove_category_rel_from_category_list"); // Remove invalid rel attribute
add_filter("the_excerpt", "shortcode_unautop"); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter("the_excerpt", "do_shortcode"); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter("excerpt_more", "html5_blank_view_article"); // Add 'View Article' button instead of [...] for Excerpts
add_filter("show_admin_bar", "remove_admin_bar");
// Remove Admin bar
add_filter("style_loader_tag", "html5_style_remove"); // Remove 'text/css' from enqueued stylesheet
add_filter("post_thumbnail_html", "remove_thumbnail_dimensions", 10); // Remove width and height dynamic attributes to thumbnails
add_filter("image_send_to_editor", "remove_thumbnail_dimensions", 10); // Remove width and height dynamic attributes to post images
// Remove Filters
remove_filter("the_excerpt", "wpautop"); // Remove <p> tags from Excerpt altogether
// Shortcodes
add_shortcode("html5_shortcode_demo", "html5_shortcode_demo"); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode("html5_shortcode_demo_2", "html5_shortcode_demo_2"); // Place [html5_shortcode_demo_2] in Pages, Posts now.
// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]
// Custom Post Types
// Shortcode functions
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . "</div>"; // do_shortcode allows for nested Shortcodes
} // Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null)
{
    // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
    return "<h2>" . $content . "</h2>";
}
// Function to print titles
function get_page_title()
{
    $title = "";
    if (is_category()) {
        $title = single_cat_title("", false);
    } elseif (is_tag()) {
        $title = single_tag_title("", false);
    } elseif (is_author()) {
        $title = "Archivos del blog";
    } elseif (is_single() || is_page()) {
        $title = get_the_title();
    }
    return $title
        ? $title . " - " . get_bloginfo("name")
        : get_bloginfo("name");
} // Automatic Shortcodes captions
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
        $alt
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
} // Responsive images
function add_image_responsive_class($content)
{
    global $post;
    $pattern = "/<img(.*?)class=\"(.*?)\"(.*?)>/i";
    $replacement = '<img$1class="$2 img-fluid"$3>';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
}
add_filter("the_content", "add_image_responsive_class");
// Making local jQuery default
function modify_jquery()
{
    if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script("jquery");
        wp_register_script(
            "jquery",
            "//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js",
            [],
            "1.10.2",
            true
        );
        wp_enqueue_script("jquery");
    }
}
add_action("init", "modify_jquery");
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
} // Function to get the meta tag description
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
        return "Estos son todos los posts que he escrito, ordenados por fecha de manera descendente.";
    }
    if (is_category()) {
        return category_description();
    }
    if (is_tag()) {
        return tag_description();
    }
    return get_bloginfo("description");
}
// Function to get the meta tag image
function get_meta_image()
{
    // Getting the site domain
    $domain = include "includes/return-site-domain.php"; // Concatenate all parts
    $default_image = "https://" . $domain . "/assets/images/logo.png";
    if (is_single() || is_page()) {
        $thumb_id = get_post_thumbnail_id();
        if ($thumb_id) {
            $thumb_url = wp_get_attachment_image_src($thumb_id, "large", true);
            if ($thumb_url && is_array($thumb_url)) {
                return $thumb_url[0];
            }
        }
    }
    return $default_image;
} // RSS text after every item
function add_rss_footer_text($content)
{
    if (is_feed()) {
        $footer_text =
            "<hr>" .
            '<p>Estás leyendo el blog de <a href="https://luiscarlospando.com/">Luis Carlos Pando</a>. 👋 ' .
            'Si gusta mi contenido, puedes apoyarme <a href="https://buymeacoffee.com/luiscarlospando">comprándome un café</a>, que aunque no es necesario, se agradece bastante. 🙏 ' .
            'Otra forma de ayudarme es siguiéndome en <a href="https://social.lol/@mijo">Mastodon</a> y/o en <a href="https://bsky.app/profile/luiscarlospando.com">Bluesky</a>.</p>' .
            "<p>Gracias por leer mi blog vía RSS.</p>";
        $content .= $footer_text;
    }
    return $content;
}
add_filter("the_content", "add_rss_footer_text"); // Month abbreviations in Spanish
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
add_filter("month_abbrev", "custom_date_translation"); // Exclude "Photos" category from main loop except in its own archive
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
add_action("pre_get_posts", "exclude_photos_category"); // Mastodon toot URL fetcher
// Function to save the Mastodon settings
function save_mastodon_settings()
{
    if (!defined("MASTODON_ACCESS_TOKEN")) {
        define(
            "MASTODON_ACCESS_TOKEN",
            "Dp7icijhm9zsnlYVoJAXVHHZiyb0xvVZoUcVHXCdMnY"
        );
    }
}
add_action("init", "save_mastodon_settings");
function get_mastodon_toot_url(
    $post_url,
    $mastodon_instance = "https://social.lol",
    $mastodon_username = "mijo"
) {
    $mastodon_instance = rtrim($mastodon_instance, "/");
    $search_url = $mastodon_instance . "/api/v2/search";
    $search_query = "from:mijo " . $post_url;
    $response = wp_remote_get(
        add_query_arg(
            [
                "q" => $search_query,
                "type" => "statuses",
                "resolve" => "true",
            ],
            $search_url
        ),
        ["headers" => ["Authorization" => "Bearer " . MASTODON_ACCESS_TOKEN]]
    );
    if (is_wp_error($response)) {
        return false;
    }
    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);
    if (!empty($data["statuses"])) {
        foreach ($data["statuses"] as $status) {
            if (strpos($status["content"], $post_url) !== false) {
                return $status["url"];
            }
        }
    }
    return false;
} // Hook to automatically check for toot URL when post is published
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
add_action("transition_post_status", "check_and_save_mastodon_toot", 10, 3); // Function to manually check for toot URL
function force_check_mastodon_toot($post_id)
{
    $post_url = get_permalink($post_id);
    $toot_url = get_mastodon_toot_url($post_url);
    if ($toot_url) {
        update_post_meta($post_id, "_mastodon_toot_url", $toot_url);
        return true;
    }
    return false;
}
