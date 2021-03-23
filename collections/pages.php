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
					<a href="<?php echo html_encode(getGalleryIndexURL()); ?>" class="navbar_title">
					<?php printGalleryTitle(); ?></a>
					</div>
					<?php include("_navbar.php"); // <ul> with all items ?>
				</nav>
		</header>
		
		<main class="main page_template">
			<article>
			<h1><?php printPageTitle(); ?></h1>
			
			<?php
					printPageContent();
					printCodeblock(1);
					printTags('links', '', 'taglist', ' ');

					?>
			</article>
					<?php include("_media_supp.php"); ?>
			
		</main>

		<footer class="footer">
			<?php include("_footer.php"); ?>
		</footer>
	</div>
</body>
</html>




