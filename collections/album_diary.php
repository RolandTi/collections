<?php include("_inc/inc-header.php"); ?>
	<body>
		<?php zp_apply_filter('theme_body_open'); ?>
		<a href="#main-content" tabindex="0" class="skip-to-content">Skip to main content</a>
	
		<div class="grid-container <?=$navbar;?>bar-layout">
		
			<?php include '_inc/inc-'.$navbar.'bar.php'; ?>
			
			<main class="main album_thumbnail <?=$active_template ?>" id="main-content">
			
				<div class="container album_head">
					<h1><?php printAlbumTitle(); ?></h1>
					<?php if (!empty(getAlbumDesc())) { ?><div class="albumdes"><?php printAlbumDesc(); ?></div><?php } else {} ?>
				</div><!--End album_head-->
			
				<!-- Loop for sub-albums -->
				<?php  if (isAlbumPage(true)) { ?>
				<section id="index_gal">
						<?php while (next_album()): ?>
						<figure>
							<div class="album_thumb_container"><a href="<?php echo html_encode(getAlbumURL()); ?>"><?php printCustomAlbumThumbImage(getAnnotatedAlbumTitle(), 900, NULL, NULL, NULL, NULL, NULL, null, NULL,NULL); ?></a></div>
							<figcaption class="album-title"><?php printAlbumTitle(); ?></figcaption>
						</figure>
						<?php endwhile; ?>
				</section>
				<?php }  ?>
				<!-- end sub-albums loop -->
				
			<div class="container galeries">
				<div id="album_diary">
					<?php
					while (next_image()): 
					if ($_zp_current_image->isPhoto()) { ?>
						<figure>
							<img srcset="<?php echo html_encode(getCustomImageURL(NULL,2200,NULL,NULL,NULL,NULL,NULL,false,NULL)); ?>  2200w,
																	<?php echo html_encode(getCustomImageURL(NULL,1280,NULL,NULL,NULL,NULL,NULL,false,NULL)); ?> 1280w,
												      		<?php echo html_encode(getCustomImageURL(NULL,640,NULL,NULL,NULL,NULL,NULL,false,NULL)); ?>  640w" 
												  sizes="100vw" 
												  src="<?php echo html_encode(getCustomImageURL(NULL,640,NULL,NULL,NULL,NULL,NULL,false,NULL)); ?>" 
												  alt="<?php echo getBareImageTitle(); ?>" 
												  width="<?php echo getFullWidth(); ?>"
												  height="<?php echo getFullHeight(); ?>" >
							<?php echo '<figcaption><h2>', printBareImageTitle(),'</h2>', printBareImageDesc(),'</figcaption>'; ?>
						</figure>
					<?php	} 
					 else { 
					 printDefaultSizedImage(getImageTitle());
					 	}  
						endwhile; ?>
				</div><!-- end #album_diary -->

				
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