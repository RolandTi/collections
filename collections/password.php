<?php include("_inc/inc-header.php"); ?>


<?php 
if (getOption('collections_sidebar')) {
	$navbar = "side";
	}
else { 
	$navbar = "top";
	}
?>

	<body>
		<?php zp_apply_filter('theme_body_open'); ?>
		<a href="#main-content" tabindex="0" class="skip-to-content">Skip to main content</a>
	
		<div class="grid-container <?=$navbar;?>bar-layout">
		
			<?php include '_inc/inc-'.$navbar.'bar.php'; ?>
			
			<main class="<?=$active_template ?>">

				<div>
					<h1 class="page_title"><?php echo gettext("A password is required for the page you requested"); ?></h1>
					<p class="link_to_sub "><?php if (function_exists('printRegisterURL')) {
					printRegisterURL(gettext('Register for this site')); } else { } ?></p>
				</div>
				
				<div class="password-form">
					<?php printPasswordForm('', true, false); ?>
				</div>
		</main>
		
		<footer class="footer">
<?php include("_inc/inc-footer.php"); ?>
</footer>
</div>
</body>
</html>