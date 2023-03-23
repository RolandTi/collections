<?php if (!defined('WEBPATH'))	die(); ?>
<!doctype html>
<html<?php printLangAttribute(); ?>>
<head>
	<?php include("_header.php"); ?>
</head>

<body>
<?php zp_apply_filter('theme_body_open'); ?>
	<a href="#main-content" tabindex="0" class="skip-to-content">Skip to main content</a>

	<div class="grid-container">
		
		<header class="header">
			<nav class="navbar">
				<div class="navbar_title_container"><a href="<?php echo html_encode(getSiteHomeURL()); ?>" class="navbar_title">
					<?php printGalleryTitle(); ?></a><span class="breadcrumb"><?php if (extensionEnabled('zenpage')) { if (checkForPage(getOption('collections_homepage'))) { echo '<a href="'.html_encode(getCustomPageURL('gallery')).'">'.gettext("Gallery").'</a>';} else {}} else {}printParentBreadcrumb('','',''); printAlbumBreadcrumb('', '');?></span></div>
				<?php include("_navbar.php"); // <ul> with all items ?>
			</nav>
		</header>
		
		<main class="main">
			<div class="picture_container">
				<?php 
				# Overlay for nav, ONLY if photo
				if ($_zp_current_image->isPhoto()) {
					echo '<div class="overlay_nav_container">';
					if (hasPrevImage()) { ?><a tabindex="-1" href="<?php echo html_encode(getPrevImageURL()); ?>" class="cursor_prev"></a><?php }
					if (hasNextImage()) { ?><a tabindex="-1" href="<?php echo html_encode(getNextImageURL()); ?>" class="cursor_next"></a><?php }
					if (!hasNextImage()) { ?><a tabindex="-1" href="<?php echo html_encode(getAlbumURL()); ?>" class="cursor_close"></a><?php }
					echo '</div>';
				} 
				# Responsive picture for photo
					if ($_zp_current_image->isPhoto()) { ?>
				<div class="img_responsive">
					<img srcset="<?php echo html_encode(getCustomImageURL(NULL,2200,NULL,NULL,NULL,NULL,NULL,false,NULL)); ?>  2200w,
									<?php echo html_encode(getCustomImageURL(NULL,1280,NULL,NULL,NULL,NULL,NULL,false,NULL)); ?> 1280w,
				      		<?php echo html_encode(getCustomImageURL(NULL,640,NULL,NULL,NULL,NULL,NULL,false,NULL)); ?>  640w" 
				  sizes="100vw" 
				  src="<?php echo html_encode(getCustomImageURL(NULL,640,NULL,NULL,NULL,NULL,NULL,false,NULL)); ?>" 
				  alt="<?php echo getBareImageTitle(); ?>" 
				  width="<?php echo getFullWidth(); ?>"
				  height="<?php echo getFullHeight(); ?>" >
				</div>
				<?php # Everything else (video, text…)
						} else {
							printDefaultSizedImage(getImageTitle());
						} 
						# Button next/prev
						if (hasPrevImage()) { ?>
				<a href="<?php echo html_encode(getPrevImageURL()); ?>">
					<div role="button" aria-hidden="true" aria-label="<?php echo gettext("Previous Image"); ?>" class="prev_img" title="<?php echo gettext("Previous Image"); ?>">
						<svg width="24" height="24" viewBox="0 0 24 24" class="LKARhb">
							<path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"></path>
							
							<path fill="none" d="M0 0h24v24H0V0z"></path>
						</svg>
					</div>
				</a>
				<?php } ?>
								<?php if (hasNextImage()) { ?>
				<a href="<?php echo html_encode(getNextImageURL()); ?>">
					<div role="button" aria-hidden="true" aria-label="<?php echo gettext("Next Image"); ?>" class="next_img" title="<?php echo gettext("Next Image"); ?>">
						<svg width="24" height="24" viewBox="0 0 24 24" class="LKARhb">
							<path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"></path>
							
							<path fill="none" d="M0 0h24v24H0V0z"></path>
						</svg>
					</div>
				</a>
			<?php } ?>

				</div>
			
			<div class="picture_detail">
				<div class="picture_descr">
					<h1><?php printImageTitle(); ?></h1>
						<?php printImageDesc(); ?>
						<?php	printTags('links', '', 'taglist', ''); ?>
				</div>
				<div class="picture_icons">
					<?php if (getOption('collections_download')) { ?><a download href="<?php echo html_encode(getFullImageURL()); ?>" title="<?php echo gettext('Download'); ?>"   class="svg_button download" >
						<svg width="16px" height="25px" viewBox="0 0 16 25">
							<path fill="#6a6a6a" d="M8,16L0,8l1.4-1.4L7,12.2V0h2v12.2l5.6-5.6L16,8L8,16z M0.5,20.6h15l0-2h-15L0.5,20.6z" />
						</svg>
					</a><?php } ?>
				<?php #start function favorite
				if(function_exists('printAddToFavorites')) {?>
				<?php
					#check if favorites_multi is "on"
					if(getOption('favorites_multi')==1) {
					#Show favorites_multi form ?>
					<div class="bloc-multi-favs">
					<?php printAddToFavorites($_zp_current_image); ?>
					</div>
				<?php } #else, show simple favorite
					else { ?>
					<div class="bloc-favs">
					<?php	#printAddToFavorites($_zp_current_image,"add","remove"); 
					printAddToFavorites($_zp_current_image); ?>
					</div>
				<?php } #end else 
					} #end function Favorites ?>				
				</div>
			</div> <!--END picture_detail-->
				
			<?php if(function_exists('printRating') || function_exists('printGoogleMap') ||function_exists('printOpenStreetMap') || (getOption('collections_metas')) ||function_exists('printCommentForm')) {   ?>
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
					if(function_exists('printOpenStreetMap') && (getImageData('EXIFGPSLatitude')!='')) {
						echo '<section class="bloc-osm">';
						echo '<h2>Maps</h2>';
						@call_user_func('printOpenStreetMap');
						echo '</section>';
					}
					if (getImageMetaData() && (getOption('collections_metas'))) {
						echo '<section class="bloc-metadata">';
						echo '<h2>Infos</h2>';
						printImageMetadata('',false,'imagemetadata');
						echo '</section>';
				 } 
					if (class_exists('ScriptlessSocialSharing')) {
					ScriptlessSocialSharing::printButtons();
					}
				?>
				</div>
				<div class="media_supp_content_col">
				<?php 
					if (function_exists('printCommentForm')) {
						if ($_zp_current_image->getCommentsAllowed() || $_zp_current_image->getCommentCount()) {
							echo '<section class="bloc-comments">';
							echo '<h2>Commentaires</h2>';
							printCommentForm();
							echo '</section>';
						}
					} 
					?>
					</div>
					</div> <!--END media_supp_content-->
			</aside> <!--END media_supp-->
			<?php } ?>
			
			<?php if (function_exists('printRelatedItems') && !empty(getRelatedItems('all'))) { ?>
			<?php #if (function_exists('printRelatedItems')) { ?>
				<section class="bloc_relat_item ">
				<div class="bloc_relat_item_content">
						<?php printRelatedItems(5,'all',null,100,true); ?>
				</div>
			</section>
			<?php } ?>

		</main>
		
		<footer class="footer">
			<?php include("_footer.php"); ?>
		</footer>
	</div>
<!--	<script src="<?php #echo $_zp_themeroot; ?>/js/macy.js"></script>-->
	

<!--<script>
    masonry.runOnImageLoad(function() {
        masonry.recalculate(true, true);

    });
	
</script>-->

</body>
</html>