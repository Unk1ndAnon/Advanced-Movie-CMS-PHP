<?php

require($_SERVER['DOCUMENT_ROOT']."/includes/connect.php");
require($_SERVER['DOCUMENT_ROOT']."/includes/functions.php");
//.....type: movie, season, episode, 

$id=$_POST['id'];
$action=$_POST['action'];

$id_str=implode(",",$id);

if($_POST['type']=='movie')
{
    if($action=='publish')
    {
        $query="update movies_database set published='true' where id in ($id_str)";
    }
    else
    {
        $query="update movies_database set published='flase' where id in ($id_str)";
    }
 
}

if($_POST['type']=='season')
{
 
    if($action=='publish')
    {
        $query="update season set published='true' where season_id in ($id_str)";
    }
    else
    {
        $query="update season set published='flase' where season_id in ($id_str)";
    }
}

// echo $query;



if(query_insert($query))
{
    echo json_encode(true);
}
else
{
    echo json_encode(false);
}  