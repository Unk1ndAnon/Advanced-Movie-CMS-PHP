<?php
chdir(dirname(__FILE__));
require "../../includes/connect.php";
require "../../includes/functions.php";

$imdb_id = $_GET['imdbID'];
if ($_GET['type'] == 'movie') {
    $res = get_api("https://api.gdriveplayer.us/v1/imdb/$imdb_id"); //Getting movie detail by imdb id
}
if ($_GET['type'] == 'season') {
    $res = get_api("http://api.tvmaze.com/lookup/shows?imdb=$imdb_id");

    //var_dump($res);
    //die();

    $tvmazeData = json_decode($res, true);
    $tvmazeID = $tvmazeData['id'];

    $res = get_api(
        "http://api.tvmaze.com/shows/$tvmazeID?embed[]=episodes&embed[]=seasons&embed[]=cast "
    );

    $tvmazeDataFull = json_decode($res, true);
    foreach($tvmazeDataFull['_embedded']['cast'] as $key=> $val)
    {
        $cast_arr[]=$val['person']['name'];
        if($key==4) break;
    }
    $cast=implode(',',$cast_arr);

    $decoded['Actors'] = $cast;
    $decoded['Title'] = $tvmazeDataFull['name'];
    $decoded['Language'] = $tvmazeDataFull['language'];
    $decoded['Genre'] = implode(',', $tvmazeDataFull['genres']);
    $decoded['Runtime'] = $tvmazeDataFull['runtime'];
    $decoded['imdbRating'] = $tvmazeDataFull['rating']['average'];
    $decoded['Country'] = $tvmazeDataFull['network']['country']['name'];
    $decoded['imdbID'] = $imdb_id;
    $decoded['Poster'] = $tvmazeDataFull['image']['original'];
    $decoded['Plot'] = $tvmazeDataFull['summary'];
    $decoded['totalSeasons'] = count($tvmazeDataFull['_embedded']['seasons']);
    $decoded['Year'] = explode('-', $tvmazeDataFull['premiered'])[0];

    $res=json_encode($decoded);
}

echo $res;

?>
