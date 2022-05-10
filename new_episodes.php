<?php 
include('includes/connect.php');
include('includes/functions.php');

$itr=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16];
//var_dump($itr)

$page_dt=query_data("SELECT * from meta","UNITARY");

$page_dt['onair_tit']=str_replace('[page]',$page,$page_dt['onair_tit']);
$page_dt['onair_meta_tit']=str_replace('[page]',$page,$page_dt['onair_meta_tit']);
$page_dt['onair_desc']=str_replace('[page]',$page,$page_dt['onair_desc']);

?>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $page_dt['onair_meta_tit']?></title>
    <meta name="keywords" content="">

    <meta name="description" content="<?php echo $page_dt['onair_desc']?>">
    <meta name="twitter:description" content="<?php echo $page_dt['onair_desc']?>">

    <meta name="author" content="<?php echo $site?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="content-language" content="en-us">

    <meta name="rating" content="General" />
    <meta name="classification" content="Movies, TV" />
    <meta name="distribution" content="Global" />

    <?php include('includes/head.php')?>

</head>

<body class="overview">

<style>


a.imdb-rating-icon {
     color: #fff;
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

.btn-play {
    display: none;
}

.imdb-rating-container {
        border: 1px solid rgba(255, 255, 255, 0.31);
}
a.imdb-rating-icon i {
float: left;
padding-right: 5px;
margin-top: 2px;
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
 .movie-card-rating > div {
    float: left;
    width: 45%;
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

 .movie-card-title {
    display: block;
    transform: scale(1);
    transition: all 0.15s ease-in 0s;
}
.movie-card-title {
    color: #fff;
    font-size: 20px;
    font-weight: 400;
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
        z-index: 1111111111111111;
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
     transition: opacity 0.5s ease-in 0s;
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

.movie-card-seq {
    background-color: rgb(41, 142, 234);
    border-radius: 0 0 4px 4px;
    bottom: 0;
    font-size: 16px;
    font-weight: 400 ;
    left: 0;
    color: #fff;
    padding: 7px;
    position: absolute;
    right: 0;
    text-align: center;
    z-index: 1;
}
.movie-card-seq > span {
color: #fff;
}
.movie-card-status {
left: 0;
position: absolute;
right: 0;
text-align: right;
top: 0;
z-index: 1;
}
.movie-card-status > div.corner::before {
background: transparent none repeat scroll 0 0;
border-radius: 0 6px 0 0;
box-shadow: 2px -2px 0 2px #1c2024;
clip: rect(0px, 6px, 6px, 0px);
content: "";
height: 6px;
left: -6px;
position: absolute;
top: 0;
width: 6px;
}
.movie-card-status > div.corner::after {
background: transparent none repeat scroll 0 0;
border-radius: 0 6px 0 0;
bottom: -6px;
box-shadow: 2px -2px 0 2px #1c2024;
clip: rect(0px, 6px, 6px, 0px);
content: "";
height: 6px;
position: absolute;
right: 0;
width: 6px;
}
.movie-card-status > div.corner.highlight {
color: #fff;
}
.movie-card-status > div.corner {
background-color: #2b2b2b;
border-radius: 0 0 0 6px;
/* box-shadow: -1px 1px 0 rgba(255, 255, 255, 0.35); */
color: #fff;
font-size: 12px;
font-weight: bold;
margin-bottom: 7px;
margin-right: 0;
margin-top: 0;
padding: 6px 18px;
position: relative;
/* text-shadow: 1px 1px 1px #000; */
}
.movie-card-status > div {
background-color: red;
border-radius: 4px;
color: #fff;
float: right;
font-size: 13px;
margin-left: 7px;
margin-right: 7px;
margin-top: 7px;
padding: 4px 9px;
text-transform: uppercase;
}
.movie-card-link {
 bottom: 0;
 height: 100%;
 left: 0;
 position: absolute;
 right: 0;
 top: 0;
 width: 100%;
 z-index:11111111111;
}

a.imdb-rating-icon {
 z-index: 20;
}

.item-details-inner {
position: absolute;
top: 0px;
bottom: 0px;
}

.movie-card-thumb.missing-cover.missing-cover-new {
height: initial!important;
background-color: rgba(0, 0, 0, 0.31);
padding: 0px;
}
.movie-card-thumb.missing-cover.missing-cover-new .item-details-inner {
padding: 10px;
}
#content {
margin-top: 90px;
}

</style>
    <script>
        var type = 'tv_new';
        var data_grp = 'tv';
        var url_base='new-episodes'
    </script>

<?php include('includes/sidemenu.php')?>

    <div id="site-container">

        <main id="main">
            <style>
                .center-text {
                    text-align: center;
                }
            </style>
        <?php include('includes/header.php')?>
            <style>
                li.premium {
                    border-color: #298eea!important;
                }
                
                #main #header-secondary .filters > .header-nav > li {
                    position: relative;
                    display: inline-block;
                    background: rgba(35, 35, 35, 0);
                    line-height: 30px;
                    margin: 10px 10px 10px 0;
                    border-radius: 3px;
                    vertical-align: top;
                    border: 1px solid #fff;
                    padding: 0px 20px;
                }
                
                #main #header-secondary .filters ul li a {
                    color: #ffffff;
                }
                
                #main #header-secondary .filters > ul > li i {
                    padding-right: 5px;
                }
                
                li.register {
                    background-color: #298eea!important;
                    border-color: #298eea!important;
                }
                
                li.register a {
                    color: #fff!important;
                }
                
                li.user-normal.dropdown {
                    border: 0px!important;
                    padding: 0px!important;
                    width: auto!important;
                }
            </style>

            <section id="content" class="inner-container content-browse">
           
                <div id="spinner">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                </div>

                <div class="item-container">


                <?php
                  $data = query_data("select * from seasons join shows on shows.id=seasons.show_id order by date_modified desc limit 16  ");

                    foreach($data as $arr)
                    {
                     include('includes/ep_block.php');
                    }




               
                
                ?>
                  


                    
                 
                
                 
                </div>

            </section>
        </main>
    </div>
    <?php include('includes/footer.php')?>
</body>

</html>