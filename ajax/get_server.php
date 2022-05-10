<?php
include('../includes/connect.php');
include('../includes/functions.php');

//var_dump($_GET);

if($_GET['type']=='movie')
{
    $movie_id=mysqli_real_escape_string($con,$_GET['id']);
    $token=mysqli_real_escape_string($con,$_GET['token']);
    
    
    
    
    $data=query_data("select * from movies_database where id='$movie_id'","UNITARY");
    $imdb_id=$data['imdb_id'];
    $file=seo_url($data['title']);

    $quality=json_decode($data['quality'],true);
    $subtitles=json_decode($data['english_sub'],true);

    
    // echo $file;
    
    //var_dump($data);
    
    $ip = $_SERVER['REMOTE_ADDR'];
    $salt = $_ENV['salt'];
    $timestamp = time() + 360000; 
    $hash = md5($salt . $movie_id . $timestamp . $file); 
    
    
    
    // $url_720p='/demo_720p.mp4';
    // $url_1080p='/demo_1080p.mp4';
    if($quality['720p'])
    {
        $url_720p="/mv/$movie_id/720p?st=$hash&exp=$timestamp";
        $dl_720p="/mv/$movie_id/720p?st=$hash&exp=$timestamp&file=$file";
        $json_arr['jwplayer'][0]['file']=$url_720p;
        $json_arr['jwplayer'][0]['label']="720p";
        $json_arr['jwplayer'][0]['type']="video/mp4";

        $json_arr['server']['720p']="$url_720p";
        $json_arr['dl']=$dl_720p;
    }
    if($quality['1080p'])
    {
        $url_1080p="/mv/$movie_id/1080p?st=$hash&exp=$timestamp";
        $dl_1080p="/mv/$movie_id/1080p?st=$hash&exp=$timestamp&file=$file";
        $json_arr['jwplayer'][1]['file']=$url_1080p;
        $json_arr['jwplayer'][1]['label']="1080p";
        $json_arr['jwplayer'][1]['type']="video/mp4";

        $json_arr['server']['1080p']="$url_1080p";
        $json_arr['dl']=$dl_1080p;
        
    }

    if($subtitles['en'])
    {
        $json_arr['sub']['url']='/uploads'.$subtitles['en'];
        $json_arr['sub']['lang']='en';
    }


    
    $json_arr['server']['list']['1']="Server 1 HD";
    $json_arr['server']['host']='proj1.test';
    $json_arr['server']['selected']=1;
    $json_arr['server']['scheme']='http';

    
    
}
else
{
    $season=mysqli_real_escape_string($con,$_GET['s']);
    $episode=mysqli_real_escape_string($con,$_GET['e']);
    $show_id=mysqli_real_escape_string($con,$_GET['id']);

    $data=query_data("select * from seasons where show_id='$show_id' and season='$season'","UNITARY");

    if(!$data)
    {
        die('parsing error');
    }

    $date_added=$data['date_added'];
    $show_id=$data['show_id'];
    $quality=json_decode($data['quality'],true);
    $subtitles=json_decode($data['english_sub'],true);

    $ip = $_SERVER['REMOTE_ADDR'];
    $salt = $_ENV['salt'];
    $timestamp = time() + 360000; 
    $hash = md5($salt . $show_id . $timestamp . $date_added); 

    if(isset($quality['ep_720p'][($episode-1)]))
    {
        $url_720p="/tv/$show_id/720p?st=$hash&e=$episode&s=$season&exp=$timestamp";
        $dl_720p="/tv/$show_id/720p?st=$hash&e=$episode&s=$season&exp=$timestamp&file=$show_id";
        $json_arr['jwplayer'][0]['file']=$url_720p;
        $json_arr['jwplayer'][0]['label']="720p";
        $json_arr['jwplayer'][0]['type']="video/mp4";
        $json_arr['server']['720p']="$url_720p";
        $json_arr['dl']=$dl_720p;
    }
    if(isset($quality['ep_1080p'][$episode-1]))
    {
    $url_1080p="/tv/$show_id/1080p?st=$hash&e=$episode&s=$season&exp=$timestamp";
    $dl_1080p="/tv/$show_id/1080p?st=$hash&e=$episode&s=$season&exp=$timestamp&file=$show_id";
    $json_arr['jwplayer'][1]['file']=$url_1080p;
    $json_arr['jwplayer'][1]['label']="1080p";
    $json_arr['jwplayer'][1]['type']="video/mp4";
    $json_arr['server']['1080p']="$url_1080p";
    $json_arr['dl_hd']=$dl_1080p;

    }
    
    $json_arr['server']['list']['1']="Server 1 HD";
    $json_arr['server']['host']='proj1.test';
    $json_arr['server']['selected']=1;
    $json_arr['server']['scheme']='http';

    if($subtitles['ep_en'])
    {
        $json_arr['sub']['url']='/uploads'.$subtitles['ep_en'][($episode-1)];
        $json_arr['sub']['lang']='en';
    }

  

}

echo json_encode($json_arr);








?>