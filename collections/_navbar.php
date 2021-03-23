<?php
	// Load custom menu
	if (function_exists('printCustomMenu') && getOption('collection_custommenu')) {
		printCustomMenu('collection', 'list', 'nav-links', 'menu-active', 'nav-links-sub', 'menu-active-sub', 2,false);
	} 
	//else…
	else { ?>		
	<ul id="nav-links" hidden>
		<?php 
		//News Index
		if (function_exists("printAllNewsCategories") && ((getNumNews(true)) > 0)) {
		echo '<li>';
			if ($_zp_gallery_page == "news.php") { 
			printCustomPageURL(gettext('News'), 'news', '', '','','menu-active');
			} else { 
			printCustomPageURL(gettext('News'), 'news');
			}
			echo '</li>'; } 
		// List 1rt level Pages
		if (function_exists("printPageMenu") && ((getNumPages(true)) > 0)) { 
		printPageMenu("list-top","","menu-active","","","","1",false); 
		}
		// Gallery
		echo '<li>';
		if ($_zp_gallery_page == "index.php") {
			printCustomPageURL(gettext("Gallery"), 'index', '', '','','menu-active');
			} else {
			printCustomPageURL(gettext("Gallery"), 'index');
		}
		echo '</li>';
		// Archives view
		// echo '<li>';
		// if ($_zp_gallery_page == "archive.php") {
		// 	printCustomPageURL(gettext("Archive View"), 'archive', '', '','','menu-active');
		// 	} else {
		// 	printCustomPageURL(gettext("Archive View"), 'archive');
		// }
		echo '</li>';
		// Contact Page
		if (extensionEnabled('contact_form')) {
		echo '<li>';
		if ($_zp_gallery_page == "contact.php") {
			printCustomPageURL(gettext('Contact us'), 'contact', '', '','','menu-active');
			} else { 
			printCustomPageURL(gettext('Contact us'), 'contact', '', '');
		}
			echo '</li>';
			// Fix for login link active
		echo '<li>';
		if ($_zp_gallery_page == "password.php") {
			printCustomPageURL('Login', 'password', '', '','','menu-active');
			}
		echo '</li>';
		} else { }

if ((function_exists("printUserLogin_out") ) || !zp_loggedin() && function_exists('printRegistrationForm')) {

			if (function_exists('printFavoritesURL')) {
				printFavoritesURL(NULL, '<li>', '</li><li>', '</li>');
			}
			if (function_exists("printUserLogin_out")) {
			echo "<li>";
				printUserLogin_out('', '','');
			echo "</li>";

			}
}

				?>

</ul>
		<?php
		}
		if (getOption('Allow_search')) {
			printSearchForm("", "search", "", gettext("Search"));
				}	?>
		<button aria-expanded="false" aria-controls="nav-links">Menu</button>
		
