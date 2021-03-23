<div class="media_supp xl_hmar">
	<div class="media_supp_content">
		<?php 
		if(function_exists('printRating')) {
			echo '<div class="bloc-rating">';
			echo '<h2>Rating</h2>';
			echo '<div class="bloc-rating-content">';
			@call_user_func('printRating'); 
			echo '</div>';
			echo '</div>';
		 } 
		if (function_exists('printCommentForm')) {
			if ($_zp_current_image->getCommentsAllowed() || $_zp_current_image->getCommentCount()) {
				echo '<div class="bloc-comments">';
				echo '<h2>Commentaires</h2>';
				printCommentForm();
				echo '</div>';
			}
		} 
		if(function_exists('printGoogleMap')) {
			echo '<div class="bloc-gmaps">';
			@call_user_func('printGoogleMap');
			echo '</div>';
		} 
		if(function_exists('printOpenStreetMap') && (getImageData('EXIFGPSLatitude')!='')) {
			echo '<div class="bloc-osm">';
			echo '<h2>Maps</h2>';
			@call_user_func('printOpenStreetMap');
			echo '</div>';
		}
		if (getImageMetaData()) {
			echo '<div class="bloc-metadata">';
			echo '<h2>Infos</h2>';
			printImageMetadata('',false,'imagemetadata');
			echo '</div>';
	 } 
	if (class_exists('ScriptlessSocialSharing')) {
		ScriptlessSocialSharing::printButtons();
	}
	?>
		</div> <!--END media_supp_content-->
</div> <!--END media_supp-->

		<script src="<?php echo $_zp_themeroot; ?>/js/macy.js"></script>
	
	    <script>
	        var masonry = new Macy({
	container: '.media_supp_content',
	trueOrder: false,
	waitForImages: false,
	useOwnImageLoader: false,
	debug: true,
	mobileFirst: true,
	columns: 1,
	margin: 10,
	breakAt: {
		1800: {
      margin: {
        x: 96,
				y:24,
      },
      columns: 2
    },		
		1280: {
      margin: {
        x: 30,
				y:24,
      },
      columns: 2
    },
   960: {
      margin: {
        x: 30,
				y:24,
      },
      columns: 2
    },
		720: {
        margin: {
				x: 15,
				y:20,
			},
			columns: 2
			}
  }
});
</script>
