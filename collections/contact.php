<?php include("_inc/inc-header.php"); ?>
	<body>
		<?php zp_apply_filter('theme_body_open'); ?>
		<a href="#main-content" tabindex="0" class="skip-to-content">Skip to main content</a>
	
		<div class="grid-container <?=$navbar;?>bar-layout">
		
			<?php include '_inc/inc-'.$navbar.'bar.php'; ?>
			
			<main class="<?=$active_template ?>">

			
			<h1 class="page_title"><?php echo gettext('Contact us'); ?></h1>
			
			<div class="contact-form">
				<?php printContactForm(); ?>
			</div>
			
		</main>
		
		<footer class="footer"><?php include("_inc/inc-footer.php"); ?></footer>
		
	</div>
</body>
</html>
<?php } else {	include(SERVERPATH . '/' . ZENFOLDER . '/404.php'); } ?>