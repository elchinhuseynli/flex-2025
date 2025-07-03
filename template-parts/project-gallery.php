<?php

/**
 * Project Gallery Template
 * Displays images and videos in a responsive grid with Fancybox lightbox
 */

// Helper function to check if file is a video
function is_video_file($url)
{
    $video_extensions = ['mp4', 'webm', 'ogg', 'mov', 'avi', 'wmv', 'flv'];
    $extension = strtolower(pathinfo($url, PATHINFO_EXTENSION));
    return in_array($extension, $video_extensions);
}

// Helper function to get image source with fallbacks
function get_image_source($image)
{
    // For high-quality thumbnails, prioritize larger sizes
    if (isset($image['sizes']['large']) && !empty($image['sizes']['large'])) {
        return $image['sizes']['large'];
    }
    if (isset($image['sizes']['medium_large']) && !empty($image['sizes']['medium_large'])) {
        return $image['sizes']['medium_large'];
    }
    if (isset($image['sizes']['medium']) && !empty($image['sizes']['medium'])) {
        return $image['sizes']['medium'];
    }
    if (isset($image['sizes']['gallery']) && !empty($image['sizes']['gallery'])) {
        return $image['sizes']['gallery'];
    }
    // Fallback to original image if no sizes available
    return $image['url'];
}

// Helper function to get alt text with fallback
function get_alt_text($image)
{
    if (isset($image['alt']) && !empty($image['alt'])) {
        return $image['alt'];
    }
    if (isset($image['title']) && !empty($image['title'])) {
        return $image['title'];
    }
    return 'Gallery image';
}

// Get gallery data
$gallery = get_field('galerie');

if (!$gallery) : ?>
    <div class="project-gallery-empty">
        <p>No gallery images found for this project.</p>
    </div>
    <?php return; ?>
<?php endif; ?>

<div class="project-gallery-section">
    <div class="project-gallery-container">
        <div class="project-gallery-grid">
            <?php foreach ($gallery as $image) :
                $is_video = is_video_file($image['url']) || $image['caption'] === 'video';
                $file_extension = strtolower(pathinfo($image['url'], PATHINFO_EXTENSION));
            ?>
                <div class="project-gallery-item-wrapper">
                    <a href="<?php echo esc_url($image['url']); ?>"
                        data-fancybox="images"
                        class="project-gallery-item<?php echo $is_video ? ' project-gallery-video' : ''; ?>">

                        <?php if ($is_video) : ?>
                            <!-- Video element -->
                            <video class="project-gallery-image project-gallery-video-thumbnail"
                                autoplay muted loop playsinline preload="metadata">
                                <source src="<?php echo esc_url($image['url']); ?>"
                                    type="video/<?php echo $file_extension; ?>">
                                <img src="<?php echo esc_url(get_image_source($image)); ?>"
                                    alt="Video thumbnail">
                            </video>
                        <?php else : ?>
                            <!-- Image element -->
                            <img src="<?php echo esc_url(get_image_source($image)); ?>"
                                alt="<?php echo esc_attr(get_alt_text($image)); ?>"
                                class="project-gallery-image">
                        <?php endif; ?>

                        <!-- Overlay with icon -->
                        <div class="project-gallery-overlay">
                            <div class="project-gallery-zoom-icon">
                                <?php if ($is_video) : ?>
                                    <!-- Video play icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polygon points="5,3 19,12 5,21"></polygon>
                                    </svg>
                                <?php else : ?>
                                    <!-- Image zoom icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <path d="m21 21-4.35-4.35"></path>
                                        <line x1="11" y1="8" x2="11" y2="14"></line>
                                        <line x1="8" y1="11" x2="14" y2="11"></line>
                                    </svg>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>