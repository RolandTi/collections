	    <script>
	        var masonry = new Macy({
	container: '#album_masonry',
	trueOrder: false,
	waitForImages: false,
	useOwnImageLoader: false,
	mobileFirst: true,
	columns: 2,
	margin: 10,
	breakAt: {
		1800: {
      margin: {
        x: 76,
				y:76,
      },
      columns: 4
    },
		1280: {
      margin: {
        x: 56,
				y:56,
      },
      columns: 4
    },
   950: {
      margin: {
        x: 30,
				y:30,
      },
      columns: 3
    },
		520: {
        margin: {
				x: 15,
				y:20,
			},
			columns: 2
			}
  }
});

masonry.runOnImageLoad(function () {
  masonry.recalculate(true, true);
});

//    macy.runOnImageLoad(function() {
//        macy.recalculate(true, true);
//        $("#album_masonry").removeClass("hide");
//    });
// What if javascript not activated ? ^^'

</script>