<?php if (!defined('WEBPATH')) die(); ?>
<?php 
	switch ($_zp_gallery_page) {
		case 'gallery.php':
			$active_template = 'home-layout';
			break;
		case 'index.php':
			$active_template = 'home-layout';
			break;
		case '404.php':
			$active_template = 'error-layout';
			break;
		case 'archive.php':
			$active_template = 'archive-layout';
			break;
		case 'album.php':
			$active_template = 'album-layout';
			break;
		case 'contact.php':
			$active_template = 'contact-layout';
			break;
		case 'favorites.php':
			$active_template = 'favorites-layout';
			break;
		case 'image.php':
			$active_template = 'image-layout';
			break;
		case 'news.php':
			$active_template = 'news-layout';
			break;
		case 'pages.php':
			$active_template = 'pages-layout';
			break;
		case 'password.php':
			$active_template = 'password-layout';
			break;
		case 'register.php':
			$active_template = 'register-layout';
			break;
		case 'search.php':
			$active_template = 'search-layout';
			break;
	}

?>
<?php 
	if (getOption('collections_sidebar')) {
		$navbar = "side";
		}
	else { 
		$navbar = "top";
		}
?>
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
