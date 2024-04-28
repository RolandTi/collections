<nav id="sidebar" class="nav-display">

		<section>
			<a href="<?php echo html_encode(getSiteHomeURL()); ?>"
			class="sidebar_site_title">
				<?php printGalleryTitle(); ?>
			</a>
		</section>
		
<?php
if (getOption('Allow_search')) {
	echo "<h2>".gettext("Search")."</h2>";
	printSearchForm("", "sidebar_search", "", "→",NULL,NULL,NULL,false);
}	

if (function_exists('printCustomMenu') && getOption('collections_custommenu')) {
	echo "<section>";
	printCustomMenu('collections', 'list-top', '', 'menu-active', 'submenu', 'menu-active', 2,false);
	echo "</section>";
	} 
	else {
		if (function_exists("printAlbumMenu")) { 
			echo '<section class="section_printAlbumMenu">';
			if (ZP_NEWS_ENABLED || ZP_PAGES_ENABLED) {
				if ($_zp_gallery_page == 'index.php' || $_zp_gallery_page != 'gallery.php') {
					?>
					<h2>
						<a href="<?php echo html_encode(getCustomPageURL('gallery')); ?>" title="<?php echo gettext('Album index'); ?>"><?php echo gettext("Gallery"); ?></a>
					</h2>
					<?php
				} else {
					?>
					<h2><?php echo gettext("Gallery"); ?></h2>
					<?php
				}
			} else {
			echo "<h2>";
			echo gettext("Gallery");
			echo "</h2>";
						}
			printAlbumMenu("list", false, "", "menu-active", "submenu", "menu-active", gettext("Gallery Index"), 0);
			echo "</section>";
		 } 
		 if (function_exists("printAllNewsCategories") && ((getNumNews(true)) > 0)) {
		?>
		<section class="section_News">
			<h2><?php echo gettext("News articles"); ?></h2>
			<?php
			printAllNewsCategories(gettext("All news"), false, "", "menu-active", true, "submenu", "menu-active");
			?>
		</section>
	<?php } // printAllNewsCategories ?>
	

	<?php if (function_exists("printPageMenu") && ((getNumPages(true)) > 0)) { ?>
		<section class="section_Pages">
			<h2><?php echo gettext("Pages"); ?></h2>
			<?php printPageMenu("list", "", "menu-active", "submenu", "menu-active"); ?>
		</section>
		<?php
	} // printPageMenu

?>

<section class="section_Archive">
	<h2><?php echo gettext("Misc"); ?></h2>
	<ul>
		<?php
  if(ZP_NEWS_ENABLED) {
  // Switch archive title Gallery or Gallery & News if zenpage is active
    $archivelinktext = gettext("Gallery And News");
  } else {
    $archivelinktext = gettext("Gallery");
  }
		if ($_zp_gallery_page == "archive.php") {
			echo "<li class='menu-active'>",printCustomPageURL($archivelinktext, "archive"),"</li>";}
		else {echo "<li>",printCustomPageURL($archivelinktext, "archive"),"</li>";}
		?>
		
		<?php if (extensionEnabled('contact_form')) { 
	// This loop enable a "menu-active" class to keep conconsistency styling with printAlbumMenu function.
		if ($_zp_gallery_page != 'contact.php') { echo '<li>',printCustomPageURL(gettext('Contact us'), 'contact', '', ''),'</li>';}
		else { echo '<li class="menu-active">',printCustomPageURL(gettext('Contact us'), 'contact', '', ''),'</li>';} } ?>
	</ul>
</section>

<?php
if (class_exists('RSS') && (getOption('RSS_album_image') || getOption('RSS_articles'))) {
	?>
	<section class="section_RSS">
		<h2><?php echo gettext("RSS"); ?></h2>
		<ul>
			<?php
			if (!is_null($_zp_current_album)) {
				printRSSLink('Album', '<li>', gettext('Album RSS'), '</li>', false, 'rss_sidebar');
				?>
				<?php
			}
			?>
			<?php
			printRSSLink('Gallery', '<li>', gettext('Gallery'), '</li>', false, 'rss_sidebar');
			?>
			<?php
			if (ZP_NEWS_ENABLED) {
				printRSSLink("News", "<li>", gettext("News"), '</li>', false, 'rss_sidebar');
			}
			?>
		</ul>
	</section>
	<?php
}
?>

<?php if ((function_exists("printUserLogin_out") ) || !zp_loggedin() && function_exists('printRegistrationForm')) {
	?>
	<section class="section_User">
			<h2><?php echo gettext("User"); ?></h2>
		<ul>
			<?php
			if (!zp_loggedin() && function_exists('printRegisterURL')) {
				?>
				<li>
					<?php
					if ($_zp_gallery_page != 'register.php') {
						printRegisterURL(gettext('Register for this site'));
					} else {
						echo gettext("Register for this site");
					}
					?>
				</li>
				<?php
			}
			if (function_exists('printFavoritesURL')) {
			// At the moment there is no way to add an active class on favorite
				printFavoritesURL(NULL, '<li>', '</li><li>', '</li>');
			}
			if (function_exists("printUserLogin_out")) {
				printUserLogin_out("<li>", "</li>", 0);
			}
			?>
		</ul>
	</section>
	<?php
}
} // custom menu check end
?>
</nav>

<!-- Menu burger : start -->
<button class="toggle_nav" aria-expanded="false">
	<span id="menu-icon-anime">
	  <span></span>
	  <span></span>
	  <span></span>
	  <span></span>
	</span>
</button>	
<!-- Menu burger : end -->