<?php

$args = array(
    'post_type' => 'client',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    // Start the Loop
    while ($query->have_posts()) {
        $query->the_post();

        // The loop content goes here.
    }

    // Reset Post Data (important!)
    wp_reset_postdata();
} else {
    // No posts found
    echo 'Nebyly nalezeny žádné výsledky';
}
