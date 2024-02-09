<nav id="sidebar">
<?php
// force UTF-8 Ø

if (function_exists('printCustomMenu') && getOption('zenpage_custommenu')) {
	?>
	<section>
		<?php printCustomMenu('zenpage', 'list', '', "menu-active", "submenu", "menu-active", 2); ?>
	</section>
	<?php
} else {
	if (ZP_NEWS_ENABLED) {
		?>
		<section>
			<h2><?php echo gettext("News articles"); ?></h2>
			<?php
			printAllNewsCategories(gettext("All news"), TRUE, "", "menu-active", true, "submenu", "menu-active");
			?>
		</section>
	<?php } ?>

	<?php if (function_exists("printAlbumMenu")) { ?>
		<section>
		<?php if (ZP_NEWS_ENABLED || ZP_PAGES_ENABLED) {
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
				?>
				<h2><?php echo gettext("Gallery"); ?></h2>
				<?php
			}
			printAlbumMenu("list", false, "", "menu-active", "submenu", "menu-active", '', true);
			?>
		</section>
	<?php } ?>

	<?php if (ZP_PAGES_ENABLED) { ?>
		<section>
			<h2><?php echo gettext("Pages"); ?></h2>
			<?php printPageMenu("list", "", "menu-active", "submenu", "menu-active"); ?>
		</section>
		<?php
	}
} // custom menu check end
?>

<section>
	<h2><?php echo gettext("Archive"); ?></h2>
	<ul>
		<?php
  if(ZP_NEWS_ENABLED) {
    $archivelinktext = gettext("Gallery And News");
  } else {
    $archivelinktext = gettext("Gallery");
  }
		if ($_zp_gallery_page == "archive.php") {
			echo "<li class='menu-active'>" . $archivelinktext . "</li>";
		} else {
			echo "<li>";
			printCustomPageURL($archivelinktext, "archive");
			echo "</li>";
		}
		?>
	</ul>
</section>

<?php
if (class_exists('RSS') && (getOption('RSS_album_image') || getOption('RSS_articles'))) {
	?>
	<section>
		<h2><?php echo gettext("RSS"); ?></h2>
		<ul>
			<?php
			if (!is_null($_zp_current_album)) {
				printRSSLink('Album', '<li>', gettext('Album RSS'), '</li>');
				?>
				<?php
			}
			?>
			<?php
			printRSSLink('Gallery', '<li>', gettext('Gallery'), '</li>');
			?>
			<?php
			if (ZP_NEWS_ENABLED) {
				printRSSLink("News", "<li>", gettext("News"), '</li>');
			}
			?>
		</ul>
	</section>
	<?php
}
?>

<?php
if (getOption("zenpage_contactpage") && extensionEnabled('contact_form')) {
	?>
	<section>
		<ul>
			<li>
				<?php
				if ($_zp_gallery_page != 'contact.php') {
					printCustomPageURL(gettext('Contact us'), 'contact', '', '');
				} else {
					echo gettext("Contact us");
				}
				?></li>
		</ul>
	</section>
	<?php
}
if ((function_exists("printUserLogin_out") ) || !zp_loggedin() && function_exists('printRegistrationForm')) {
	?>
	<section>
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
				printFavoritesURL(NULL, '<li>', '</li><li>', '</li>');
			}
			if (function_exists("printUserLogin_out")) {
				printUserLogin_out("<li>", "</li>");
			}
			?>
		</ul>
	</section>
	<?php
}
?>
</nav>