<?php

add_action('wp_enqueue_scripts', 'wtw_custom_code');

function wtw_custom_code()
{
  wp_enqueue_style('swiper-css', get_stylesheet_directory_uri() . '/css/libs/swiper-bundle.min.css', array('main'), null);
  wp_enqueue_style('accordion-css', get_stylesheet_directory_uri() . '/css/libs/accordion.css', array('main'), null);
  wp_enqueue_style('glowing-css', get_stylesheet_directory_uri() . '/css/libs/glowing.css', array('main'), null);
  wp_enqueue_style('next-project-css', get_stylesheet_directory_uri() . '/css/next-project.css', array('main'), null);
  wp_enqueue_style('custom-css', get_stylesheet_directory_uri() . '/css/custom.css', array('main'), null);

  // Load GSAP and its plugins first
  wp_enqueue_script('gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), null, true);
  wp_enqueue_script('scroll-trigger-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array('gsap-js'), null, true);
  wp_enqueue_script('scrambletext-js', get_stylesheet_directory_uri() . '/js/libs/ScrambleTextPlugin.min.js', array('gsap-js'), null, true);
  wp_enqueue_script('splittext-js', get_stylesheet_directory_uri() . '/js/libs/SplitText.min.js', array('gsap-js'), null, true);
  // wp_enqueue_script('css-rule-plugin-js', get_stylesheet_directory_uri() . '/js/libs/CSSRulePlugin.min.js', array('gsap-js'), null, true);
  wp_enqueue_script('lenis-js', get_stylesheet_directory_uri() . '/js/libs/lenis.min.js', array(), null, true);
  wp_enqueue_script('lenis-scroll-js', get_stylesheet_directory_uri() . '/js/lenis-scroll.js', array('lenis-js'), null, true);
  wp_enqueue_script('swiper-js', get_stylesheet_directory_uri() . '/js/libs/swiper-bundle.min.js', array(), null, true);
  wp_enqueue_script('accordion-js', get_stylesheet_directory_uri() . '/js/libs/accordion.js', array(), null, true);

  wp_enqueue_script('menu-js', get_stylesheet_directory_uri() . '/js/libs/menu.js', array(), null, true);
  wp_enqueue_script('glowing-js', get_stylesheet_directory_uri() . '/js/libs/glowing.js', array(), null, true);
  // project-form.js
  wp_enqueue_script('project-form-js', get_stylesheet_directory_uri() . '/js/project-form.js', array('gsap-js', 'scroll-trigger-js'), null, true);

  if (is_singular('work')) {
    // fancybox css and js
    wp_enqueue_style('fancybox-css', get_stylesheet_directory_uri() . '/css/libs/fancybox.css', array('main'), null);
    wp_enqueue_style('project-gallery-css', get_stylesheet_directory_uri() . '/css/project-gallery.css', array('main'), null);
    wp_enqueue_style('single-project-css', get_stylesheet_directory_uri() . '/css/single-project.css', array('main'), null);
    wp_enqueue_script('fancybox-js', get_stylesheet_directory_uri() . '/js/libs/fancybox.umd.js', array(), null, true);
    wp_enqueue_script('project-gallery-js', get_stylesheet_directory_uri() . '/js/project-gallery.js', array('fancybox-js'), null, true);
    wp_enqueue_script('next-project-js', get_stylesheet_directory_uri() . '/js/next-project.js', array('gsap-js', 'scroll-trigger-js'), null, true);
    wp_enqueue_script('single-project-js', get_stylesheet_directory_uri() . '/js/single-project.js', array('gsap-js', 'scroll-trigger-js'), null, true);
  }


  // if page-temaplate is page-services
  if (is_page_template('page-services.php')) {
    wp_enqueue_script('projects-image-slider-js', get_stylesheet_directory_uri() . '/js/projects-image-slider.js', array('swiper-js'), null, true);
    wp_enqueue_script('services-js', get_stylesheet_directory_uri() . '/js/services.js', array('gsap-js', 'scroll-trigger-js'), null, true);
  }


  // scroll-blur-effect.js
  wp_enqueue_script('scroll-blur-effect-js', get_stylesheet_directory_uri() . '/js/scroll-blur-effect.js', array('gsap-js', 'scroll-trigger-js', 'splittext-js'), null, true);

  // home 
  if (is_front_page()) {
    wp_enqueue_script('home-js', get_stylesheet_directory_uri() . '/js/home.js', array('gsap-js', 'scroll-trigger-js'), null, true);
  }
  wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), null, true);
  wp_enqueue_script('active-link-js', get_stylesheet_directory_uri() . '/js/libs/active-link.js', array('jquery'), null, true);
}

function reading_time()
{
  global $post;  // Declare $post as a global variable

  $content = get_post_field('post_content', $post->ID);
  $word_count = str_word_count(strip_tags($content));
  $readingtime = ceil($word_count / 200);

  if ($readingtime == 1) {
    $timer = " minuta";
  } elseif ($readingtime >= 2 && $readingtime <= 4) {
    $timer = " minuty";
  } else {
    $timer = " minut";
  }
  $totalreadingtime = $readingtime . $timer;

  return $totalreadingtime;
}
