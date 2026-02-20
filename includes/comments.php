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
                              <div class="row">
                                  <div class="col-md-2 col-lg-1 text-center">
                                      <a href="${authorUrl}" target="_blank" rel="noopener noreferrer">
                                          <img src="${authorPhoto}"
                                              alt="Avatar de ${authorName}"
                                              class="rounded-circle img-fluid mb-3"
                                              style="max-width: 48px;"
                                              loading="lazy">
                                      </a>
                                  </div>
                                  <div class="col-md-10 col-lg-11">
                                      <div class="content">
                                          <div class="header mb-2">
                                              <strong>
                                                  <a href="${authorUrl}" target="_blank" rel="noopener noreferrer">${authorName}</a>
                                              </strong>
                                              <span class="text-muted"> · </span>
                                              <a href="${commentUrl}" target="_blank" rel="noopener noreferrer">
                                                  <time datetime="${publishedISO}"><em>${publishedFormatted}</em></time>
                                              </a>
                                          </div>
                                          <div class="text mb-2">
                                              <p style="white-space: pre-wrap; margin: 0;">${contentText}</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
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
