<?php if (!defined('WEBPATH')) die(); ?>
<!doctype html>
<html<?php printLangAttribute(); ?>>
<head>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="<?php echo LOCAL_CHARSET; ?>">
	<?php zp_apply_filter('theme_head'); ?>
	<?php printHeadTitle(); ?>
	<?php if (class_exists('RSS')) printRSSHeaderLink('Gallery', gettext('Gallery RSS')); ?>
	<link rel="stylesheet" href="<?php echo $_zp_themeroot; ?>/styles.css" type="text/css" />
</head>
<body>
	<?php zp_apply_filter('theme_body_open'); ?>
			<a href="#main-content" tabindex="0" class="skip-to-content">Skip to main content</a>


	<div class="grid-container">
	
		<header class="header">
				<nav class="navbar">
					<div class="navbar_title_container">
					<a href="<?php echo html_encode(getGalleryIndexURL()); ?>" 
						class="navbar_title">
						<?php printGalleryTitle(); ?>
					</a>
					</div>
					<?php include("_navbar.php"); // <ul> with all items ?>
				</nav>
		</header>

		<main class="container main two-cols xl-space news_template">
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
									printNewsPageListWithNav(gettext('next »'), gettext('« prev'), true, 'pagelist', true);
						?>
					</div>
		</main>

<footer class="footer"><?php include("_footer.php"); ?></footer>
	</div>
</body>
</html>