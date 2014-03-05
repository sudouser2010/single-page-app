$( document ).ready(function() {


	
	function get_top_stories()
	{
		$.ajax
		({
			url: base_url+"update", 
			dataType : 'json',
			success: function(result) 
			{
				$("#feed").html(result['feed']);
			}
		});
	}

	
	function continuously_update_feed()
	{
		/*
			this function updates the top stories every 12 seconds
			note the ttl for Yahoo's feed is 5 seconds
			
			I did this because I want the user to see the most up to date news
			without refreshing site
		*/
		get_top_stories();							//this updates the feed once initially
		setInterval(get_top_stories, 12000);		//this the feed every 12 seconds 
		
	}

	
	function get_search_results()
	{
		user_input = $("#search").val();
		local_data = new FormData();
		local_data.append('input', user_input );

		$.ajax
		({
			type: 'POST',
			data: local_data, 
			processData: false, 
			contentType: false,
			url: base_url+"search", 
			dataType : 'json',
			success: function(result) 
			{
				if(result['search_results']=='')
				{
					result['search_results']= '<h2 style="text-align:center">No Items Found</h2>';
				}
				
				$("#search_results").html(result['search_results']);
				$('.container2').show();
				$('#result_title').html('Top Five Results For '+ user_input );
			}
		});				
	
	}
	

	//---------------------------if user hits enter key ,while focused on search, or clicks button1 then get search results
	$('#search').keypress(function(event){
		if(event.keyCode == 13){
			get_search_results();
		}
	});
	
	$('.button1').click(function()
	{
		get_search_results();
		
	});		
	//---------------------------if user hits enter key ,while focused on search, or clicks button1 then get search results
	
	continuously_update_feed();

});

