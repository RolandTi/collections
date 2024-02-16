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
					<h1 class="page_title"><?php echo gettext('Register for this site'); ?></h1>
				</div>
				
				<div class="password-form">
				<?php printRegistrationForm(); ?>
				</div>
		</main>	
	

<footer class="footer">
<?php include("_inc/inc-footer.php"); ?>
</footer>
</div>
</body>
</html>


