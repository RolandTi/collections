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
					<div class="navbar_title_container">
					<a href="<?php echo html_encode(getSiteHomeURL()); ?>" 
						class="navbar_title">
						<?php printGalleryTitle(); ?>
					</a>
					</div>
					<?php include("_navbar.php"); // <ul> with all items ?>
				</nav>
		</header>
		
		<main class="main album_thumbnail xl-space" id="main-content">
			
			<div class="index_gal_desc container">
				<h1><?php printGalleryTitle(); ?></h1>
				<?php printGalleryDesc(); ?>
			</div>
			
			<div id="index_gal">
				<?php while (next_album()): ?>
				<figure>
					<a href="<?php echo html_encode(getAlbumURL()); ?>">
						<?php printCustomAlbumThumbImage(getAnnotatedAlbumTitle(), 900, NULL, NULL, NULL, NULL, NULL, null, NULL,NULL); ?>
					</a>
					<figcaption class="album-title"><?php printAlbumTitle(); ?></figcaption>
				</figure>
				<?php endwhile; ?>
			</div>
			
			<div class="pagelist-container">
				<?php printPageListWithNav("← " . gettext("prev"), gettext("next") . " →"); ?>
			</div>
			
		</main>

		<footer class="footer">
			<?php printCodeblock(2); ?>
			<?php include("_footer.php"); ?>
		</footer>
		
	</div> <!--End grid-container-->
	
</body>
</html>