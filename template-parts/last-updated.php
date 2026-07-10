<?php
$posts = get_posts(["numberposts" => 1]); // Get only the latest post
foreach ($posts as $post) {
    echo get_the_date("j/m/Y", $post->ID); // Display date in j/m/Y format
}
