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
		
		<main class="main page_template">
			<article>
			<h1><?php printPageTitle(); ?></h1>
			
			<?php
					printPageContent();
					printCodeblock(1);
					printTags('links', '', 'taglist', ' ');

					?>
			</article>
		
				<aside class="media_supp xl_hmar">
					<div class="media_supp_content">
						<?php	
						if (function_exists('printCommentForm')) {
							if ($_zp_current_zenpage_page->getCommentsAllowed() || $_zp_current_zenpage_page->getCommentCount()) {
								echo '<div class="bloc-comments">';
								echo '<h2>Commentaires</h2>';
								printCommentForm();
								echo '</div>';
							}
						}
						 
					if (class_exists('ScriptlessSocialSharing')) {
						ScriptlessSocialSharing::printButtons();
					}
					?>
						</div> <!--END media_supp_content-->
				</aside> <!--END media_supp-->

		</main>

		<footer class="footer">
			<?php include("_footer.php"); ?>
		</footer>
	</div>
</body>
</html>




