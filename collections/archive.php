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
			

<main class="container main">
	
		<div class="archive_grid">
			<div>
		<h3><?php echo gettext('Archive View'); ?></h3>
		<?php printAllDates( 'archive', 'year', 'month', 'desc'); ?>
		</div>
		
		<div>
		<h3><?php echo gettext('Popular Tags'); ?></h3>
		<?php printAllTagsAs('list', 'tags'); ?>
		</div>
		</div>

		</main>

		<footer class="footer"><?php include("_footer.php"); ?></footer>
	</div>
</body>
</html>

	</body>
</html>