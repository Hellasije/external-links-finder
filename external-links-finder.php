<?php
/*
Plugin Name: External Links Finder
Description: Wordpress plugin that allows displaying a table of posts containing external links.
Version: 1.0
Author: Zeljko Ascic
*/

// Register admin menu
add_action('admin_menu', 'el_finder_menu');

// Function to add menu in the WordPress backend
function el_finder_menu() {
    add_options_page('External Links Finder', 'External Links Finder', 'manage_options', 'el_finder_options', 'el_finder_options_page');
}

// Function to display options page
function el_finder_options_page() {
    // Retrieve posts with external links
    $posts_with_links = get_posts_with_external_links();

    // Generate table HTML
    $table_html = generate_table_html($posts_with_links);

    // Add title
    echo '<h2>External Links Finder</h2>';

    // Display table
    echo $table_html;
}


// Function to retrieve posts with external links
function get_posts_with_external_links() {
    global $wpdb;
    
    // Query to retrieve post content
    $query = "SELECT ID, post_content FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish'";
    $posts = $wpdb->get_results($query);

    $posts_with_links = array();

    // Regular expression pattern to match external links
    $pattern = '/<a\s+(?:[^>]*?\s+)?href="([^"]*)"/i';

    foreach ($posts as $post) {
        // Check if $post is a valid object
        if (is_object($post)) {
            $post_content = $post->post_content;
            $matches = array();
            preg_match_all($pattern, $post_content, $matches);

            // Check if any matches were found
            if (!empty($matches[1])) {
                // Iterate through the matches and filter out external links
                foreach ($matches[1] as $link) {
                    if (strpos($link, home_url()) !== 0) { // Check if the link is external
                        $posts_with_links[] = array(
                            'ID' => $post->ID,
                            'link' => $link
                        );
                    }
                }
            }
        }
    }

    return $posts_with_links;
}


// Function to generate table HTML
function generate_table_html($posts_with_links) {
    $table_html = '<table>';
    $table_html .= '<tr><th>Post Number</th><th>Post Title</th><th>External Link</th></tr>';

    foreach ($posts_with_links as $index => $post) {
        $post_id = $post['ID'];
        $post_title = get_the_title($post_id);
        $external_link = $post['link']; // Extract external link from post content
        
        // Truncate the external link if it's too long
        $truncated_link = strlen($external_link) > 60 ? substr($external_link, 0, 30) . '...' : $external_link;

        $table_html .= "<tr><td>$index</td><td><a href='" . get_permalink($post_id) . "'>$post_title</a></td><td>$truncated_link</td></tr>";
    }

    $table_html .= '</table>';

    return $table_html;
}
?>