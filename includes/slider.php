<?php

$data = query_data("select * from movies_database where  published='true' ORDER BY votes DESC  limit 8 ");

    foreach($data as $arr)
    {                     
        
        $description=$arr['description'];
            
        $tit=$arr['title'];
        $tit = str_replace(array('!',"'",".","@","^","$","/","?",":"),'',$tit);
        
        // $stars=str_replace(';','',$arr['stars']);
        // #  $stars=explode(',',$stars);
        // $genre=str_replace(';','',$arr['genre']);
        // #  $genre=explode(',',$genre);
        
        $country=$arr['country'];
        $id=$arr['imdb_id'];
        $year = $arr['release_year'];
        $image=$arr['img_src'];
        $image=$cdn.$image;
        //$cover=str_replace('/images/','/cover/',$image);
        $vidnode =$arr['source_link'];
        $rating=$arr['imdb_rating'];
        $duration=$arr['duration'];
        $url= str_replace(array('/images/','.png'),'',$image);
        $ex_id=$arr['id'];
        
        include('includes/movie_url_generator.php');
        
        echo' <div class="item">
        <div class="item-flip">
            <a href="'.$url.'">
                <div class="movie-card-thumb">
                    <div class="featured-title-overlay">
                    <h2 class="movie-card-title">'.$tit.' <span>'.$year.'</span></h2>
                    </div>
                    <p class="featured-plot">'.$description.' </p>
                    <img src="/cover/'.$image.'" >
                </div>
            </a>
        </div>
        </div>';
    }



?>