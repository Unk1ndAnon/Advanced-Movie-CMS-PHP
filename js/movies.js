var ajax_arry=[];
var ajax_index =0;
var sctp = 100;


$('.player-overlay').click(function(){
	$('.modal-overlay').css('display', 'block');
})

function returnNewUrl(querystring)
					{
						url = document.location.href;


					    var tempArray = url.split("?");
					    var baseURL = tempArray[0];
							tempArray=baseURL.split("#");
							baseURL = tempArray[0];
					    return baseURL + "?" + querystring ;
					}

function gotoPage(page){
	var url= "/index/loadmovies";
		var search_type=type;
	if(type=='mv_new') {
		search_type='movie';
		url= "/index/loadmovies";
	}
	if(type=='tv_new') {
		search_type='tv';
		url= "/index/loadmovies";
	}
			if(ajax_arry.length>0){
				$('#spinner').hide();
				for(var i=0;i<ajax_arry.length;i++){
					ajax_arry[i].abort();
				}
			}
var isload = $('#content').find('.isload').val();
if ( isload == "true" && page>0) {
	var querystring= "loadmovies=showData&data_grp="+data_grp+"&page="+page+"&abc="+abc+"&genres="+genres+"&sortby="+sortby+"&quality="+quality+"&type="+search_type+"&q="+search+"&token="+token_key;

	$('#spinner').show();

	var ajaxreq = $.ajax({
		url:url,
		type:"POST",
				data:querystring,
		cache: false,
		success: function(response){

			$('#content').find('.nextpage').remove();
			$('#content').find('.isload').remove();
			$('#spinner').hide();
			$('#content .item-container').html(response);
			$("#content .item .item-inner a img").removeAttr('style');
			setTimeout(function() {
	 	equalizeHeights('#content .item .item-inner img');
	 		}, 200);
				var stateObj = { foo: "bar" };

					history.pushState(stateObj, "MovieTV " , returnNewUrl(querystring));
		}
	});

	ajax_arry[ajax_index++]= ajaxreq;
}

}

$(function(){
				$('#spinner').hide();

	//$('#loading').show();

	/*$.ajax({
		url:"scroll.php",
		type:"POST",
		data:"actionfunction=showData&data_grp="+data_grp+"&page=1",
		cache: false,
		success: function(response){
			$('#loading').hide();
			$('#demoajax').html(response);
		}

	});*/

	$(window).scroll(function(){
return;
		var height = $('#main').height();
		var scroll_top = $(this).scrollTop();

		if(ajax_arry.length>0){
			$('#spinner').hide();
			for(var i=0;i<ajax_arry.length;i++){
				ajax_arry[i].abort();
			}
		}

		var page = $('#content').find('.nextpage').val();
		var isload = $('#content').find('.isload').val();

		//if ((($(window).scrollTop() + document.body.clientHeight) == $(window).height()) && isload == 'true') {
		if (($(window).scrollTop() >= $(document).height() - $(window).height()) && isload == "true") {

			console.log("bottom");

			$('#spinner').show();
			var url= "/index/loadmovies";
var search_type=type;
			if(type=='mv_new') {
				search_type='movie';
				url= "/index/loadmovies";
			}
			if(type=='tv_new') {
				search_type='tv';
				url= "/index/loadmovies";
			}
			var ajaxreq = $.ajax({
				url:url,
				type:"POST",
				data:"loadmovies=showData&data_grp="+data_grp+"&page="+page+"&abc="+abc+"&genres="+genres+"&sortby="+sortby+"&quality="+quality+"&type="+search_type+"&q="+search+"&token="+token_key,
				cache: false,
				success: function(response){
					$('#content').find('.nextpage').remove();
					$('#content').find('.isload').remove();
					$('#spinner').hide();
					$('#content .item-container').append(response);
					$("#content .item .item-inner a img").removeAttr('style');
					setTimeout(function() {
			 	equalizeHeights('#content .item .item-inner img');
			 		}, 200);
								}
			});

			ajax_arry[ajax_index++]= ajaxreq;

		}

		return false;

	});

});

// Load new content

/*
var ajax_arry=[];
var ajax_index =0;
var sctp = 100;

var ajaxLoading = false;
*/

$(function(){

	// Load new movies on scroll

/*
	$(window).scroll(function(){
		var height = $('#content').height();
		var scroll_top = $(this).scrollTop();
		if(ajax_arry.length>0){
			$('#spinner').hide();
			for(var i=0;i<ajax_arry.length;i++){
			  ajax_arry[i].abort();
			}
		}

		page = $('#content').find('.nextpage').val();
		isload = $('#content').find('.isload').val();

// 		<input type="hidden" class="isload" value="false">



		$(window).scroll(function () {

			if ($(window).scrollTop() >= $(document).height() - $(window).height()) {

				// console.log("bottom");

				if(!ajaxLoading) {
		            ajaxLoading = true;

		            $('#spinner').show();

					var ajaxreq = $.ajax({
						url:"/index/loadmovies",
						type:"POST",
						data:"loadmovies=showData&page="+page+"&abc="+abc+"&genres="+genres+"&sortby="+sortby+"&quality="+quality+"&type="+type+"&q="+search,
						cache: false,
						success: function(response){
							$('#content').find('.nextpage').remove();
							$('#content').find('.isload').remove();
							$('#spinner').hide();
							$('#content').append(response);
						}
					});

					ajax_arry[ajax_index++]= ajaxreq;

					ajaxLoading = false;

					page = $('#content').find('.nextpage').val() + 1;

		        }



			}
		});

		return false;

	});
*/

	// Update content (filter)

	$(".filters .dropdown-menu li").click(function(){

		var currentPage = 1;
 		//var page = $('#content').find('.nextpage').val();
 		var page = currentPage;
		var isload = $('#content').find('.isload').val();

		genres = $('input:checkbox:checked.checkbox').map(function () {
			return this.value.replace(/_/g, ' ');
		}).get();

		$('#spinner').addClass('spinner-filter');
		$('#spinner').show();
		var url= "/index/loadmovies";
			var search_type=type;
		if(type=='mv_new') {
			search_type='movie';
			url= "/index/loadmovies";
		}
		if(type=='tv_new') {
			search_type='tv';
			url= "/index/loadmovies";
		}
		var querystring= "loadmovies=showData&data_grp="+data_grp+"&page="+page+"&abc="+abc+"&genres="+genres+"&sortby="+sortby+"&quality="+quality+"&type="+search_type+"&q="+search+"&token="+token_key;

		$.ajax({
			url: url,
			type: "POST",
			data: "loadmovies=showData&data_grp="+data_grp+"&page="+page+"&abc="+abc+"&genres="+genres+"&sortby="+sortby+"&quality="+quality+"&type="+search_type+"&q="+search+"&token="+token_key,
			cache: false,
			success: function(response) {
				$('#content').find('.nextpage').remove();
				$('#content').find('.isload').remove();
				$('#spinner').hide();
				$('#spinner').removeClass('spinner-filter');
				$('#content .item-container').html(response);
				$("#content .item .item-inner a img").removeAttr('style');
				setTimeout(function() {
		 	equalizeHeights('#content .item .item-inner img');
		 		}, 200);
				var stateObj = { foo: "bar" };

					history.pushState(stateObj, "MovieTV " , returnNewUrl(querystring));
						}
		});

		// Debug
	// 	console.log(abc);
	// 	console.log(genres);
	// 	console.log(sortby);
	// 	console.log(quality);

		//    return false;

	});

	// Search change value
	$('.search-input').keypress(function(event){
			console.log('Keypressed!')
	    var keycode = (event.keyCode ? event.keyCode : event.which);

			var currentPage = 1;
// 		var page = $('#content').find('.nextpage').val();
			var page = currentPage;
			var isload = $('#content').find('.isload').val();

			search = $(this).val();
			if(!search){
				$(".auto-complete-container").html('');
			}
			$.ajax({
				url: "/ajax/search/auto",
				dataType: "json",
				data: "q="+search,
				cache: false,
				success: function(response) {
					$(".auto-complete-container").html('');
						var list = $(".auto-complete-container").append('<ul></ul>').find('ul');
						for (var i = 0; i < 10; i++) {
								if(typeof response[i] !== 'undefined'){
									list.append('<a href="'+response[i].link+'"><li><img src="'+response[i].poster+'"><p>'+response[i].title+'</p><span>'+response[i].year+'</span></li></a>');
								}
						}
					console.log(response);
				}
			});

	    if(keycode == '13') {
				event.preventDefault();

				console.log('Enter was hit.')
					//
						    var currentPage = 1;
					// 		var page = $('#content').find('.nextpage').val();
							var page = currentPage;
							var isload = $('#content').find('.isload').val();

					        search = $(this).val();

					        $('#spinner').addClass('spinner-filter');
							$('#spinner').show();
							var url= "/index/loadmovies";
								var search_type=type;
							if(type=='mv_new') {
								// alert('MV_NEW')
								search_type='movie';
								// window.location.replace( "/movies/?loadmovies=showData&data_grp="+data_grp+"&page="+page+"&abc="+abc+"&genres="+genres+"&sortby="+sortby+"&quality="+quality+"&type="+search_type+"&q="+search+"&token="+token_key);
							}
							// if(type=='tv_new') {
							// 	// alert('TV_NEW')
							// 	search_type='tv';
							// 	url= "/index/loadmovies";
							// }
							if(type=='mv_new') {
								search_type='movie';
								url= "/index/loadmovies";
								window.location.replace( "/movies/?loadmovies=showData&data_grp="+data_grp+"&page="+page+"&abc="+abc+"&genres="+genres+"&sortby="+sortby+"&quality="+quality+"&type="+search_type+"&q="+search+"&token="+token_key);
							}
							if(type=='tv_new') {
								// alert('TV_PAGE')
								search_type='tv';
								url= "/index/loadmovies";
								window.location.replace( "/tv-shows/?loadmovies=showData&data_grp="+data_grp+"&page="+page+"&abc="+abc+"&genres="+genres+"&sortby="+sortby+"&quality="+quality+"&type="+search_type+"&q="+search+"&token="+token_key);
							}
							var querystring= "loadmovies=showData&data_grp="+data_grp+"&page="+page+"&abc="+abc+"&genres="+genres+"&sortby="+sortby+"&quality="+quality+"&type="+search_type+"&q="+search+"&token="+token_key;

							if(type != 'tv_new' && type != 'mv_new') {
								$.ajax({
									url: url,
									type: "POST",
									data: "loadmovies=showData&data_grp="+data_grp+"&page="+page+"&abc="+abc+"&genres="+genres+"&sortby="+sortby+"&quality="+quality+"&type="+search_type+"&q="+search+"&token="+token_key,
									cache: false,
									success: function(response) {
										// alert('AJAX')

										$('#content').find('.nextpage').remove();
										$('#content').find('.isload').remove();
										$('#spinner').hide();
										$('#spinner').removeClass('spinner-filter');
										$('#content').html(response);
										$("#content .item .item-inner a img").removeAttr('style');
										 setTimeout(function() {
										equalizeHeights('#content .item .item-inner img');
											}, 200);
											var stateObj = { foo: "bar" };
												history.pushState(stateObj, "MovieTV " , returnNewUrl(querystring));
												$(".auto-complete-container").html('');

									}
								});
							}

	    }
	});

	$( "#search" ).submit(function(e) {
		return false;
	});



});