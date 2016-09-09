<?php

/**
 * Get the subtitle for a category.
 *
 * The subtitle is parsed from Wordpress's "description" field for categories.
 * It consists of all text found before the first colon in the description. If
 * no colon is found, it returns an empty string. If the given category ID does
 * not exist, it returns an empty string.
 *
 * @param $cat_ID (Int) The category ID for which to get the subtitle.
 *
 * @return (String) The subtitle for the given category.
 */
function category_subtitle($cat_ID) {
    $cat_description = strip_tags(category_description($cat_ID));
    $first_colon_index = strpos($cat_description, "\n");

    // If a colon was found, return the string up to that point. If no colon wa
    // found, return an empty string.
    if ($first_colon_index !== false) {
        return substr($cat_description, 0, $first_colon_index);
    } else {
        return '';
    }
}

/**
 * Get the tagline for a category.
 *
 * The tagline is parsed from Wordpress's "description" field for categories. It
 * consists of all text found after the first colon in the description. If no
 * colon is found, it returns the whole string. If the given category ID does
 * not exist, it returns an empty string.
 *
 * @param $cat_ID (Int) The category ID for which to get the tagline.
 *
 * @return (String) The tagline for the given category, or the empty string on
 *                  failure.
 */
function category_tagline($cat_ID) {
    $cat_description = strip_tags(category_description($cat_ID));
    $first_colon_index = strpos($cat_description, "\n");

    // If a colon was found, return the string after that point. If no colon was
    // found, return the whole string.
    if ($first_colon_index !== false) {
        return substr($cat_description, $first_colon_index + 1);
    } else {
        return $cat_description;
    }
}

/**
 * Get the URL of the featured image for a category.
 *
 * The featured image URL is pulled from the theme's images directory. The file
 * name should match "category-[category_slug].jpg". If the file does not exist,
 * this returns an empty string.
 *
 * @param $cat_ID (Int) The category ID for which to get the featured image.
 *
 * @return (String) The URL of the featured_image for the given category, or the
 *                  empty string on failure.
 */
function category_featured_image_URL($cat_ID) {
    $image = '/images/category-' . get_category($cat_ID)->slug . '.jpg';
    $path = get_stylesheet_directory() . $image;
    $URL = get_stylesheet_directory_uri() . $image;

    // If the file is not actually real, return the empty string.
    if (file_exists($path)) {
        return $URL;
    } else {
        return '';
    }
}

/**
 * Get the URL of the featured image for a post.
 *
 * This function also allows the specification of an alternate size class.
 *
 * @param $post_ID (Int) The post ID for which to get the featured image.
 * @param $size (String) Desired size class. Optional (deafult "thumbnail").
 *
 * @return (String) The URL of the featured_image for the given post, or the
 *                  empty string on failure.
 */
function post_featured_image_URL($post_ID, $size = 'thumbanil') {
    $thumbnail_ID = get_post_thumbnail_id($post_ID);

    // If no thumbnail exists, return the empty string.
    if ($thumbnail_ID !== '') {
        $source = wp_get_attachment_image_src($thumbnail_ID, $size);
        return $source[0];
    } else {
        return '';
    }
}

/**
 * Get the subtitle for a tag.
 *
 * The subtitle is parsed from Wordpress's "description" field for categories.
 * It consists of all text found before the first colon in the description. If
 * no colon is found, it returns an empty string. If the given tag ID does
 * not exist, it returns an empty string.
 *
 * @param $cat_ID (Int) The tag ID for which to get the subtitle.
 *
 * @return (String) The subtitle for the given tag.
 */
function tag_subtitle($tag_ID) {
    $tag_description = strip_tags(tag_description($tag_ID));
    $first_colon_index = strpos($cat_description, "\n");

    // If a colon was found, return the string up to that point. If no colon wa
    // found, return an empty string.
    if ($first_colon_index !== false) {
        return substr($tag_description, 0, $first_colon_index);
    } else {
        return '';
    }
}

/**
 * Get the tagline for a tag.
 *
 * The tagline is parsed from Wordpress's "description" field for categories. It
 * consists of all text found after the first colon in the description. If no
 * colon is found, it returns the whole string. If the given tag ID does
 * not exist, it returns an empty string.
 *
 * @param $cat_ID (Int) The tag ID for which to get the tagline.
 *
 * @return (String) The tagline for the given tag, or the empty string on
 *                  failure.
 */
function tag_tagline($tag_ID) {
    $tag_description = strip_tags(tag_description($tag_ID));
    $first_colon_index = strpos($tag_description, "\n");

    // If a colon was found, return the string after that point. If no colon was
    // found, return the whole string.
    if ($first_colon_index !== false) {
        return substr($tag_description, $first_colon_index + 1);
    } else {
        return $tag_description;
    }
}

/**
 * Get the URL of the featured image for a tag.
 *
 * The featured image URL is pulled from the theme's images directory. The file
 * name should match "tag-[category_slug].jpg". If the file does not exist,
 * this returns an empty string.
 *
 * @param $cat_ID (Int) The tag ID for which to get the featured image.
 *
 * @return (String) The URL of the featured_image for the given tag, or the
 *                  empty string on failure.
 */
function tag_featured_image_URL($tag_ID) {
    $image = '/images/tag-' . get_tag($tag_ID)->slug . '.jpg';
    $path = get_stylesheet_directory() . $image;
    $URL = get_stylesheet_directory_uri() . $image;

    // If the file is not actually real, return the empty string.
    if (file_exists($path)) {
        return $URL;
    } else {
        return '';
    }
}
