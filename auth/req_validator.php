<?php

include('../includes/connect.php');
include('../includes/functions.php');

$hashGiven =mysqli_real_escape_string($con, $_GET['st']);
$timestamp = mysqli_real_escape_string($con,$_GET['exp']);

if($_GET['type']=='movie')
{
    $param=parse_url($_SERVER['REQUEST_URI']);
preg_match('/\/mv\/[0-9]+\/(.*)/',$param['path'],$qu);

$quality=mysqli_real_escape_string($con,$qu[1]);



$id=mysqli_real_escape_string($con, $_GET['id']);

$data=query_data("select * from movies_database where id='$id'","UNITARY");
$file=seo_url($data['title']);
$quality_arr=json_decode($data['quality'],true);
$subtitles_arr=json_decode($data['english_sub'],true);


$salt = $_ENV['salt'];
$hash = md5($salt  .$id. $timestamp . $file);


if($quality=='720p')
{
    $filePath=$_SERVER['DOCUMENT_ROOT'].'/uploads'.$quality_arr['720p'];
}
if($quality=='1080p')
{
    $filePath=$_SERVER['DOCUMENT_ROOT'].'/uploads'.$quality_arr['1080p'];
}

// var_dump($filePath);
// die();




}
else
{
    $season=mysqli_real_escape_string($con,$_GET['s']);
    $episode=mysqli_real_escape_string($con,$_GET['e']);
    $show_id=mysqli_real_escape_string($con,$_GET['id']);


    $param=parse_url($_SERVER['REQUEST_URI']);
    preg_match('/\/tv\/[0-9]+\/(.*)/',$param['path'],$qu);
    
    $quality=mysqli_real_escape_string($con,$qu[1]);


    $data=query_data("select * from seasons where show_id='$show_id' and season='$season'","UNITARY");

    if(!$data)
    {
        die('parsing error');
    }

    $date_added=$data['date_added'];
    $show_id=$data['show_id'];
    $quality_arr=json_decode($data['quality'],true);
    $subtitles=json_decode($data['english_sub'],true);

 
    $salt = $_ENV['salt'];

    $hash = md5($salt . $show_id . $timestamp . $date_added); 

    if($quality=='720p')
    {
        $filePath=$_SERVER['DOCUMENT_ROOT'].'/uploads'.$quality_arr['ep_720p'][($episode-1)];
    }
    if($quality=='1080p')
    {
        $filePath=$_SERVER['DOCUMENT_ROOT'].'/uploads'.$quality_arr['ep_1080p'][($episode-1)];
    }

    // var_dump($filePath);
    // die();
}





if($hashGiven == $hash && $timestamp >= time()) 
{
 
 
    if(isset($_GET['file']))
    {
      $fileName=basename($filePath);
      $file = fopen($filePath, 'r');
      header("Content-Type:video/mp4");
      header("Content-Length: ".filesize($filePath));
      header("Content-Disposition: attachment; filename=\"{$fileName}\"");
   
      fpassthru($file);
      fclose($file);
    }
    else
    {
      $file = $filePath;
      $fp = @fopen($file, 'rb');
      
      $size   = filesize($file); // File size
      $length = $size;           // Content length
      $start  = 0;               // Start byte
      $end    = $size - 1;       // End byte
      
      header('Content-type: video/mp4');
      header("Accept-Ranges: 0-$length");
      if (isset($_SERVER['HTTP_RANGE'])) {
      
          $c_start = $start;
          $c_end   = $end;
      
          list(, $range) = explode('=', $_SERVER['HTTP_RANGE'], 2);
          if (strpos($range, ',') !== false) {
              header('HTTP/1.1 416 Requested Range Not Satisfiable');
              header("Content-Range: bytes $start-$end/$size");
              exit;
          }
          if ($range == '-') {
              $c_start = $size - substr($range, 1);
          }else{
              $range  = explode('-', $range);
              $c_start = $range[0];
              $c_end   = (isset($range[1]) && is_numeric($range[1])) ? $range[1] : $size;
          }
          $c_end = ($c_end > $end) ? $end : $c_end;
          if ($c_start > $c_end || $c_start > $size - 1 || $c_end >= $size) {
              header('HTTP/1.1 416 Requested Range Not Satisfiable');
              header("Content-Range: bytes $start-$end/$size");
              exit;
          }
          $start  = $c_start;
          $end    = $c_end;
          $length = $end - $start + 1;
          fseek($fp, $start);
          header('HTTP/1.1 206 Partial Content');
      }
      header("Content-Range: bytes $start-$end/$size");
      header("Content-Length: ".$length);
      
      
      $buffer = 1024 * 8;
      while(!feof($fp) && ($p = ftell($fp)) <= $end) {
      
          if ($p + $buffer > $end) {
              $buffer = $end - $p + 1;
          }
          set_time_limit(0);
          echo fread($fp, $buffer);
          flush();
      }
      
      fclose($fp);
       clearstatcache();
      
    }
   
}
else 
{
    die('link expired or invalid');
}

?>