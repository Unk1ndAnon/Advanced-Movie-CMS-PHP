
<?php

$handler="tv-show";

$tv_url_dt=query_data("SELECT * from seo","UNITARY");

$url=str_replace("[slug]",$tit,$tv_url_dt['show_url']);



$url= str_replace("[id]",$show_id_loop,$url);
$url= seo_url($url);
$url= "/$handler/$url";



?>