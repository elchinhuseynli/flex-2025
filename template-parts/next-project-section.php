<?php

/**
 * Template part for displaying the "Next Project" section at the end of work posts
 *
 * @package YourThemeName
 */

// Get the next work post
$args = array(
    'post_type'      => 'work',
    'posts_per_page' => 1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'ASC',
    'post__not_in'   => array(get_the_ID()),
    'date_query'     => array(
        array(
            'after' => get_the_date('Y-m-d H:i:s')
        ),
    ),
);

$next_query = new WP_Query($args);

// If no newer post found, get the oldest one (to create a loop)
if (!$next_query->have_posts()) {
    $args = array(
        'post_type'      => 'work',
        'posts_per_page' => 1,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'ASC',
        'post__not_in'   => array(get_the_ID()),
    );
    $next_query = new WP_Query($args);
}

if ($next_query->have_posts()) :
    $next_query->the_post();
    $next_post_id = get_the_ID();
    $next_post_title = get_the_title();
    $next_post_url = get_permalink();

    // Get featured image or fallback image
    if (has_post_thumbnail()) {
        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
    } else {
        $image_url = get_template_directory_uri() . '/assets/images/default-project-image.jpg';
    }

    // Reset post data to original post
    wp_reset_postdata();
?>

    <div class="next-project-section" data-next-url="<?php echo esc_url($next_post_url); ?>">
        <div class="next-project-image-container">
            <img class="next-project-image" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($next_post_title); ?>">
            <div class="next-project-overlay"></div>
        </div>
        <div class="padding-global">
            <div class="container-large">
                <div class="next-project-content">
                    <h3><?php echo esc_html($next_post_title); ?></h3>
                    <a href="<?php echo esc_url($next_post_url); ?>" class="shiny-cta" id="nextProjectLink">
                        <span>Další projekt</span>
                    </a>
                </div>

                <div class="progress-container">
                    <div class="progress-bar"></div>
                    <div class="progress-text">0%</div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>