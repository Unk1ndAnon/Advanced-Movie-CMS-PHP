<?php
chdir(dirname(__FILE__));
require ("../includes/connect.php");
require ("../includes/functions.php");
ini_set('xdebug.var_display_max_depth', 99);


// $tr="mother's";
// $tr=mysqli_real_escape_string($con,$tr);
// var_dump($tr);
// die();


$imdb_id = 'tt2861424';
$res = get_api("http://api.tvmaze.com/lookup/shows?imdb=tt0944947"); 


//var_dump($res);
//die();

$tvmazeData = json_decode($res, true);
$tvmazeID=$tvmazeData['id'];

$res = get_api("http://api.tvmaze.com/shows/$tvmazeID?embed[]=episodes&embed[]=seasons&embed[]=cast  "); 

$tvmazeDataFull = json_decode($res, true);

foreach($tvmazeDataFull['_embedded']['cast'] as $key=> $val)
    {
        $cast_arr[]=$val['person']['name'];
        if($key==4) break;
    }
    $cast=implode(',',$cast_arr);



// var_dump($tvmazeDataFull);
// die();


$decoded['Actors'] = $cast;
$decoded['Title']=$tvmazeDataFull['name'];
$decoded['Language']=$tvmazeDataFull['language'];
$decoded['Genre']=implode(',',$tvmazeDataFull['genres']);
$decoded['Runtime']=$tvmazeDataFull['runtime'];
$decoded['imdbRating']=$tvmazeDataFull['rating']['average'];
$decoded['Country']=$tvmazeDataFull['network']['country']['name'];
$decoded['imdbID']=$imdb_id;
$decoded['Poster']=$tvmazeDataFull['image']['original'];
$decoded['Plot']=$tvmazeDataFull['summary'];
$decoded['totalSeasons']=count($tvmazeDataFull['_embedded']['seasons']);
$decoded['Year']=explode('-',$tvmazeDataFull['premiered'])[0];

foreach($decoded as $key=>$val)
{
    $decoded[$key]=mysqli_real_escape_string($con,$val);
}



$slug = seo_url($decoded['Title']);

//$decoded['Year'] = str_replace('–', '', $decoded['Year']); // api corrections

$img_src = $slug . '.jpg';
$image = get_url($decoded['Poster']);

file_put_contents("../cover/$img_src", $image) or die("unable to write image");

//Resizing Images
$percent_compression = 0.8;
$im = imagecreatefromstring($image);

$width = imagesx($im);
$height = imagesy($im);

$newwidth = $width * $percent_compression;
$newheight = $height * $percent_compression;

$thumb = imagecreatetruecolor($newwidth, $newheight);

imagecopyresized(
    $thumb,
    $im,
    0,
    0,
    0,
    0,
    $newwidth,
    $newheight,
    $width,
    $height
);

imagejpeg($thumb, "../images/$img_src"); //save image as jpg

$published = 'true';
$uploaded_by = 'scraper';

$chk_dt=query_data("select id from shows where imdb_id='$imdb_id'","UNITARY");

if($chk_dt)
{
    $show_id=$chk_dt['id'];

}
else
{
    $query =
    "INSERT INTO `shows`( imdb_id,show_name,`genre`, `country`, `description`, `stars`, `release_year`, `img_src`, `imdb_rating`, `slug`, `uploaded_by`, `published`, `director`, `writer`, `duration`, `language`, `rated`, `votes`, `total_seasons`) VALUES ('".$imdb_id."','" .
    $decoded['Title'] .
    "','" .
    $decoded['Genre'] .
    "','" .
    $decoded['Country'] .
    "','" .
    $decoded['Plot'] .
    "','" .
    $decoded['Actors'] .
    "','" .
    $decoded['Year'] .
    "','" .
    $img_src .
    "','" .
    $decoded['imdbRating'] .
    "','" .
    $slug .
    "','" .
    $uploaded_by .
    "','" .
    $published .
    "','" .
    $decoded['Director'] .
    "','" .
    $decoded['Writer'] .
    "','" .
    $decoded['Runtime'] .
    "','" .
    $decoded['Language'] .
    "','" .
    $decoded['Rated'] .
    "','" .
    $decoded['imdbVotes'] .
    "','" .
    $decoded['totalSeasons'] .
    "')";

query_insert($query);
$show_id=mysqli_insert_id($con);
//$show_id = 32;
}








// $dt=query_data("select * from shows order by id desc limit 3");
// var_dump($dt);

// die();
$quality_arr['ep_720p']=[];
$quality_arr['ep_1080p']=[];
$sub_arr['ep_en'] = [];


$subtitles = json_encode($sub_arr);

$quality = json_encode($quality_arr);
$published='true';



foreach($tvmazeDataFull['_embedded']['seasons'] as $key=>$val)
{
    $ep_arr=[];

    $sID=$val['id'];
    $season=$val['number'];
    $total_episodes=$val['episodeOrder'];
    $res=get_api("http://api.tvmaze.com/seasons/$sID/episodes");

   $epDecoded=json_decode($res,true);

   foreach($epDecoded  as $index=>$arr)
   {
      // $ep_arr[]['name']=mysqli_real_escape_string($con,$arr['name']);
       $ep_arr[$index]['name']=$arr['name'];
       $ep_arr[$index]['airtime']=$arr['airtime'];
       $ep_arr[$index]['airdate']=$arr['airdate'];
       $ep_arr[$index]['summary']=$arr['summary'];

   }
   var_dump($ep_arr);
   $ep_json=mysqli_real_escape_string($con, json_encode($ep_arr));
  // $ep_json=str_replace("\\'","'",$ep_json);
   //insert current season;
   $query = "INSERT INTO `seasons`( `show_id`, `total_ep`, `season`, `quality`, `english_sub`,ep_json,published) VALUES ('$show_id','$total_episodes','$season','$quality','$subtitles','$ep_json','$published')";
   echo $query;

   query_insert($query);
}



   
   

   
  //  die();

  


$dt=query_data("select * from seasons order by id desc limit 10");
var_dump($dt);

$dt=query_data("select * from shows order by id desc limit 4");
var_dump($dt);


   // die();

   
// $arr = get_defined_vars();
// var_dump($arr);

?>


list_episode[0]['name']
list_episode[0]['airdate']
list_episode[0]['airtime']
list_episode[0]['img_src']
list_episode[0]['summary']
