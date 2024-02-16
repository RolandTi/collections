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

					<?php
					$zenpage = extensionEnabled('zenpage');
					$numimages = getNumImages();
					$numalbums = getNumAlbums();
					$total = $numimages + $numalbums;
					if ($zenpage && !isArchive()) {
						$numpages = getNumPages();
						$numnews = getNumNews();
						$total = $total + $numnews + $numpages;
					} else {
						$numpages = $numnews = 0;
					}
					if ($total == 0) {
						$_zp_current_search->clearSearchWords();
					}
					$searchwords = getSearchWords();
					$searchdate = getSearchDate();
					if (!empty($searchdate)) {
						if (!empty($searchwords)) {
							$searchwords .= ": ";
						}
						$searchwords .= $searchdate;
					}
					if ($total > 0) {
						?>
					<div class="album_head container">	
						<h1 class="page_title">
							<?php
							printf(ngettext('%1$u Hit for <em>%2$s</em>', '%1$u Hits for <em>%2$s</em>', $total), $total, html_encode($searchwords));
							?>
						</h1>
						<?php 		if (getOption('Allow_search')) {
				printSearchForm("", "search_alt", "", gettext("Search"));
				}	?>
					</div>
						<?php
					} ?>
					<div class="container search_template">
					<?php
					if ($zenpage && $_zp_page == 1) { //test of zenpage searches
						if ($numpages > 0 && ZP_PAGES_ENABLED) {
							$number_to_show = 5;
							$c = 0;
							?>
							<h2><?php printf(gettext('Pages (%s)'), $numnews); ?></h2>
							<ul class="pages_search_blocs">
								<?php
								while (next_page()) {
									$c++;
									?>
									<li>
										<h3><?php printPageURL(); ?></h3>
										<p><?php echo shortenContent(getBare(getPageContent()), 80, getOption("zenpage_textshorten_indicator")); ?></p>
									</li>
									<?php
								}
								?>
							</ul>
							<?php
						}
						if ($numnews > 0 && ZP_NEWS_ENABLED) {
							$number_to_show = 5;
							$c = 0;
							?>
							<h2><?php printf(gettext('Articles (%s)'), $numnews); ?></h2>
							<ul class="pages_search_blocs">
								<?php
								while (next_news()) {
									$c++;
									?>
									<li>
										<h3><?php printNewsURL(); ?></h3>
										<p><?php echo shortenContent(getBare(getNewsContent()), 80, getOption("zenpage_textshorten_indicator")); ?></p>
									</li>
									<?php
								}
								?>
							</ul>
							<?php
						}
					}
					?>
					<h2>
						<?php
						if (getOption('search_no_albums')) {
							if (!getOption('search_no_images') && ($numpages + $numnews) > 0) {
								printf(gettext('Images (%s)'), $numimages);
							}
						} else {
							if (getOption('search_no_images')) {
								if (($numpages + $numnews) > 0) {
									printf(gettext('Albums (%s)'), $numalbums);
								}
							} else {
								printf(gettext('Albums (%1$s) &amp; Images (%2$s)'), $numalbums, $numimages);
							}
						}
						?>
					</h2>
											<ul class="search_images_bloc">

						<?php if (getNumAlbums() != 0) { ?>
	<?php while (next_album()): ?>
							<li>
						<figure>
							<div class="album_thumb_container">
								<a href="<?php echo html_encode(getAlbumURL()); ?>"><?php printCustomAlbumThumbImage(getAnnotatedAlbumTitle(), 900, NULL, NULL, NULL, NULL, NULL, null, NULL,NULL); ?></a>
							</div>

							<figcaption class="album-title"><?php printAlbumTitle(); ?></figcaption>
						</figure>
							</li>
						<?php endwhile; ?>
					<?php } ?>
						<?php if (getNumImages() > 0) { ?>
	<?php
	$count = '';
	while (next_image()) {
		$count++;
				switch($count) {
					case 1:
						$imgclass = ' ui-block-a';
						break;
					case 2:
						$imgclass = ' ui-block-b';
						break;
					case 3:
						$imgclass = ' ui-block-c';
						break;
					case 4:
						$imgclass = ' ui-block-d';
						$count = ''; // reset to start with a again;
						break;
				}
	?>
				<li>
						<a href="<?php echo html_encode(getImageURL()); ?>" title="<?php printBareImageTitle(); ?>">
						<figure><img 
						src="<?php echo html_encode(getCustomImageURL(NULL,500,NULL,NULL,NULL,NULL,NULL,false,NULL)); ?>" 
						alt="<?php echo getBareImageTitle(); ?>" 
						width="<?php echo getFullWidth(); ?>" 
						height="<?php echo getFullHeight(); ?>" /></figure>
						</a>
				</li>
	<?php } ?>
						</ul>
					<?php } ?>
					<?php
					if ($total == 0) {
						echo "<p>" . gettext("Sorry, no matches found. Try refining your search.") . "</p>";
					}
					?>
					<div class="pagelist-container">
				<?php printPageListWithNav("← " . gettext("prev"), gettext("next") . " →"); ?>
					</div>

					</div>

				</main>
		
		<footer class="footer"><?php include("_inc/inc-footer.php"); ?></footer>
	</div>
</body>
</html>