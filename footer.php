        <footer class="container">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div id="currently-listening"></div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        // Hide on homepage and when viewing the latest post
                        $homepage = "/";
                        $currentpage = $_SERVER["REQUEST_URI"];

                        // Get the latest post ID
                        $latest_post_query = new WP_Query([
                            "posts_per_page" => 1,
                            "post_type" => "post",
                        ]);

                        $latest_post_id = $latest_post_query->posts[0]->ID;
                        wp_reset_postdata();

                        // Only show if not homepage and not viewing the latest post
                        if (
                            $homepage != $currentpage &&
                            (!is_single() ||
                                (is_single() &&
                                    get_the_ID() != $latest_post_id))
                        ): ?>
                            <?php
                            $latest_post = new WP_Query([
                                "posts_per_page" => 1,
                                "post_type" => "post",
                            ]);

                            if ($latest_post->have_posts()):
                                while ($latest_post->have_posts()):
                                    $latest_post->the_post(); ?>
                                    <div class="col-12 text-center">
                                        🗞️ Lo último: <span id="blog"><?php the_title(); ?></span>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        <?php endif;
                        ?>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-lg-5 text-center text-lg-left">
                            <p id="copyright">
                                &copy; <?php echo date(
                                    "Y",
                                ); ?> Luis Carlos Pando
                            </p>

                            <p>Parte del <a href="https://cs.sjoy.lol/" rel="noopener noreferrer" target="_blank">CSS JOY Webring 🕸️💍</a></p>

                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="btn btn-primary btn-sm" href="https://webri.ng/webring/cssjoy/previous?via=https://<?php include "includes/site-domain.php"; ?>" rel="noopener" data-toggle="tooltip" data-placement="top" aria-label="Anterior" title="Anterior">
                                        <i class="fa-solid fa-arrow-left"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="btn btn-primary btn-sm" href="https://webri.ng/webring/cssjoy/random?via=https://<?php include "includes/site-domain.php"; ?>" rel="noopener" data-toggle="tooltip" data-placement="top" aria-label="Sitio aleatorio" title="Sitio aleatorio">
                                        <i class="fa-solid fa-shuffle"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="btn btn-primary btn-sm" href="https://webri.ng/webring/cssjoy/next?via=https://<?php include "includes/site-domain.php"; ?>" rel="noopener" data-toggle="tooltip" data-placement="top" aria-label="Siguiente" title="Siguiente">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>

                            <ul class="list-inline">
                                <li class="list-inline-item me-2">
                                    <a href="https://<?php include "includes/site-domain.php"; ?>/blogroll/">Blogroll</a>
                                </li>
                                <li class="list-inline-item me-2">
                                    <a href="https://<?php include "includes/site-domain.php"; ?>/guestbook/">Guestbook</a>
                                </li>
                                <li class="list-inline-item me-2">
                                    <a href="https://<?php include "includes/site-domain.php"; ?>/newsletter/">Newsletter</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://<?php include "includes/site-domain.php"; ?>/privacy/" rel="privacy-policy">Privacidad</a>
                                </li>
                            </ul>

                            <ul id="version" class="list-inline">
                                <li class="list-inline-item me-2">
                                    <a rel="me noreferrer noopener" href="https://proven.lol/75353b" data-toggle="tooltip" data-placement="top" title="Proof" target="_blank">
                                        <span class="fa-stack small">
                                            <i class="fa-solid fa-check fa-stack-1x fa-inverse" style="--fa-stack-z-index: 2;"></i>
                                            <i class="fa-solid fa-certificate fa-stack-2x" style="--fa-stack-z-index: 1;"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item me-2">
                                    <a href="https://<?php include "includes/site-domain.php"; ?>/about/" data-toggle="tooltip" data-placement="top" data-html="true" title="Acerca de">
                                        <code>Acerca de</code>
                                    </a>
                                </li>
                                <li class="list-inline-item me-2">
                                    <a rel="noreferrer noopener" href="https://github.com/luiscarlospando/luiscarlospando.com" data-toggle="tooltip" data-placement="top" data-html="true" title="Código fuente" target="_blank">
                                        <code>Código fuente</code>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a id="btn-version-blog" href="" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="">
                                        <code>v</code>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-7 text-center text-lg-right">
                            <ul class="list-inline mt-lg-0">
                                <li class="list-inline-item">
                                    <a rel="noreferrer noopener" href="https://luiscarlospando.instatus.com/" target="_blank" id="site-version" class="badge" data-toggle="tooltip" data-placement="top" data-html="true" title="Estatus de los sistemas">
                                        <span id="system-status"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a rel="noreferrer noopener" href="https://m.do.co/c/03bd95f889e7" target="_blank" class="badge badge-primary" data-toggle="tooltip" data-placement="top" title="Deployed on DigitalOcean">
                                        <span class="d-none d-sm-inline-block">Deployed on</span> <i class="fa-brands fa-digital-ocean"></i> DigitalOcean
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://<?php include "includes/site-domain.php"; ?>/support/" class="badge badge-warning bmac" data-toggle="tooltip" data-placement="top" title="Apoya mi sitio">
                                        <i class="fa-solid fa-hand-holding-heart"></i> Apoya mi sitio
                                    </a>
                                </li>
                            </ul>

                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="https://<?php include "includes/site-domain.php"; ?>/subscribe/" class="badge badge-rss" data-toggle="tooltip" data-placement="top" title="Suscríbete">
                                        <i class="fa-solid fa-rss"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a rel="me noreferrer noopener" href="https://mijo.omg.lol/" target="_blank">
                                        <img alt="omg.lol" src="https://img.shields.io/badge/%40mijo%20-%20%40mijo?label=omg.lol&labelColor=%235C5C5C&color=%23ED85A8&link=https%3A%2F%2Fmijo.omg.lol%2F">
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a rel="me noreferrer noopener" href="https://discordapp.com/users/86571896581132288/" target="_blank">
                                        <img src="https://dcbadge.limes.pink/api/shield/86571896581132288?style=flat&amp;theme=discord-inverted" alt="" loading="lazy">
                                    </a>
                                </li>
                            </ul>

                            <ul class="list-unstyled">
                                <li>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item mb-2 mb-lg-0">
                                            <a rel="noreferer noopener" href="https://people.pledge.party/" target="_blank">
                                                <img class="web-badge" width="88" height="31" src="https://<?php include "includes/site-domain.php"; ?>/assets/images/buttons/People-Pledge-Badge-Cream-Pink.svg" alt="The People Pledge" />
                                            </a>
                                        </li>
                                        <li class="list-inline-item mb-2 mb-lg-0">
                                            <a rel="noreferer noopener" href="https://echofeed.app/" target="_blank">
                                                <img class="web-badge" width="88" height="31" src="https://<?php include "includes/site-domain.php"; ?>/assets/images/buttons/powered-by-echofeed-orange-large.svg" alt="Powered by EchoFeed" />
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a rel="noreferer noopener" href="https://ko-fi.com/s/4662b19f61" target="_blank">
                                                <img class="web-badge" src="https://<?php include "includes/site-domain.php"; ?>/assets/images/buttons/WrittenByAHuman_04.svg" alt="Written by a human" />
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a rel="noopener" href="https://blogblog.es/" target="_blank">
                                                <img class="web-badge" width="88" height="31" src="https://<?php include "includes/site-domain.php"; ?>/assets/images/buttons/blogblog.webp" alt="¡Blog!¡Blog!" />
                                            </a>
                                        </li>
                                        <li class="list-inline-item mb-2 mb-lg-0">
                                            <a rel="noopener" href="https://octothorp.es/explore?s=luiscarlospando.com" target="_blank">
                                                <img class="web-badge" width="88" height="31" src="https://octothorp.es/badge.png" alt="Badge for the Octothorpes main ring" />
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="https://<?php include "includes/site-domain.php"; ?>/badges/">
                                        <small>
                                            <em>Ver mi badge wall</em>
                                        </small>
                                    </a>
                                </li>
                            </ul>

                            <p><em>Hola desde Chihuahua, México.</em> <span id="greeting-emoji">🤠</span></p>
                        </div>
                        <div class="col-12 text-center">
                            <figure>
                                <a href="<?php echo site_url(); ?>/personal/2025/08/el-indieweb-es-metal-y-punk/" data-toggle="tooltip" data-placement="top" aria-label="El IndieWeb es metal (y punk)" title="El IndieWeb es metal (y punk)">
                                    <img class="img-fluid" width="70" src="https://<?php include "includes/site-domain.php"; ?>/assets/images/indieweb@2x.webp" alt="IndieWeb">
                                </a>
                            </figure>
                        </div>
                        <div class="col-12 text-center">
                            <ul id="social" class="list-inline mt-0">
                                <?php if (
                                    $mastodon = get_field("mastodon", "option")
                                ): ?>
                                    <li class="list-inline-item">
                                        <a rel="me noreferrer noopener" href="<?= esc_url(
                                            $mastodon,
                                        ) ?>" data-toggle="tooltip" data-placement="top" aria-label="Sígueme en Mastodon" title="Sígueme en Mastodon" target="_blank">
                                            <i class="fa-brands fa-mastodon"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if (
                                    $bluesky = get_field("bluesky", "option")
                                ): ?>
                                    <li class="list-inline-item">
                                        <a rel="me noreferrer noopener" href="<?= esc_url(
                                            $bluesky,
                                        ) ?>" data-toggle="tooltip" data-placement="top" aria-label="Sígueme en Bluesky" title="Sígueme en Bluesky" target="_blank">
                                            <i class="fa-brands fa-bluesky"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if (
                                    $instagram = get_field(
                                        "instagram",
                                        "option",
                                    )
                                ): ?>
                                    <li class="list-inline-item">
                                        <a rel="me noreferrernoopener" href="<?= esc_url(
                                            $instagram,
                                        ) ?>" data-toggle="tooltip" data-placement="top" aria-label="Sígueme en Instagram" title="Sígueme en Instagram" target="_blank">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if (
                                    $discord = get_field("discord", "option")
                                ): ?>
                                    <li class="list-inline-item">
                                        <a rel="me noreferrer noopener" href="<?= esc_url(
                                            $discord,
                                        ) ?>" data-toggle="tooltip" data-placement="top" aria-label="Contáctame vía Discord" title="Contáctame vía Discord" target="_blank">
                                            <i class="fa-brands fa-discord"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if (
                                    $signal = get_field("signal", "option")
                                ): ?>
                                    <li class="list-inline-item">
                                        <a rel="me noreferrer noopener" href="<?= esc_url(
                                            $signal,
                                        ) ?>" data-toggle="tooltip" data-placement="top" aria-label="Contáctame vía Signal" title="Contáctame vía Signal" target="_blank">
                                            <i class="fa-brands fa-signal-messenger"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--div id="dismissable-alert">
                <p>
                    <em><time datetime="2025-11-01T00:00:00.000Z">Noviembre, 2025</time></em> - 👋 Actualmente estoy disponible y abierto a nuevas oportunidades como frontend developer.
                    <a class="btn btn-primary btn-sm" href="https://luiscarlospando.com/cv/">
                        <i class="fa-solid fa-circle-info"></i> Saber más
                    </a>
                </p>
                <button id="alert-close" aria-label="Close alert">✕</button>
            </div -->
        </footer>
    </div>
    <!-- /Wrapper for mmenu -->

    <!-- Stuff I like -->
    <a id="stuff-i-like"
       href="javascript:void(0)"
       data-toggle="modal"
       data-target="#modal"
       data-toggle="tooltip"
       data-placement="top"
       aria-label="Mis recomendaciones"
       title="Mis recomendaciones">⭐</a>

    <!-- Back to top component -->
    <div id="back-to-top"></div>

    <!-- App -->
    <?php wp_footer(); ?>

    <!-- Instatus -->
    <script src="https://luiscarlospando.instatus.com/widget/script.js"></script>

    <?php if (is_single()): ?>
        <script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
        <script src="https://unpkg.com/dayjs@1/locale/es.js"></script>

        <script>
            // API endpoints
            const likesEndpoint = "https://justcors.com/l_zoyat40jyqi/https://webmention.io/api/mentions.jf2?target=<?php the_permalink(); ?>&wm-property=like-of";
            const boostsEndpoint = "https://justcors.com/l_zoyat40jyqi/https://webmention.io/api/mentions.jf2?target=<?php the_permalink(); ?>&wm-property=repost-of";
            const repliesEndpoint = "https://justcors.com/l_zoyat40jyqi/https://webmention.io/api/mentions.jf2?target=<?php the_permalink(); ?>&wm-property=in-reply-to";

            dayjs.locale('es');

            // Fetch and display likes
            function showLikes() {
                fetch(likesEndpoint, {
                    method: "GET",
                    headers: {"Content-type": "application/json;charset=UTF-8"}})
                .then(response => response.json())
                .then(data => {
                    if (data.children.length >= 1) {
                        document.getElementById("webmentions-likes-subtitle").innerHTML = `
                            <ul class="list-inline" style="margin: 0 !important;">
                                <li class="list-inline-item">
                                    <h3><i class="fa-solid fa-star"></i> Favs (desde <i class="fa-brands fa-mastodon"></i> Mastodon)</h3>
                                </li>
                            </ul>`;

                        let likesHtml = '';
                        for (let i = 0; i < data.children.length; i++) {
                            if (!data.children[i].author) continue;
                            const author = data.children[i].author;
                            likesHtml += `
                                <li class="list-inline-item">
                                    <a href="${author.url}" target="_blank" rel="noopener noreferrer">
                                        <img class="user-thumbnail rounded-circle" src="${author.photo}" alt="Avatar de ${author.name}" loading="lazy" width="48" height="48" />
                                    </a>
                                </li>
                            `;
                        }
                        document.getElementById("webmentions-likes").innerHTML = likesHtml;
                    }
                })
                .catch(error => console.error('Error fetching likes:', error));
            }

            // Boosts
            function showBoosts() {
                fetch(boostsEndpoint, {
                    method: "GET",
                    headers: {"Content-type": "application/json;charset=UTF-8"}})
                .then(response => response.json())
                .then(data => {
                    if (data.children.length >= 1) {
                        document.getElementById("webmentions-boosts-subtitle").innerHTML = `
                            <ul class="list-inline" style="margin: 0 !important;">
                                <li class="list-inline-item">
                                    <h3><i class="fa-solid fa-rocket"></i> Boosts (desde <i class="fa-brands fa-mastodon"></i> Mastodon)</h3>
                                </li>
                            </ul>`;

                        let boostsHtml = '';
                        for (let i = 0; i < data.children.length; i++) {
                            if (!data.children[i].author) continue;
                            const author = data.children[i].author;
                            boostsHtml += `
                                <li class="list-inline-item">
                                    <a href="${author.url}" target="_blank" rel="noopener noreferrer">
                                        <img class="user-thumbnail rounded-circle" src="${author.photo}" alt="Avatar de ${author.name}" loading="lazy" width="48" height="48" />
                                    </a>
                                </li>
                            `;
                        }
                        document.getElementById("webmentions-boosts").innerHTML = boostsHtml;
                    }
                })
                .catch(error => console.error('Error fetching boosts:', error));
            }

            // Replies
            function showReplies() {
                fetch(repliesEndpoint, {
                    method: "GET",
                    headers: {"Content-type": "application/json;charset=UTF-8"}
                })
                .then(response => response.json())
                .then(data => {
                    if (data?.children && data.children.length >= 1) {
                        document.getElementById("webmentions-comments-subtitle").innerHTML = `
                            <ul class="list-inline" style="margin: 0 !important;">
                                <li class="list-inline-item">
                                    <h3><i class="fa-solid fa-reply"></i> Replies (desde <i class="fa-brands fa-mastodon"></i> Mastodon)</h3>
                                </li>
                            </ul>`;

                        let commentsHtml = '';
                        for (let i = 0; i < data.children.length; i++) {
                            const comment = data.children[i];
                            if (!comment.author) continue;

                            const authorName  = comment.author.name  || 'Usuario Anónimo';
                            const authorUrl   = comment.author.url   || '#';
                            const authorPhoto = comment.author.photo || 'https://www.gravatar.com/avatar/?d=mp&s=100';
                            const contentText = comment.content?.text || '';
                            if (contentText.trim() === '') continue;

                            const commentUrl = comment.url || '#';

                            // Formato legible y datetime en ISO
                            const publishedISO = comment.published || '';
                            const publishedFormatted = comment.published
                                ? dayjs(comment.published).format('DD [de] MMMM [de] YYYY, h:mm a')
                                : 'Fecha desconocida';

                            commentsHtml += `
                                <article class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title mb-2">
                                            <a href="${authorUrl}" target="_blank" rel="noopener noreferrer">
                                                <img class="user-thumbnail rounded-circle" src="${authorPhoto}" alt="Avatar de ${authorName}" loading="lazy" width="48" height="48" />
                                            </a>
                                            <a href="${authorUrl}" target="_blank" rel="noopener noreferrer">${authorName}</a>
                                        </h5>
                                        <p class="card-text">${contentText}</p>
                                    </div>
                                    <div class="card-footer text-muted">
                                        <p class="card-text">
                                            <a href="${commentUrl}" target="_blank" rel="noopener noreferrer">
                                                <time datetime="${publishedISO}">${publishedFormatted}</time>
                                            </a>
                                        </p>
                                    </div>
                                </article>`;
                        }
                        document.getElementById("webmentions-comments").innerHTML = commentsHtml;
                    }
                })
                .catch(error => console.error('Error fetching or processing replies:', error));
            }

            // Function calls
            showLikes();
            showBoosts();
            showReplies();
        </script>
    <?php endif; ?>

    <!-- Image Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg text-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body modal-body-jekyll">
                    <img class="img-fluid rounded" src="" alt="" loading="lazy" />
                </div>
            </div>
        </div>
    </div>

    <!-- Video Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg text-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body modal-body-jekyll p-0">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- NeatStats -->
    <script src="https://neatstats.net/view.js"></script>

    <!-- Tinylytics -->
    <script src="https://tinylytics.app/embed/r9xjks1Y65hJnkRx9b8S.js?kudos=❤️&webring=avatars" defer></script>
</body>
</html>
