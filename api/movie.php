<?php
chdir(dirname(__FILE__));
require("../includes/connect.php");
require("../includes/functions.php");


$res=get_api("https://api.gdriveplayer.us/v1/imdb/tt0468569"); //Getting movie detail by imdb id

//$res=get_api("https://api.gdriveplayer.us/v1/movie/newest"); //for getting latest movies added

//var_dump($res);
//die();


$decoded=json_decode($res,true);
var_dump($decoded);

foreach($decoded as $key=>$val)
{
    $decoded[$key]=mysqli_real_escape_string($con,$val);
}


$slug=seo_url($decoded['Title']);
$sub_arr['en']='subtitles.vtt';
$subtitles=json_encode($sub_arr);

$img_src=$slug.'.jpg';
$image= get_url($decoded['Poster']);

file_put_contents("../cover/$img_src",$image) or die("unable to write image");


//Resizing Images
$percent_compression=.8;
$im = imagecreatefromstring($image);

$width = imagesx($im);
$height = imagesy($im);

$newwidth = $width*$percent_compression;
$newheight = $height*$percent_compression;

$thumb = imagecreatetruecolor($newwidth, $newheight);

imagecopyresized($thumb, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

imagejpeg($thumb,"../images/$img_src"); //save image as jpg




$quality_arr=['720p'=>"/".$decoded['imdbID']."/$slug-720p.mp4",'1080p'=>"/".$decoded['imdbID']."/$slug-1080p.mp4"];
$quality=json_encode($quality_arr);
$published='true';
$uploaded_by='scraper';

$query_insert=query_insert("INSERT INTO `movies_database`(`imdb_id`, `title`, `release_year`, `genre`, `country`, `img_src`, `imdb_rating`, `stars`, `description`, `english_sub`,  `quality`, `slug`, `uploaded_by`, `published`, `duration`, `director`, `writer`, `language`, `rated`, `production`, `votes`) VALUES ('".$decoded['imdbID']."','".$decoded['Title']."','".$decoded['Year']."','".$decoded['Genre']."','".$decoded['Country']."','".$img_src."','".$decoded['imdbRating']."','".$decoded['Actors']."','".$decoded['Plot']."','".$subtitles."','".$quality."','".$slug."','".$uploaded_by."','".$published."','".$decoded['Runtime']."','".$decoded['Director']."','".$decoded['Writer']."','".$decoded['Language']."','".$decoded['Rated']."','".$decoded['Production']."','".$decoded['imdbVotes']."')")

?>