<?php
if (extensionEnabled('zenpage')) {
	if (checkForPage(getOption('collections_homepage'))) {
		require_once('pages.php');
	} else {
		require_once('gallery.php');
	}
} else {
	require_once('gallery.php');
}
?>