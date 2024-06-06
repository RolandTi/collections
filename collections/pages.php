<?php include("_inc/inc-header.php"); ?>
	<body>
		<?php zp_apply_filter('theme_body_open'); ?>
		<a href="#main-content" tabindex="0" class="skip-to-content">Skip to main content</a>
	
		<div class="grid-container <?=$navbar;?>bar-layout">
		
			<?php include '_inc/inc-'.$navbar.'bar.php'; ?>
			
			<main class="pages-layout">

			<article>
			<figure aria-hidden="true">
			<?php
			if (function_exists('printSizedFeaturedImage')) {
				printSizedFeaturedImage(null,'', null, 1200, null, null, null, null, null, 'featuredimage_singlepage', null, false, null, true);} ?>
			</figure>
			
			<h1><?php printPageTitle(); ?></h1>
			
			<?php
					printPageContent();
					printCodeblock(1);
					printTags('links', '', 'taglist', ' ');

					?>
			</article>
		
				<aside class="media_supp xl_hmar">
					<div class="media_supp_content">
						<div class="media_supp_content_col"></div>
						<div class="media_supp_content_col">
							<?php 
								if (function_exists('printCommentForm')) {
									if ($_zp_current_zenpage_page->getCommentsAllowed() || $_zp_current_zenpage_page->getCommentCount()) {
										echo '<section class="bloc-comments">';
										echo '<h2>'.gettext('Comments').'</h2>';
										printCommentForm();
										echo '</section>';
									}
								} 
								?>
							</div>
						</div> <!--END media_supp_content-->
				</aside> <!--END media_supp-->

		</main>

		<footer class="footer">
			<?php include("_inc/inc-footer.php"); ?>
		</footer>
	</div>
</body>
</html>







