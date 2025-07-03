
<?php wp_footer(); ?>
<script type="text/javascript"
  src="<?php echo get_template_directory_uri() ?>/js/front.js?ver=1751575550"></script>
<?php if(file_exists(dirname( __FILE__ ).'/mailer.php') && !function_exists("wtw_forms_extentions")){ include_once 'mailer.php'; } ?>
<?php if(function_exists('get_field')) { echo get_field('footer_code', 'option'); } ?>
<?php if(file_exists(dirname( __FILE__ ).'/footer_code.php')){ include_once 'footer_code.php'; } ?>
