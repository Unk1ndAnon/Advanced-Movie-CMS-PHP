<?php 
include('includes/connect.php');
include('includes/functions.php');


preg_match('/(\d)*$/',$_SERVER['REQUEST_URI'],$slug_id);
$curr_url=$_SERVER['REQUEST_URI'];

$ex_id=(int)$slug_id[0]-$movie_url_id_addon;
$ex_id=mysqli_real_escape_string($con,$ex_id);

$query="select * from movies_database where id='$ex_id' and published='true'";
$data=query_data($query,"UNITARY");

if(!$data)
{
  header('location: /404.php');
}

#var_dump($data);
$description=$data['description'];

$title=$data['title'];

$genre=str_replace(';','',$data['genre']);
//$genre=explode(',',$genre);

$country=$data['country'];

$movie_id=$data['id'];
$id=$data['imdb_id'];
$year = $data['release_year'];
$image=$data['img_src'];
$cover='/cover/'.$image;
$poster='/images/'.$image;
$vidnode =$data['source_link'];
$rating=$data['imdb_rating'];
$download_link=$data['download_link'];
$keywords=$data['keywords'];
$duration=$data['duration'];



//$cover=str_replace('/images/','/cover/',$image);

include('includes/movie_url_generator.php');


$seo_dt=query_data("SELECT * from seo","UNITARY");

replace_code($seo_dt['movie_tit']);
replace_code($seo_dt['movie_desc']);

?>
<html>
    <head>
      <meta charset="utf-8"/>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title><?php echo $seo_dt['movie_tit']?></title>
          <meta name="keywords" content="">
      
          <meta name="description" content="<?php echo$seo_dt['movie_desc']?>.">
      <meta name="twitter:description" content="<?php echo$seo_dt['movie_desc']?>">
  
          <meta name="author" content="<?php echo $site?>">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <meta http-equiv="content-language" content="en-us">
  
      <meta name="rating" content="General" />
      <meta name="classification" content="Movies, TV" />
      <meta name="distribution" content="Global" />
  
      <meta property="og:type" content="website"/>
      <meta property="og:title" content="<?php echo $seo_dt['movie_tit']?>"/>
      <meta name="twitter:card" content="summary">
      <meta name="twitter:site" content="@<?php echo $site?>">
      <meta name="twitter:title" content="<?php echo $seo_dt['movie_tit']?>">
       
      <?php include('includes/head.php')?>
  
  
  </head>
        
  
      
  

  <body class="detail detail-tvshow" style="background: linear-gradient( rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7) ), url('<?php echo $cover?>') no-repeat center center fixed;display:inherit">
  <!-- Google Tag Manager (noscript) -->
  
  <!-- End Google Tag Manager (noscript) -->
    <script type="text/javascript">
   type="tv_page";
   var url_base='movies'
  </script>
  <style>
  .detail #content {
  margin-top: 70px;
  }
  .video-js .vjs-text-track-display{bottom:4.5em;left:1em;position:absolute;right:1em;text-align:center;}.video-js{-moz-user-select:none;background-color:#000;font-family:Arial,sans-serif;font-size:14px;font-style:normal;font-weight:400;padding:0;position:relative;vertical-align:middle;}.video-js .vjs-text-track{background-color:rgba(0,0,0,0)!important;font-size:1.4em;margin-bottom:0.1em;text-align:center;}
  .vjs-menu-content { font-size: 14px;}
  .vjs-selected{ font-size: 14px;}
  .vjs-default-skin .vjs-menu-button .vjs-menu .vjs-menu-content {bottom: 1.1em!important}
  .select {
      position: relative;
  color: rgba(255,255,255,.7);
  background: #414141;
  height: 30px;
  padding: 0 30px 0 15px;
  border: none;
  outline: none;
  border-radius: 3px;
  }
  </style>
  
  <script>
      var type='mv_new';
       var data_grp='movie'
</script>
  
  <?php include('includes/sidemenu.php')?>
  
      <div id="site-container">
        <p id="demo" class="hidden"></p>
              
          <main id="main" style="background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8) ), url('<?php echo $cover?>') no-repeat center center fixed;   -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover ;">
              <style>
  .center-text {
      text-align: center;
  }
  </style>
    <?php include('includes/home_header.php')?>
    
    <section id="content">

    <?php include('includes/ads_1.php'); ?>



<section id="video" style="background-image: url('<?php echo $cover?>');">

   <div class="video-standin"><img style="width: 100%; display: none;" src="<?php echo $cover?>" /></div>

   <div id="jwPlayer">
          <!-- Jwplayer goes in here -->
    </div>

</section>

<?php

echo'
<div class="inner-container">
    <div class="movie-image">
        <img src="'.$poster.'">
    </div>
    <div class="movie-info">
        <h1>'.$title.'</h1>
        <div class="movie-data">
            <span class="imdb-rating" data-content="'.$rating.'">
                                      <i class="icon icon-star"></i>'.$rating.'						           </span>
            <span class="movie-date"><i class="icon-calendar"></i>'.$year.'</span>
            <span class="movie-time"><i class="icon-clock"></i> '.$duration.'</span>
            <span class="movie-genre"><i class="icon-mask"></i>'.$genre.'</span>

        </div>
        <p class="movie-description">'.$description.'.</p>
        <p style="font-weight: bold">Select server:
            <select id="server-button" class="select">

            
              
            </select>
        </p>

        <!--<p style="font-weight: bold">Try another video player (these links open in almost-fullscreen by default):</p>
        <ul style="margin: auto;padding-top: 5px" id="other_player">
        </ul>-->
    </div>

    <div class="movie-actions">
        <ul class="extra">
          <!--  <li>
                <div class="favorites-add" onclick="addFavorite(449);"><i class="icon-heart-outlined"></i><span>Add to favorites</span></div>
            </li>
            <li>
                <div class="watchlist-add" onclick="addWatchlist(449);"><i class="icon-back-in-time"></i><span>Watch later</span></div>
            </li>-->
            <li id="download-button">                                <div class="download">
            <a id="dlbtn" class="" href="#" target="_blank"><i class="icon-download"></i><span>Download 720p</span></a>
        </div>
       

        
    </li>
    <li id="download-button-HD" style="display:none">

    <div class="download">
      <a id="dlbtn-hd" class="" href="#" target="_blank"><i class="icon-download"></i><span>Download 1080p</span></a>
  </div>
  </li>
        </ul>';

        ?>
        <ul>
                        <!--	<li id="subtitles">
                                <form class="settings-button" method="POST" action="/movies/uploadSub" enctype="multipart/form-data" id="subtitle-button">
                                    <input type="file" accept=".srt" name="srt" class="upload-subtitles" id="subfile">
                                    <input type="hidden" value="/movies/14221-the-invisible-man" name="url">
                                    <input type="hidden" name="cy9IREhYNzVmU0hTL0hjWFkxdGVldz09" value="RU4rWTdIR2pHVkU2Y3pIaDZpMFV2dz09">
                                    <label for="subfile"><i class="icon-upload"></i>Upload subtitle .srt</label>
                                </form>
                            </li>-->

		                        <li id="play-button">
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
  

    <section class="similar">
        <h4>You might also like..</h4>
        <?php  include('includes/ads_2.php');?>
        <ul>

        <?php

            $similar_movies_limit=$theme_dt['similar_movies'];
            $data = query_data("SELECT *, MATCH(description) AGAINST('$description') AS score
            FROM movies_database
            WHERE MATCH(description) AGAINST('$description')  and published='true'
            ORDER BY score DESC limit $similar_movies_limit");

            if(!$data)
            {
                $data = query_data("SELECT *, MATCH(title) AGAINST('$title') AS score
            FROM movies_database
            WHERE MATCH(title) AGAINST('$title')  and published='true'
            ORDER BY score DESC limit $similar_movies_limit");
            }

            foreach($data as $arr)

            {
                
                $description=$arr['description'];
                    
                 $tit=$arr['filter_title'];
        
                $country=$arr['country'];
        
                $id=$arr['imdb_id'];
                $duration=$arr['duration'];
                $year = $arr['release_year'];
                $image=$arr['img_src'];
                $image=$cdn.$image;
        
                $rating=$arr['imdb_rating'];
        
                $url= str_replace(array('/images/','.png'),'',$image);
              
                $ex_id=$arr['id'];
               // $chk_id=$arr['id'];
        
                include('includes/movie_url_generator.php');

                echo' <li>
                <a href="'.$url.'">
                    <img src="/images/'.$image.'" alt="'.$tit.'" title="'.$tit.'">
                    <div class="text">
                        <h5>'.$tit.'</h5>
                        <div class="imdb-rating" data-content="'.$rating.'">
                            <i class="icon-star2"></i><i class="icon-star2"></i><i class="icon-star2"></i><i class="icon-star2"></i><i class="icon-star-o"></i> </div>
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

<section class="disqus inner-container" >

<?php include('includes/comment.php');?>

</section>

</main>
</div>
<script type="text/javascript">
var id = 449;
</script>


<?php include('includes/footer.php')?>

<script src="/js/dotdot.js" type="text/javascript"></script>

<script src="/js/sweetalert.js"></script>

<script src="https://cdn.jwplayer.com/libraries/MdTAyTNp.js"></script>

<script>

var sub_link='https://cc.reel2rockets.com/tt1615160/en.vtt';
var videoId = "<?php echo $movie_id?>";
var jwPlayerInstance = jwplayer("jwPlayer")

var posterImage = "<?php echo $cover?>";
var oPid="";

var videoList={};
var linkData;
var server;

$(document).ready(function() {
    $('#server-button').on('change', function() {
        var selected = this.value;
        var links = [];
        links.push({
            pid: oPid,
            type: 'video/mp4',
            label: '720p',
            file: server.scheme + '://sv' + selected + '.' + server.host + server['720']
        });
        if (server.hasOwnProperty('1080')) {
            links.push({
                pid: oPid,
                type: 'video/mp4',
                label: '1080p',
                file: server.scheme + '://sv' + selected + '.' + server.host + server['1080']
            });
            linkData.dl_hd = server.scheme + '://dl' + selected + '.' + server.host + server['1080'];

        }
        linkData.dl = server.scheme + '://dl' + selected + '.' + server.host + server['720'];
        linkData.jwplayer = links;
        setupPlayer(linkData);
        jwPlayerInstance.play();
    });


    $.ajax({
        url: "/movies/getMovieLink",
        dataType: "json",
        data: "id=" + videoId + "&token=" + token_key + "&oPid=" + oPid,
        cache: false,
        success: function(rsData) {
            linkData = rsData;
            server = rsData.server;
            setupServer();
            setupPlayer(rsData);

        },
        error: function(request, status, error) {
            console.log('Error couldnt get movie');
            console.log(error);
        }
    });


});

function setupServer() {
    $('#server-button').children('option').remove();

    $.each(server.list, function(key, value) {
        if (server.selected == key) {
            $('#server-button')
                .append($("<option></option>")
                    .attr("value", key).attr('selected', true)
                    .text(value));
        } else
            $('#server-button')
            .append($("<option></option>")
                .attr("value", key)
                .text(value));
    });

}

function setupPlayer(rsData) {
    var links = rsData.jwplayer;
    if (rsData.hasOwnProperty('dl_hd')) {
        $('#download-button-HD').show();
        $('#dlbtn-hd').attr('href', rsData.dl_hd);

    }
    $('#dlbtn').attr('href', rsData.dl);
    console.log(links)
    console.log('There are ' + links.length + ' quality options available.');
    if (links.length > 0) {
        oPid = links[0].pid;
    }
    var playlist = [];
    var item = {
        preload: "none",
        image: posterImage
    };

    var sources = [];

    for (var i in links) {
        sources.push({
            default: false,
            file: links[i].file,
            label: links[i].label,
            type: 'video/mp4'
        })
        var videoItem = {
            v: links[i].file
        };
        if (typeof sub_link !== 'undefined') {
            videoItem.cc = [{
                "lang": "en",
                "src": sub_link
            }];
        }
        videoList[links[i].label] = videoItem;
    }
    console.log(JSON.stringify(videoList));
    item.sources = sources;
    if (typeof sub_link !== 'undefined') {
        var tracks = [{
            file: sub_link,
            label: "en",
            kind: "subtitles",
        }];
        item.tracks = tracks;

    }
    playlist.push(item);

    var jwOption = {
        playlist: playlist,
        cast: {},
        ga: {
            label: videoId
        },
        width: '100%',
        aspectratio: '16:9'
    };

    jwPlayerInstance.setup(jwOption);

    addNewPlayer(videoList);


    jwPlayerInstance.on("error", function(event) {
        console.log("Video Error", event.message);

    });
}






function addNewPlayer(videoList) {

    var player1 = '<li style="margin:0 0 10px 0;"><a class="" style="color: rgba(255,255,255,.7); pointer-events: none;" href="javascript:void(0)"><span>1. New video player (supports Chromecast on Chrome for Mac/Windows, AirPlay on Safari)</span></a> | ';
    var player2 = '<li style="margin:0 0 10px 0;"><a class="" style="color: rgba(255,255,255,.7); pointer-events: none;" href="javascript:void(0)"><span>2. Native video player (supports AirPlay and PIP on Safari)</span></a> | ';

    var index = 0;

    for (var key in videoList) {
        var element = videoList[key];
        var player1Url = '/player/videojs5.html?' + encodeURI(JSON.stringify(element));
        var player2Url = '/player/native.html?' + encodeURI(JSON.stringify(element));

        if (index > 0) {
            player1 += ' - ';
            player2 += ' - ';
        }
        player1 += '<a class="" style="color: #298eea" href="' + player1Url + '" target="_blank"><span>' + key + '</span></a>';
        player2 += '<a class="" style="color: #298eea" href="' + player2Url + '" target="_blank"><span>' + key + '</span></a>';

        index++;

    }
    player1 += '</li>';
    player2 += '</li>';

    $("#other_player").html(player1 + player2);

}
</script>

</body>

</html>