<?php if (!defined('WEBPATH'))	die(); if (function_exists('printContactForm')) { ?>
<!doctype html>
<html>
<head>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="<?php echo LOCAL_CHARSET; ?>">
	<?php zp_apply_filter('theme_head'); ?>
	<?php printHeadTitle(); ?>
	<link rel="stylesheet" href="<?php echo $_zp_themeroot; ?>/styles.css" type="text/css" />
</head>
<body>
	<div class="grid-container">
		<?php zp_apply_filter('theme_body_open'); ?>
	
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
		
		
		<main class="container main two-cols xl-space">
			
			<h1 class="page_title"><?php echo gettext('Contact us'); ?></h1>
			
			<div class="contact-form">
				<?php printContactForm(); ?>
			</div>
			
		</main>
		
		<footer class="footer"><?php include("_footer.php"); ?></footer>
		
	</div>
</body>
</html>
<?php } else {	include(SERVERPATH . '/' . ZENFOLDER . '/404.php'); } ?>