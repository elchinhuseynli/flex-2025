<?php
/*
Template name: single-work
*/
?>
    <!DOCTYPE html>
<html data-wf-page="681cbe58838d197320f594b6" data-wf-site="651bf4b86dfb35365e58e1ff" lang="cs">
	<?php get_template_part("header_block", ""); ?>
	<body smooth-wrapper class="body">
<?php if(function_exists('get_field')) { echo get_field('body_code', 'option'); } ?>

		<div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar_component w-nav">
			<div class="navbar_container">
				<div class="toggle-btn"><button class="burger"></button></div><a href="/" class="navbar_logo w-inline-block"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewbox="0 0 112 48" width="100%" class="navbar_large-logo"><g id="Group"><path fill="currentColor" d="M7.3,46.9H0V23.7c0-2.5,0.3-4.7,0.9-6.6c0.6-2,1.5-3.6,2.7-5S6.3,9.7,8,8.9     c1.7-0.7,3.7-1.1,5.9-1.1c0.8,0,1.5,0,2.1,0.1c0.6,0.1,1.3,0.3,2,0.5v6.5c-0.4-0.1-0.8-0.3-1.2-0.4c-0.4-0.1-0.9-0.1-1.4-0.1     c-1.3,0-2.4,0.2-3.4,0.6c-1,0.4-1.8,0.9-2.5,1.6c-0.7,0.7-1.2,1.5-1.6,2.5c-0.4,1-0.6,2-0.6,3.1L7.3,46.9L7.3,46.9z M3.9,20.9h14     v6.3H3.9L3.9,20.9L3.9,20.9z"></path><path fill="currentColor" d="M22,8h7.3v38.9H22V8z"></path><path fill="var(--brand--color-main)" d="M45.4,23.9c-1.1,0.4-2,1-2.8,1.8c-0.8,0.8-1.4,1.7-1.8,2.8c-0.4,1.1-0.6,2.4-0.6,3.8     c0,1.3,0.2,2.6,0.6,3.7c0.4,1.1,1,2.1,1.8,2.8c0.8,0.8,1.7,1.4,2.8,1.8c1.1,0.4,2.3,0.7,3.7,0.7c1.4,0,2.8-0.3,4.1-0.8     c1.3-0.5,2.5-1.3,3.6-2.3l3.4,5.2c-1.5,1.4-3.2,2.5-5.1,3.2c-1.9,0.7-4,1.1-6.2,1.1s-4.3-0.4-6.2-1.1c-1.9-0.8-3.5-1.8-4.8-3.2     c-1.3-1.4-2.4-3-3.2-4.9c-0.8-1.9-1.1-4-1.1-6.2s0.4-4.3,1.1-6.2c0.8-1.9,1.8-3.5,3.2-4.9c1.3-1.4,3-2.4,4.9-3.2     c1.9-0.8,4-1.1,6.2-1.1c2,0,3.9,0.3,5.6,0.9c1.7,0.6,3.3,1.5,4.6,2.6c1.3,1.1,2.4,2.5,3.2,4.1c0.8,1.6,1.4,3.3,1.6,5.3l-25.4,7.9     l-1.3-5.1l22.3-6.9l-2,3.8c-0.2-1-0.6-1.8-1.1-2.6c-0.5-0.8-1.1-1.5-1.9-2c-0.7-0.6-1.6-1-2.5-1.3c-0.9-0.3-2-0.4-3.1-0.4     C47.6,23.3,46.5,23.5,45.4,23.9L45.4,23.9z"></path><path fill="currentColor" d="M71.4,18l7.7,9.6l7.7-9.6h8.7L84,32l12.2,15h-9l-8.4-10.4l-8.4,10.4h-8.7l12.1-14.8L62.4,18     H71.4L71.4,18z"></path></g><g id="nav_logo"><path fill="var(--brand--color-main)" d="M112,23.6V0.1H88.6v7.4h14.8c0.7,0,1.3,0.6,1.3,1.3v14.9L112,23.6L112,23.6z"></path></g></svg><svg xmlns="http://www.w3.org/2000/svg" width="100%" viewbox="0 0 57 57" fill="none" preserveaspectratio="none" class="navbar_small-logo"><path d="M45.4 0H19.7V11.7H43.4L11.7 43.4V19.7H0V57.1H37.4V45.4H13.7L45.4 13.7V37.4H57.1V0H45.4Z" fill="var(--brand--color-main)"></path></svg></a>
				<div class="navbar_modal-toggle"><button popovertarget="project-modal" class="link"><div>Kontaktovat</div></button></div>
			</div>
			<div class="overlay">
				<div class="overlay-menu">
					<div class="menu-item is-nav-logo"><a href="#" class="menu-item_logo menu-item_a w-inline-block"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewbox="0 0 112 48" width="100%" class="menu-item_logo-svg"><g id="Group"><path fill="currentColor" d="M7.3,46.9H0V23.7c0-2.5,0.3-4.7,0.9-6.6c0.6-2,1.5-3.6,2.7-5S6.3,9.7,8,8.9     c1.7-0.7,3.7-1.1,5.9-1.1c0.8,0,1.5,0,2.1,0.1c0.6,0.1,1.3,0.3,2,0.5v6.5c-0.4-0.1-0.8-0.3-1.2-0.4c-0.4-0.1-0.9-0.1-1.4-0.1     c-1.3,0-2.4,0.2-3.4,0.6c-1,0.4-1.8,0.9-2.5,1.6c-0.7,0.7-1.2,1.5-1.6,2.5c-0.4,1-0.6,2-0.6,3.1L7.3,46.9L7.3,46.9z M3.9,20.9h14     v6.3H3.9L3.9,20.9L3.9,20.9z"></path><path fill="currentColor" d="M22,8h7.3v38.9H22V8z"></path><path fill="currentColor" d="M45.4,23.9c-1.1,0.4-2,1-2.8,1.8c-0.8,0.8-1.4,1.7-1.8,2.8c-0.4,1.1-0.6,2.4-0.6,3.8     c0,1.3,0.2,2.6,0.6,3.7c0.4,1.1,1,2.1,1.8,2.8c0.8,0.8,1.7,1.4,2.8,1.8c1.1,0.4,2.3,0.7,3.7,0.7c1.4,0,2.8-0.3,4.1-0.8     c1.3-0.5,2.5-1.3,3.6-2.3l3.4,5.2c-1.5,1.4-3.2,2.5-5.1,3.2c-1.9,0.7-4,1.1-6.2,1.1s-4.3-0.4-6.2-1.1c-1.9-0.8-3.5-1.8-4.8-3.2     c-1.3-1.4-2.4-3-3.2-4.9c-0.8-1.9-1.1-4-1.1-6.2s0.4-4.3,1.1-6.2c0.8-1.9,1.8-3.5,3.2-4.9c1.3-1.4,3-2.4,4.9-3.2     c1.9-0.8,4-1.1,6.2-1.1c2,0,3.9,0.3,5.6,0.9c1.7,0.6,3.3,1.5,4.6,2.6c1.3,1.1,2.4,2.5,3.2,4.1c0.8,1.6,1.4,3.3,1.6,5.3l-25.4,7.9     l-1.3-5.1l22.3-6.9l-2,3.8c-0.2-1-0.6-1.8-1.1-2.6c-0.5-0.8-1.1-1.5-1.9-2c-0.7-0.6-1.6-1-2.5-1.3c-0.9-0.3-2-0.4-3.1-0.4     C47.6,23.3,46.5,23.5,45.4,23.9L45.4,23.9z"></path><path fill="currentColor" d="M71.4,18l7.7,9.6l7.7-9.6h8.7L84,32l12.2,15h-9l-8.4-10.4l-8.4,10.4h-8.7l12.1-14.8L62.4,18     H71.4L71.4,18z"></path></g><g id="nav_logo"><path fill="currentColor" d="M112,23.6V0.1H88.6v7.4h14.8c0.7,0,1.3,0.6,1.3,1.3v14.9L112,23.6L112,23.6z"></path></g></svg></a></div>
					<div class="menu-item"><a href="/" class="menu-item_a w-inline-block"><div class="menu-item_p">Home</div><div class="menu-item_active-line"></div></a></div>
					<div class="menu-item"><a href="#" class="menu-item_a w-inline-block"><div class="menu-item_p">o nás</div><div class="menu-item_active-line"></div></a></div>
					<div class="menu-item"><a href="#" class="menu-item_a w-inline-block"><div class="menu-item_p">služby</div><div class="menu-item_active-line"></div></a></div>
					<div class="menu-item"><a href="#" class="menu-item_a w-inline-block"><div class="menu-item_p">reference</div><div class="menu-item_active-line"></div></a></div>
					<div class="menu-item"><a href="#" class="menu-item_a w-inline-block"><div class="menu-item_p">kontakt</div><div class="menu-item_active-line"></div></a></div>
				</div>
				<div class="sub-nav"><a href="/" class="sub-nav_a">Homepage</a><a href="#" class="sub-nav_a">Zásady ochrany osobních údajů</a><a href="#" class="sub-nav_a">Zásady používání cookies</a><a href="#" class="sub-nav_a w-inline-block"><div>Instagram</div><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 256 256" id="arrow-up-right" width="100%" class="sub-nav_ico"><line x1="64" x2="192" y1="192" y2="64" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="10"></line><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="10" points="88 64 192 64 192 168"></polyline></svg></a><a href="#" class="sub-nav_a w-inline-block"><div>Facebook</div><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 256 256" id="arrow-up-right" width="100%" class="sub-nav_ico"><line x1="64" x2="192" y1="192" y2="64" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="10"></line><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="10" points="88 64 192 64 192 168"></polyline></svg></a></div>
			</div>
		</div>
		<div data-barba="wrapper" class="page-wrapper">
			<div class="global-styles w-embed">
				<style>

.body-bg {
pointer-events: none;
}

.body-stripe:last-child {
  height: 100svh;
  border-right-style: solid;
  border-right-width: 1px;
  border-right-color: hsla(0, 0.00%, 100.00%, 0.05);
}

/* Focus state style for keyboard navigation for the focusable elements */
*[tabindex]:focus-visible,
  input[type="file"]:focus-visible {
   outline: 0.125rem solid #4d65ff;
   outline-offset: 0.125rem;
}

/* Get rid of top margin on first element in any rich text element */
.w-richtext > :not(div):first-child, .w-richtext > div:first-child > :first-child {
  margin-top: 0 !important;
}

/* Get rid of bottom margin on last element in any rich text element */
.w-richtext>:last-child, .w-richtext ol li:last-child, .w-richtext ul li:last-child {
	margin-bottom: 0 !important;
}

/* Prevent all click and hover interaction with an element */
.pointer-events-off {
	pointer-events: none;
}

/* Enables all click and hover interaction with an element */
.pointer-events-on {
  pointer-events: auto;
}

/* Create a class of .div-square which maintains a 1:1 dimension of a div */
.div-square::after {
	content: "";
	display: block;
	padding-bottom: 100%;
}

/* Make sure containers never lose their center alignment */
.container-medium,.container-small, .container-large {
	margin-right: auto !important;
  margin-left: auto !important;
}

/* 
Make the following elements inherit typography styles from the parent and not have hardcoded values. 
Important: You will not be able to style for example "All Links" in Designer with this CSS applied.
Uncomment this CSS to use it in the project. Leave this message for future hand-off.
*/
/*
a,
.w-input,
.w-select,
.w-tab-link,
.w-nav-link,
.w-dropdown-btn,
.w-dropdown-toggle,
.w-dropdown-link {
  color: inherit;
  text-decoration: inherit;
  font-size: inherit;
}
*/

/* Apply "..." after 3 lines of text */
.text-style-3lines {
	display: -webkit-box;
	overflow: hidden;
	-webkit-line-clamp: 3;
	-webkit-box-orient: vertical;
}

/* Apply "..." after 2 lines of text */
.text-style-2lines {
	display: -webkit-box;
	overflow: hidden;
	-webkit-line-clamp: 2;
	-webkit-box-orient: vertical;
}

/* Adds inline flex display */
.display-inlineflex {
  display: inline-flex;
}

/* These classes are never overwritten */
.hide {
  display: none !important;
}

@media screen and (max-width: 991px) {
    .hide, .hide-tablet {
        display: none !important;
    }
}
  @media screen and (max-width: 767px) {
    .hide-mobile-landscape{
      display: none !important;
    }
}
  @media screen and (max-width: 479px) {
    .hide-mobile{
      display: none !important;
    }
}
 
.margin-0 {
  margin: 0rem !important;
}
  
.padding-0 {
  padding: 0rem !important;
}

.spacing-clean {
padding: 0rem !important;
margin: 0rem !important;
}

.margin-top {
  margin-right: 0rem !important;
  margin-bottom: 0rem !important;
  margin-left: 0rem !important;
}

.padding-top {
  padding-right: 0rem !important;
  padding-bottom: 0rem !important;
  padding-left: 0rem !important;
}
  
.margin-right {
  margin-top: 0rem !important;
  margin-bottom: 0rem !important;
  margin-left: 0rem !important;
}

.padding-right {
  padding-top: 0rem !important;
  padding-bottom: 0rem !important;
  padding-left: 0rem !important;
}

.margin-bottom {
  margin-top: 0rem !important;
  margin-right: 0rem !important;
  margin-left: 0rem !important;
}

.padding-bottom {
  padding-top: 0rem !important;
  padding-right: 0rem !important;
  padding-left: 0rem !important;
}

.margin-left {
  margin-top: 0rem !important;
  margin-right: 0rem !important;
  margin-bottom: 0rem !important;
}
  
.padding-left {
  padding-top: 0rem !important;
  padding-right: 0rem !important;
  padding-bottom: 0rem !important;
}
  
.margin-horizontal {
  margin-top: 0rem !important;
  margin-bottom: 0rem !important;
}

.padding-horizontal {
  padding-top: 0rem !important;
  padding-bottom: 0rem !important;
}

.margin-vertical {
  margin-right: 0rem !important;
  margin-left: 0rem !important;
}
  
.padding-vertical {
  padding-right: 0rem !important;
  padding-left: 0rem !important;
}

/* Apply "..." at 100% width */
.truncate-width { 
		width: 100%; 
    white-space: nowrap; 
    overflow: hidden; 
    text-overflow: ellipsis; 
}
/* Removes native scrollbar */
.no-scrollbar {
    -ms-overflow-style: none;
    overflow: -moz-scrollbars-none; 
}

.no-scrollbar::-webkit-scrollbar {
    display: none;
}

/* Flex utility classes */

.justify-center {
justify-content: center;
}

.align-center {
align-items: center;
}


/* custom style */

h1,h2,h3,h4 {
text-wrap: balance;
}

a, .navbar_link {
color: inherit;
text-decoration: inherit;
}

.home-intro-menu-link .home-intro-menu-link-text {
    transition: all 0.6s ease;
}

.home-intro-menu-link svg {
    transition: all 0.6s ease;
    /* Ensure initial states */
    fill: none;
    stroke: var(--brand--color-main);
    opacity: 0.2;
}

.home-intro-menu-link:hover .home-intro-menu-link-text {
    color: transparent;
    -webkit-text-stroke-width: 1px;
    -webkit-text-stroke-color: white;
}

.home-intro-menu-link:hover svg {
    opacity: 1;
    fill: var(--brand--color-main);
}

.link:before {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    right: auto;
    top: 100%;
    width: 0%; 
    height: 1px; 
    background-color: currentColor;
    transition: width 0.8s ease-in-out;
}

.link:hover:before {
    width: 100%;
}


.link:after {
    content: "";
    position: absolute;
    bottom: 0;
    left: auto;
    right: 0;
    top: 100%;
    width: 100%; 
    height: 1px; 
    background-color: var(--_section-theme---section--accent-color);
    transition: width 0.5s ease-in-out;
}

.link:hover:after {
    width: 0%;
}

/* Navigation */

.burger:before,
.burger:after {
  content: "";
  width: 40px;
  height: 2px;
  position: absolute;
  background: var(--brand--color-main);
  transition: all 250ms ease-out;
  will-change: transform;
}

.burger:before {
  transform: translateY(-3px);
}

.burger:after {
  transform: translateY(3px);
}

.active.burger:before {
  transform: translateY(0) rotate(45deg);
  background: var(--brand--color-blue);
}

.active.burger:after {
  transform: translateY(0) rotate(-45deg);
  background: var(--brand--color-blue);
}

/* End navigation */


.section .sliding-titles_wrapper > div:nth-child(2) .sliding-titles_heading {
	color: var(--_section-theme---section--accent-color);
  transform: skew(0deg, -5deg);
}
				</style>
			</div>
			<div class="w-embed">
				<style>
.single-project_image-wrapper:nth-child(3n) {
  grid-column: span 2;
}
				</style>
			</div>
			<main id="smooth-content" data-barba="container" class="main-wrapper">
				<section nav-color="is-light" class="section is-dark-theme">
					<div class="padding-global padding-section-large">
						<div class="container-large">
							<div class="single-project_header-container">
								<div class="single-project_tag-list"><?php $current_post = isset($post) ? $post : null; $field_posts = get_field('services_included');
        if ($field_posts) : foreach ($field_posts as $post) : setup_postdata($post); ?>
									<div class="tag" data-content="query_item" data-id="<?php echo get_the_ID() ?>">
										<div><?php the_title(); ?></div>
									</div>
									
									
								<?php endforeach; wp_reset_postdata(); endif;
        if(is_a($current_post, "WP_Post")){
            $post = $current_post;
            setup_postdata($post);
        }
    ?></div>
								<h1 class="heading"><?php the_title(); ?></h1>
								<div class="line-divider"></div>
								<div class="single-project_details-grid">
									<div class="single-project_details-item">
										<p class="text-style-muted">Obor</p>
										<div class="single-project_details-loop"><?php $term_query = get_the_terms(get_the_ID(), 'industry'); $terms = []; if (is_array($term_query)) foreach($term_query as $term) { $terms[] = $term->name; } echo implode(", ", $terms); ?></div>
									</div>
									<div class="single-project_details-item">
										<p class="text-style-muted">Klient</p>
										<div class="single-project_details-loop"><?php $current_post = isset($post) ? $post : null; $field_posts = get_field('client');
        if ($field_posts) : foreach ($field_posts as $post) : setup_postdata($post); ?>
											<p class="heading-style-h5" data-content="query_item" data-id="<?php echo get_the_ID() ?>"><?php the_title(); ?></p>
										<?php endforeach; wp_reset_postdata(); endif;
        if(is_a($current_post, "WP_Post")){
            $post = $current_post;
            setup_postdata($post);
        }
    ?></div>
									</div>
									<div class="single-project_details-item">
										<p class="text-style-muted">Časová osa projektu</p>
										<p class="heading-style-h5"><?php echo get_field('project_timeline') ?></p>
									</div>
									<div class="single-project_details-item">
										<p class="text-style-muted">Rok realizace</p>
										<p class="heading-style-h5"><?php echo get_field('year') ?></p>
									</div>
									<div class="single-project_details-item">
										<p class="text-style-muted">Webové stránky</p><a href="<?php echo get_field('website_link') ?>" target="_blank" class="single-project_details-item-link-wrapper w-inline-block"><p class="heading-style-h5">Webové stránky</p><div><svg xmlns="http://www.w3.org/2000/svg" width="100%" viewbox="0 0 27 21" fill="none" class="works_arrow"><path d="M16.7355 1.22402e-07C16.7355 5.79899 21.3311 10.5 27 10.5C21.3311 10.5 16.7355 15.201 16.7355 21M26.7769 10.5L4.67938e-07 10.5" stroke="currentColor" stroke-width="2"></path></svg></div></a></div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section nav-color="is-dark" class="section">
					<div class="padding-global padding-section-large">
						<div class="container-medium">
							<div class="single-project_text-grid">
								<div class="single-project_text-grid-col is-span-2">
									<h2>Představení projektu</h2>
									<p><?php echo get_field('project_introduction') ?></p>
								</div>
								<div class="single-project_text-grid-col">
									<h3>O klientovi</h3>
									<p><?php echo get_field('about_a_client') ?></p>
								</div>
								<div class="single-project_text-grid-col">
									<h3>Náš cíl</h3>
									<p><?php echo get_field('about_a_client') ?></p>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section nav-color="is-light" class="section is-dark-theme">
					<div class="padding-global padding-section-large">
						<div class="container-medium">
							<?php include("template-parts/project-gallery.php"); ?>
						</div>
					</div>
				</section>
				<section nav-color="is-dark" class="section">
					<div class="padding-global padding-section-large">
						<div class="container-medium">
							<div class="single-work_extra-content-grid">
								<?php if( have_rows('extra_content') ){ ?><div class="single-work_extra-content-grid-aside"><?php global $parent_id; if(isset($loop_id)) $parent_id = $loop_id; $loop_index = 0; $loop_title="Extra Content"; $loop_field = "extra_content"; while( have_rows('extra_content') ){ global $loop_id; $loop_index++; $loop_id++; the_row(); ?><a href="#<?php echo sanitize_title(get_sub_field('title')) ?>" class="single-work_aside-mini-title-link"><?php echo get_sub_field('title') ?></a><?php } ?></div><?php } ?>
								<?php if( have_rows('extra_content') ){ ?><div class="single-work_extra-content-grid-column"><?php global $parent_id; if(isset($loop_id)) $parent_id = $loop_id; $loop_index = 0; $loop_title="Extra Content"; $loop_field = "extra_content"; while( have_rows('extra_content') ){ global $loop_id; $loop_index++; $loop_id++; the_row(); ?>
									<div id="<?php echo sanitize_title(get_sub_field('title')) ?>" class="single-work_extra-content-grid-col-block">
										<h3><?php echo get_sub_field('title') ?></h3>
										<div class="single-work_extra-content-grid-text"><?php echo get_sub_field('text') ?></div><?php if(!empty(get_sub_field('image'))) { ?><a href="#" class="single-work_image-wrapper w-inline-block"><img class="single-work_image" src="<?php $field = get_sub_field('image'); if(isset($field['url'])){ echo($field['url']); }elseif(is_numeric($field)){ echo(wp_get_attachment_image_url($field, 'full')); }else{ echo($field); } ?>" data-fancybox="inline-gallery" alt="<?php echo !empty($field['alt']) ? esc_attr($field['alt']) : ''; ?>" loading="lazy"></a><?php } ?></div>
								<?php } ?></div><?php } ?>
							</div>
						</div>
					</div>
				</section>
				<section nav-color="is-light" class="section is-dark-theme">
					<?php include("template-parts/next-project-section.php"); ?>
				</section>
			</main>
		</div>
		<div id="project-modal" popover class="modal-window">
			<div class="modal__container">
				<header class="modal__header">
					<h2 class="modal__title">Poptávkový formulář</h2><button popovertargetaction="hide" popovertarget="project-modal" aria-hidden="true" class="modal__close"></button></header>
				<main id="modal-1-content" class="modal__content">
					<div class="flex-form">
						<div class="form-css w-embed">
							<style>
/* Form css */
.flex-form_step.active .flex-form_step-number {
  background-color: var(--_form---accent-color);
  border-color: var(--_form---accent-color);
  color: var(--_form---text-color-dark);
}

.flex-form_step.active .flex-form_step-text {
  color: var(--_form---accent-color);
}

.flex-form_step.completed .flex-form_step-number {
  background-color: var(--_form---accent-color);
  color: var(--_form---text-color-dark);
  border-color: var(--_form---accent-color);
}
.flex-form_step.inactive {
  opacity: 1;
  cursor: not-allowed;
}

.flex-form_step.inactive .flex-form_step-number {
  background-color: var(--_form---secondary-color);
  border-color: var(--_form---border-color);
  color: var(--_form---text-light);
}

.flex-form_step.inactive .flex-form_step-text {
  color: var(--_form---text-light);
}

.flex-form_page.active {
  display: block;
  animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(5px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.flex-form_full-width {
  grid-column: 1 / -1;
}

.flex-form_input:focus {
  outline: none;
  border-color: var(--_form---accent-color);
}

.flex-form_input::placeholder {
  color: #a1a1aa;
}

textarea.flex-form_input {
  min-height: 7.5rem;
}

.flex-form_checkbox input,
.flex-form_radio input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

.flex-form_radio input:checked + .flex-form_radio-label {
  border-color: var(--_form---accent-color);
  background-color: var(--_form---accent-color-dark);
}

.flex-form_checkbox input:checked + .flex-form_checkbox-label {
  border-color: var(--_form---accent-color);
  background-color: var(--_form---accent-color-dark);
}

.flex-form_radio.selected {
color: white;
}

/* Privacy Policy Checkbox Styles */
.privacy-policy {
  margin-top: 1.5rem;
  position: relative;
}

.privacy-policy .flex-form_checkbox-label {
  text-align: left;
  padding: 1rem;
  line-height: 1.5;
  transition: all 0.3s ease;
}

.privacy-policy .flex-form_checkbox-label a {
  color: var(--_form---accent-color);
  text-decoration: none;
  font-weight: 500;
}

.privacy-policy .flex-form_checkbox-label a:hover {
  text-decoration: underline;
}

/* Error state styles */
.privacy-policy.error .flex-form_checkbox-label {
  border-color: var(--_form---error-color) !important;
  background-color: rgba(239, 68, 68, 0.05) !important;
  animation: shake 0.5s ease-in-out;
}

.privacy-policy.error::after {
  content: "Toto pole je povinné";
  display: block;
  color: var(--_form---error-color);
  font-size: 0.875rem;
  margin-top: 0.5rem;
  margin-left: 1rem;
  font-weight: 500;
}

@keyframes shake {
  0%,
  100% {
    transform: translateX(0);
  }
  25% {
    transform: translateX(-5px);
  }
  75% {
    transform: translateX(5px);
  }
}

/* Make sure error state is visible */
.privacy-policy.error {
  display: block !important;
  visibility: visible !important;
  opacity: 1 !important;
}

/* Toast Notification Styles */
.toast-container {
  position: fixed;
  bottom: 2rem;
  right: 2rem;
  z-index: 9999999;
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
  pointer-events: none;
}

.toast {
  background-color: white;
  border-left: 4px solid var(--_form---error-color);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  padding: 1rem 1.5rem;
  border-radius: 0.5rem;
  min-width: 300px;
  max-width: 400px;
  display: flex;
  align-items: center;
  gap: 0.75rem;
  pointer-events: auto;
  transform: translateX(120%);
  opacity: 0;
}

.toast-icon {
  color: var(--_form---error-color);
  font-size: 1.25rem;
  flex-shrink: 0;
}

.toast-content {
  flex: 1;
}

.toast-title {
  font-weight: 600;
  margin-bottom: 0.25rem;
  color: var(--_form---accent-color-dark);
}

.toast-message {
  font-size: 0.875rem;
  color: var(--_form---text-light);
}

.toast-close {
  background: none;
  border: none;
  color: var(--_form---text-light);
  cursor: pointer;
  padding: 0.25rem;
  font-size: 1.25rem;
  line-height: 1;
  opacity: 0.5;
  transition: opacity 0.2s ease;
}

.toast-close:hover {
  opacity: 1;
}

/* Toast Animation */
.toast.show {
  transform: translateX(0);
  opacity: 1;
}

/* Remove error styles from form elements since we're using toast */
.flex-form_input.error,
.flex-form_radio-grid.error,
.flex-form_checkbox-grid.error,
.privacy-policy.error {
  border-color: var(--_form---border-color);
  background-color: transparent;
  color: var(--_form---text-color);
}

.flex-form_input.error:focus,
.flex-form_radio-grid.error:focus,
.flex-form_checkbox-grid.error:focus,
.privacy-policy.error:focus {
  border-color: var(--_form---accent-color);
}

/* Remove error messages from form elements */
.privacy-policy.error::after {
  display: none;
}

/* Keyboard shortcut styles */
.button-container {
  display: flex;
  align-items: center;
  gap: 0.75rem;
}

.keyboard-shortcut {
  display: inline-block;
  padding: 0.25rem 0.5rem;
  background-color: rgba(0, 0, 0, 0.05);
  border-radius: 0.25rem;
  font-size: 0.75rem;
  font-weight: 500;
  color: var(--_form---text-light);
  opacity: 0.8;
  transition: opacity 0.2s ease;
}

.button-container:hover .keyboard-shortcut {
  opacity: 1;
}

/* Windows keyboard shortcut */
@media (pointer: fine) {
  .keyboard-shortcut {
    content: "Ctrl + ↵";
  }
}
							</style>
						</div>
						<div class="flex-form_header">
							<div class="flex-form_progress">
								<div class="flex-form_progress-line">
									<div class="flex-form_progress-fill"></div>
								</div>
								<div data-step="1" class="flex-form_step active">
									<div class="flex-form_step-number"><span>01</span></div>
									<div class="flex-form_step-text"><span>Služby</span></div>
								</div>
								<div data-step="2" class="flex-form_step">
									<div class="flex-form_step-number"><span>02</span></div>
									<div class="flex-form_step-text"><span>Projekt</span></div>
								</div>
								<div data-step="3" class="flex-form_step">
									<div class="flex-form_step-number"><span>03</span></div>
									<div class="flex-form_step-text"><span>Rozpočet</span></div>
								</div>
								<div data-step="4" class="flex-form_step">
									<div class="flex-form_step-number"><span>04</span></div>
									<div class="flex-form_step-text"><span>Čas</span></div>
								</div>
								<div data-step="5" class="flex-form_step">
									<div class="flex-form_step-number"><span>05</span></div>
									<div class="flex-form_step-text"><span>Kontakt</span></div>
								</div>
							</div>
						</div>
						<form id="flex-form">
							<div class="flex-form_content">
								<div data-step="1" class="flex-form_page active">
									<div class="flex-form_section-header">
										<h2 class="flex-form_title">Služby</h2>
										<p class="flex-form_description">Vyberte prosím služby, o které máte zájem.</p>
									</div>
									<div class="flex-form_section">
										<div class="flex-form_section-content">
											<div class="flex-form_checkbox-grid">
												<div class="flex-form_checkbox"><input type="checkbox" id="website" name="service" value="Webové stránky"><label for="website" class="flex-form_checkbox-label">Webové stránky</label></div>
												<div class="flex-form_checkbox"><input type="checkbox" id="branding" name="service" value="Branding"><label for="branding" class="flex-form_checkbox-label">Branding</label></div>
												<div class="flex-form_checkbox"><input type="checkbox" id="ecommerce" name="service" value="E-shop"><label for="ecommerce" class="flex-form_checkbox-label">E-shop</label></div>
												<div class="flex-form_checkbox"><input type="checkbox" id="product-design" name="service" value="Design produktu"><label for="product-design" class="flex-form_checkbox-label">Design produktu</label></div>
												<div class="flex-form_checkbox"><input type="checkbox" id="branding-website" name="service" value="Branding a web"><label for="branding-website" class="flex-form_checkbox-label">Branding a web</label></div>
											</div>
										</div>
									</div>
									<div class="flex-form_buttons">
										<div class="flex-form_btn_empty"></div>
										<div class="button-container"><button type="button" class="flex-form_btn flex-form_btn-next flex-form_btn-next">Další krok</button>
											<div class="keyboard-shortcut"><span>⌘ + ↵</span></div>
										</div>
									</div>
								</div>
								<div data-step="2" class="flex-form_page">
									<div class="flex-form_section-header">
										<h2 class="flex-form_title">Projekt</h2>
										<p class="flex-form_description">Rádi bychom se dozvěděli více o vašem projektu.</p>
									</div>
									<div class="flex-form_section">
										<div class="flex-form_section-content"><textarea id="project-info" name="project-info" placeholder="Popište svůj vysněný projekt! Nadchněte nás*" required class="flex-form_input"></textarea></div>
									</div>
									<div class="flex-form_buttons">
										<div class="button-container"><button type="button" class="flex-form_btn flex-form_btn-pre flex-form_btn-prev">Předchozí</button>
											<div class="keyboard-shortcut"><span>⌘ + [</span></div>
										</div>
										<div class="button-container"><button type="button" class="flex-form_btn flex-form_btn-next flex-form_btn-next">Další krok</button>
											<div class="keyboard-shortcut"><span>⌘ + ↵</span></div>
										</div>
									</div>
								</div>
								<div data-step="3" class="flex-form_page">
									<div class="flex-form_section-header">
										<h2 class="flex-form_title">Rozpočet</h2>
										<p class="flex-form_description">Jaký máte v plánu rozpočet na tento projekt?</p>
									</div>
									<div class="flex-form_section">
										<div class="flex-form_section-content">
											<div class="flex-form_radio-grid">
												<div class="flex-form_radio"><input type="radio" id="budget-1" name="budget" required value="50 000 - 100 000 Kč"><label for="budget-1" class="flex-form_radio-label">50 000 - 100 000 Kč</label></div>
												<div class="flex-form_radio"><input type="radio" id="budget-2" name="budget" required value="100 000 - 150 000 Kč"><label for="budget-2" class="flex-form_radio-label">100 000 - 150 000 Kč</label></div>
												<div class="flex-form_radio"><input type="radio" id="budget-3" name="budget" required value="150 000 - 200 000 Kč"><label for="budget-3" class="flex-form_radio-label">150 000 - 200 000 Kč</label></div>
												<div class="flex-form_radio"><input type="radio" id="budget-4" name="budget" required value="200 000 - 300 000 Kč"><label for="budget-4" class="flex-form_radio-label">200 000 - 300 000 Kč</label></div>
												<div class="flex-form_radio"><input type="radio" id="budget-5" name="budget" required value="300 000 - 450 000 Kč"><label for="budget-5" class="flex-form_radio-label">300 000 - 450 000 Kč</label></div>
												<div class="flex-form_radio"><input type="radio" id="budget-6" name="budget" required value="Neomezený"><label for="budget-6" class="flex-form_radio-label">Neomezený</label></div>
											</div>
										</div>
									</div>
									<div class="flex-form_buttons">
										<div class="button-container"><button type="button" class="flex-form_btn flex-form_btn-pre flex-form_btn-prev">Předchozí</button>
											<div class="keyboard-shortcut"><span>⌘ + [</span></div>
										</div>
										<div class="button-container"><button type="button" class="flex-form_btn flex-form_btn-next flex-form_btn-next">Další krok</button>
											<div class="keyboard-shortcut"><span>⌘ + ↵</span></div>
										</div>
									</div>
								</div>
								<div data-step="4" class="flex-form_page">
									<div class="flex-form_section-header">
										<h2 class="flex-form_title">Časový rámec</h2>
										<p class="flex-form_description">Pracujete s konkrétním časovým harmonogramem?</p>
									</div>
									<div class="flex-form_section">
										<div class="flex-form_section-content">
											<div class="flex-form_radio-grid">
												<div class="flex-form_radio"><input type="radio" id="timeframe-1" name="timeframe" required value="1 měsíc"><label for="timeframe-1" class="flex-form_radio-label">1 měsíc</label></div>
												<div class="flex-form_radio"><input type="radio" id="timeframe-2" name="timeframe" required value="2-3 měsíce"><label for="timeframe-2" class="flex-form_radio-label">2-3 měsíce</label></div>
												<div class="flex-form_radio"><input type="radio" id="timeframe-3" name="timeframe" required value="3-6 měsíců"><label for="timeframe-3" class="flex-form_radio-label">3-6 měsíců</label></div>
												<div class="flex-form_radio"><input type="radio" id="timeframe-4" name="timeframe" required value="Kdykoli"><label for="timeframe-4" class="flex-form_radio-label">Kdykoli</label></div>
											</div>
										</div>
									</div>
									<div class="flex-form_buttons">
										<div class="button-container"><button type="button" class="flex-form_btn flex-form_btn-pre flex-form_btn-prev">Předchozí</button>
											<div class="keyboard-shortcut"><span>⌘ + [</span></div>
										</div>
										<div class="button-container"><button type="button" class="flex-form_btn flex-form_btn-next flex-form_btn-next">Další krok</button>
											<div class="keyboard-shortcut"><span>⌘ + ↵</span></div>
										</div>
									</div>
								</div>
								<div data-step="5" class="flex-form_page">
									<div class="flex-form_section-header">
										<h2 class="flex-form_title">Kontaktní údaje</h2>
										<p class="flex-form_description">Potřebujeme vaše kontaktní údaje, abychom se mohli spojit.</p>
									</div>
									<div class="flex-form_section">
										<div class="flex-form_section-content">
											<div class="flex-form_input-grid">
												<div><input type="text" id="name" name="name" placeholder="Jméno*" required autocomplete="name" class="flex-form_input"></div>
												<div><input type="email" id="email" name="email" placeholder="E-mail*" required autocomplete="email" class="flex-form_input"></div>
												<div><input type="tel" id="phone" name="phone" placeholder="Telefon" autocomplete="tel" pattern="^\+?[1-9]\d{1,14}$" class="flex-form_input"></div>
											</div>
										</div>
									</div>
									<div class="flex-form_section">
										<div class="flex-form_section-content">
											<div class="flex-form_checkbox privacy-policy privacy-policy"><input type="checkbox" id="privacy-policy" name="privacy-policy" required><label for="privacy-policy" class="flex-form_checkbox-label"><span>Souhlasím se zpracováním osobních údajů v souladu s </span><a href="/privacy-policy" target="_blank">ochranou osobních údajů</a><span>*</span></label></div>
										</div>
									</div>
									<div class="flex-form_buttons">
										<div class="button-container"><button type="button" class="flex-form_btn flex-form_btn-pre flex-form_btn-prev">Předchozí</button>
											<div class="keyboard-shortcut"><span>⌘ + [</span></div>
										</div>
										<div class="button-container"><button type="submit" id="submit-button" class="flex-form_btn flex-form_btn-submit">Odeslat</button>
											<div class="keyboard-shortcut"><span>⌘ + ↵</span></div>
										</div>
									</div>
								</div>
							</div>
						</form>
						<div id="success-message" class="flex-form_result">
							<div class="flex-form_success">
								<div class="flex-form_success-icon"><span>✓</span></div>
								<h3>Děkujeme! Váš formulář byl úspěšně odeslán!</h3>
								<p>Budeme vás brzy kontaktovat.</p>
							</div>
						</div>
						<div id="error-message" class="flex-form_result">
							<div class="flex-form_error">
								<h3>Něco se pokazilo!</h3>
								<p><span>Zkuste to prosím znovu nebo nás</span><a href="mailto:contact@example.com">kontaktujte přímo e-mailem</a><span>.</span></p>
							</div>
						</div>
						<div class="toast-container"></div>
					</div>
				</main>
			</div>
		</div>
		
		
		
	
<!-- FOOTER CODE --><?php get_template_part("footer_block", ""); ?>
</body>
</html>
