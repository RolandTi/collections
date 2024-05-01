<ul class="foot-links">
	<?php
	echo '<li>', printCustomPageURL(gettext("Archive View"), "archive"), '</li>';
	if (extensionEnabled('contact_form')) {
		echo '<li>', printCustomPageURL(gettext('Contact us'), 'contact', '', ''), '</li>';
	}
				
	if ((function_exists("printUserLogin_out") ) || !zp_loggedin() && function_exists('printRegistrationForm')) {
		if (!zp_loggedin() && function_exists('printRegisterURL')) {
			echo '<li>', printRegisterURL(gettext('Register for this site')), '</li>';
		}
		if (function_exists('printFavoritesURL')) {
			printFavoritesURL(NULL, '<li>', '</li><li>', '</li>');
		}
		if (function_exists("printUserLogin_out")) {
			echo "<li>", printUserLogin_out('', '',''), "</li>";
		}
	}
	printPrivacyPageLink('<li>', '</li>');
	echo "<li>", printZenphotoLink(), "</li>";
	printCopyrightNotice('<li>', '</li>');
	if (function_exists('printLanguageSelector')) { 
		echo "<li>", callUserFunction('printLanguageSelector'), "</li>";
	}
	?>
</ul>

<?php zp_apply_filter('theme_body_close'); ?>

<script src="<?php echo $_zp_themeroot; ?>/js/collection.js?=v2.2"></script>