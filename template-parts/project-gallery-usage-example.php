<?php

/**
 * Example usage of the Project Gallery Template Part
 * 
 * This file demonstrates how to include and use the project gallery component
 * in your WordPress templates. The gallery now uses Fancybox for both carousel
 * and lightbox functionality, providing a simpler and more efficient solution.
 */

// Example 1: Basic usage in a single work post
if (is_singular('work')) {
    // Include the project gallery template part
    get_template_part('template-parts/project-gallery');
}

// Example 2: Usage with custom gallery data
$custom_gallery = array(
    array(
        'url' => get_template_directory_uri() . '/images/project1.jpg',
        'alt' => 'Project Image 1',
        'caption' => 'Project Image 1 Description'
    ),
    array(
        'url' => get_template_directory_uri() . '/images/project2.jpg',
        'alt' => 'Project Image 2',
        'caption' => 'Project Image 2 Description'
    ),
    array(
        'url' => get_template_directory_uri() . '/images/project-video.mp4',
        'alt' => 'Project Video',
        'caption' => 'Project Video Description'
    )
);

// You can also pass custom gallery data by setting it as a global variable
// before including the template part
global $custom_gallery_data;
$custom_gallery_data = $custom_gallery;

// Then in the template part, you could check for this variable:
// $gallery = !empty($custom_gallery_data) ? $custom_gallery_data : get_field('main_gallery');

// Example 3: Usage in a custom page template
/*
<?php
// In your page template
get_header();
?>

<div class="page-content">
    <h1><?php the_title(); ?></h1>
    
    <div class="project-showcase">
        <?php get_template_part('template-parts/project-gallery'); ?>
    </div>
</div>

<?php
get_footer();
?>
*/

// Example 4: Usage with ACF field group
/*
// If you have a custom ACF field group for projects:
$project_gallery = get_field('project_gallery');
if ($project_gallery) {
    // Set the gallery data
    global $custom_gallery_data;
    $custom_gallery_data = $project_gallery;
    
    // Include the template part
    get_template_part('template-parts/project-gallery');
}
*/

// Example 5: Features of the new Fancybox-only implementation
/*
Key Features:
- Grid-based layout that's responsive and accessible
- Fancybox handles both carousel navigation and lightbox display
- Support for both images and videos
- Touch-friendly navigation
- Keyboard navigation support
- Zoom, rotate, and flip controls for images
- Thumbnail navigation
- Slideshow functionality
- Mobile-optimized experience

Benefits over the previous Swiper + Fancybox approach:
- Simpler codebase with fewer dependencies
- Better performance (no duplicate libraries)
- More consistent user experience
- Easier maintenance
- Better accessibility
- Reduced bundle size
*/
