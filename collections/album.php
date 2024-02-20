<?php include("_inc/inc-header.php"); ?>
	<body>
		<?php zp_apply_filter('theme_body_open'); ?>
		<a href="#main-content" tabindex="0" class="skip-to-content">Skip to main content</a>
	
		<div class="grid-container <?=$navbar;?>bar-layout">
		
			<?php include '_inc/inc-'.$navbar.'bar.php'; ?>
			
			<main class="main album_thumbnail <?=$active_template ?>" id="main-content">
			
			<div class="container album_head">
				<h1><?php printAlbumTitle(); ?></h1>
				<?php if (!empty(getAlbumDesc())) { ?>
			<div class="albumdes"><?php printAlbumDesc(); ?></div>
				<?php } else {} ?>
			</div>
			
				<?php 
					if (isAlbumPage(true)) 
					{ ?>
			<section id="index_gal">
						<?php while (next_album()): ?>
						<figure>
							<div class="album_thumb_container">
								<a href="<?php echo html_encode(getAlbumURL()); ?>"><?php printCustomAlbumThumbImage(getAnnotatedAlbumTitle(), 900, NULL, NULL, NULL, NULL, NULL, null, NULL,NULL); ?></a>
							</div>

							<figcaption class="album-title"><?php printAlbumTitle(); ?></figcaption>
						</figure>
				<?php endwhile; ?>
			</section>
				<?php }  ?>
			<div class="container galeries">
				<div id="album_masonry">
					<?php
					while (next_image()): 
					if ($_zp_current_image->isPhoto()) { ?>
						<figure class="js-item"><!--	Class for js suffle -->
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
					<div class="album_detail">
					<div class="album_descr"><?php printTags('links', '', 'taglist', ''); ?></div>
					
					<?php #start function favorite
					if(function_exists('printAddToFavorites')) {?>
					<?php
						#check if favorites_multi is "on"
						if(getOption('favorites_multi')==1) {
						#Show favorites_multi form ?>
						<div class="bloc-multi-favs">
						<?php printAddToFavorites($_zp_current_album); ?>
						</div>
					<?php } #else, show simple favorite
						else { ?>
						<div class="picture_icons">
							<div class="bloc-favs">
								<?php	#printAddToFavorites($_zp_current_image,"add","remove"); 
								printAddToFavorites($_zp_current_album); ?>
							</div>
						</div><!-- end "picture_icons" -->
					<?php } #end else 
						} #end function Favorites ?>
					</div>
				
				<div class="pagelist-container"><?php printPageListWithNav("← " . gettext("prev"), gettext("next") . " →"); ?></div>
			</div><!-- container galeries -->
			
			<aside class="media_supp xl_hmar">
				<div class="media_supp_content">
					<div class="media_supp_content_col">
					<?php 
					if(function_exists('printRating')) {
						echo '<section class="bloc-rating">';
						echo '<h2>Rating</h2>';
						echo '<div class="bloc-rating-content">';
						@call_user_func('printRating'); 
						echo '</div>';
						echo '</section>';
					 }  
					if(function_exists('printGoogleMap')) {
						echo '<section class="bloc-gmaps">';
						@call_user_func('printGoogleMap');
						echo '</section>';
					} 
					if(function_exists('printOpenStreetMap')) {
							echo '<section class="bloc-osm">';
							echo '<h2>Maps</h2>';
							@call_user_func('printOpenStreetMap');
							echo '</section>';
					}
					if (class_exists('ScriptlessSocialSharing')) {
					ScriptlessSocialSharing::printButtons();
					} ?>
					</div>
					<div class="media_supp_content_col">
					<?php
					if (function_exists('printCommentForm')) {
						if ($_zp_current_album->getCommentsAllowed() || $_zp_current_album->getCommentCount()) {
							echo '<section class="bloc-comments">';
							echo '<h2>'.gettext('Comments').'</h2>';
							printCommentForm();
							echo '</section>';
						}
					}
					?>
					</div>
					</div> <!--END media_supp_content-->
			</aside> <!--END media_supp-->
		</main>
		
		<footer class="footer"><?php include("_inc/inc-footer.php"); ?></footer>
	</div>
</body>
</html>