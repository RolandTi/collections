<?php
// It's all from this topic : https://www.forum.zenphoto.org/discussion/1409408/pagination-not-working-on-gallery-page-when-using-custom-index-php
// Don't understand how it's working, but it's working now :)
$_zp_page_check = 'checkPageValidity'; //	opt-in, standard behavior

function my_checkPageValidity($request, $gallery_page, $page) {
	switch ($gallery_page) {
		case 'gallery.php':
			$gallery_page = 'index.php'; //	same as an album gallery index
			break;
		case 'index.php':
			if (extensionEnabled('zenpage')) {
				if (getOption('zenpage_zp_index_news')) {
					$gallery_page = 'news.php'; //	really a news page
					break;
				}
				if (getOption('collections_homepage')) {
					return $page == 1; // only one page if zenpage enabled.
				}
			}
			break;
		case 'news.php':
		case 'album.php':
		case 'search.php':
		case 'favorites.php':
			break;
		default:
			if ($page != 1) {
				return false;
			}
	}
	return checkPageValidity($request, $gallery_page, $page);
}

if (!OFFSET_PATH) {
	enableExtension('print_album_menu', 1 | THEME_PLUGIN, false);
	setOption('user_logout_login_form', 2, false);
	$_zp_page_check = 'my_checkPageValidity';
	if (extensionEnabled('zenpage') && getOption('zenpage_zp_index_news')) { // only one index page if zenpage plugin is enabled & displaying
		zp_register_filter('getLink', 'newsOnIndex');
	}
}
?>