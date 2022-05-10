<?php

function query_data($query,$key='multi')
{
    global $con;
 //  var_dump($query);
    $res=mysqli_query($con,$query);
    if(!$res)
    {
        var_dump("Error description: " . mysqli_error($con));
    }
   
    if($key=='multi')
    {
        $query_data=mysqli_fetch_all($res,MYSQLI_ASSOC) ; 
    }
    else
    {
        $query_data=mysqli_fetch_array($res,MYSQLI_ASSOC) ; 
    }
    
    return $query_data;  

    

}

function query_insert($query)
{
    global $con;
  //  echo $query."<br/>";
    $res=mysqli_query($con,$query);
    if(!$res)
    {
        var_dump("Error description: " . mysqli_error($con));
    }
    
    return $res;

}



if(!isset($_SESSION['admin_id']))
{
   
  header('location: /admin/login.php');//Comment in developement mode
}



?>