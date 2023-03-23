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
		
		<main class="container main two-cols xl-space">
				<div>
					<h1 class="page_title"><?php echo gettext("A password is required for the page you requested"); ?></h1>
					<p class="link_to_sub "><?php if (function_exists('printRegisterURL')) {
					printRegisterURL(gettext('Register for this site')); } else { } ?></p>
				</div>
				
				<div class="password-form">
					<?php printPasswordForm('', true, false); ?>
				</div>
		</main>
		
		<footer class="footer">
<?php include("_footer.php"); ?>
</footer>
</div>
</body>
</html>