<?php include("_inc/inc-header.php"); ?>
	<body>
		<?php zp_apply_filter('theme_body_open'); ?>
		<a href="#main-content" tabindex="0" class="skip-to-content">Skip to main content</a>
	
		<div class="grid-container <?=$navbar;?>bar-layout">
		
			<?php include '_inc/inc-'.$navbar.'bar.php'; ?>
			
			<main class="main album_thumbnail xl-space <?=$active_template ?>" id="main-content">

				
				<div class="index_gal_desc container">
					<h1><?php printGalleryTitle(); ?></h1>
					<?php printGalleryDesc(); ?>
				</div>
				
				<section id="index_gal">
					<?php while (next_album()): ?>
					<figure>
						<div class="album_thumb_container">
							<a href="<?php echo html_encode(getAlbumURL()); ?>">
								<?php printCustomAlbumThumbImage(getAnnotatedAlbumTitle(), 900, NULL, NULL, NULL, NULL, NULL, null, NULL,NULL); ?>
							</a>
						</div>
						<figcaption class="album-title"><?php printAlbumTitle(); ?></figcaption>
					</figure>
					<?php endwhile; ?>
				</section>
				
				<div class="pagelist-container">
					<?php printPageListWithNav("← " . gettext("prev"), gettext("next") . " →"); ?>
				</div>
				
			</main>
	
			<footer class="footer">
				<?php printCodeblock(2); ?>
				<?php include("_inc/inc-footer.php"); ?>
			</footer>
			
		</div> <!--End grid-container-->
		
	</body>
</html>