        <footer class="container">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1">
                    <div class="row my-1">
                        <div class="col-12 text-center">
                            <div id="currently-listening"></div>
                        </div>
                    </div>
                    <div class="row mt-4">
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
                        <div class="col-12 col-lg-4 text-center text-lg-left">
                            <p class="copyright">
                                &copy; <?php echo date(
                                    "Y",
                                ); ?> Luis Carlos Pando
                            </p>

                            <p>Parte del <a href="https://cs.sjoy.lol/" target="_blank">CSS JOY Webring 🕸️💍</a></p>

                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="btn btn-primary btn-sm" href="https://webri.ng/webring/cssjoy/previous?via=https://<?php include "includes/site-domain.php"; ?>" data-toggle="tooltip" data-placement="top" aria-label="Anterior" title="Anterior">
                                        <i class="fa-solid fa-arrow-left"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="btn btn-primary btn-sm" href="https://webri.ng/webring/cssjoy/random?via=https://<?php include "includes/site-domain.php"; ?>" data-toggle="tooltip" data-placement="top" aria-label="Sitio aleatorio" title="Sitio aleatorio">
                                        <i class="fa-solid fa-shuffle"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="btn btn-primary btn-sm" href="https://webri.ng/webring/cssjoy/next?via=https://<?php include "includes/site-domain.php"; ?>" data-toggle="tooltip" data-placement="top" aria-label="Siguiente" title="Siguiente">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>

                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="https://<?php include "includes/site-domain.php"; ?>/blogroll/">Blogroll</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://<?php include "includes/site-domain.php"; ?>/newsletter/">Newsletter</a>
                                </li>
                            </ul>

                            <ul class="list-inline">
                                <li class="list-inline-item me-2">
                                    <a href="https://proven.lol/75353b" data-toggle="tooltip" data-placement="top" title="Proof" target="_blank">
                                        <span class="fa-stack small">
                                            <i class="fa-solid fa-check fa-stack-1x fa-inverse" style="--fa-stack-z-index: 2;"></i>
                                            <i class="fa-solid fa-certificate fa-stack-2x" style="--fa-stack-z-index: 1;"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item me-2">
                                    <a href="https://<?php include "includes/site-domain.php"; ?>/acerca-de/" data-toggle="tooltip" data-placement="top" data-html="true" title="Acerca de">
                                        <code>Acerca de</code>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a id="btn-version-blog" href="" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="">
                                        <code>v</code>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-8 text-center text-lg-right">
                            <ul class="list-inline mt-lg-0">
                                <li class="list-inline-item">
                                    <a href="https://luiscarlospando.instatus.com/" target="_blank" id="site-version" class="badge" data-toggle="tooltip" data-placement="top" data-html="true" title="Estatus de los sistemas">
                                        <span id="system-status"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://m.do.co/c/03bd95f889e7" target="_blank" class="badge badge-primary" data-toggle="tooltip" data-placement="top" title="Deployed on DigitalOcean">
                                        <span class="d-none d-sm-inline-block">Deployed on</span> <i class="fa-brands fa-digital-ocean"></i> DigitalOcean
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://<?php include "includes/site-domain.php"; ?>/privacidad/" class="badge badge-dark" data-toggle="tooltip" data-placement="top" title="Privacidad">
                                        <i class="fa-solid fa-shield-halved"></i> Privacidad
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://buymeacoffee.com/luiscarlospando" class="badge badge-warning bmac" data-toggle="tooltip" data-placement="top" title="Buy Me a Coffee" target="_blank">
                                        <i class="fa-solid fa-mug-hot"></i> Buy Me a Coffee
                                    </a>
                                </li>
                            </ul>

                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="https://<?php include "includes/site-domain.php"; ?>/rss/" class="badge badge-rss" data-toggle="tooltip" data-placement="top" title="RSS">
                                        <i class="fa-solid fa-rss"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a rel="me" href="https://mijo.omg.lol/" target="_blank">
                                        <img src="https://camo.githubusercontent.com/9d4da15b04f17090b553f6c2c07630f9bfb454ffaa12e49b5ca13659578a8741/68747470733a2f2f6f6d672e386269747371752e69642f3f757365723d6d696a6f" alt="omg.lol" data-canonical-src="https://omg.8bitsqu.id/?user=mijo" style="max-width: 100%;">
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a rel="me" href="https://discordapp.com/users/86571896581132288/" target="_blank">
                                        <img src="https://dcbadge.limes.pink/api/shield/86571896581132288?style=flat&amp;theme=discord-inverted" alt="" loading="lazy">
                                    </a>
                                </li>
                            </ul>

                            <ul class="list-inline">
                                <li class="list-inline-item mb-2 mb-lg-0">
                                    <a href="https://people.pledge.party/" target="_blank">
                                        <img width="88" height="31" src="https://<?php include "includes/site-domain.php"; ?>/assets/images/buttons/People-Pledge-Badge-Cream-Pink.svg" alt="The People Pledge">
                                    </a>
                                </li>
                                <li class="list-inline-item mb-2 mb-lg-0">
                                    <a href="https://echofeed.app/" target="_blank">
                                        <img width="88" height="31" src="https://<?php include "includes/site-domain.php"; ?>/assets/images/buttons/powered-by-echofeed-orange-large.svg" alt="Powered by EchoFeed">
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://ko-fi.com/s/4662b19f61" target="_blank">
                                        <img src="https://<?php include "includes/site-domain.php"; ?>/assets/images/buttons/WrittenByAHuman_04.svg" alt="Written by a human" class="img-fluid">
                                    </a>
                                </li>
                            </ul>

                            <p class="copyright">Saludos desde Chihuahua, México. 🏜️</p>
                        </div>
                        <div class="col-12 text-center">
                            <ul id="social" class="list-inline mt-0">
                                <?php if (
                                    $mastodon = get_field("mastodon", "option")
                                ): ?>
                                    <li class="list-inline-item">
                                        <a rel="me" href="<?= esc_url(
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
                                        <a rel="me" href="<?= esc_url(
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
                                        <a rel="me" href="<?= esc_url(
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
                                        <a rel="me" href="<?= esc_url(
                                            $discord,
                                        ) ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" aria-label="Contáctame en Discord" title="Contáctame en Discord" target="_blank">
                                            <i class="fa-brands fa-discord"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if (
                                    $signal = get_field("signal", "option")
                                ): ?>
                                    <li class="list-inline-item">
                                        <a rel="me" href="<?= esc_url(
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
            <div id="dismissable-alert">
                <p>
                    <em>Agosto, 2025</em> - 👋 Actualmente estoy disponible y abierto a nuevas oportunidades como desarrollador frontend.
                    <a class="btn btn-primary btn-sm" href="https://luiscarlospando.com/cv/">
                        <i class="fa-solid fa-circle-info"></i> Más información
                    </a>
                </p>
                <button id="alert-close" aria-label="Close alert">✕</button>
            </div>
        </footer>
    </div>
    <!-- /Wrapper for mmenu -->

    <div id="back-to-top"></div>

    <!-- App -->
    <?php wp_footer(); ?>

    <!-- GitHub -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Instatus -->
    <script src="https://luiscarlospando.instatus.com/widget/script.js"></script>

<?php if (is_single()): ?>
    <!-- Day.js -->
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>

    <!-- Webmentions -->
    <script>
        // API URLs
        const likesEndpoint = "https://justcors.com/l_zoyat40jyqi/https://webmention.io/api/mentions.jf2?target=<?php the_permalink(); ?>&wm-property=like-of";
        const boostsEndpoint = "https://justcors.com/l_zoyat40jyqi/https://webmention.io/api/mentions.jf2?target=<?php the_permalink(); ?>&wm-property=repost-of";
        const repliesEndpoint = "https://justcors.com/l_zoyat40jyqi/https://webmention.io/api/mentions.jf2?target=<?php the_permalink(); ?>&wm-property=in-reply-to";

        // Likes
        function showLikes() {
            fetch(likesEndpoint, {
                method: "GET",
                headers: {"Content-type": "application/json;charset=UTF-8"}})
            .then(response => response.json())
            .then(data => {
                if (data.children.length >= 1) {
                    document.getElementById("webmentions-likes-subtitle").innerHTML += `
                        <ul class="list-inline" style="margin: 0 !important;">
                            <li class="list-inline-item">
                                <h3>Likes (desde <i class="fa-brands fa-mastodon"></i> Mastodon)</h3>
                            </li>
                        </ul>`;

                    for (let i = 0; i < data.children.length; i++) {
                        document.getElementById("webmentions-likes").innerHTML += `
                            <li class="list-inline-item">
                                <a href="${data.children[i].author.url}" target="_blank">
                                    <img class="user-thumbnail rounded-circle" src="${data.children[i].author.photo}" alt="" />
                                </a>
                            </li>
                        `;
                    }
                }
            })
            .catch(error => console.error(error));
        }

        // Boosts
        function showBoosts() {
            fetch(boostsEndpoint, {
                method: "GET",
                headers: {"Content-type": "application/json;charset=UTF-8"}})
            .then(response => response.json())
            .then(data => {
                if (data.children.length >= 1) {
                    document.getElementById("webmentions-boosts-subtitle").innerHTML += `
                        <ul class="list-inline" style="margin: 0 !important;">
                            <li class="list-inline-item">
                                <h3>Boosts (desde <i class="fa-brands fa-mastodon"></i> Mastodon)</h3>
                            </li>
                        </ul>`;

                    for (let i = 0; i < data.children.length; i++) {
                        document.getElementById("webmentions-boosts").innerHTML += `
                            <li class="list-inline-item">
                                <a href="${data.children[i].author.url}" target="_blank">
                                    <img class="user-thumbnail rounded-circle" src="${data.children[i].author.photo}" alt="" />
                                </a>
                            </li>
                        `;
                    }
                }
            })
            .catch(error => console.error(error));
        }

        // Replies
        function showReplies() {
            fetch(repliesEndpoint, {
                method: "GET",
                headers: {"Content-type": "application/json;charset=UTF-8"}})
            .then(response => response.json())
            .then(data => {
                if (data.children.length >= 1) {
                    document.getElementById("webmentions-comments-subtitle").innerHTML += `
                        <ul class="list-inline" style="margin: 0 !important;">
                            <li class="list-inline-item">
                                <h3>Replies (desde <i class="fa-brands fa-mastodon"></i> Mastodon)</h3>
                            </li>
                        </ul>`;

                    for (let i = 0; i < data.children.length; i++) {
                        const postedOn = data.children[i].published;
                        let lastUpdated = dayjs(postedOn);

                        document.getElementById("webmentions-comments").innerHTML += `
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-2">
                                        <a href="${data.children[i].author.url}" target="_blank">
                                            <img class="user-thumbnail rounded-circle" src="${data.children[i].author.photo}" alt="" />
                                        </a>
                                        <a href="${data.children[i].author.url}" target="_blank">
                                            ${data.children[i].author.name}
                                        </a>
                                    </h5>
                                    <p class="card-text">
                                        ${data.children[i].content.text}
                                    </p>
                                </div>
                                <div class="card-footer text-muted">
                                    <p class="card-text">
                                        <code>
                                            <a href="${data.children[i].url}" target="_blank">
                                                ${lastUpdated}
                                            </a>
                                        </code>
                                    </p>
                                </div>
                            </div>
                        `;
                    }
                }
            })
            .catch(error => console.error(error));
        }

        // Function calls
        showLikes();
        showBoosts();
        showReplies();
    </script>
<?php endif; ?>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body modal-body-jekyll">
                    <img class="img-fluid rounded" src="" alt="" loading="lazy" />
                </div>
            </div>
        </div>
    </div>

    <!-- Analytics -->
    <script src="https://tinylytics.app/embed/r9xjks1Y65hJnkRx9b8S.js?kudos=❤️&webring=avatars" defer></script>
</body>
</html>
