  <script src="/assets/js/sticker.min.js"></script>
  <script src="/assets/js/jquery-3.2.0.min.js"></script>
	<script src="/assets/js/jquery.easypiechart.min.js"></script>
	<script src="/assets/js/spectragram.min.js"></script>
	<script src="/assets/js/twitterfetcher.min.js"></script>        
  <script src="/assets/js/uikit.min.js"></script>
  <script src="/assets/js/uikit-icons.min.js"></script>
  <script src="/assets/js/isotope.pkgd.min.js"></script>
  <script src="/assets/js/owl.carousel.min.js"></script>
  <script src="/assets/js/theme.js"></script>
  
  <script src="/assets/js/jquery-3.3.1.min.js"></script>
	<script src="/assets/js/instagramFeed.js"></script>
	<script>
		$(function () {
			$('#instagramImages').instagramFeed({
			
				//Main Options
				accessToken: '6374062034.1677ed0.da10ab3d68ed406099d6865e03966865', // Enter your Instagram account Access Token. You can generate it here: http://instagram.pixelunion.net
				pluginWidth: '100', // Feed width in percents
				postsQuantity: '10', // Number of photos to display initially
				columnsQuantity: '3', // Number of columns in the feed: 2 or 3
				columnsQuantity480: '3', // Number of columns in the feed when width is less than 480px: 2 or 3
				spaceBetweenImages: '1', // Space between the photos in the feed. Min: 0, Max: 3
				borderRadius: '5', // Photos corner radius. Max: 50
				overlayColor: '#000', // Photos overlay color on rollover
				overlayOpacity: '0.7', // Photos overlay opacity on rollover. Min: 0, Max: 1
				likesColor: '#fff', // Color of photo likes
				commentsColor: '#fff', // Color of photo comments
				iconsColor: '#fff', // Color of the likes and comments icons
				openLinks: '_blank', // Open Instagram links in the same or new browser tab: _self or _blank
				
				//Load More Button Options
				loadmoreBtnText: 'ZOBRAZIT VÍCE', // Load More button text
				loadmoreBtnWidth: '150px', // Load More button width
				loadmoreBtnHeight: '45px', // Load More button height
				loadmoreBtnTextSize: '13px', // Load More button text size
				loadmoreBtnFontFamily: 'roboto', // Load More button text font
				loadmoreBtnTextColor: '#fff', // Load More button text color
				loadmoreBtnTextOnHover: '#fff', // Load More button text color on rollover
				loadmoreBtnBackground: '#dd3333', // Load More button background color
				loadmoreBtnBackgroundOnHover: 'black', // Load More button background color on rollover
				loadmoreBtnBorderRadius: '5px', // Load More button corner radius								
				loadmoreBtnHide: 'true', // Hide Load More button: false, true
			});
		});
	</script>
    
    <style>
    .instaWrap{width:9% !important;}
    </style>