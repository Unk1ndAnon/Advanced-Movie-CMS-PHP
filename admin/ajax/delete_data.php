<?php

require($_SERVER['DOCUMENT_ROOT']."/includes/connect.php");
require($_SERVER['DOCUMENT_ROOT']."/includes/functions.php");
//.....type: movie, season, episode, 

$id=$_POST['id'];

if($_POST['type']=='movie')
{
    $query="delete from movies_database where id='$id'";
}

if($_POST['type']=='season')
{
    $query="delete from season where season_id='$id'";
}

if($_POST['type']=='episode')
{
    $query="delete from episodes where episode_id='$id'";
}



if(query_insert($query))
{
    echo json_encode(true);
}
else
{
    echo json_encode(false);
}  