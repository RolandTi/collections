<?php include("_inc/inc-header.php"); ?>
	<body>
		<?php zp_apply_filter('theme_body_open'); ?>
		<a href="#main-content" tabindex="0" class="skip-to-content">Skip to main content</a>
	
		<div class="grid-container <?=$navbar;?>bar-layout">
		
			<?php include '_inc/inc-'.$navbar.'bar.php'; ?>
			
			<main class="<?=$active_template ?>">

			<div class="container album_head">
				<h1><?php echo gettext('My favorites'); ?></h1>
			</div>
	
					<?php 
					if (isAlbumPage(true)) 
					{ ?>
			<section id="index_gal">
						<?php while (next_album()): ?>
						<figure class="fav_thumb">
							<div class="album_thumb_container">
								<a href="<?php echo html_encode(getAlbumURL()); ?>"><?php printCustomAlbumThumbImage(getAnnotatedAlbumTitle(), 900, NULL, NULL, NULL, NULL, NULL, null, NULL,NULL); ?></a>
							</div>

							<figcaption class="album-title"><?php printAlbumTitle(); ?></figcaption>
							
							<div class="bloc-favs"><?php	 printAddToFavorites($_zp_current_album, '', gettext('Remove')); ?></div>
						</figure>
				<?php endwhile; ?>
			</section>
				<?php }  ?>
				
			
			<div class="container galeries">
							<div id="album_masonry">
					<?php
					while (next_image()): 
					if ($_zp_current_image->isPhoto()) { ?>
						<figure class="js-item fav_thumb"><!--	Class for js suffle -->
							<div class="image_thumb_container"><!--	Class for hidding oversize hover effect -->
								<a href="<?php echo html_encode(getImageURL()); ?>" title="<?php printBareImageTitle(); ?>">
									<img 
									src="<?php echo html_encode(getCustomImageURL(NULL,500,NULL,NULL,NULL,NULL,NULL,false,NULL)); ?>" 
									alt="<?php echo getBareImageTitle(); ?>" 
									width="<?php echo getFullWidth(); ?>" 
									height="<?php echo getFullHeight(); ?>" />
								</a>
							</div>
							<?php if (getOption('col_albdesc')) {
							echo '<figcaption>';
							echo '<strong>';
							echo printBareImageTitle();
							echo '</strong>';
							echo printBareImageDesc();
							echo '</figcaption>';
							} ?>
							<div class="bloc-favs"><?php	 printAddToFavorites($_zp_current_album, '', gettext('Remove')); ?></div>
						</figure>
					<?php	} 
					 else { ?>
					<figure class="document"><a href="<?php echo html_encode(getImageURL()); ?>" title="<?php printBareImageTitle(); ?>">
						<?php printImageThumb(getBareImageTitle()); ?>
						</a>
						<?php if (getOption('col_albdesc')) {
						echo '<figcaption>';
						echo '<strong>';
						echo printBareImageTitle();
						echo '</strong>';
						echo printBareImageDesc();
						echo '</figcaption>';
						} ?>
							<div class="bloc-favs"><?php	 printAddToFavorites($_zp_current_album, '', gettext('Remove')); ?></div>
						</figure>
				<?php	}  
						endwhile; ?>
					<div class="js-sizer"></div>
				</div>
				<script src="<?php echo $_zp_themeroot; ?>/js/shuffle.js?v=610"></script>
				<script>
				const Shuffle = window.Shuffle;
				const element = document.getElementById('album_masonry');
				const shuffleInstance = new Shuffle(element, {
					itemSelector: '.js-item',
					sizer: '.js-sizer'
					// https://vestride.github.io/Shuffle/docs/
				});
				</script>
				
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
