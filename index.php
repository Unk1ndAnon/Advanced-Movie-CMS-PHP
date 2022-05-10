<?php 
include('includes/connect.php');
include('includes/functions.php');


?>
<html>
   <head>
      <meta charset="utf-8"/>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title><?php echo $site_dt['title']?></title>
      <meta name="keywords" content="">
      <meta name="description" content="<?php echo $site_dt['description']?>">
      <meta name="twitter:description" content="<?php echo $site_dt['description']?>">
      <meta name="author" content="<?php echo $site?>">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <meta http-equiv="content-language" content="en-us">
      <meta name="rating" content="General" />
      <meta name="classification" content="Movies, TV" />
      <meta name="distribution" content="Global" />
      <meta property="og:type" content="website"/>
      <meta property="og:title" content="<?php echo $site_dt['title']?>"/>
      <meta name="twitter:card" content="summary">
      <meta name="twitter:site" content="@<?php echo $site?>">
      <meta name="twitter:title" content="<?php echo $site_dt['title']?>">
      
    <?php include('includes/head.php')?>
    
   </head>
   <body class="overview">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css"/>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css"/>
      <style>
         #content .item-container {
         margin: 0px;
         }
         #content {
         margin-top: 40px;
         }
         .inner-container {
         padding: 0 0px 0px 0px;
         }
         a.imdb-rating-icon {
         color: #fff;
         }
         a.imdb-rating-icon i {
         float: left;
         padding-right: 5px;
         margin-top: 2px;
         }
         .btn {
         -moz-user-select: none;
         background-image: none;
         border: 1px solid transparent;
         border-radius: 4px;
         cursor: pointer;
         display: inline-block;
         font-size: 16px;
         font-weight: normal;
         line-height: 1.42857;
         margin-bottom: 0;
         padding: 6px 12px;
         text-align: center;
         vertical-align: middle;
         white-space: nowrap;
         }
         .btn {
         border: medium none;
         border-radius: 100px;
         padding-left: 30px;
         padding-right: 30px;
         }
         .btn {
         transition: background-color 0.25s ease-out 0s, color 0.25s ease-out 0s;
         }
         .btn-red {
         background-color: #298eea;
         border-color: #298eea;
         border-radius: 100px;
         color: #fff;
         padding-left: 30px;
         padding-right: 30px;
         position: relative;
         }
         .btn-red {
         bottom: 10px;
         left: 10px;
         position: absolute;
         right: 10px;
         }
         .btn-red {
         bottom: 10px;
         transition: bottom 0.25s ease-in 0s, opacity 0.25s ease-in 0s;
         }
         .movie-card-rating > div.mf-year {
         float: right;
         }
         .mf-year {
         float: right;
         line-height: 26px;
         padding-right: 12px;
         text-align: right;
         width: 45%;
         }
         .imdb-rating-icon.link > span {
         border-radius: 100px;
         display: block;
         float: left;
         margin-top: 1px;
         line-height: 20px;
         padding-left: 0px;
         padding-right: 0px;
         transition: background-color 0.25s ease-in-out 0s;
         width: auto;
         }
         .imdb-rating-icon::before {
         background-image: url("/assets/images/imdb_blue.png");
         background-repeat: no-repeat;
         content: " ";
         display: block;
         height: 20px;
         left: 0;
         position: absolute;
         top: 3px;
         display: none;
         width: 38px;
         }
         .movie-card-rating {
         bottom: 60px;
         left: 10px;
         position: absolute;
         right: 10px;
         }
         .movie-card-title {
         display: block;
         transform: scale(1);
         transition: all 0.15s ease-in 0s;
         }
         .movie-card-title {
         color: #fff;
         font-size: 20px;
         font-weight: bold;
         }
         .movie-card-thumb {
         background-position: left top;
         background-repeat: no-repeat;
         border-radius: 4px;
         overflow: hidden;
         }
         .movie-card .movie-card-link {
         bottom: 0;
         height: 100%;
         left: 0;
         position: absolute;
         right: 0;
         top: 0;
         width: 100%;
         }
         .movie-card-info {
         background: rgba(0, 0, 0, 0) linear-gradient(-180deg, rgba(12, 14, 16, 0.7) 0%, #14293e 84%) repeat scroll 0 0;
         border-radius: 4px;
         bottom: 0;
         height: 100%;
         left: 0;
         padding: 10px;
         position: absolute;
         right: 0;
         top: 0;
         width: 100%;
         z-index: 4;
         }
         .movie-card-info:hover {
         opacity: 1;
         }
         .movie-card-info {
         opacity: 0;
         overflow: hidden;
         transition: opacity 0.2s ease-in 0s;
         }
         #content .item-flip:hover .item-details-new {
         transform: rotateY(0deg);
         }
         #content .item-flip:hover .item-inner-new {
         transform: rotateY(0deg);
         }
         #content .item .item-details-new .watch-btn span:last-child {
         background: #298eea none repeat scroll 0 0;
         border-radius: 4px;
         clear: both;
         color: #fff;
         display: block;
         line-height: 40px;
         }
         #content .item .item-details-new span.movie-date {
         color: rgba(255, 255, 255, 0.7);
         float: right;
         font-weight: 300;
         padding-right: 10px;
         padding-top: 3px;
         position: relative;
         z-index: 1;
         }
         #content .item .item-details-new .imdb-rating {
         color: rgba(255, 255, 255, 0.7);
         float: left;
         padding-bottom: 10px;
         padding-left: 10px;
         position: relative;
         z-index: 1;
         }
         #content .item .item-details-new .watch-btn {
         background: rgba(0, 0, 0, 0) linear-gradient(to bottom, rgba(29, 27, 36, 0) 0%, rgba(29, 27, 36, 1) 40%, rgba(29, 27, 36, 1) 100%) repeat scroll 0 0;
         border-radius: 0 0 4px 4px;
         bottom: 0;
         font-weight: 600;
         left: 0;
         padding: 70px 10px 10px;
         position: absolute;
         right: 0;
         text-align: center;
         }
         #content .item .item-details-new h2.movie-title {
         color: #fff;
         font-size: 18px;
         font-weight: 600;
         overflow: hidden;
         padding-bottom: 15px;
         text-overflow: ellipsis;
         white-space: nowrap;
         }
         #content .item .item-details-new .movie-description {
         color: rgba(255, 255, 255, 0.7);
         font-size: 15px;
         height: 7.5em;
         overflow: hidden;
         }
         #content .item .item-inner-new, #content .item .item-details-new {
         backface-visibility: hidden;
         transform: rotateY(0deg);
         transform-style: preserve-3d;
         transition: all 0.6s ease 0s;
         }
         #content .item .item-inner-new {
         font-size: 0;
         position: relative;
         transform: rotateY(0deg);
         z-index: 2;
         }
         #content .item .item-details-new {
         border-radius: 4px;
         bottom: 0;
         height: auto;
         left: 0;
         position: absolute;
         right: 0;
         top: 0;
         transform: rotateY(-180deg);
         width: auto;
         }
         #content .item .item-inner-new img {
         border-radius: 3px;
         max-width: 100%;
         }
         #content .item .item-details-new .item-details-inner {
         background: #1d1b24 none repeat scroll 0 0;
         border-radius: 4px;
         display: block;
         height: 100%;
         overflow: hidden;
         padding: 20px;
         }
         .movie-card-link {
         bottom: 0;
         height: 100%;
         left: 0;
         position: absolute;
         right: 0;
         top: 0;
         width: 100%;
         }
         .movie-card-title {
         color: #fff;
         font-size: 19px;
         font-weight: 400;
         }
         .movie-card-info {
         background: rgba(0, 0, 0, 0) linear-gradient(-180deg, rgba(12, 14, 16, 0.7) 0%, #0b0b0b 84%) repeat scroll 0 0;
         border-radius: 4px;
         bottom: 0;
         height: 100%;
         left: 0;
         padding: 10px;
         position: absolute;
         right: 0;
         top: 0;
         width: 100%;
         z-index: 4;
         border: 1px solid #141414;
         }
         .movie-card-info:hover {
         opacity: 1;
         }
         .movie-card-info {
         opacity: 0;
         overflow: hidden;
         transition: opacity 0.2s ease-in 0s;
         }
         .movie-card-rating {
         bottom: 5px;
         left: 10px;
         position: absolute;
         right: 10px;
         }
         .movie-card-rating > div {
         float: left;
         width: auto;
         font-size: 14px;
         padding: 1px 7px;
         border-radius: 2px;
         }
         a.imdb-rating-icon {
         z-index: 20;
         }
         .imdb-rating-container {
         border: 1px solid rgba(255, 255, 255, 0.31);
         }
         .btn-play {
         display: none;
         }
         /*** Featured Slick Sliders ***/
         .featured-slider .item {
         padding: 0px!important;
         }
         .featured-slider .movie-card-thumb {
         border-radius: 0px;
         }
         .slick-dots {
         bottom: -35px;
         }
         .slick-dots li button::before {
         color: #fff!important;
         font-size: 10px;
         }
         .featured-title-overlay {
         position: absolute;
         top: calc(100% - 50px);
         right: 20px;
         background-color: rgb(41, 142, 234);
         color: #fff;
         border-radius: 3px;
         padding: 5px 15px;
         }
         .featured-title-overlay h2 {
         color: #fff;
         font-size: 15px;
         }
         .slider-next {
         position: absolute;
         border: 0px;
         right: 0px!important;
         bottom: 20px;
         z-index: 11;
         bottom: 0px;
         height: 100%;
         background: -webkit-linear-gradient(right, rgba(27, 27, 27, 0) 20%, rgb(27, 27, 27));
         background: -o-linear-gradient(right, rgba(27, 27, 27, 0) 20%, rgb(27, 27, 27));
         background: -moz-linear-gradient(right, rgba(27, 27, 27, 0) 20%, rgb(27, 27, 27));
         background: linear-gradient(to right, rgba(27, 27, 27, 0) 20%, rgb(27, 27, 27));
         }
         .slider-prev {
         position: absolute;
         border: 0px;
         left: 0px!important;
         z-index: 11;
         bottom: 0px;
         height: 100%;
         width: 49px;
         background-color: #141414;
         background: #141414;
         background: -webkit-linear-gradient(right, rgb(27, 27, 27) 20% , rgba(27, 27, 27, 0));
         background: -o-linear-gradient(right, rgb(27, 27, 27) 20% , rgba(27, 27, 27, 0));
         background: -moz-linear-gradient(right, rgb(27, 27, 27) 20% , rgba(27, 27, 27, 0));
         background: linear-gradient(to right, rgb(27, 27, 27) 20% , rgba(27, 27, 27, 0));
         }
         .slick-arrow i {
         color: rgba(255, 255, 255, 0.83);
         font-size: 41px;
         height: 100%;
         }
         .slider-prev:focus, .slider-prev:hover {
         color: transparent;
         outline: initial;
         background: -webkit-linear-gradient(right, rgb(27, 27, 27) 20%, rgba(27, 27, 27, 0.5));
         background: -o-linear-gradient(right, rgb(27, 27, 27) 20% , rgba(27, 27, 27, 0.5));
         background: -moz-linear-gradient(right, rgb(27, 27, 27) 20% , rgba(27, 27, 27, 0.5));
         background: linear-gradient(to right, rgb(27, 27, 27) 20% , rgba(27, 27, 27, 0.5));
         cursor: pointer;
         }
         .slider-next:focus, .slider-next:hover {
         color: transparent;
         outline: initial;
         background: -webkit-linear-gradient(right, rgba(27, 27, 27, 0.5) 20%, rgb(27, 27, 27));
         background: -o-linear-gradient(right, rgba(27, 27, 27, 0.5) 20%, rgb(27, 27, 27));
         background: -moz-linear-gradient(right, rgba(27, 27, 27, 0.5) 20%, rgb(27, 27, 27));
         background: linear-gradient(to right, rgba(27, 27, 27, 0.5) 20%, rgb(27, 27, 27));
         cursor: pointer;
         }
         .slider-next:before, .slider-prev:before {
         font-size: 40px;
         }
         /*** Category Slick Sliders ***/
         .slider-container {
         margin-top: 25px;
         }
         .slider-title-container {
         overflow: auto;
         padding: 0px 25px;
         margin-bottom: 10px;
         }
         .slider-title-container a{
         color: #fff;
         }
         .slider-container h1 {
         font-size: 21px;
         margin-left: 25px;
         float: left;
         }
         .slider-title-container p {
         float: right;
         margin-top: 8px;
         }
         .category-slider .item {
         width: 180px!important;
         padding: 5px!important;
         }
         .loading-overlay {
         position: fixed;
         left: 0px;
         right: 0px;
         bottom: 0px;
         top: 0px;
         background-color: rgb(32, 32, 32);
         z-index: 1;
         text-align: center;
         }
         .loading-overlay p {
         font-size: 23px;
         color: rgba(255, 255, 255, 0.62);
         }
         .loading-overlay h1 {
         font-family:'Pacifico', helvetica;
         text-transform: lowercase;
         font-size: 54px;
         }
         .spinner-home-overlay {
         display: block!important;
         }
         .loading-overlay-content {
         position: relative;
         top: 50%;
         transform: translateY(-50%);
         }
      </style>
      <script>
         var type='mv_new';
         var data_grp='movie'
         var url_base='home'
         $(document).ready(function() {
         	console.log('Ready!')
         	$('.loading-overlay').delay(1000).fadeOut(2000);
         	$('body .sidebar nav').delay(1500).animate({'left': '0px'}, 500);
         });
      </script>
   <?php include('includes/sidemenu.php')?>
     
      <div id="site-container">
         <div class="loading-overlay">
            <div class="loading-overlay-content">
               <div id="spinner2" class="spinner-home-overlay">
                  <div class="bounce1"></div>
                  <div class="bounce2"></div>
                  <div class="bounce3"></div>
               </div>
            </div>
         </div>
         <main id="main">
            <style>
               .center-text {
               text-align: center;
               }
            </style>
     <?php include('includes/home_header.php')?>
            <section id="content" class="inner-container content-browse">
               <!--<div class="notice">
                  <div class="notice-icon"><i class="icon-news"></i></div>
                  <p class="p1" style="text-align: left; margin-bottom: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: normal;" helvetica="" neue";="" color:="" rgb(0,="" 0,="" 0);"=""><strong>Invites have officially closed. We are moving domains within the next couple of weeks. We will keep you posted. All accounts with premium time will be transferred. This is something we simply must do to maintain the privacy of the site. Also we are aware of the majorly increased amount of foreign films being uploaded and we are working to fix this ASAP.</strong></p><p class="p1" style="text-align: left; margin-bottom: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: normal;" helvetica="" neue";="" color:="" rgb(0,="" 0,="" 0);"=""><br></p><p style="margin-bottom: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: " helvetica="" neue";="" color:="" rgb(0,="" 0,="" 0);"=""></p>
                  <p></p>
                  <p><small> </small>
                  </p>
                  <div class="close-notice"><i class="icon-cross"></i></div>
               </div>-->
               <div id="spinner">
                  <div class="bounce1"></div>
                  <div class="bounce2"></div>
                  <div class="bounce3"></div>
               </div>
               <div class="item-container">
                  <div class="featured-slider">

                    <!--Iteration of slider items...........................................start-->

                    <?php include('includes/slider.php')?>

                      <!--Iteration of slider items...........................................end-->
                  
                  </div>
                  <div class="slider-container">
                     <div class="slider-title-container">
                        <a href="#">
                           <h1>Recently Added</h1>
                        </a>
                        <a href="/movies">
                           <p>View All</p>
                        </a>
                     </div>
                     <div class="category-slider">

             <!-- Iteration of popular movies.................................... start
            -->           
                        <?php 

                        $data = query_data("select * from movies_database where published='true' ORDER BY id DESC limit 16");


                        foreach($data as $arr)
                        {
                           include('includes/movie_block.php');
                        }
                        ?>

                         <!--Iteration of popular movies.................................... #end
            -->    
                     
                     </div>
                  </div>
                  <div class="slider-container">
                     <div class="slider-title-container">
                        <a href="#">
                           <h1>Popular This Week</h1>
                        </a>
                        <a href="/most-watched">
                           <p>View All</p>
                        </a>
                     </div>
                     <div class="category-slider">


                         <!--Iteration of Recently Added movies.................................... start
            -->     
                        <?php

                           $data = query_data("select * from movies_database where   published='true' ORDER BY imdb_rating DESC  limit 16");
                           


                           foreach($data as $arr)
                           {
                              include('includes/movie_block.php');
                           }
                           ?>

                        ?>

                         <!--Iteration of Recently Added movies.................................... end
            -->     
                   </div>
                  </div>
                  <div class="slider-container">
                     <div class="slider-title-container">
                        <a href="/series/new">
                           <h1>Recent Episodes</h1>
                        </a>
                        <a href="/new-episodes">
                           <p>View All</p>
                        </a>
                     </div>
                     <div class="category-slider">

                         <!--Iteration of Recently Episodes.................................... start
            -->     
                        <?php

                        $data = query_data("select * from shows order by id desc ");

                        foreach($data as $arr)
                        {
                           include('includes/tv_block.php');
                        }

                        ?>
                

                         <!--Iteration of Recently Episodes.................................... end
            -->     
                      
                     
                     </div>
                  </div>
              
               </div>
            </section>
         </main>
      </div>
     <?php include('includes/footer.php')?>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
      <script>
         $('.featured-slider').slick({
         	nextArrow: '<button type="button" class="slider-next"><i class="icon-chevron-right"></i></button>',
         	prevArrow: '<button type="button" class="slider-prev"><i class="icon-chevron-left"></i></button>',
         	dots: true,
         	infinite: true,
         	speed: 300,
         	autoplay: true,
         	slidesToShow: 3,
           slidesToScroll: 1,
         	responsive: [
         		{
         			breakpoint: 1000,
         			settings: {
         				slidesToShow: 2,
         				slidesToScroll: 2
         			}
         		},
         		{
         			breakpoint: 580,
         			settings: {
         				slidesToShow: 1,
         				slidesToScroll: 1
         			}
         		}
         	]
         });
         
         
         $('.category-slider').slick({
         	nextArrow: '<button type="button" class="slider-next"><i class="icon-chevron-right"></i></button>',
         	prevArrow: '<button type="button" class="slider-prev"><i class="icon-chevron-left"></i></button>',
         	dots: false,
         	infinite: true,
         	speed: 300,
           variableWidth: true,
         	slidesToScroll: 3,
         	slidesToShow: 8,
         	responsive: [
         		{
         			breakpoint: 800,
         			settings: {
         				slidesToScroll: 2
         			}
         		}
         	]
         });
         
         
      </script>
   </body>
</html>