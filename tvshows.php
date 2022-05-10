<?php 
include('includes/connect.php');
include('includes/functions.php');

$itr=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16];
//var_dump($itr)

$page_dt=query_data("SELECT * from meta","UNITARY");

$page_dt['tvseries_tit']=str_replace('[page]',$page,$page_dt['tvseries_tit']);
$page_dt['tvseries_meta_tit']=str_replace('[page]',$page,$page_dt['tvseries_meta_tit']);
$page_dt['tvseries_desc']=str_replace('[page]',$page,$page_dt['tvseries_desc']);

?>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $page_dt['tvseries_meta_tit']?></title>
    <meta name="keywords" content="">

    <meta name="description" content="<?php echo $page_dt['tvseries_desc']?>">
    <meta name="twitter:description" content="<?php echo $page_dt['tvseries_desc']?>">

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
            font-size: 19px;
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
        }
        
        .movie-card-info {
            background: rgba(0, 0, 0, 0) linear-gradient(-180deg, rgba(12, 14, 16, 0.7) 0%, #0b0b0b 84%) repeat scroll 0 0;
            border-radius: 4px;
            bottom: 0;
            height: 100%;
            left: 0;
            padding: 0px;
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
            display: none;
        }
        
        .btn-play {
            display: none;
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
        
        #content .item .item-inner-new,
        #content .item .item-details-new {
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
        
        a.imdb-rating-icon {
            z-index: 20;
        }
        
        .imdb-rating-container {
            border: 1px solid rgba(255, 255, 255, 0.31);
        }
    </style>
    <script>
        var type = 'tv_new';
        var data_grp = 'tv';
        var url_base='tv-series'
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

$data = query_data("select * from shows order by id desc limit 35  ");

                        foreach($data as $arr)
                        {
                         include('includes/tv_block.php');
                        }

                    ?>
                                    


                    
                 
                
                    <input type='hidden' class='nextpage' value='1'>
                    <input type='hidden' class='isload' value='true'>

                    <nav class="pagination">
                        <ul>
                            <li class="button"><a href="#" data-page="" data-type="prev" onclick="gotoPage(0)">Prev</a></li>
                            <li><a class="current first num" data-page="1" onclick="gotoPage(1)" href="#">1</a></li>
                            <li><a href="#" class="num" data-page="2" onclick="gotoPage(2)">2</a></li>
                            <li><a href="#" class="num" data-page="3" onclick="gotoPage(3)">3</a></li>
                            <li><a href="#" class="last num" data-page="4" onclick="gotoPage(4)">4</a></li>
                            <li><span>...</span></li>
                            <li><a href="#" data-page="259" onclick="gotoPage(259)">259</a></li>
                            <li class="button"><a href="#" data-page="5" data-type="next" onclick="gotoPage(2)">Next</a></li>
                        </ul>
                    </nav>
                </div>

            </section>
        </main>
    </div>
    <?php include('includes/footer.php')?>
</body>

</html>