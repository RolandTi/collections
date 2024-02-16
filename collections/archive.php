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

	
		<div class="archive_grid">
			<div>
		<h3><?php echo gettext('Archive View'); ?></h3>
		<?php printAllDates( 'archive', 'year', 'month', 'desc'); ?>
		</div>
		
		<div>
		<h3><?php echo gettext('Popular Tags'); ?></h3>
		<?php printAllTagsAs('list', 'tags'); ?>
		</div>
		</div>

		</main>

		<footer class="footer"><?php include("_inc/inc-footer.php"); ?></footer>
	</div>
</body>
</html>

	</body>
</html>