<?php

/*
	
@package sunsettheme
	
	========================
REMOVE GENERATOR VERSION NUMBER
	========================
*/

/* remove version string from js and css */
function sunset_remove_wp_version_strings($src)
{

    global $wp_version;
    // Ensure $src is a valid URL and not empty
    if (isset($src) && $src !== '') {
        // Extract the query part of the URL
        $queryString = parse_url($src, PHP_URL_QUERY);

        // Check if the query string is not null or empty before parsing it
        if ($queryString) {
            parse_str($queryString, $query);
        } else {
            // Handle the case where there is no query string
            $query = array(); // or any default value
        }
    } else {
        // Handle the case where $src is not a valid URL
        $query = array(); // or any default value
    }
    if (!empty($query['ver']) && $query['ver'] === $wp_version) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter('script_loader_src', 'sunset_remove_wp_version_strings');
add_filter('style_loader_src', 'sunset_remove_wp_version_strings');

/* remove metatag generator from header */
function sunset_remove_meta_version()
{
    return '';
}
add_filter('the_generator', 'sunset_remove_meta_version');
