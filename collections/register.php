<?php if (!defined('WEBPATH')) die(); ?>
<!doctype html>
<html<?php printLangAttribute(); ?>>
<head>
	<?php include("_inc/inc-header.php"); ?>
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
					<?php include("_inc/inc-navbar.php"); // <ul> with all items ?>
				</nav>
		</header>

		<main class="container main two-cols xl-space">
				<div>
					<h1 class="page_title"><?php echo gettext('Register for this site'); ?></h1>
				</div>
				
				<div class="password-form">
				<?php printRegistrationForm(); ?>
				</div>
		</main>	
	

<footer class="footer">
<?php include("_inc/inc-footer.php"); ?>
</footer>
</div>
</body>
</html>


