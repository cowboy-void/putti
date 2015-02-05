$(document).ready(function(){
	$('#search-wrapper span').click(function(){
		
		// $('#search-wrapper').removeClass('error');
		
		var url = $('#search-wrapper input').removeClass('error').val();

		if (!url || !isValidUrl(url)) {
			makeFieldUnvalid('#search-wrapper')
			return false;
		}

		var html = '<iframe src='+url+' class="iframe-preview"></iframe>';
		$('#preview-wrapper')
			.find('.view-block-container')
			.show()
			.html(html);

		getJsonTree(url);
	});

	function getJsonTree(url)
	{
		$('#jstree_demo_div').remove();
		$('#tree-wrapper').addClass('ajax-loader');

		$.ajax({
			type: "POST",
			url: '/parser/get_json',
			data: {
				'url': url
			},
			success: function(data){
				if(!data) return false;
				
				$('#tree-wrapper')
					.removeClass('ajax-loader')
					.find('.view-block-container')
					.html('<span><a href="/parser/get_json_file" target="_blank">'+
						'<i class="fa fa-download" title="download tree"></i></span>'+
						'<div id="jstree_demo_div"></div>'
						)
					.show();

				$('#jstree_demo_div').jstree({ 'core' : {'data' :data}});
				
			},
			dataType: 'json'
		});
	}

	function isValidUrl(url)
	{
	     return url.match(/^(http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&amp;:\/~\+#]*[\w\-\@?^=%&amp;\/~\+#])?$/);
	}

	function makeFieldUnvalid(elementSelector)
	{
		$(elementSelector).addClass('error');
		$(elementSelector+'-error span').text('Enter valid url!');

		setTimeout(function(){
			$(elementSelector).removeClass('error');
			$(elementSelector+'-error span').text('');
		}, 2000);
	}

	function makeFieldValid(elementSelector)
	{
		$(elementSelector).removeClass('error');
	}

});