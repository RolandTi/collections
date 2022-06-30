<?php
	// Load custom menu
	if (function_exists('printCustomMenu') && getOption('collections_custommenu')) {
		printCustomMenu('collections', 'list-top', 'nav-links', 'menu-active', 'nav-links-sub', 'menu-active-sub', 2,false);
	} 
	//else…
	else { ?>	
	<button class="toggle_nav" aria-expanded="false">
		<span id="menu-icon-anime">
		  <span></span>
		  <span></span>
		  <span></span>
		  <span></span>
		</span>
		<!--<span>Menu</span>-->
	</button>	
	
	<ul id="nav-links">
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
		// Top level pages
		if (function_exists("printPageMenu") && ((getNumPages(true)) > 0)) { 
		printPageMenu("list-top","","menu-active-page","","","","1",false); 
		}
		// Gallery index
		echo '<li><a href="'.html_encode(getCustomPageURL('gallery')).'">'.gettext("Gallery").'</a></li>';
		#echo printGalleryIndexURL();
		#echo getGalleryIndexURL(); gettext("Gallery");
		#echo '<li>';
		#if ($_zp_gallery_page == "index.php") {
			#printCustomPageURL(gettext("Gallery"), 'index', '', '','','menu-active');
			#} else {
			#printCustomPageURL(gettext("Gallery"), 'index');
		#}
		#echo '</li>';
		// Archives view
		// echo '<li>';
		// if ($_zp_gallery_page == "archive.php") {
		// 	printCustomPageURL(gettext("Archive View"), 'archive', '', '','','menu-active');
		// 	} else {
		// 	printCustomPageURL(gettext("Archive View"), 'archive');
		// }
//		echo '</li>';
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
		if ($_zp_gallery_page == "password.php") {
			echo '<li>';
			printCustomPageURL('Login', 'password', '', '','','menu-active');
			echo '</li>';
			}
		} else { }
				?>
</ul>
		<?php
		}
		if (getOption('Allow_search')) {
			// Need to find a trick to get form reset after previous search. No cumulative wording.
			// $_zp_current_search->clearSearchWords(); ??
			printSearchForm("", "search", "", gettext("Search"),NULL,NULL,NULL,false);
				}	
				
		?>		

