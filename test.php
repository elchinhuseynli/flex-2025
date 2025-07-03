<?php
/*
Template name: test
*/
?>
    <!DOCTYPE html>
<html data-wf-page="678d2774760478a30ed9c7b3" data-wf-site="651bf4b86dfb35365e58e1ff" lang="cs">
	<?php get_template_part("header_block", ""); ?>
	<body>
		<?php if(function_exists('get_field')) { echo get_field('body_code', 'option'); } ?>
		<!-- FOOTER CODE -->
		<?php get_template_part("footer_block", ""); ?>
	</body>
</html>
