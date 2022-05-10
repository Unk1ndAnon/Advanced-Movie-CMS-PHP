<?php

function get_api($host)
{
    $apiEndpoint = $host;
#$timeout = 10;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$apiEndpoint);

curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json'
 ) );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
$curl_result=curl_exec($ch);
if (curl_error($ch)) {
  $error_msg = curl_error($ch);
  var_dump("ERror".$error_msg);
}
curl_close ($ch);

return $curl_result;


}



function get_url($Url){
    // is cURL installed yet?
    if (!function_exists('curl_init')){
      die('Sorry cURL is not installed!');
    }
   
    // OK cool - then let's create a new cURL resource handle
    global $ch,$error;
    $ch = curl_init();
   
    // Now set some options (most are optional)
   
    // Set URL to download
    curl_setopt($ch, CURLOPT_URL, $Url);
   
    // User agent
    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
   
    // Include header in result? (0 = yes, 1 = no)
    curl_setopt($ch, CURLOPT_HEADER, 0);
   
    // Should cURL return or print out the data? (true = retu	rn, false = print)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
  
   
    // Download the given URL, and return output
    $output = curl_exec($ch);
    global $httpcode;
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error=curl_errno($ch);
   
    // Close the cURL resource, and free system resources
    curl_close($ch);
    
    if(!$error)
    {
      return $output;
    }
    else
    {
      die("error code is ".$error." in the url".$Url);
    }
   
    
  }


function query_data($query,$key='multi')
{
    global $con;
  // var_dump($query);
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



$title=$country=$year=$genre=$stars=$rating=$description=$season_name=$name=$page='';

$replace_arr['title']=&$title;
$replace_arr['country']=&$country;
$replace_arr['plot']=&$description;
$replace_arr['year']=&$year;
$replace_arr['genre']=&$genre_str;
$replace_arr['stars']=&$stars_str;
$replace_arr['rating']=&$rating;
$replace_arr['season']=&$season_name;
$replace_arr['search']=&$name;
$replace_arr['page']=&$page;


function replace_code(&$replace_var)
{
    global $replace_arr;
    foreach($replace_arr as $key=>$value)
    {
        $replace_var=str_replace("[$key]",$value,$replace_var);
    }
    
}


$theme_dt=query_data("SELECT * from theme","UNITARY");
$site_dt=query_data("SELECT * from general_setting","UNITARY");
$footer_dt=query_data("SELECT * from footer","UNITARY");
$header_dt=query_data("SELECT * from header","UNITARY");
$ads_dt=query_data("SELECT * from ads","UNITARY");

$key=$site_dt['api_key'];








?>