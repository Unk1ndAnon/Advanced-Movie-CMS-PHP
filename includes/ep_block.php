<?php

$tit=$arr['show_name'];
$timestamp=$arr['date_modified'];


// $stars=str_replace(';','',$arr['stars']);
// $stars=explode(',',$stars);

// $genre=str_replace(';','',$arr['genre']);
// $genre=explode(',',$genre);

$country=$arr['country'];
$year = $arr['release_year'];
$image='/images/'.$arr['img_src'];
$rating=$arr['imdb_rating'];
$sea=$arr['season'];
$show_id_loop=$arr['id'];
$episode= count(json_decode($arr['quality'],true)['ep_720p']);

include($_SERVER['DOCUMENT_ROOT'].'/includes/tv_url_generator.php');
$image=$cdn.$image;

// $datetime = new DateTime();
// echo $datetime->format('d-m-Y H:i:s'); 

//date_default_timezone_set('Asia/Calcutta'); 
$now = date('Y-m-d H:i:s');

$diff = strtotime($now) - strtotime($timestamp); 
$fullDays    = floor($diff/(60*60*24));   
$fullHours   = floor(($diff-($fullDays*60*60*24))/(60*60)); 
$fullMinutes = floor(($diff-($fullDays*60*60*24)-($fullHours*60*60))/60);  






echo'<div class="item">

<div class="item-flip">
                                <a class="movie-card-link" href="'.$url.'">
                                &nbsp;</a>
                        <div class="movie-card-thumb">
        <div class="movie-card-seq ng-scope">
            <span class="ng-binding">S'.$sea.'E'.$episode.'</span>
        </div>

        <div class="movie-card-status">';
        if($fullHours==0)
        {
            echo' <div class="corner ng-binding highlight">'.$fullMinutes.' MINUTES AGO</div>
            <!-- ngIf: !!movie.watched_at -->
            </div>';
        }
        else
        {
echo' <div class="corner ng-binding highlight">'.$fullHours.' HOURS AGO</div>
<!-- ngIf: !!movie.watched_at -->
</div>';
        }
       

     echo'   <img src="'.$image.'" style="width: 100%">
</div>


    <div class="movie-card-info">

        <div class="item-details-inner">
            <h2 class="movie-card-title"> '.$tit.'</h2>

            <div class="movie-card-rating">
                <div class="imdb-rating-container">
                <a class="imdb-rating-icon link" href="#" title="IMDB Link">
                <i class="icon-star"></i>
                <span class="ng-binding">'.$rating.'</span>
                </a>
                </div>
                <div class="mf-year ng-binding">
             '.$year.'									</div>
            </div>
            

        </div>
    </div>
</div>

</div>';

?>