<?php

/**
 * [AJAX] Get an array of posts.
 *
 * @param [GET] count (Int)
 *      The (maximum) number of posts to return. Optional (default 10).
 * @param [GET] offset (Int)
 *      The number of posts to skip over. Optional (default 0).
 * @param [GET] categoryID (Int)
 *      The category ID to get posts for. Optional (default all categories).
 * @param [GET] authorID (Int)
 *      The author ID to get posts for. Optional (default all authors).
 *
 * @return [JSON] (String) The requested post data.
 */
function ajax_posts() {
    header('Content-Type: text/javascript');


    // Ingest API arguments.
    $count          = $_GET['count'];
    $offset         = $_GET['offset'];
    $category_ID    = $_GET['categoryID'];
    $author_ID      = $_GET['authorID'];

    // Default argument values.
    if (!$count) $count = 10;
    if (!$offset) $offset = 0;
    if (!$category_ID) $category_ID = '';
    if (!$author_ID) $author_ID = '';

    $wp_posts = get_posts(array(
        'posts_per_page'    => $count,
        'offset'            => $offset,
        'category'          => $category_ID,
        'author'            => $author_ID,
    ));
    $response_posts = array();

    foreach ($wp_posts as $post) {
        $author = new WP_User($post->post_author);
        $categories = get_the_category($post->ID);

        $response_posts[] = array(
            'ID'        => $post->ID,
            'title'     => apply_filters('the_title', $post->post_title),
            'excerpt'   => apply_filters('the_content', $post->post_excerpt),
            'content'   => apply_filters('the_content', $post->post_content),
            'featuredImageURL'  => post_featured_image_URL($post->ID, 'thumbnail'),
            'authorName'    => post_guest_author($post->ID),
            'commentsCount' => intval($post->comment_count),
            'categoryID'    => $categories[0]->term_id

        );
    }

    echo json_encode($response_posts);
    die;
}

/**
 * [AJAX] Get the array of categories.
 *
 * @return [JSON] (String) The requested category data.
 */
function ajax_categories() {
    header('Content-Type: text/javascript');

    $wp_categories = get_categories();
    $response_categories = array();

    foreach ($wp_categories as $category) {
        $response_categories[] = array(
            'ID'                => $category->term_id,
            'title'             => $category->name,
            'subtitle'          => category_subtitle($category->term_id),
            'tagline'           => category_tagline($category->term_id),
            'parent'            => $category->parent,
            'size'              => $category->count,
            'featuredImageURL'  => category_featured_image_URL($category->term_id)
        );
    }

    echo json_encode($response_categories);
    die;
}

/**
 * [AJAX] Get the array of tags.
 *
 * @return [JSON] (String) The requested tag data.
 */
function ajax_tags() {
    header('Content-Type: text/javascript');

    $wp_tags = get_tags();
    $response_tags = array();

    foreach ($wp_tags as $tag) {
        $response_tags[] = array(
            'ID'                => $tag->term_id,
            'title'             => $tag->name,
            'subtitle'          => tag_subtitle($tag->term_id),
            'tagline'           => tag_tagline($tag->term_id),
            'parent'            => $tag->parent,
            'size'              => $tag->count,
            'featuredImageURL'  => tag_featured_image_URL($tag->term_id)
        );
    }

    echo json_encode($response_tags);
    die;
}
