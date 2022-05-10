
var first=true;

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};


$(document).ready(function(){
  // id;
  // //  loadSeason;
  // var season = 1;
  // var episode = 1;
  //
//    if (window.location.search.indexOf('recent=true') > -1) {
//       episode = getUrlParameter('episode');
//       season = getUrlParameter('season');
//     } else {
//       episode = $('.tv-details-episodes ol li.active').attr("data-episode");
//       season = $('.tv-details-seasons ol li.active').attr("data-season");
//     }
  //
      setTimeout(function(){
          usedPass = false;

  //        $.ajax({
  //          url: "/series/getLink",
  //          dataType: "json",
  //          data: "id="+id+"&s="+season+"&e="+episode+"&token="+token_key,
  //          cache: false,
  //          success: function(response) {
  //
  //            videoSource = $("#video video").attr("src", response.url.p720);
  //            videoUrl = $("#video video source").attr("src", response.url.p720);
  //            $("#video video")[0].load();
  //             if('p720' in response.url){
  //               var downloadLink = response.url.p720+'&dl=1';
  //               $("#dlbtn-premium").attr("href", downloadLink);
  //               console.log(downloadLink);
  //               console.log('Updated download link!')
  //             }
  //
  //          },
  //             error: function (request, status, error) {
  //               console.log(error)
  //               console.log('Episode not avai lable yet.')
  //           }
  //        });
  //

      })

});


$(".tv-details-seasons ol li").click(function(){

  season = $(this).attr("data-tab").replace(/\D/g,'');
  episode_number = 1;
//  var episode = $(this).index()+1;
  console.log("id="+id+"&s="+season+"&token="+token_key);
  $('ol.active li[data-episode='+episode+']').addClass('active')
  $.ajax({
    url: "/series/season",
    dataType: "json",
    data: "id="+id+"&s="+season+"&token="+token_key,
    cache: false,
    success: function(response) {
      console.log(response)
      seasonData = response;
      episodeNumber = seasonData[episode-1].episode_number;
      episodeTitle = seasonData[episode-1].title;
      episodePlot = seasonData[episode-1].plot;
      episodePoster = seasonData[episode-1].poster;
      episodeReleasedata = seasonData[episode-1].release_date;
     
      if(episodePoster){
        $(".tv-details-episodes-info .episode-info").html("<h2>"+episodeTitle+"</h2><p class='release-info'>Season "+season+", Episode "+ episodeNumber+" <br/> Air date: "+episodeReleasedata+"</p><img src='"+episodePoster+"'><p class='episode-synopsis'>"+episodePlot+"</p>");
      } else {
        $(".tv-details-episodes-info .episode-info").html("<h2>"+episodeTitle+"</h2><p class='release-info'>Season "+season+", Episode "+ episodeNumber+" <br/> Air date: "+episodeReleasedata+"</p><p class='episode-synopsis' style='padding-left:0px'>"+episodePlot+"</p>");
      }
    //  truncateEpisodeDetails();
    }
  });
});

  var _oPid="";





var videoSource = $("#video video").attr("src");
var videoUrl = $("#video video source").attr("src");

$(".tv-details-episodes ol li").click(function(){
  usedPass = false;

//  var season = $(this).attr("data-tab").replace(/\D/g,'');
  episode = $(this).attr("data-episode");
  var listIndex = episode - 1;
  seasonNumber = $('.tv-details-seasons ol li.active').attr('data-season');

  var episodeObject = $.grep(seasonData, function(e){ return e.episode_number == episode; });
  if (episodeObject.length == 0) {
    // not found
    console.log('No episode found.')
  } else if (episodeObject.length == 1) {
    // access the foo property using result[0].foo
    episodeNumber = episodeObject[0].episode_number;
    episodeTitle = episodeObject[0].title;
    episodePlot = episodeObject[0].plot;
    episodePoster = episodeObject[0].poster;
    episodeReleasedata = episodeObject[0].release_date;
    if(episodePoster){
      $(".tv-details-episodes-info .episode-info").html("<h2>"+episodeTitle+"</h2><p class='release-info'>Season "+season+", Episode "+ episodeNumber+" <br/> Air date: "+episodeReleasedata+"</p>");
    } else {
      $(".tv-details-episodes-info .episode-info").html("<h2>"+episodeTitle+"</h2><p class='release-info'>Season "+season+", Episode "+ episodeNumber+" <br/> Air date: "+episodeReleasedata+"</p><p class='episode-synopsis' style='padding-left:0px'>"+episodePlot+"</p>");
    }
  } else {
    // multiple items found
    console.log('Multiple episodes found.')
  }

 // jwPlayerInstance.remove();
   _oPid="";
   var videoList = {};

   $.ajax({
     url: "/series/getTvLink",
     dataType: "json",
     data: "id=" + videoId + "&token=" + token_key + "&s=" + season + "&e=" + episode + "&oPid=" + _oPid,
     cache: false,
     success: function (streamRS) {
      serverStream =streamRS;
	setupPlayer(streamRS);
	 if(streamRS.server){
server=streamRS.server;
setupServer();
   }


       if (first && season == 1 && episode == 1) {

       } else
         jwPlayerInstance.play();
       first = false;
       $("html, body").animate({
         scrollTop: 0
       }, "slow");
     },
     error: function (request, status, error) {
       console.log('Error couldnt get movie');
       console.log(error)
     }
   });
});

function playMovie() {
  $('html, body').animate({
    scrollTop: $("#video").offset().top - 80
  }, 500);
  $("#video video").get(0).play();
}