<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
	<meta charset="<?php bloginfo("charset"); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo esc_html(get_page_title()); ?></title>

    <!--
    ================================================================================
    === <?php bloginfo(
        "name"
    ); ?> vPLACEHOLDER ===========================================
    ================================================================================
    ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;+++++*++++++;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;++*??%%SSSSSSSSS%%?*++;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;;;;;;+*?%%%%%%S#S%%%%SSSSS%SS%?*+;;;;;;;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;;;;+?%SSSS%S%S#S%%%S#S%%%%%%SSS#S?+;;;;;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;;;*S########SS##SSS#SSSSSS#########?+;;;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;;+####@@@@@@@@@@@#@####@@@@#########S+;;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;;%###@#S?*****************??%S@@#####S+;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;%@###%;:::,,,,,,,,,,,,,,,,,,::+%#####@S+;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;*####*;::::,,,,,,,,,,,,,,,,,:::::*######?;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;+####?;;:::;++;,,,,,,,,,;;::,,:::::?#####S+;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;*@###+;;+?%%SS*::,,,,,,:%SS%?*;::;;+S####@?;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;+#@@%;+??+;:;;:::::,,:::;;;;+*??*;;;%#####S;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;+#@@?;;;:,,,:::;:::,::::::,,,,,:+;;;*####@S;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;+#@@?;;;+*???+;;;:,,,:::;;+**+;:::;;+S@##@S;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;S@S*;+*;S?@@S;;;:,,,:;;:?*#@#?+;:;++%@@@@%;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;S%+*;;::%#@#?::;:,,,:;:,%@@@S+,;:;++%?+S@?;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;%?**;;:,,,::,:::::::::,,:++;:,,::;+*#*;?@+;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;?S*?;;:::,,,,::;:,::;:,,,,,,,,::;;+%@+:SS+;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;*#%S+;;:::,,,:;;:::;+:,,,,,:::::;+?@S;*@%;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;*#@@%+;:::;++***????+++++;:::::;*%#@S%S#*;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;?##@@#%?*%%%SSSSSSSSSSSS%%%*+*?S###@@@##+;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;*##@@#####*,:;;++++++;;:,;S#######@@@##S+;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;+S##@######?;::+???*:,::*S########@@@##%;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;+S#@########SS##SS#S%%S#########@@@@@#*;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;;+*%##############S################S#?;;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;;;;;+S@####SSSSSSSSSSSSS#####@S*+++;+;;;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;;;;;;+%###########SSSS######S?+;;;;;;;;;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;+?%S#############SS?*+;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;++**???????**++;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
    ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
    ================================================================================
    =================================================== © <?php echo date(
        "Y"
    ); ?> Luis Carlos Pando ===
    ================================================================================
	-->

    <!-- Primary Meta Tags -->
    <meta name="title" content="<?php echo esc_attr(get_meta_title()); ?>" />
    <meta name="description" content="<?php echo esc_attr(
        get_meta_description()
    ); ?>" />
    <meta name="robots" content="index, follow" />
    <meta name="author" content="Luis Carlos Pando" />
    <meta name="fediverse:creator" content="@mijo@social.lol" />
    <meta name="copyright" content="© <?php echo date(
        "Y"
    ); ?> Luis Carlos Pando" />
    <meta name="email" content="hey@luiscarlospando.com" />
    <meta name="distribution" content="global" />
    <meta name="language" content="es-MX" />
    <meta name="ICBM" content="28.6189208162, -106.101984179" />
    <meta name="DC.title" content="<?php bloginfo("name"); ?>" />
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo(
        "name"
    ); ?>" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="msapplication-TileColor" content="#0e0f34">
    <meta name="theme-color" content="#0e0f34">

    <!-- Open Graph -->
    <meta name="og:title" content="<?php echo esc_attr(get_meta_title()); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php the_permalink(); ?>" />
    <meta property="og:description" content="<?php echo esc_attr(
        get_meta_description()
    ); ?>" />
    <meta property="og:image" content="<?php if (is_single() || is_page()):
        $thumb_id = get_post_thumbnail_id();
        $thumb_url = wp_get_attachment_image_src($thumb_id, "large", true);
        echo $thumb_url[0];
    else:
         ?>https://<?php include "includes/site-domain.php"; ?>/assets/images/logo.png<?php
    endif; ?>" />

    <!-- X -->
    <meta name="twitter:title" content="<?php echo esc_attr(
        get_meta_title()
    ); ?>" />
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="<?php the_permalink(); ?>" />
    <meta property="twitter:description" content="<?php echo esc_attr(
        get_meta_description()
    ); ?>" />
    <meta property="twitter:image" content="<?php if (is_single() || is_page()):
        $thumb_id = get_post_thumbnail_id();
        $thumb_url = wp_get_attachment_image_src($thumb_id, "large", true);
        echo $thumb_url[0];
    else:
         ?>https://<?php include "includes/site-domain.php"; ?>/assets/images/logo.png<?php
    endif; ?>" />

    <!-- Meta Tags Generated with https://metatags.io -->
    <link rel="alternate" type="application/rss+xml" title="LuisCarlosPando.com" href="https://blog.<?php include "includes/site-domain.php"; ?>/rss/" />
    <link rel="author" href="https://<?php include "includes/site-domain.php"; ?>/humans.txt" />
    <link rel="apple-touch-icon" sizes="180x180" href="https://<?php include "includes/site-domain.php"; ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://<?php include "includes/site-domain.php"; ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://<?php include "includes/site-domain.php"; ?>/favicon-16x16.png">
    <link rel="manifest" href="https://<?php include "includes/site-domain.php"; ?>/site.webmanifest">
    <link rel="mask-icon" href="https://<?php include "includes/site-domain.php"; ?>/safari-pinned-tab.svg" color="#0e0f34">
    <link rel="canonical" href="<?php the_permalink(); ?>">
    <link rel="me" href="https://social.lol/@mijo" />
    <link rel="me" href="https://mastodon.online/@mijo" />
    <link rel="me" href="https://hachyderm.io/@luiscarlospando" />
    <link rel="me" href="https://github.com/luiscarlospando" />
    <link rel="me" href="https://proven.lol/75353b">

    <!-- Webmentions -->
    <link rel="webmention" href="https://webmention.io/<?php include "includes/site-domain.php"; ?>/webmention" />
    <link rel="pingback" href="https://webmention.io/<?php include "includes/site-domain.php"; ?>/xmlrpc" />

	<?php wp_head(); ?>
</head>
<body <?php body_class("gesture"); ?>>
    <span class="p-author h-card d-none">
        <img class="u-photo" src="https://<?php include "includes/site-domain.php"; ?>/assets/images/avatar.webp" alt="{{ site.author }}'s avatar">
        <img class="u-logo" src="https://<?php include "includes/site-domain.php"; ?>/assets/images/avatar.webp" alt="{{ site.author }}'s logo">
        <a class="p-name" href="https://<?php include "includes/site-domain.php"; ?>" rel="author">{{ site.author }}</a>
        <span class="p-note"><?php bloginfo("description"); ?></span>
        <a rel="me" class="u-url u-uid" href="<?php the_permalink(); ?>">Permalink</a>
    </span>

    <progress id="progress-bar" value="0" max="100"></progress>

	<!-- Wrapper for mmenu -->
	<div>
        <a id="btn-skip-nav" class="btn btn-primary btn-sm" href="#main-content">
            <i class="fa-solid fa-forward"></i> Saltar navegación
        </a>

        <a id="btn-burger" href="#navigation">
            <i class="fa-solid fa-bars"></i>
        </a>

		<div class="nav-container">
            <?php if (is_single()): ?>
                <p class="d-none d-lg-block">
                    <em>
                        <?php the_title(); ?>
                    </em>
                </p>
            <?php endif; ?>
        </div>

		<nav id="navigation"></nav>

        <header class="container">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1">
                    <div class="row">
                        <div class="col-12 col-md-3 col-lg-2 d-flex align-items-center mb-3 mb-md-0">
                            <div class="mt-3 mb-1 u-photo" id="logo">
                                <a href="https://<?php include "includes/site-domain.php"; ?>/" data-toggle="tooltip" data-placement="right" title="" data-original-title="Sígueme en Mastodon: <?php include "includes/mastodon-account.php"; ?>">
                                    <span>Logo</span>
                                </a>
                            </div>
                            <div id="logo-blur"></div>
                        </div>
                        <div class="col-12 col-md-9 col-lg-10 d-flex align-items-center flex-wrap">
                            <div id="status"></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section id="live" class="container">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1">
                    <div id="heymijotv-live-alert" class="card text-center mt-3">
                        <div class="card-body rounded">
                            <p>
                                <i id="live-icon" class="fa-solid fa-circle animated live infinite"></i>
                                ¡Estoy <a href="https://<?php include "includes/site-domain.php"; ?>/live/">en vivo</a>!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
