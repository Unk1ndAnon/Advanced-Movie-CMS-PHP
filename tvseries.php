<?php 
include('includes/connect.php');
include('includes/functions.php');

preg_match('/-(\d+)/',$_SERVER['REQUEST_URI'],$slug_id);


// var_dump($_SERVER['REQUEST_URI']);
// var_dump($slug_id);

// die();

$show_id=(int)$slug_id[1]-$tv_url_id_addon;
$show_id=mysqli_real_escape_string($con,$show_id);

// var_dump($tv_url_id_addon);
$query="select * from shows where id='$show_id'";
$data=query_data($query,"UNITARY");

// var_dump($sho);
// die(); 


if(!$data)
{
  header('location: /404.php');
}


$description=$data['description'];


$genre=str_replace(';','',$data['genre']);
// $genre=explode(',',$genre);

$country=$data['country'];
$year = $data['release_year'];
$image=$data['img_src'];
$cover='/cover/'.$image;
$show_id=$data['id'];
$rating=$data['imdb_rating'];


$title=$data['show_name'];



$query="select * from seasons where show_id='$show_id' order by id desc";
$season_dt=query_data($query);

// var_dump($season_dt);
// die();




$seo_dt=query_data("SELECT * from seo","UNITARY");

replace_code($seo_dt['show_tit']);
replace_code($seo_dt['show_desc']);

$seo_dt['show_desc']=strip_tags($seo_dt['show_desc']);


?>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $seo_dt['show_tit']?> </title>
    <meta name="keywords" content="">

    <meta name="description" content='<?php echo $seo_dt['show_desc']?> '>
    <meta name="twitter:description" content="<?php echo $seo_dt['show_desc']?> ">

    <meta name="author" content="<?php echo $site?>">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="content-language" content="en-us">


    <meta name="rating" content="General" />
    <meta name="classification" content="Movies, TV" />
    <meta name="distribution" content="Global" />

    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $seo_dt['show_tit']?>" />
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@<?php echo $site?>">
    <meta name="twitter:title" content="<?php echo $seo_dt['show_tit']?>">

    <?php include('includes/head.php')?>


</head>






<body class="detail detail-tvshow"
    style="background: linear-gradient( rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7) ), url('<?php echo "/cover/".$image?>') no-repeat center center fixed;display:inherit">
    <!-- Google Tag Manager (noscript) -->

    <!-- End Google Tag Manager (noscript) -->
    <script type="text/javascript">
        type = "tv_page";
    </script>
    <style>
        .detail #content {
            margin-top: 70px;
        }

        .video-js .vjs-text-track-display {
            bottom: 4.5em;
            left: 1em;
            position: absolute;
            right: 1em;
            text-align: center;
        }

        .video-js {
            -moz-user-select: none;
            background-color: #000;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            padding: 0;
            position: relative;
            vertical-align: middle;
        }

        .video-js .vjs-text-track {
            background-color: rgba(0, 0, 0, 0) !important;
            font-size: 1.4em;
            margin-bottom: 0.1em;
            text-align: center;
        }

        .vjs-menu-content {
            font-size: 14px;
        }

        .vjs-selected {
            font-size: 14px;
        }

        .vjs-default-skin .vjs-menu-button .vjs-menu .vjs-menu-content {
            bottom: 1.1em !important
        }

        .select {
            position: relative;
            color: rgba(255, 255, 255, .7);
            background: #414141;
            height: 30px;
            padding: 0 30px 0 15px;
            border: none;
            outline: none;
            border-radius: 3px;
        }
    </style>

    <script>
        var type = 'tv_new';
        var data_grp = 'tv';
        var url_base = 'tv-series'
    </script>

    <?php include('includes/sidemenu.php')?>

    <div id="site-container">
        <p id="demo" class="hidden"></p>

        <main id="main"
            style="background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8) ), url('<?php echo "/cover/".$image?>') no-repeat center center fixed;   -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover ;">
            <style>
                .center-text {
                    text-align: center;
                }
            </style>
            <?php include('includes/home_header.php')?>

            <section id="content">
                <?php include('includes/ads_1.php'); ?>

                <section id="video" style="background-image: url('<?php echo "/cover/".$image?>');">

                    <div class="video-standin"><img style="width: 100%; display: none;"
                            src="<?php echo "/cover/".$image?>" /></div>

                    <div id="jwPlayer">
                        <!-- Jwplayer goes in here -->
                    </div>

                </section>
                <?php

echo'
<div class="inner-container">
    <div class="movie-image">
        <img src="'.$image.'">
    </div>
    <div class="movie-info">
        <h1>'.$title.' </h1>
        <div class="movie-data">
        <span class="imdb-rating" data-content="'.$rating.'">
        <i class="icon icon-star"></i>'.$rating.'						           </span>
<span class="movie-date"><i class="icon-calendar"></i>'.$year.'</span>

<span class="movie-genre"><i class="icon-mask"></i>'.$genre.'</span>

        </div>
        <p class="movie-description">'.$description.'.</p>
        <p style="font-weight: bold">Select server:
            <select id="server-button" class="select">

                <option selected value="1">Vidnode</option>
        
              
            </select>
        </p>

        <p style="font-weight: bold">Try another video player (these links open in almost-fullscreen by default):</p>
        <ul style="margin: auto;padding-top: 5px" id="other_player">
        </ul>
    </div>

    <div class="movie-actions">
        <ul class="extra">
          <!--  <li>
                <div class="favorites-add" onclick="addFavorite(449);"><i class="icon-heart-outlined"></i><span>Add to favorites</span></div>
            </li>
            <li>
                <div class="watchlist-add" onclick="addWatchlist(449);"><i class="icon-back-in-time"></i><span>Watch later</span></div>
            </li>-->
            <li id="download-button">
                <div class="download"> <a id="dlbtn-premium" class="" target="_blank" href="#"><i class="icon-download"></i><span>Download</span></a>
                </div>

            </li>
        </ul>

    </div>
    <section class="tv-details">
        <div class="tv-details-seasons">
            <h2>Seasons</h2>
            <ol>';

            foreach($season_dt as $key=>$arr)
            {
                if($key==0)
                {
                    echo'<li data-tab="season'.$arr['season'].'" class="active" data-season="'.$arr['season'].'" >Season '.$arr['season'].'</li>';
                }
                else
                {
                    echo'<li data-tab="season'.$arr['season'].'" data-season="'.$arr['season'].'" >Season '.$arr['season'].'</li>';
                }

            }
                                                      
                                                
            
          echo'  </ol>
        </div>
        <div class="tv-details-episodes" data-active="">
        <h2>Episodes</h2>
        ';

        foreach($season_dt as $key=>$arr)
        {
            if($key==0)
            {
                echo'
                <ol class="active" id="season'.$arr['season'].'" >
                ';
    
            }
            else
            {
                echo'
                <ol id="season'.$arr['season'].'" >
                ';
    
            }
           
            $ep_dt=json_decode($arr['ep_json'],true);
            // var_dump($ep_dt);
            // die();

            for($i=0;$i<$arr['total_ep'];$i++)
            {
              if($key==0 && $i==0)
              {
                echo' <li class="active" data-episode="'.($i+1).'" >'.$ep_dt[$i]['name'].'</li> ';

              }
              else
              {
                echo' <li data-episode="'.($i+1).'" >'.$ep_dt[$i]['name'].'</li> ';

              }
               
            }
           
        
       echo'</ol>';

        }
       

      echo'  </div> <div class="tv-details-episodes-info">
            <div class="episode-info"></div>
            <ul class="actions-list">
             <!--   <li id="subtitles">
                    <form class="settings-button" method="POST" action="/series/uploadSub" enctype="multipart/form-data" id="subtitle-button">
                        <input type="file" accept=".srt" name="srt" class="upload-subtitles" id="subfile">
                        <input type="hidden" value="/series/1247-man-with-a-plan" name="url">
                        <input type="hidden" name="bjI2RGJTbzlaR2VnZ3VUL1FaT2FKZz09" value="eUpFVy9rbXY4Vk42NlJIRTFhVTU2QT09" />
                        <label for="subfile"><i class="icon-upload"></i>Upload subtitle .srt</label>
                    </form>
                </li>-->';
                // <script data-cfasync="false" src="/js/email.js"></script><script>
                //     $('#subfile').change(function () {

                //         var wtf = $(this).val().split('\\').pop();
                //         var filz = wtf.split('.').pop().toLowerCase();
                //         if (filz !== 'srt') {
                //             $('#subtitle-button').get(0).reset();
                //             alert('You can only upload .srt files!');
                //         } else {
                //             if (confirm('Are you sure you want to upload "' + wtf + '"?')) {
                //                 $('#subtitle-button').submit();
                //                 ga('send', 'event', 'button', 'Subtitle', 'Man with a Plan');

                //             } else {
                //                 $('#subtitle-button').get(0).reset();
                //             }
                //         }
                //     });
                // </script>
           echo' <li id="play-button">
                <div class="play" onclick="playMovie();"><i class="icon-controller-play"></i>Watch now</div>
            </li>
                <li id="quality-button">
                    <div class="switch">
                        <input id="quality-switch" type="checkbox" value="">
                        <label for="quality-switch" class="hd">720p</label>
                        <label for="quality-switch" class="switch-toggle"></label>
                        <label for="quality-switch" class="fullhd">1080p</label>
                    </div>
                </li>
            </ul>
               </div>
    </section>'
    ?>

    <section class="similar">
        <h4>You might also like..</h4>
        <?php  include('includes/ads_2.php');?>
                <ul>

                    <?php

         $similar_movies_limit=$theme_dt['similar_movies'];

         $description =mysqli_real_escape_string($con,$description);

        $data = query_data("SELECT *, MATCH(description) AGAINST('$description') AS score FROM shows where MATCH(description) AGAINST('$description') and published='true'  ORDER BY score DESC limit $similar_movies_limit ");
       // echo"SELECT *, MATCH(description) AGAINST('$description') AS score FROM `season` INNER JOIN shows ON season.show_id=shows.show_id where MATCH(description) AGAINST('$description') and published='true'  ORDER BY score DESC limit $similar_movies_limit";
        if(!$data)
        {
          $data = query_data("SELECT *, MATCH(show_name) AGAINST('$title') AS score FROM shows where MATCH(description) AGAINST('$title') and published='true'  ORDER BY score DESC limit $similar_movies_limit ");
        }

        foreach($data as $arr)
        {
            //if($arr['uploaded_by']){ $cdn='';} else {$cdn=$img_cdn;}
                                        
                                               
            $description=$arr['description'];
                        
                            
            $tit=$arr['show_name'];
        
        
            $country=$arr['country'];
            
            #$id=$arr['imdb_id'];
            $year = $arr['release_year'];
            $image=$arr['img_src'];
            $rating=$arr['imdb_rating'];
          //  $sea=$arr['season'];
            $show_id_loop=$arr['id'];
           
            include('includes/tv_url_generator.php');
            $image=$cdn.$image;

                  echo'<li>
                  <a href="'.$url.'">
                      <img src="/images/'.$image.'" alt="'.$tit.'" title="'.$tit.' ">
                      <div class="text">
                          <h5>'.$tit.'</h5>
                          <div class="imdb-rating" data-content="'.$rating.'">
                              <i class="icon-star2"></i><i class="icon-star2"></i><i class="icon-star2"></i><i class="icon-star2"></i><i class="icon-star2"></i> </div>
                      </div>
                  </a>
              </li>';
        }

        ?>




                </ul>
            </section>
    </div>
    <div class="movie-background"></div>
    </section>

    <section class="disqus inner-container">

        <?php include('includes/comment.php');?>

    </section>

    </main>
    </div>
    <footer>
        <?php include('includes/footer.php');?>
    </footer>
    <script type="text/javascript">
        var id = <?php echo $show_id?>;
    </script>


    <?php include('includes/footer.php')?>

    <script src="/js/dotdot.js" type="text/javascript"></script>

    <script src="/js/sweetalert.js"></script>
    <script src="https://cdn.jwplayer.com/libraries/MdTAyTNp.js"></script>


<script>


var videoId = "<?php echo $show_id?>";
var jwPlayerInstance = jwplayer("jwPlayer");
var posterImage = '<?php echo $cover?>';

var episode = $('.tv-details-episodes ol li.active').attr("data-episode");
 var   season = $('.tv-details-seasons ol li.active').attr("data-season");
var oPid="";
 function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1));
     var   sURLVariables = sPageURL.split('&');
     var   sParameterName;
      var  i=0;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
}

var videoList={};

var linkData;
var server;



  console.log("bhjhbkhbkhb")
 $('#server-button').on('change', function() {
  var selected= this.value ;
    var links=[];
  links.push({pid:oPid,type:'video/mp4',label:'720p',file:server.scheme+'://sv'+selected+'.'+server.host+server['720']});
  if(server.hasOwnProperty('1080')){
	    links.push({pid:oPid,type:'video/mp4',label:'1080p',file:server.scheme+'://sv'+selected+'.'+server.host+server['1080']});
   linkData.dl_hd= server.scheme+'://dl'+selected+'.'+server.host+server['1080'];

  }
  linkData.dl= server.scheme+'://dl'+selected+'.'+server.host+server['720'];
linkData.jwplayer=links;
  setupPlayer(linkData);
  jwPlayerInstance.play();
});

  if (window.location.search.indexOf('recent=true') > -1) {
    episode = getUrlParameter('episode');
    season = getUrlParameter('season');
  } else {
    episode = $('.tv-details-episodes ol li.active').attr("data-episode");
    season = $('.tv-details-seasons ol li.active').attr("data-season");
  }

  //console.log(season)
  $.ajax({
      url: "/series/season",
      dataType: "json",
      data: "id="+id+"&s="+season+"&token="+token_key,
      cache: false,
      success: function(response) {
        seasonData = response;
        var episodeObject = $.grep(seasonData, function(e){ return e.episode_number == episode; });
        if (episodeObject.length == 0) {
          console.log('No episode');
        } else if (episodeObject.length == 1) {
          // access the foo property using result[0].foo
          episodeNumber = episodeObject[0].episode_number;
          episodeTitle = episodeObject[0].title;
          episodePlot = episodeObject[0].plot;
          episodePoster = episodeObject[0].poster;
          episodeReleasedata = episodeObject[0].release_date;
          console.log('EPISODE RESPONSE!');
          console.log(response);
          if(episodePoster){
            $(".tv-details-episodes-info .episode-info").html("<h2>"+episodeTitle+"</h2><p class='release-info'>Season "+season+", Episode "+ episodeNumber+" <br/> Air date: "+episodeReleasedata+"</p><img src='"+episodePoster+"'><p class='episode-synopsis'>"+episodePlot+"</p>");
          } else {
            $(".tv-details-episodes-info .episode-info").html("<h2>"+episodeTitle+"</h2><p class='release-info'>Season "+season+", Episode "+ episodeNumber+" <br/> Air date: "+episodeReleasedata+"</p><p class='episode-synopsis' style='padding-left:0px'>"+episodePlot+"</p>");
          }
        } else {
          // multiple items found
          console.log('Multiple episodes found.');
        }


        truncateEpisodeDetails();
      }
  });


//console.log(season)
    $.ajax({
        url: "/series/getTvLink",
        dataType: "json",
        data: "id="+videoId+"&token="+token_key+"&s="+season+"&e="+episode+"&oPid="+oPid,
        cache: false,
        success: function(streamRS) {
	linkData =streamRS;
		server=streamRS.server;
      setupServer();
	  setupPlayer(streamRS);

            
      
       
      },
        error: function (request, status, error) {
          console.log('Error couldnt get movie');
          console.log(error);
      }
    });
  




function setupServer () {
	$('#server-button').children('option').remove();

	$.each(server.list, function(key, value) {
		if(server.selected==key){
 $('#server-button')
         .append($("<option></option>")
         .attr("value",key).attr('selected',true)
         .text(value));
		}else 
     $('#server-button')
         .append($("<option></option>")
         .attr("value",key)
         .text(value));
});

}
function setupPlayer(streamRS){
var links=streamRS.jwplayer;          if(streamRS.dl) $("#dlbtn-premium").attr("href", streamRS.dl);


        console.log(links);
        console.log('There are ' + links.length + ' quality options available.');
        if(links.length > 0){
          oPid=links[0].pid;
        }
        var playlist=[];
        var item={preload:"none",image: posterImage};
        
        var sources =[];    
          var cc=[];
          var tracks=[];
          if(typeof sub_link !== 'undefined'){
            cc.push({"lang":"Uploaded","src":sub_link});
            tracks.push(  {
                    file: sub_link,
                    label: "Uploaded",
                    kind: "subtitles",
                  });
          }
            if(streamRS.sub){
                  
                    cc.push({"lang":"en","src":streamRS.sub.url});
                    tracks.push(  {
                    file: streamRS.sub.url,
                    label: "en",
                    kind: "subtitles",
                  });
                  
            }

                for(var i in links){
                  sources.push({
                            default:false,
                            file: links[i].file,
                            label: links[i].label,
                            type: 'video/mp4'
                          })
                    var videoItem={v:links[i].file};      
                      videoItem.cc=cc;
                      
                      videoList[links[i].label] =videoItem;
                }
                console.log(JSON.stringify(videoList));
                item.sources=sources;
                item.tracks=tracks;
                playlist.push(item);

                 var jwOption={playlist:playlist, cast: {},
                  ga: {
                  label: videoId +"-"+season+"-"+episode
                  }, 
                width: '100%',
                aspectratio: '16:9'};
              
        jwPlayerInstance.setup(jwOption);
        
        addNewPlayer(videoList);
        
        jwPlayerInstance.on("error", function(event) {
          console.log("Video Error",event.message);
         
        });

}

function addNewPlayer(videoList){

var player1='<li style="margin:0 0 10px 0;"><a class="" style="color: rgba(255,255,255,.7); pointer-events: none;" href="javascript:void(0)"><span>1. New video player (supports Chromecast on Chrome for Mac/Windows, AirPlay on Safari)</span></a> | ';
					var player2='<li style="margin:0 0 10px 0;"><a class="" style="color: rgba(255,255,255,.7); pointer-events: none;" href="javascript:void(0)"><span>2. Native video player (supports AirPlay and PIP on Safari)</span></a> | ';
				
				var index=0;

				for (var key in videoList) {
						var element = videoList[key];	
						var player1Url='/player/videojs5.html?'+encodeURI(JSON.stringify(element));
						var player2Url='/player/native.html?'+encodeURI(JSON.stringify(element));

						if(index>0){player1+=' - ';
						player2+=' - ';
						}
						player1+='<a class="" style="color: #298eea" href="'+player1Url+'" target="_blank"><span>'+key+'</span></a>';
						player2+='<a class="" style="color: #298eea" href="'+player2Url+'" target="_blank"><span>'+key+'</span></a>';

						index++;
					
				}
				player1+='</li>';
				player2+='</li>';

				$( "#other_player" ).html(player1+player2);

}

</script>


 

		<script>
      $(document).ready(function() {

        $('.player-overlay').click(function(){
          $('.premium-expired').animate({'margin-top': '200px', 'opacity': '1'}, 400);
          $('.modal-overlay').fadeIn('slow', function() {
            $('.modal-overlay').css('display', 'block');
          });
        });
        $('.toggle-overlay').click(function(){
          $('.premium-expired').animate({'margin-top': '200px', 'opacity': '1'}, 400);
          $('.modal-overlay').fadeIn('slow', function() {
            $('.modal-overlay').css('display', 'block');
          });
        });

        console.log('Links!');
        console.log("");
        console.log("");
        console.log("");
        console.log("");


      $('.background-tint').click(function(){
        $('.premium-expired').animate({'margin-top': '100px', 'opacity': '0'}, 400);
        $('.modal-overlay').fadeOut('slow', function() {
          $('.modal-overlay').css('display', 'none');
        });
      });

      $("#quality-switch").on('change', function() {
      	console.log("changed");
        alert('1080p is not available for this tv show');
      });

    });
    </script>
    <script src="/js/episodetest.js?v=1.10"></script>
</body>

</html>