<?php

$handler='movie';

$movie_url_dt=query_data("SELECT * from seo","UNITARY");

if($tit)
{
    $url= str_replace("[slug]",$tit,$movie_url_dt['movie_url']);
    
}
else
{
    $url= str_replace("[slug]",$title,$movie_url_dt['movie_url']);
   
}


$ex_id+=$movie_url_id_addon;

$url= str_replace("[id]",$ex_id,$url);
$url= seo_url($url);
$url= "/$handler/$url";

?>