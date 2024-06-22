        <footer class="container">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1">
                    <div class="row my-1">
                        <div class="col-12 text-center">
                            <div id="currently-listening"></div>
                        </div>
                    </div>
                    <div class="row">
                    <?php
                    // DLOCC If URL is Homepage then do this…
                    $homepage = "/";
                    $currentpage = $_SERVER["REQUEST_URI"];
                    $nextpost = get_adjacent_post(false, "", false);
                    if ($homepage == $currentpage || $nextpost == ""): ?>
                        <div class="col-12 col-md-6 offset-md-6 d-flex align-items-center justify-content-md-end">
                            Hola desde Chihuahua, México 👋
                        </div>
                    <?php else: ?>
                    <?php query_posts("showposts=1"); ?>
                    <?php while (have_posts()):
                        the_post(); ?>
                        <div class="col-12 col-md-6">
							Lo último: <span id="blog"></span>
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-md-end">
                            Hola desde Chihuahua, México 👋
                        </div>
                    <?php
                    endwhile; ?>
                    <?php endif;
                    ?>
                    <?php wp_reset_query(); ?>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-lg-3 copyright my-auto">
                            <p class="d-inline-block d-lg-block mb-2">
                                &copy; <?php echo date(
                                    "Y"
                                ); ?> Luis Carlos Pando
                            </p>
                            <a href="https://notbyai.fyi" target="_blank">
                                <img id="written-by-human-not-by-ai-badge-white" src="https://<?php include "includes/site-domain.php"; ?>/assets/images/Written-By-Human-Not-By-AI-Badge-white.svg" alt="Escrito por un humano, no por IA" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-12 col-lg-9 my-auto">
                            <div class="row">
                                <div class="col-12 text-lg-right my-auto">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="https://m.do.co/c/03bd95f889e7" target="_blank" class="badge badge-primary" data-toggle="tooltip" data-placement="top" title="Deployed on DigitalOcean">
                                                Deployed on <i class="fa-brands fa-digital-ocean"></i> DigitalOcean
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://<?php include "includes/site-domain.php"; ?>/privacidad" class="badge badge-dark" data-toggle="tooltip" data-placement="top" title="Privacidad">
                                            Privacidad
                                        </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://luiscarlospando.instatus.com/" target="_blank" id="site-version" class="badge" data-toggle="tooltip" data-placement="top" data-html="true" title="Estatus">
                                                <span id="system-status"></span>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="<?php echo site_url(); ?>/rss/" class="badge badge-rss" data-toggle="tooltip" data-placement="top" title="RSS">
                                                <i class="fa-solid fa-rss"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a rel="me" href="<?php include "includes/mastodon-account.php"; ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Seguir a @mijo en Mastodon" target="_blank">
                                                <i class="fa-brands fa-mastodon"></i> Seguir a @mijo
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 version text-lg-right my-auto">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="" class="tinylytics_webring" data-toggle="tooltip" data-placement="top" title="🕸️💍 Webring (actualiza la página para obtener un enlace al azar)">
                                                🕸️💍 Webring <i class="fa-solid fa-arrow-right"></i> <img class="tinylytics_webring_avatar" src="" style="display: none"/>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://discordapp.com/users/86571896581132288/" target="_blank">
                                                <img src="https://dcbadge.limes.pink/api/shield/86571896581132288?style=flat&amp;theme=discord-inverted" alt="" loading="lazy">
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://proven.lol/75353b" data-toggle="tooltip" data-placement="top" title="Verificado" target="_blank">
                                                <span class="fa-stack small">
                                                    <i class="fa-solid fa-check fa-stack-1x fa-inverse" style="--fa-stack-z-index: 2;"></i>
                                                    <i class="fa-solid fa-certificate fa-stack-2x" style="--fa-stack-z-index: 1;"></i>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://github.com/luiscarlospando/luiscarlospando.com" data-toggle="tooltip" data-placement="top" data-html="true" title="Ver código fuente" target="_blank">
                                                <code>Ver código fuente</code>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://<?php include "includes/site-domain.php"; ?>/acerca-de" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php bloginfo(
    "name"
); ?> v<?php include "includes/site-version.php"; ?>">
                                                <code>v<?php include "includes/site-version.php"; ?></code>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

        // Using Promise syntax
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
                                <h3>Likes</h3>
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
                                <h3>Boosts</h3>
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
                                <h3>Replies</h3>
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

    <!-- Analytics -->
    <script src="https://tinylytics.app/embed/r9xjks1Y65hJnkRx9b8S.js?kudos=❤️&webring=avatars" defer></script>
</body>
</html>
