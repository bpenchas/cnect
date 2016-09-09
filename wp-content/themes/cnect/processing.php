<?php

$query = new WP_Query(array(
	'posts_per_page' => -1
	));

while ($query->have_posts()) { $query->the_post();

	echo '<pre>';

	echo $post->post_content;

	echo '</pre>';

	/*
	$matches = array();

	//preg_match('/<em>.*by.*([\w ]+)<\/span>.*<\/em>/i', $post->post_content, $matches);

	$name = $matches[1];

	if (empty($name)) {
		echo $post->ID . '<br />';
	} else {
		echo $post->ID . ': ' . $name . '<br />';
	}
	*/

}




