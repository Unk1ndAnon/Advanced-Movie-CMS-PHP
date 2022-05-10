<?php

include('../includes/connect.php');
include('../includes/functions.php');

$name=mysqli_real_escape_string($con,$_GET['q']);

$data=query_data("select * from movies_database where title like '%$name%' and published='true' limit 4");

foreach($data as $arr)
{
    if($arr['uploaded_by']){ $cdn='';} else {$cdn=$img_cdn;}
  $description=$arr['description'];
      
  $tit=$arr['title'];
  //$tit = str_replace(array('!',"'",".","@","^","$","/","?",":"),'',$tit);
  
//   $stars=str_replace(';','',$arr['stars']);
//   #  $stars=explode(',',$stars);
  $genre=str_replace(';','',$arr['genre']);
//   #  $genre=explode(',',$genre);
  
  $country=$arr['country'];
  $id=$arr['imdb_id'];
  $year = $arr['release_year'];
  $image=$arr['img_src'];
  $image=$cdn.$image;
  $vidnode =$arr['source_link'];
  $rating=$arr['imdb_rating'];
  $duration=$arr['duration'];
  //$url= str_replace(array('/images/','.png'),'',$image);
  $ex_id=$arr['id'];
  
  include($_SERVER['DOCUMENT_ROOT'].'/includes/movie_url_generator.php');

  $dummy_arr=['genre'=>$genre,'id'=>$ex_id,'imdb_rating'=>$rating,'link'=>$url,'poster'=>'/images/'.$image,'title'=>$tit,'year'=>$year];

  $json_arr[]=$dummy_arr;

}




$data=query_data("select * from shows where show_name like '%$name%'  and published='true'  limit 4 ");

foreach($data as $arr)
{
    //if($arr['uploaded_by']){ $cdn='';} else {$cdn=$img_cdn;}

$tit=$arr['show_name'];

$country=$arr['country'];
$year = $arr['release_year'];
$image='/images/'.$arr['img_src'];
$rating=$arr['imdb_rating'];
$show_id_loop=$arr['id'];

include($_SERVER['DOCUMENT_ROOT'].'/includes/tv_url_generator.php');
$image=$cdn.$image;

  $dummy_arr=['genre'=>$genre,'id'=>$show_id_loop,'imdb_rating'=>$rating,'link'=>$url,'poster'=>$image,'title'=>$tit,'year'=>$year];

  $json_arr[]=$dummy_arr;

}




echo json_encode($json_arr);





		
?>
    
       
        


    
 
   

