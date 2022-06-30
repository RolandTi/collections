<?php if (!defined('WEBPATH')) die(); ?>
<!doctype html>
<html<?php printLangAttribute(); ?>>
<head>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="<?php echo LOCAL_CHARSET; ?>">
	<?php zp_apply_filter('theme_head'); ?>
	<?php printHeadTitle(); ?>
	<?php if (class_exists('RSS')) printRSSHeaderLink('Gallery', gettext('Gallery RSS')); ?>
	<link rel="stylesheet" href="<?php echo $_zp_themeroot; ?>/styles.css" type="text/css" />
	 <script>const colorScheme = localStorage.getItem("color-scheme") || "light-mode";</script>
</head>
<body>
	<?php zp_apply_filter('theme_body_open'); ?>
	<a href="#main-content" tabindex="0" class="skip-to-content">Skip to main content</a>

	<div class="grid-container">
		
		<header class="header">
			<nav class="navbar">
				<div class="navbar_title_container"><a href="<?php echo html_encode(getSiteHomeURL()); ?>" class="navbar_title">
					<?php printGalleryTitle(); ?></a><span class="breadcrumb"><?php if (extensionEnabled('zenpage')) { if (checkForPage(getOption('collections_homepage'))) { echo '<a href="'.html_encode(getCustomPageURL('gallery')).'">'.gettext("Gallery").'</a>';} else {}} else {} printParentBreadcrumb('','',''); printAlbumBreadcrumb('', '');?></span></div>
				<?php include("_navbar.php"); // <ul> with all items ?>
			</nav>
		</header>
		
		<main class="main">
			
			<div class="container album_head">
				<h1><?php printAlbumTitle(); ?></h1>
				<?php if (!empty(getAlbumDesc())) { ?>
			<div class="albumdes"><?php printAlbumDesc(); ?></div>
				<?php } else {} ?>
			</div>
			
			<div class="container galeries">
				<div id="album_masonry">
					<?php 
						if (isAlbumPage(true)) 
						{
							while (next_album()): ?>
							<figure class="sub_album">
								<a href="<?php echo html_encode(getAlbumURL()); ?>">
								<?php printCustomAlbumThumbImage(getAnnotatedAlbumTitle(), null, 600, 600, 600, 600, NULL, null, NULL,NULL); ?>
								<figcaption class="album-title"><?php printAlbumTitle(); ?></figcaption>
								</a>
							</figure>
					<?php endwhile;
					} 
					while (next_image()): 
					if (isImagePhoto()) { ?>
						<figure><a href="<?php echo html_encode(getImageURL()); ?>" title="<?php printBareImageTitle(); ?>">
						<img 
						src="<?php echo html_encode(getCustomImageURL(NULL,500,NULL,NULL,NULL,NULL,NULL,false,NULL)); ?>" 
						alt="<?php echo getBareImageTitle(); ?>" 
						width="<?php echo getFullWidth(); ?>" 
						height="<?php echo getFullHeight(); ?>" />
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
				</div>
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
							echo '<h2>Commentaires</h2>';
							printCommentForm();
							echo '</section>';
						}
					}
					?>
					</div>
					</div> <!--END media_supp_content-->
			</aside> <!--END media_supp-->
		</main>
		
		<footer class="footer"><?php include("macy.php"); ?><?php include("_footer.php"); ?></footer>
	</div>
</body>
</html>