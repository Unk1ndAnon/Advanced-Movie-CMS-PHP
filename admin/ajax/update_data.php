<?php

require($_SERVER['DOCUMENT_ROOT']."/includes/connect.php");
require($_SERVER['DOCUMENT_ROOT']."/includes/functions.php");
//.....type: movie, season, episode, 
$root=$_SERVER['DOCUMENT_ROOT'];

foreach($_POST as $key=>$value)
{
    $_POST[$key]=mysqli_real_escape_string($con,$value);
}


//var_dump($_POST);




if($_POST['type']=='movie')
{
    foreach ($_POST as $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($con, $value);
    }

    $id=$_POST['id'];
    $slug = seo_url($_POST['Title']);

    //processing image
    $img_src = $slug . '.jpg';
    // if user uploads images
    if (isset($_FILES)) {
        foreach ($_FILES as $key => $arr) {
            $errors = [];
            $file_name = $arr['name'];
            $file_size = $arr['size'];
            $file_tmp = $arr['tmp_name'];
            $file_type = $arr['type'];

            if ($key == 'thumbnail') {
                move_uploaded_file(
                    $file_tmp,
                    $_SERVER['DOCUMENT_ROOT'] . "/images/" . $img_src
                );
            }
            if ($key == 'cover') {
                move_uploaded_file(
                    $file_tmp,
                    $_SERVER['DOCUMENT_ROOT'] . "/cover/" . $img_src
                );
            }
        }
    } else {
        // processing images from remote server
        $image = file_get_contents($root.'/cover/'.$_POST['Poster']);

        file_put_contents("../cover/$img_src", $image) or
            die("unable to write image");
        //Resizing Images for thumbnails
        $percent_compression = 0.8;
        $im = imagecreatefromstring($image);

        $width = imagesx($im);
        $height = imagesy($im);

        $newwidth = $width * $percent_compression;
        $newheight = $height * $percent_compression;

        $thumb = imagecreatetruecolor($newwidth, $newheight);

        imagecopyresized(
            $thumb,
            $im,
            0,
            0,
            0,
            0,
            $newwidth,
            $newheight,
            $width,
            $height
        );

        imagejpeg($thumb, "../images/$img_src"); //save image as jpg
    }

    //.........Cheking if imdb directory exists
    $dir =$root. '/uploads/'.$_POST['imdbID'];
    if (!is_dir($dir)) {
        mkdir($dir, 755, true);
    }
    // mkdir($dir, 755, true);
    // echo $dir;
    // die();
    //...................processing English subtitles...................//
    $sub_arr['en'] = "/" . $_POST['imdbID'] . "/$slug-en.vtt";
        $subtitles = json_encode($sub_arr);

    if($_SESSION['en'])
    {
        rename($root.'/admin/fileuploader/uploads/'.$_SESSION['en'],$root.$upload_dir."/" . $_POST['imdbID'] . "/$slug-en.vtt");//moving subtitles to final folder
        
    }
   

    //.....................processing videos................... mp4 720p mp4 1080p//
    $quality_arr = [
        '720p' => "/" . $_POST['imdbID'] . "/$slug-720p.mp4",
        '1080p' => "/" . $_POST['imdbID'] . "/$slug-1080p.mp4",
    ];
    $quality = json_encode($quality_arr);

    //.............moving videos to final folder.............//
    if($_SESSION['720p'])
    {
        rename($root.'/admin/fileuploader/uploads/'.$_SESSION['720p'],$root.$upload_dir."/" . $_POST['imdbID'] . "/$slug-720p.mp4");
    }
    if($_SESSION['1080p'])
    {
        rename($root.'/admin/fileuploader/uploads/'.$_SESSION['1080p'],$root.$upload_dir."/" . $_POST['imdbID'] . "/$slug-1080p.mp4");
    }

    
    $published = $_POST['status']; // Movie is ready to stream
    $uploaded_by = 'user'; // Or user

    // process the image

    $query="UPDATE `movies_database` SET `imdb_id`='".$_POST['imdbID']."',`title`='".$_POST['Title']."',`release_year`='".$_POST['Year']."',`genre`='".$_POST['Genre']."',`country`='".$_POST['Country']."',`img_src`='".$img_src."',`imdb_rating`='".$_POST['imdbRating']."',`stars`='".$_POST['Actors']."',`description`='".$_POST['Plot']."',`english_sub`='".$subtitles."',`quality`='".$quality."',`slug`='".$slug."',`uploaded_by`='".$uploaded_by."',`published`='".$published."',`duration`='".$_POST['Runtime']."',`director`='".$_POST['Director']."',`writer`='".$_POST['Writer']."',`language`='".$_POST['Language']."',`rated`='".$_POST['Rated']."',`production`='".$_POST['Production']."',`votes`='".$_POST['imdbVotes']."' WHERE id='$id'";

    //  echo $query;

    if (query_insert($query)) {
        echo json_encode(true);
        $_SESSION['en']='';
        $_SESSION['720p']='';
        $_SESSION['1080p']='';
    } else {
        echo json_encode(false);
    }
   
   

   //  echo $query


}


//.....................Updating tvshows and seasons............................//

if($_POST['type']=='season')
{
    $sub_arr['ep_en'] = [];
    $quality_arr['ep_720p'] = [];
    $quality_arr['ep_1080p'] = [];

    foreach ($_POST as $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($con, $value);
    }

    $show_id=$_POST['showID'];
    $season_id=$_POST['seasonID'];
    $slug = seo_url($_POST['Title']);
    $season=$_POST['Season'];

    //processing image
    $img_src = $slug . '.jpg';
    // if user uploads images
    if (isset($_FILES)) {
        foreach ($_FILES as $key => $arr) {
            $errors = [];
            $file_name = $arr['name'];
            $file_size = $arr['size'];
            $file_tmp = $arr['tmp_name'];
            $file_type = $arr['type'];

            if ($key == 'thumbnail') {
                move_uploaded_file(
                    $file_tmp,
                    $_SERVER['DOCUMENT_ROOT'] . "/images/" . $img_src
                );
            }
            if ($key == 'cover') {
                move_uploaded_file(
                    $file_tmp,
                    $_SERVER['DOCUMENT_ROOT'] . "/cover/" . $img_src
                );
            }
        }
    } else {
        // processing images from remote server
        $image = file_get_contents($root.'/cover/'.$_POST['Poster']);

        file_put_contents("../cover/$img_src", $image) or
            die("unable to write image");
        //Resizing Images for thumbnails
        $percent_compression = 0.8;
        $im = imagecreatefromstring($image);

        $width = imagesx($im);
        $height = imagesy($im);

        $newwidth = $width * $percent_compression;
        $newheight = $height * $percent_compression;

        $thumb = imagecreatetruecolor($newwidth, $newheight);

        imagecopyresized(
            $thumb,
            $im,
            0,
            0,
            0,
            0,
            $newwidth,
            $newheight,
            $width,
            $height
        );

        imagejpeg($thumb, "../images/$img_src"); //save image as jpg
    }

    //.........Cheking if imdb directory exists
    $dir = $root . "/uploads/" . $_POST['imdbID'] . "/season$season";
    if (!is_dir($dir)) {
        mkdir($dir, 755, true);
    }
    // mkdir($dir, 755, true);
    // echo $dir;
    // die();
     //................Fetching season data.....................//
     $season_dt=query_data("select * from seasons where id='$season_id'","UNITARY");
     $quality_arr=json_decode($season_dt['quality'],"MYSQLI_ASSOC");
     $sub_arr=json_decode($season_dt['english_sub'],"MYSQLI_ASSOC");
     //...................processing English subtitles..................
     
 
     if ($_SESSION['ep_en']) {
         foreach ($_SESSION['ep_en'] as $key => $arr) {
             rename(
                 $root . '/admin/fileuploader/uploads/' . $arr,
                 $root .
                     $upload_dir .
                     "/" .
                     $_POST['imdbID'] .
                     "/season$season/ep" .
                     ($key + 1) .
                     ".vtt"
             ); //moving subtitles to final folder
             $sub_arr['ep_en'][] =
                 "/" .
                 $_POST['imdbID'] .
                 "/season$season/ep" .
                 ($key + 1) .
                 ".vtt";
         }
         $sub_arr['ep_en']=  array_unique( $sub_arr['ep_en']);
     }
     $subtitles = json_encode($sub_arr);
 
     //.....................processing videos................... mp4 720p mp4 1080p//
 
     if ($_SESSION['ep_720p']) {
         foreach ($_SESSION['ep_720p'] as $key => $arr) {
             rename(
                 $root . '/admin/fileuploader/uploads/' . $arr,
                 $root .
                     $upload_dir .
                     "/" .
                     $_POST['imdbID'] .
                     "/season$season/ep" .
                     ($key + 1) .
                     "-720p.mp4"
             ); //moving subtitles to final folder
             $quality_arr['ep_720p'][] =
                 "/" .
                 $_POST['imdbID'] .
                 "/season$season/ep" .
                 ($key + 1) .
                 "-720p.mp4";
         }
         $quality_arr['ep_720p']= array_unique( $quality_arr['ep_720p']);
       
     }
 
     if ($_SESSION['ep_1080p']) {
         foreach ($_SESSION['ep_1080p'] as $key => $arr) {
             rename(
                 $root . '/admin/fileuploader/uploads/' . $arr,
                 $root .
                     $upload_dir .
                     "/" .
                     $_POST['imdbID'] .
                     "/season$season/ep" .
                     ($key + 1) .
                     "-1080p.mp4"
             ); //moving subtitles to final folder
             $quality_arr['ep_1080p'][] =
                 "/" .
                 $_POST['imdbID'] .
                 "/season$season/ep" .
                 ($key + 1) .
                 "-1080p.mp4";
         }
         $quality_arr['ep_1080p']= array_unique( $quality_arr['ep_1080p']);
     }
     //.............moving videos to final folder.............//
 
     $quality = json_encode($quality_arr);
 
     $published = $_POST['status']; // Movie is ready to stream
     $uploaded_by = 'scraper'; // Or user
     $imdb_id = $_POST['imdbID'];
 
    // process the image

    $query="UPDATE `shows` SET `genre`='".$_POST['Genre']."',`country`='".$_POST['Country']."',`description`='".$_POST['Plot']."',`stars`='".$_POST['Actors']."',`release_year`='".$_POST['Year']."',`img_src`='$img_src',`imdb_rating`='".$_POST['imdbRating']."',`slug`='$slug',`uploaded_by`='$uploaded_by',`published`='$published',`director`='".$_POST['Director']."',`writer`='".$_POST['Writer']."',`duration`='".$_POST['Runtime']."',`language`='".$_POST['Language']."',`rated`='".$_POST['Rated']."',`votes`='".$_POST['imdbVotes']."',`show_name`='".$_POST['Title']."',`imdb_id`='".$_POST['imdbID']."' WHERE id='$show_id'";

    query_insert($query);

    $query="UPDATE `seasons` SET `season`='".$season."',`quality`='".$quality."',`english_sub`='".$subtitles."',`date_modified`=now() WHERE id='$season_id'";

    //  echo $query;

    if (query_insert($query)) {
        echo json_encode(true);
        $_SESSION['ep_720p']=[];
        $_SESSION['ep_1080p']=[];
        $_SESSION['ep_en']=[];
    } else {
        echo json_encode(false);
    }

}





if($_POST['type']=='setting_general')
{

     $query="UPDATE `general_setting` SET `title`='".$_POST['title']."',`keywords`='".$_POST['keywords']."',`description`='".$_POST['description']."',`admin_email`='".$_POST['admin_email']."',`analytics`='".$_POST['analytics']."',`api_key`='".$_POST['api_key']."' ";

   //  echo $query;
    
 
 
    if(query_insert($query))
     {
         echo json_encode(true);
     }
     else
     {
         echo json_encode(false);
     }  


}


if($_POST['type']=='setting_ads')
{
  
     $query="UPDATE `ads` SET `pop_ads`='".$_POST['pop_ads']."',`ads_1`='".$_POST['ads_1']."',`ads_2`='".$_POST['ads_2']."',`ads_3`='".$_POST['ads_3']."',`ads_4`='".$_POST['ads_4']."'";

   //  echo $query;
    
 
 
    if(query_insert($query))
     {
         echo json_encode(true);
     }
     else
     {
         echo json_encode(false);
     }  


}

if($_POST['type']=='setting_seo')
{
  

     $query="UPDATE `seo` SET `movie_tit`= '".$_POST['movie_tit']."',`movie_desc`= '".$_POST['movie_desc']."',`movie_keywords`=
     '".$_POST['movie_keywords']."',`show_tit`='".$_POST['show_tit']."',`show_desc`='".$_POST['show_desc']."',`show_keywords`='".$_POST['show_keywords']."',`movie_url`='".$_POST['movie_url']."',`show_url`='".$_POST['show_url']."'";

   //  echo $query;
    
 
 
    if(query_insert($query))
     {
         echo json_encode(true);
     }
     else
     {
         echo json_encode(false);
     }  


}



if($_POST['type']=='edit_header')
{

   
     $query="UPDATE `header` SET `menu`='".$_POST['menu']."'";

   //  echo $query;
    
 
 
    if(query_insert($query))
     {
         echo json_encode(true);
     }
     else
     {
         echo json_encode(false);
     }  


}



if($_POST['type']=='edit_footer')
{

  
   
     $query="UPDATE `footer` SET `footer_1`='".$_POST['footer_1']."',`footer_2`='".$_POST['footer_2']."',`footer_3`='".$_POST['footer_3']."',`footer_4`='".$_POST['footer_4']."'";

   //  echo $query;
    
 
 
    if(query_insert($query))
     {
         echo json_encode(true);
     }
     else
     {
         echo json_encode(false);
     }  


}

if($_POST['type']=='custom_js')
{
 
   
     $query="UPDATE `theme` SET `custom_js`='".$_POST['custom_js']."'";

   //  echo $query;
    
 
 
    if(query_insert($query))
     {
         echo json_encode(true);
     }
     else
     {
         echo json_encode(false);
     }  


}

if($_POST['type']=='custom_css')
{
  
   
     $query="UPDATE `theme` SET `custom_css`='".$_POST['custom_css']."'";

   //  echo $query;
    
 
 
    if(query_insert($query))
     {
         echo json_encode(true);
     }
     else
     {
         echo json_encode(false);
     }  


}

if($_POST['type']=='edit_theme')
{


    //var_dump($_FILES);
    // process the image
    if($_FILES['logo']['name'] || $_FILES['favicon']['name'] )
    {
        

        foreach($_FILES as $key=>$arr)
        {
            $errors= array();
            $file_name = $arr['name'];
            $file_size =$arr['size'];
            $file_tmp =$arr['tmp_name'];
            $file_type=$arr['type'];
           
         if($key=='logo')
         {
            move_uploaded_file($file_tmp,$_SERVER['DOCUMENT_ROOT']."/logo.png");
         } 
         if($key=='favicon')
         {
            move_uploaded_file($file_tmp,$_SERVER['DOCUMENT_ROOT']."/favicon.ico");
         } 

        }
      
        
          
   
       }
   
   
   
     $query="UPDATE `theme` SET `facebook`='".$_POST['facebook']."',`twitter`='".$_POST['twitter']."',`youtube`='".$_POST['youtube']."',`pagination_limit`='".$_POST['pagination_limit']."',`similar_movies`='".$_POST['similar_movies']."',`home_share_content`='".$_POST['home_share_content']."',`video_share_content`='".$_POST['video_share_content']."',`comment`='".$_POST['comment']."',`bg_color`='".$_POST['bg_color']."',`main_color`='".$_POST['main_color']."' ";

   //  echo $query;
    
 
 
    if(query_insert($query))
     {
         echo json_encode(true);
     }
     else
     {
         echo json_encode(false);
     }  


}

if($_POST['type']=='edit_profile')
{

foreach($_FILES as $key=>$arr)
        {
            $errors= array();
            $file_name = $arr['name'];
            $file_size =$arr['size'];
            $file_tmp =$arr['tmp_name'];
            $file_type=$arr['type'];
           
         if($key=='cover')
         {
            move_uploaded_file($file_tmp,$_SERVER['DOCUMENT_ROOT']."/temp.php");
         } 
    

        }

   
    
    if (strpos($_POST['password'], '$') !== false) {
      $hashed_password=$_POST['password'];
    }
    else
    {
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }

 

       
        
    //    var_dump($hashed_password);
  
   
     $query="UPDATE `admin` SET `admin_id`='".$_POST['admin_id']."',`email`='".$_POST['email']."',`password`='".$hashed_password."'";

   //  echo $query;
    
 
 
    if(query_insert($query))
     {
         echo json_encode(true);
     }
     else
     {
         echo json_encode(false);
     }  


}

if($_POST['type']=='edit_page')
{


   
  $tit=$_POST['tit'];
  $meta_tit=$_POST['meta_tit'];
  $desc=$_POST['desc'];
  $page=$_POST['page'];


       
        
    //    var_dump($hashed_password);
  
   
     $query="UPDATE meta set ".$page."_tit='$tit',".$page."_meta_tit='$meta_tit',".$page."_desc='$desc'";

  //  echo $query;
    
 
 
    if(query_insert($query))
     {
         echo json_encode(true);
     }
     else
     {
         echo json_encode(false);
     }  


}



?>