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
</head>
<body>
	<?php zp_apply_filter('theme_body_open'); ?>

	<div class="grid-container">
		
		<header class="header">
				<nav class="navbar">
					<div class="navbar_title_container">
					<a href="<?php echo html_encode(getGalleryIndexURL()); ?>" 
						class="navbar_title">
						<?php printGalleryTitle(); ?>
					</a>
					</div>
					<?php include("_navbar.php"); // <ul> with all items ?>
				</nav>
		</header>
		
		<main class="main">
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
								while (next_image()): ?>
								
					<div class="fav_thumb">
						<figure class="macy_element">
							<a href="<?php echo html_encode(getImageURL()); ?>" 
									title="<?php printBareImageTitle(); ?>">
							<img 
							src="<?php echo html_encode(getCustomImageURL(NULL,500,NULL,NULL,NULL,NULL,NULL,false,NULL)); ?>" 
							alt="<?php echo getBareImageTitle(); ?>" 
							width="<?php echo getFullWidth(); ?>" 
							height="<?php echo getFullHeight(); ?>" />
							</a>
							
							<div class="bloc-favs">
								<?php printAddToFavorites($_zp_current_image, '', gettext('Remove')); ?>
							</div>
						</figure>
					</div>
					<?php endwhile; ?>
				</div>
			    <!-- #album_masonry -->
			<div class="pagelist-container"><?php printPageListWithNav("← " . gettext("prev"), gettext("next") . " →"); ?></div>
			</div><!-- container galeries -->
		</main>
		
		<footer class="footer">
			<script src="<?php echo $_zp_themeroot; ?>/js/macy.js"></script>
		<?php include("macy.php"); ?>
		<?php include("_footer.php"); ?>
		</footer>
	</div>
</body>
</html>
