<?php
// force UTF-8 Ø

if (!defined('WEBPATH'))
	die();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php echo LOCAL_CHARSET; ?>">
		<?php zp_apply_filter('theme_head'); ?>
		<?php printHeadTitle(); ?>
		<link rel="stylesheet" href="<?php echo pathurlencode($zenCSS); ?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo pathurlencode(dirname(dirname($zenCSS))); ?>/common.css" type="text/css" />
	</head>
	<body>
		<?php zp_apply_filter('theme_body_open'); ?>
				<header class="header">
				<nav class="navbar">
					<a href="<?php echo html_encode(getGalleryIndexURL()); ?>"><?php printGalleryTitle(); ?></a>
					<?php include("_navbar.php"); // <ul> with all items ?>
				</nav>
		</header>
		
		<div id="main">
			<div id="gallerytitle">
				<?php
				if (getOption('Allow_search')) {
					printSearchForm();
				}
				?>
				<h2>
					<span>
						<?php printHomeLink('', ' | '); printGalleryIndexURL(' | ', getGalleryTitle()); echo gettext("Object not found"); ?>
				</h2>
			</div>
			<div id="padbox">
				<?php print404status(isset($album) ? $album : NULL, isset($image) ? $image : NULL, $obj); ?>
			</div>
		</div>
	</body>
</html>
