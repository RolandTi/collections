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
	<?php zp_apply_filter('theme_body_open');
			$total = getNumImages() + getNumAlbums();
			if (!$total) { $_zp_current_search->clearSearchWords(); } ?>
	
	
		<div class="grid-container">
		<header class="header">
			<nav class="navbar">
				<div class="navbar_title_container"><a href="<?php echo html_encode(getGalleryIndexURL()); ?>" class="navbar_title">
					<?php printGalleryTitle(); ?></a></div>
				<?php include("_navbar.php"); // <ul> with all items ?>
			</nav>
		</header>
		
		<main class="main">
			<h1><?php echo gettext('Search Results'); ?></h1>
			
						<?php
				$searchwords = getSearchWords();
				$searchdate = getSearchDate();
				if (!empty($searchdate)) {
					if (!empty($searchwords)) {
						$searchwords .= ": ";
					}
					$searchwords .= $searchdate;
				}
				if ($total > 0 ) { ?>
				<div id="description"><?php printf(ngettext('%1$u Hit for <em>%2$s</em>','%1$u Hits for <em>%2$s</em>',$total), $total, html_encode($searchwords));?></div>
				<?php } else { ?>
				<div id="description"><?php echo gettext('Sorry, no matches found. Try refining your search.'); ?></div>
				<?php } ?>


				<?php
$zenpagecount = 0;
$numimages = getNumImages();
$numalbums = getNumAlbums();
$total = $numimages + $numalbums;
if ($total > 0) { $showpag = true; } else { $showpag = false; }
if ($zenpage && !isArchive()) {
	$numpages = getNumPages();
	$numnews = getNumNews();
	$zenpagecount = $numpages + $numnews;
	$total = $total + $zenpagecount;} 
else {	$numpages = $numnews = 0; }
if ($total == 0) { $_zp_current_search->clearSearchWords(); } ?>

	<?php while (next_album()): ?>
								<figure class="sub_album folder"><a href="<?php echo html_encode(getAlbumURL()); ?>">
						<?php printCustomAlbumThumbImage(getAnnotatedAlbumTitle(), null, 600, 600, 600, 600, NULL, null, NULL,NULL); ?>
						<figcaption class="album-title"><?php printAlbumTitle(); ?></figcaption>
					</a></figure>
					<?php endwhile; ?>
					
				<?php while (next_image()): ?>
							<figure class="macy_element"><a href="<?php echo html_encode(getImageURL()); ?>" title="<?php printBareImageTitle(); ?>">
						<img 
						src="<?php echo html_encode(getCustomImageURL(NULL,500,NULL,NULL,NULL,NULL,NULL,false,NULL)); ?>" 
						alt="<?php echo getBareImageTitle(); ?>" 
						width="<?php echo getFullWidth(); ?>" 
						height="<?php echo getFullHeight(); ?>" />
						</a></figure>
					<?php endwhile; ?>
					
<?php if (($showpag) && ((hasNextPage()) || (hasPrevPage()))) printPageListWithNav("« " . gettext("prev"), gettext("next") . " »"); ?>
				
				<?php if (($zenpage) && ($zenpagecount > 0) && ($_zp_page == 1)) { ?>
			
				<?php if ($numpages > 0) { ?>
				<div class="zp-pages">
					<?php while (next_page()) { ?>
					<article class="news-clip">
						<h3><a href="<?php echo html_encode($_zp_current_zenpage_page->getLink()); ?>"><?php printPageTitle(); ?></a></h3>
						<div class="news-content"><?php echo shortenContent(strip_tags(getPageContent()),180,getOption('zenpage_textshorten_indicator')); ?></div>
					</article>
					<?php } ?>
				</div>
				<?php } ?>
			
				<?php if ($numnews > 0) { ?>
				<div class="zp-news">
					<?php while (next_news()) { ?>
					<article class="news-clip">
						<h3><?php printNewsURL(); ?></h3>
						<div class="news-info">
							<span><i class="fa fa-calendar-o"></i>&nbsp;<?php printNewsDate(); ?>&nbsp;</span>
							<?php if (function_exists('getCommentCount')) { ?>
							<span><i class="fa fa-comments-o"></i>&nbsp;<?php echo gettext('Comments:').' '.getCommentCount(); ?>&nbsp;</span>
							<?php } ?>
							<?php if (getNewsCategories()) { ?><span><?php printNewsCategories(', ','','catlist'); ?></span><?php } ?>
						</div>
						<div class="news-content"><?php echo shortenContent(strip_tags(getNewsContent()),180,getOption('zenpage_textshorten_indicator')); ?></div>
						<?php if (getCodeBlock(1)) { ?><div class="codeblock"><?php printCodeblock(1); ?></div><?php } ?>
						<?php if (getTags()) printTags('links','','taglist',''); ?>
					</article>
					<?php } ?>
				</div>
				<?php } ?>
			
				<?php } ?>


				</main>
		
		<footer class="footer"><?php include("_footer.php"); ?></footer>
	</div>
</body>
</html>