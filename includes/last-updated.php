<?php
	$posts = get_posts(array('numberposts'=>1)); // obtenemos solamente un post (el más reciente)
	foreach ($posts as $post){
		echo get_the_date('j/m/Y', $post->ID); // desplegamos la fecha en formato j/m/Y
	} 
?>