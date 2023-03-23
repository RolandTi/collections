<?php if (!defined('WEBPATH')) die(); ?>
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