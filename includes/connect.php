<?php
session_start();
//var_dump(__FILE__);
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
$dotenv->load();

$user_name=$_ENV['user_name'];
$password=$_ENV['password'];
$database_name=$_ENV['database_name'];
$host=$_ENV['host'];

$con = mysqli_connect($host,"$user_name","$password","$database_name");




if(mysqli_connect_error())
{
   // var_dump(mysqli_connect_error());
    // die("coudnt connect");
}

$site='demosite.com';
$img_cdn='';
$stream_api='https://123movieshd.stream/';
$cdn=$img_cdn;
$twitter_url='';
$movie_url_id_addon=0;
$tv_url_id_addon=0;
$tit='';
$upload_dir="/uploads";


function seo_url($text)

    {
     
          // replace non letter or digits by -
          $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        
          // transliterate
          $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        
          // remove unwanted characters
          $text = preg_replace('~[^-\w]+~', '', $text);
        
          // trim
          $text = trim($text, '-');
        
          // remove duplicate -
          $text = preg_replace('~-+~', '-', $text);
        
          // lowercase
          $text = strtolower($text);
        
          if (empty($text)) {
            return 'n-a';
          }
        
          return $text;
        
        

    }
?>