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

			<div class="container album_head">
				<h1><?php echo gettext('My favorites'); ?></h1>
			</div>
			
			<div class="container galeries">
				<div id="album_masonry">				
					<?php while (next_album()): ?>
						<div class="fav_thumb">
						<figure class="sub_album folder">
							<a href="<?php echo html_encode(getAlbumURL()); ?>">
								<?php printCustomAlbumThumbImage(getAnnotatedAlbumTitle(), null, 600, 600, 600, 600, NULL, null, NULL,NULL); ?>
								<figcaption class="album-title"><?php printAlbumTitle(); ?></figcaption>
							</a>
							<div class="bloc-favs"><?php	printAddToFavorites($_zp_current_album, '', gettext('Remove')); ?></div>
						</figure>
					</div>
					<?php endwhile;
						while (next_image()):
						if ($_zp_current_image->isPhoto()) { ?>
						<div class="fav_thumb">
						<figure>
							<a href="<?php echo html_encode(getImageURL()); ?>" title="<?php printBareImageTitle(); ?>">
						<img 
						src="<?php echo html_encode(getCustomImageURL(NULL,500,NULL,NULL,NULL,NULL,NULL,false,NULL)); ?>" 
						alt="<?php echo getBareImageTitle(); ?>" 
						width="<?php echo getFullWidth(); ?>" 
						height="<?php echo getFullHeight(); ?>" />
						</a>
						<div class="bloc-favs">
							<?php printAddToFavorites($_zp_current_image, '', gettext('Remove')); ?>
						</div>
						<?php if (getOption('col_albdesc')) {
						echo '<figcaption>';
						echo '<strong>';
						echo printBareImageTitle();
						echo '</strong>';
						echo printBareImageDesc();
						echo '</figcaption>';
						} ?>
						</figure>
						</div>
					<?php	} 
					 else { ?>
						<div class="fav_thumb">

				<figure class="document"><a href="<?php echo html_encode(getImageURL()); ?>" title="<?php printBareImageTitle(); ?>">
						<?php printImageThumb(getBareImageTitle()); ?>
						</a>
						<div class="bloc-favs">
							<?php printAddToFavorites($_zp_current_image, '', gettext('Remove')); ?>
						</div>
						<?php if (getOption('col_albdesc')) {
						echo '<figcaption>';
						echo '<strong>';
						echo printBareImageTitle();
						echo '</strong>';
						echo printBareImageDesc();
						echo '</figcaption>';
						} ?>
					</figure>
						</div>
					<?php } endwhile; ?>
				</div>
				
			    <!-- #album_masonry -->
			<div class="pagelist-container"><?php printPageListWithNav("← " . gettext("prev"), gettext("next") . " →"); ?></div>
			</div><!-- container galeries -->
		</main>
		
		<footer class="footer">
			<script src="<?php echo $_zp_themeroot; ?>/js/macy.js"></script>
		<?php include("macy.php"); ?>
		<?php include("_inc/inc-footer.php"); ?>
		</footer>
	</div>
</body>
</html>
