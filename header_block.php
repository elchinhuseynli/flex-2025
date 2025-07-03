<head>
		<meta charset="utf-8">
		
		
		
		<meta content="width=device-width, initial-scale=1" name="viewport">
		
		<script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
		
		
		<!-- Please keep this css code to improve the font quality-->
		<style>
  * {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  -o-font-smoothing: antialiased;
}
		</style>
	<script id="query_vars">var query_vars='<?php global $wp_query;echo serialize($wp_query->query)?>';</script>
<?php wp_head(); ?>
<?php if(function_exists('get_field')) { echo get_field('head_code', 'option'); } ?>
<?php if(file_exists(dirname( __FILE__ ).'/header_code.php')){ include_once 'header_code.php'; } ?></head>