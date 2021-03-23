<ul class="foot-links">
<?php echo '<li>';	printCustomPageURL(gettext("Archive View"), "archive"); echo '</li>';
	?>
<?php if (extensionEnabled('contact_form')) {
		if ($_zp_gallery_page != 'contact.php') {
		echo '<li>';
		printCustomPageURL(gettext('Contact us'), 'contact', '', '');
		echo '</li>';
		} else { 
				echo '<li>';
echo gettext("Contact us");
echo '</li>';} 
		} ?>
<?php if ((function_exists("printUserLogin_out") ) || !zp_loggedin() && function_exists('printRegistrationForm') || class_exists('mobileTheme')) {
		?>
				<?php
				if (!zp_loggedin() && function_exists('printRegisterURL')) {
						if ($_zp_gallery_page != 'register.php') {
							echo '<li>';
							printRegisterURL(gettext('Register for this site'));
							echo '</li>';
						} else {
							echo '<li>';
							echo gettext("Register for this site");
							echo '</li>';
						}
				}
if ((function_exists("printUserLogin_out") ) || !zp_loggedin() && function_exists('printRegistrationForm')) {

			if (function_exists('printFavoritesURL')) {
				printFavoritesURL(NULL, '<li>', '</li>
<li>', '</li>');
			}
			if (function_exists("printUserLogin_out")) {
			echo "
<li>";
	printUserLogin_out('', '','');
echo "</li>";

			}
}			}
			?>
			<li>
				<?php @call_user_func('printLanguageSelector');  ?>
			</li>
</ul>

<?php #printGalleryDesc(); ?>

<?php 
@call_user_func('mobileTheme::controlLink'); 
zp_apply_filter('theme_body_close'); 
?>
				<script>
const toggleMenu = document.querySelector(".navbar button");
const menu = document.querySelector(".navbar ul");

toggleMenu.addEventListener("click", function () {
  const open = JSON.parse(toggleMenu.getAttribute("aria-expanded"));
  toggleMenu.setAttribute("aria-expanded", !open);
  menu.hidden = !menu.hidden;
});
				</script>
