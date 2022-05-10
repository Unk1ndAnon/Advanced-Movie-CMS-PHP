

<script data-cfasync="false" src="/js/email.js"></script><script type="text/javascript">
         $(function(){
         
            //  $('.login-submit').click(function(){
         
         	//     var username = $("#signin-username").val();
         	//     var password = $("#signin-password").val();
         	//     var return_url = window.location.href;
         
            //      $.ajax({
            //          url: '/session/loginajax',
            //          type: 'POST',
            //          data: {
            //              "username": username,
            //              "password": password,
            //              "return_url": return_url
            //          },
            //          dataType: 'json',
            //          success: function(response) {
         
            //              //Check to see if the validation was successful
         
            //              if (response.error_code == 1) {
         	//                 location.reload();
            //              } else {
         	//                 $('.user-modal-container').addClass('shake animated');
         	// 				setTimeout(function () {
         	// 				    $('.user-modal-container').removeClass('shake animated');
         	// 				}, 1000);
            //                  $(".login-error").text("Wrong username or password")
            //              }
            //          }
            //      });
         
            //  });
         });
      </script>
      <script src="/js/slidebar.js"></script>
      <script src="/js/movies.js"></script>
      <script src="/js/scrollbar.js"></script>
      <script src="/js/actions.js"></script>
      <script src="/js/scrolling.js"></script>
      <script src="/js/custom.js"></script>
    
      <script type="text/javascript">
         function getParameterByName(name, url) {
             if (!url) url = window.location.href;
             name = name.replace(/[\[\]]/g, "\\$&");
             var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                 results = regex.exec(url);
             if (!results) return null;
             if (!results[2]) return '';
             return decodeURIComponent(results[2].replace(/\+/g, " "));
         }
         
         	(function($){
         		var querystring = window.location.search;
         querystring = querystring.replace("?", '');
         	console.log("index loaded: "+querystring);
         	if(querystring.indexOf("page=")>-1 ){
         console.log("load page ");
         if(getParameterByName('sortby'))
         sortby =getParameterByName('sortby');
         $(".sortby-filter span.value").text(sortby);
         if(getParameterByName('abc'))
         abc=getParameterByName('abc');
         $(".abc-filter span.value").text(abc);
         if(getParameterByName('quality'))
         quality=getParameterByName('quality');
         $(".quality-filter span.value").text(quality);
         if(getParameterByName('search'))
         search=getParameterByName('search');
         $("#search").val(search);
         if(getParameterByName('genres')){
         genres=getParameterByName('genres');
         
         var genres_array  = genres.split(",");
         if(genres_array.length>1){
          $(".genre-filter span.value").text(genres_array.length+ " selected");
         
         }else
         $(".genre-filter span.value").text(genres);
         }
         		$('#spinner').show();
         
         		var ajaxreq = $.ajax({
         			url:"/index/loadmovies",
         			type:"POST",
         					data:querystring,
         			cache: false,
         			success: function(response){
         				$('#content').find('.nextpage').remove();
         				$('#content').find('.isload').remove();
         				$('#spinner').hide();
         				$('#content .item-container').html(response);
         				equalizeHeights('#content .item .item-inner img');
         			}
         		});
         
         	}
         		$(window).load(function() {
         
         			// Fix heights on page load
         			equalizeHeights('#content .item .item-inner  img');
         
         			// Fix heights on window resize
         			$(window).resize(function() {
         
         				// Needs to be a timeout function so it doesn't fire every ms of resize
         				setTimeout(function() {
         		      		equalizeHeights('#content .item .item-inner  img');
         				}, 60);
         			});
         		});
         	})(jQuery);
         
         
         
         
         
         
         
      </script>

    <?php 
    if($theme_dt['custom_js']) echo "<script>".$theme_dt['custom_js']."</script>";

  if($site_dt['analytics']) echo $site_dt['analytics'];
   if($ads_dt['pop_ads']) echo $ads_dt['pop_ads'];
   if($ads_dt['ads_4']) echo $ads_dt['ads_4'];
   ?>
  



 