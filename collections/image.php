<?php if (!defined('WEBPATH'))	die(); ?>
<!doctype html>
<html lang="fr">
<head>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="<?php echo LOCAL_CHARSET; ?>">
	<?php zp_apply_filter('theme_head'); ?>
	<?php printHeadTitle(); ?>
	<link rel="stylesheet" href="<?php echo $_zp_themeroot; ?>/styles.css" type="text/css" />
</head>
<body>	<?php zp_apply_filter('theme_body_open'); ?>
	<div class="grid-container">
		<header class="header">
				<nav class="navbar">
					<div class="navbar_title_container">
					<a href="<?php echo html_encode(getGalleryIndexURL()); ?>" class="navbar_title">
					<?php printGalleryTitle(); ?></a><span class="breadcrumb"><?php printParentBreadcrumb('','',''); printAlbumBreadcrumb('', '');?></span>
					</div>
					<?php include("_navbar.php"); // <ul> with all items ?>
				</nav>
		</header>
		
		<main class="main">
			<div class="picture_container">
					<?php 
					# Overlay for nav, ONLY if photo
					if (isImagePhoto()) {
						echo '<div class="overlay_nav_container">';
						if (hasPrevImage()) { ?><a tabindex="-1" href="<?php echo html_encode(getPrevImageURL()); ?>" class="cursor_prev"></a><?php }
						if (hasNextImage()) { ?><a tabindex="-1" href="<?php echo html_encode(getNextImageURL()); ?>" class="cursor_next"></a><?php }
						if (!hasNextImage()) { ?><a tabindex="-1" href="<?php echo html_encode(getAlbumURL()); ?>" class="cursor_close"></a><?php }
						echo '</div>';
					} 
  				# Responsive picture for photo
						if (isImagePhoto()) { ?>
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
					<?php if (getOption('collection_download')) { ?><a download href="<?php echo html_encode(getFullImageURL()); ?>" title="<?php echo gettext('Download'); ?>"   class="svg_button download" >
						<svg width="16px" height="20px" viewBox="0 0 16 20">
							<path fill="#6a6a6a" d="M8,16L0,8l1.4-1.4L7,12.2V0h2v12.2l5.6-5.6L16,8L8,16z M0.5,20.6h15l0-2h-15L0.5,20.6z" />
						</svg>
					</a><?php } ?>

				<?php if(function_exists('printAddToFavorites')) {?><div class="bloc-favs">
				<?php	#printAddToFavorites($_zp_current_image,"add","remove"); 
				printAddToFavorites($_zp_current_image); 
				?></div><?php } ?>				
				</div>
			</div> <!--END picture_detail-->
				
			<?php include("_media_supp.php"); ?>
			<?php if (function_exists('printRelatedItems') && !empty(getRelatedItems('all'))) { ?>
			<?php #if (function_exists('printRelatedItems')) { ?>
				<div class="bloc_relat_item ">
						<div class="bloc_relat_item_content">
								<?php printRelatedItems(5,'all',null,100,true); ?>
						</div>
				</div>
			<?php } ?>

		</main>
		
		<footer class="footer">
			<?php include("_footer.php"); ?>
		</footer>
	</div>
</body>
</html>