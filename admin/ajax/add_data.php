<?php

require $_SERVER['DOCUMENT_ROOT'] . "/includes/connect.php";
require $_SERVER['DOCUMENT_ROOT'] . "/includes/functions.php";
//.....type: movie, season, episode,

$root = $_SERVER['DOCUMENT_ROOT'];

if ($_POST['type'] == 'movie') {
    $sub_arr['en'] = '';
    $quality_arr['720p'] = '';
    $quality_arr['1080p'] = '';

    foreach ($_POST as $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($con, $value);
    }

    $slug = seo_url($_POST['Title']);

    //processing image
    $img_src = $slug . '.jpg';
    // if user uploads images
   // var_dump($_FILES);
    if ($_FILES['thumbnail']['name'] || $_FILES['cover']['name']) {
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
        $image = get_url($_POST['Poster']);

        file_put_contents($root . "/cover/$img_src", $image) or
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

        imagejpeg($thumb, $root . "/images/$img_src"); //save image as jpg
    }

    //.........Cheking if imdb directory exists
    $dir = $root . '/uploads/' . $_POST['imdbID'];
    if (!is_dir($dir)) {
        mkdir($dir, 755, true);
    }
    // mkdir($dir, 755, true);
    // echo $dir;
    // die();
    //...................processing English subtitles...................//

    if ($_SESSION['en']) {
        rename(
            $root . '/admin/fileuploader/uploads/' . $_SESSION['en'],
            $root . $upload_dir . "/" . $_POST['imdbID'] . "/$slug-en.vtt"
        ); //moving subtitles to final folder
        $sub_arr['en'] = "/" . $_POST['imdbID'] . "/$slug-en.vtt";
    }
    $subtitles = json_encode($sub_arr);

    //.....................processing videos................... mp4 720p mp4 1080p//

    if ($_SESSION['720p']) {
        $quality_arr['720p'] = "/" . $_POST['imdbID'] . "/$slug-720p.mp4";
        rename(
            $root . '/admin/fileuploader/uploads/' . $_SESSION['720p'],
            $root . $upload_dir . "/" . $_POST['imdbID'] . "/$slug-720p.mp4"
        );
    }
    if ($_SESSION['1080p']) {
        $quality_arr['1080p'] = "/" . $_POST['imdbID'] . "/$slug-1080p.mp4";
        rename(
            $root . '/admin/fileuploader/uploads/' . $_SESSION['1080p'],
            $root . $upload_dir . "/" . $_POST['imdbID'] . "/$slug-1080p.mp4"
        );
    }
    //.............moving videos to final folder.............//

    $quality = json_encode($quality_arr);

    $published = $_POST['status']; // Movie is ready to stream
    $uploaded_by = 'scraper'; // Or user

    // process the image

    $query =
        "INSERT INTO `movies_database`(`imdb_id`, `title`, `release_year`, `genre`, `country`, `img_src`, `imdb_rating`, `stars`, `description`, `english_sub`,  `quality`, `slug`, `uploaded_by`, `published`, `duration`, `director`, `writer`, `language`, `rated`, `production`, `votes`) VALUES ('" .
        $_POST['imdbID'] .
        "','" .
        $_POST['Title'] .
        "','" .
        $_POST['Year'] .
        "','" .
        $_POST['Genre'] .
        "','" .
        $_POST['Country'] .
        "','" .
        $img_src .
        "','" .
        $_POST['imdbRating'] .
        "','" .
        $_POST['Actors'] .
        "','" .
        $_POST['Plot'] .
        "','" .
        $subtitles .
        "','" .
        $quality .
        "','" .
        $slug .
        "','" .
        $uploaded_by .
        "','" .
        $published .
        "','" .
        $_POST['Runtime'] .
        "','" .
        $_POST['Director'] .
        "','" .
        $_POST['Writer'] .
        "','" .
        $_POST['Language'] .
        "','" .
        $_POST['Rated'] .
        "','" .
        $_POST['Production'] .
        "','" .
        $_POST['imdbVotes'] .
        "')";
    //  echo $query;

    if (query_insert($query)) {
        echo json_encode(true);
        ($_SESSION['en'] = '');
        $_SESSION['720p'] = '';
        $_SESSION['1080p'] = '';
    } else {
        echo json_encode(false);
    }
}


//...........................Adding tvshows and seaosn data...................................//

if ($_POST['type'] == 'season') {
    //to make season

    $sub_arr['ep_en'] = [];
    $quality_arr['ep_720p'] = [];
    $quality_arr['ep_1080p'] = [];

    foreach ($_POST as $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($con, $value);
    }

    $slug = seo_url($_POST['Title']);
    $season = $_POST['Season'];

    //processing image
    $img_src = $slug . '.jpg';
    // if user uploads images
    //   var_dump($_FILES);
    if ($_FILES['thumbnail']['name'] || $_FILES['cover']['name']) {
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
        $image = get_url($_POST['Poster']);

        file_put_contents($root . "/cover/$img_src", $image) or
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

        imagejpeg($thumb, $root . "/images/$img_src"); //save image as jpg
    }

    //.........Cheking if imdb directory exists
    $dir = $root . "/uploads/" . $_POST['imdbID'] . "/season$season";
    if (!is_dir($dir)) {
        mkdir($dir, 755, true);
    }
    // mkdir($dir, 755, true);
    // echo $dir;
    // die();

    //.................If imdb id is provided then fetch all upcoming episodes......................//
    if ($_POST['imdbID']) {
        $res = get_api(
            "http://api.tvmaze.com/lookup/shows?imdb=" . $_POST['imdbID']
        );

        //var_dump($res);
        //die();

        $tvmazeData = json_decode($res, true);
        $tvmazeID = $tvmazeData['id'];

        $res = get_api(
            "http://api.tvmaze.com/shows/$tvmazeID?embed[]=episodes&embed[]=seasons&embed[]=cast  "
        );

        $tvmazeDataFull = json_decode($res, true);

        $sID=$tvmazeDataFull['_embedded']['seasons'][($season-1)]['id'];
        
        $res=get_api("http://api.tvmaze.com/seasons/$sID/episodes");

        $epDecoded=json_decode($res,true);
     
        foreach($epDecoded  as $index=>$arr)
        {
           // $ep_arr[]['name']=mysqli_real_escape_string($con,$arr['name']);
            $ep_arr[$index]['name']=$arr['name'];
            $ep_arr[$index]['airtime']=$arr['airtime'];
            $ep_arr[$index]['airdate']=$arr['airdate'];
            $ep_arr[$index]['summary']=$arr['summary'];
     
        }
      //  var_dump($ep_arr);
        $ep_json=mysqli_real_escape_string($con, json_encode($ep_arr));
        
    }

    //...................processing English subtitles...................//

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
    }
    //.............moving videos to final folder.............//

    $quality = json_encode($quality_arr);

    $published = $_POST['status']; // Movie is ready to stream
    $uploaded_by = 'scraper'; // Or user
    $imdb_id = $_POST['imdbID'];

    $query_dt = query_data(
        "select id from shows where imdb_id='$imdb_id'",
        "UNITARY"
    );

    if ($query_dt) {
        $show_id = $query_dt['id'];
    } else {
        $query =
            "INSERT INTO `shows`( show_name,`genre`, `country`, `description`, `stars`, `release_year`, `img_src`, `imdb_rating`, `slug`, `uploaded_by`, `published`, `director`, `writer`, `duration`, `language`, `rated`, `votes`, `total_seasons`,imdb_id) VALUES ('" .
            $_POST['Title'] .
            "','" .
            $_POST['Genre'] .
            "','" .
            $_POST['Country'] .
            "','" .
            $_POST['Plot'] .
            "','" .
            $_POST['Actors'] .
            "','" .
            $_POST['Year'] .
            "','" .
            $img_src .
            "','" .
            $_POST['imdbRating'] .
            "','" .
            $slug .
            "','" .
            $uploaded_by .
            "','" .
            $published .
            "','" .
            $_POST['Director'] .
            "','" .
            $_POST['Writer'] .
            "','" .
            $_POST['Runtime'] .
            "','" .
            $_POST['Language'] .
            "','" .
            $_POST['Rated'] .
            "','" .
            $_POST['imdbVotes'] .
            "','" .
            $_POST['totalSeasons'] .
            "','" .
            $_POST['imdbID'] .
            "')";

        query_insert($query);

        $show_id = mysqli_insert_id($con);
    }

    // process the image

    $total_episodes = $_POST['list_episode'];

    $query = "INSERT INTO `seasons`( `show_id`, `total_ep`, `season`, `quality`, `english_sub`,published,ep_json) VALUES ('$show_id','$total_episodes','$season','$quality','$subtitles','$published','$ep_json')";

    query_insert($query);

    //updating seasons count
    $query= "update shows set total_seasons=(select count(show_id) from seasons where show_id='$show_id') where id='$show_id'";

    // $last_id = mysqli_insert_id($con);
    // var_dump(query_data("select * from seasons where id='$last_id'"));
    // var_dump($_SESSION);
    // die();

    if (query_insert($query)) {
        $_SESSION['ep_720p'] = [];
        $_SESSION['ep_1080p'] = [];
        $_SESSION['ep_en'] = [];
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
}

if ($_POST['type'] == 'episode') {
    foreach ($_POST as $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($con, $value);
    }

    //   $_POST['genre']=mysqli_real_escape_string($con,$_POST['genre']);

    $season_id = $_POST['season_id'];
    $episode_name = $_POST['episode_name'];
    $ep_num = $_POST['episode_number'];
    $download = $_POST['download_link'];
    $quality = $_POST['quality'];
    $link_1 = $_POST['link_1'];
    $link_2 = $_POST['link_2'];
    $link_3 = $_POST['link_3'];

    $query = "INSERT INTO `episodes`( `episode_number`, `episode_name`, `vidnode_link`, `season_id`, `openload_link`, `quality`, `link_3`) VALUES ('$ep_num','$episode_name','$link_1','$season_id','$link_2','$quality','$link_3')";

    //  echo $query;

    if (query_insert($query)) {
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
}

?>
