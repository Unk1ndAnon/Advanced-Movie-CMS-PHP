<?php
include('../includes/connect.php');
include('../includes/functions.php');

$show_id=mysqli_real_escape_string($con,$_GET['id']);
$season=mysqli_real_escape_string($con,$_GET['s']);

$query="select * from seasons where show_id='$show_id' and season='$season'";

$query_dt=query_data($query,"UNITARY");

//var_dump($query_dt);

$ep_arr=json_decode($query_dt['ep_json'],true);

//var_dump($ep_arr);

$json_arr=[];

for($i=0;$i<$query_dt['total_ep'];$i++)
{
  $json_arr[$i]['episode_number']=$i+1;
  $json_arr[$i]['title']=$ep_arr[$i]['name'];
  $json_arr[$i]['plot']=strip_tags( $ep_arr[$i]['summary']);
  $json_arr[$i]['release_date']=$ep_arr[$i]['airdate'];
  $json_arr[$i]['poster']=null;
}

echo(json_encode($json_arr));


// $arr = get_defined_vars();
// //var_dump($arr);




?>