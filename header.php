<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php 
    if( is_category() ):
        $category = get_queried_object();
?>
    <title><?php single_cat_title('', true); ?> - <?php bloginfo('name'); ?></title>
<?php
    elseif( is_tag() ):
        $tag = get_queried_object();
?>
    <title><?php single_tag_title('', true); ?> - <?php bloginfo('name'); ?></title>
<?php
    elseif( is_author() ):
?>
    <title>Archivos del blog - <?php bloginfo('name'); ?></title>
<?php 
    elseif( is_single() || is_page() ):
?>
    <title><?php the_title(); ?> - <?php bloginfo( 'name' ); ?></title>
<?php else: ?>
    <title><?php bloginfo('name'); ?></title>
<?php endif; ?>

    <!--
    ================================================================================
    === <?php bloginfo('name'); ?> v<?php include('includes/site-version.php'); ?> =================================================
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
    =================================================== © <?php echo date("Y") ?> Luis Carlos Pando ===
    ================================================================================
	-->

    <!-- Primary Meta Tags -->
<?php 
    if( is_category() ):
    $category = get_queried_object();
?>
    <meta name="title" content="<?php single_cat_title('', true); ?> - <?php bloginfo('name'); ?>" />
<?php
    elseif( is_tag() ):
        $tag = get_queried_object();
?>
    <meta name="title" content="<?php single_tag_title('', true); ?> - <?php bloginfo('name'); ?>" />
<?php
    elseif( is_author() ):
?>
    <meta name="title" content="Archivos del blog - <?php bloginfo('name'); ?>" />
<?php 
    elseif( is_single() || is_page() ):
?>
    <meta name="title" content="<?php the_title(); ?> - <?php bloginfo( 'name' ); ?>" />
<?php else: ?>
    <meta name="title" content="<?php bloginfo( 'name' ); ?>" />
<?php endif; ?>
    <meta name="description" content="<?php if( is_single() || is_page() ): ?><?php if( have_posts()): while (have_posts() ): the_post(); ?><?php the_excerpt_rss(); ?><?php endwhile; endif; ?><?php elseif( is_author() ): ?>Estos son todos los posts que he escrito, ordenados por fecha de manera descendente.<?php else: ?><?php bloginfo('description'); ?><?php endif; ?>" />
    <meta name="robots" content="index, follow" />
    <meta name="author" content="Luis Carlos Pando" />
    <meta name="copyright" content="© <?php echo date("Y") ?> Luis Carlos Pando" />
    <meta name="email" content="hey@luiscarlospando.com" />
    <meta name="distribution" content="global" />
    <meta name="language" content="es-MX" />
    <meta name="ICBM" content="28.6189208162, -106.101984179" />
    <meta name="DC.title" content="<?php bloginfo('name'); ?>" />
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?>" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="msapplication-TileColor" content="#0e0f34">
    <meta name="theme-color" content="#0e0f34">

    <!-- Open Graph / Facebook -->
<?php 
    if( is_category() ):
    $category = get_queried_object();
?>
    <meta name="og:title" content="<?php single_cat_title('', true); ?> - <?php bloginfo('name'); ?>" />
<?php
    elseif( is_tag() ):
    $tag = get_queried_object();
?>
    <meta name="og:title" content="<?php single_tag_title('', true); ?> - <?php bloginfo('name'); ?>" />
<?php
    elseif( is_author() ):
?>
    <meta name="og:title" content="Archivos del blog - <?php bloginfo('name'); ?>" />
<?php 
    elseif( is_single() || is_page() ):
?>
    <meta name="og:title" content="<?php the_title(); ?> - <?php bloginfo( 'name' ); ?>" />
<?php else: ?>
    <meta name="og:title" content="<?php bloginfo( 'name' ); ?>" />
<?php endif; ?>
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php the_permalink(); ?>" />
    <meta property="og:description" content="<?php if( is_single() || is_page() ): ?><?php if( have_posts()): while (have_posts() ): the_post(); ?><?php the_excerpt_rss(); ?><?php endwhile; endif; ?><?php elseif( is_author() ): ?>Estos son todos los posts que he escrito, ordenados por fecha de manera descendente.<?php else: ?><?php bloginfo('description'); ?><?php endif; ?>" />
    <meta property="og:image" content="<?php if( is_single() || is_page() ): ?><?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id, 'large', true); echo $thumb_url[0]; ?><?php else: ?>https://<?php include('includes/site-domain.php'); ?>/assets/images/logo.png<?php endif; ?>" />

    <!-- X -->
<?php 
    if( is_category() ):
    $category = get_queried_object();
?>
    <meta name="twitter:title" content="<?php single_cat_title('', true); ?> - <?php bloginfo('name'); ?>" />
<?php
    elseif( is_tag() ):
    $tag = get_queried_object();
?>
    <meta name="twitter:title content="<?php single_tag_title('', true); ?> - <?php bloginfo('name'); ?>" />
<?php
    elseif( is_author() ):
?>
    <meta name="twitter:title" content="Archivos del blog - <?php bloginfo('name'); ?>" />
<?php 
    elseif( is_single() || is_page() ):
?>
    <meta name="twitter:title" content="<?php the_title(); ?> - <?php bloginfo( 'name' ); ?>" />
<?php else: ?>
    <meta name="twitter:title" content="<?php bloginfo( 'name' ); ?>" />
<?php endif; ?>
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="<?php the_permalink(); ?>" />
    <meta property="twitter:description" content="<?php if( is_single() || is_page() ): ?><?php if( have_posts()): while (have_posts() ): the_post(); ?><?php the_excerpt_rss(); ?><?php endwhile; endif; ?><?php elseif( is_author() ): ?>Estos son todos los posts que he escrito, ordenados por fecha de manera descendente.<?php else: ?><?php bloginfo('description'); ?><?php endif; ?>" />
    <meta property="twitter:image" content="<?php if( is_single() || is_page() ): ?><?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id, 'large', true); echo $thumb_url[0]; ?><?php else: ?>https://<?php include('includes/site-domain.php'); ?>/assets/images/logo.png<?php endif; ?>" />

    <!-- Meta Tags Generated with https://metatags.io -->

    <link rel="alternate" type="application/rss+xml" title="LuisCarlosPando.com" href="https://blog.<?php include('includes/site-domain.php'); ?>/rss/" />
    <link rel="author" href="https://<?php include('includes/site-domain.php'); ?>/humans.txt" />
    <link rel="apple-touch-icon" sizes="180x180" href="https://<?php include('includes/site-domain.php'); ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://<?php include('includes/site-domain.php'); ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://<?php include('includes/site-domain.php'); ?>/favicon-16x16.png">
    <link rel="manifest" href="https://<?php include('includes/site-domain.php'); ?>/site.webmanifest">
    <link rel="mask-icon" href="https://<?php include('includes/site-domain.php'); ?>/safari-pinned-tab.svg" color="#0e0f34">
    <link rel="canonical" href="<?php the_permalink(); ?>">
    <link rel="me" href="https://social.lol/@mijo" />
    <link rel="me" href="https://mastodon.online/@mijo" />
    <link rel="me" href="https://hachyderm.io/@luiscarlospando" />
    <link rel="me" href="https://github.com/luiscarlospando" />
    <link rel="me" href="https://proven.lol/75353b">

    <!-- Webmentions -->
    <link rel="webmention" href="https://webmention.io/<?php include('includes/site-domain.php'); ?>/webmention" />
    <link rel="pingback" href="https://webmention.io/<?php include('includes/site-domain.php'); ?>/xmlrpc" />

	<?php wp_head(); ?>
</head>
<body <?php body_class('gesture'); ?>>
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
            <?php if (is_single() ): ?>
                <p class="d-none d-lg-block">
                    💬 Estás en:
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
                                <a class="h-card" href="https://<?php include('includes/site-domain.php'); ?>/" data-toggle="tooltip" data-placement="right" title="" data-original-title="Sígueme en Mastodon: <?php include('includes/mastodon-account.php'); ?>">
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

        <section id="m7gp-livestream-alert" class="container">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1">
                    <div class="card last-updated text-center mt-3">
                        <div class="card-body rounded">
                            <p>
                                <i id="live-icon" class="fa-solid fa-circle animated live infinite"></i>
                                ¡El <a href="https://<?php include('includes/site-domain.php'); ?>/nintendo/mario-kart/">Mode 7 Grand Prix</a> está en vivo!
                                <a href="https://<?php include('includes/site-domain.php'); ?>/live/" data-toggle="tooltip" data-placement="top" title="Ver stream en vivo">
                                    <img style="vertical-align: text-top;" alt="Twitch Status" src="https://img.shields.io/twitch/status/mexicanskynet?logo=twitch&logoColor=white&color=6441a5">
                                </a>
                            </p>
                            <p>
                                Código del torneo: <code>0746-6549-8155</code>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>