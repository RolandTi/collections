<?php
zp_register_filter('themeSwitcher_head', 'switcher_head');
zp_register_filter('themeSwitcher_Controllink', 'switcher_controllink');
zp_register_filter('theme_head', 'css_head', 500);
#enableExtension('zenpage', 0, false); //	we do not support it

$_zp_page_check = 'checkPageValidity'; //	opt-in, standard behavior
?>