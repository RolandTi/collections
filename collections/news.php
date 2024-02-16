<?php include("_inc/inc-header.php"); ?>


<?php 
if (getOption('collections_sidebar')) {
	$navbar = "side";
	}
else { 
	$navbar = "top";
	}
?>

	<body>
		<?php zp_apply_filter('theme_body_open'); ?>
		<a href="#main-content" tabindex="0" class="skip-to-content">Skip to main content</a>
	
		<div class="grid-container <?=$navbar;?>bar-layout">
		
			<?php include '_inc/inc-'.$navbar.'bar.php'; ?>
			
			<main class="<?=$active_template ?>">

							<?php // single news article
						if (is_NewsArticle()) { ?>
												<div class="article_single">
						<?php if (getPrevNewsURL()) { ?>
							<div class="singlenews_prev"><?php printPrevNewsLink(); ?></div><?php }
       if (getNextNewsURL()) { ?><div class="singlenews_next"><?php printNextNewsLink(); ?></div>
			 <?php }
       if (getPrevNewsURL() OR getNextNewsURL()) { ?><?php }
       ?>
							<h1><?php printNewsTitle(); ?></h1>
									<div class="article_infos">
											<?php printNewsDate(); if (function_exists('getCommentCount')) { ?> | <?php echo gettext("Comments:"); ?>
												<?php echo getCommentCount(); } ?>
										<?php echo ' | '; printNewsCategories(", ", gettext("Categories: "), "newscategories");
										?>
									</div>
							<?php
							printNewsContent();
							printCodeblock(1);
							?>
							<?php printTags('links',' ', 'taglist', '  '); ?>
							
							<?php 
									if(function_exists('printRating')) {
			echo '<section class="bloc-rating">';
			echo '<div class="bloc-rating-content">';
			@call_user_func('printRating'); 
			echo '</div>';
			echo '</section>';
		 } 
		 		if (function_exists('printCommentForm')) {
			echo '<section class="bloc-comments">';
			echo '<h2>Commentaires</h2>';
			printCommentForm();
			echo '</section>';
		} ?>


												</div> <!--END	article_single-->
							<?php
						} 
						else {
							?>
							<div class="article_loop">
							<?php
							// news article loop
							while (next_news()):;
								?>
								<article>
									<h2><?php printNewsURL(); ?></h2>
									<div class="article_infos">
											<?php printNewsDate(); if (function_exists('getCommentCount')) { ?> | <?php echo gettext("Comments:"); ?>
												<?php echo getCommentCount(); } ?>
										<?php echo ' | '; printNewsCategories(", ", gettext("Categories: "), "newscategories");
										?>
									</div>
									<?php printNewsContent(); printCodeblock(1); printTags('links', '', 'taglist', ''); ?>
								</article>
								<?php
							endwhile; 
							printNewsPageListWithNav(gettext('next »'), gettext('« prev'), true, 'pagelist', true);
						if(class_exists('ScriptlessSocialSharing')) {
							ScriptlessSocialSharing::printButtons();
						}	
													?>
							</div> <!--END article_loop-->
							<?php }	?>

					<div class="article_side">
						<h1 class="page_title"><?php echo gettext("News"); ?></h1>

						<?php # Showing Categories
									printAllNewsCategories(gettext("All Categories"),false,"categories_list","categories_list_active");
						?>
					</div>
		</main>

<footer class="footer"><?php include("_inc/inc-footer.php"); ?></footer>
	</div>
</body>
</html>