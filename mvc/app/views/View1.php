<!DOCTYPE html>
<html>
	<head>
		<title>Dawkins RSS Viewer</title>
		<meta charset="UTF-8">
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<link rel="stylesheet" type="text/css" href="resources/css/style1.css">
	</head>
	
	<body>
		<div id='banner'>
			News Feed
		</div>

		
		<hr>
		<div class="product_container"><div class="outer-center"><div class="product inner-center">

			<div class='bordered curved little_border container1'>
				<h2 style="text-align:center">Latest News and Headlines</h2>

				<div id="feed"> 
					<?php echo $news_feed_html ?>	
				</div>				
			</div>	
			
		</div></div><div class="clear"></div></div>
		
		
		<div style="height:10px"></div>
		
		<input type="text" placeholder="Search Yahoo News Feed" 	id="search" class="curved">
		<div style="height:10px"></div>
		
		<button class='button1'> Submit Query </button>
		<div style="height:10px"></div>
			
		
		<div class="product_container"><div class="outer-center"><div class="product inner-center">

			<div class='bordered curved little_border container2' style='display:none;' >
				<h2 style='text-align:center' id='result_title'></h2>
				<div id="search_results"></div>			
			</div>	
			
		</div></div><div class="clear"></div></div>
		
		<div style='height:200px'></div>
		
		<script>
			var base_url = '<?php echo _base_url ?>';	
			//must be outside js file because it evokes php	
		</script>
		<script src="resources/js/script1.js"></script>
	</body>

</html>










