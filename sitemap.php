<?php header('Content-type: application/xml; charset=utf-8') ?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>


<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

<?php
include('includes/connect.php');
include('includes/functions.php');
$query="select * from movies_database where published='true' ";
$chk=mysqli_query($con,$query);

$domain="https://".$_SERVER['HTTP_HOST'];

if(!$chk)
{
    die("please reload the web page again");
}


$data=mysqli_fetch_all($chk,MYSQLI_ASSOC);


for($i=0;$i<count($data);$i++)
{
if(!preg_match('/.*?\./',$data[0]['description'],$description))
{
$description[0]=$data[$i]['description'];
}
    
    $tit=$data[$i]['filter_title'];


$tit = str_replace(array('!',"'",".","@","^","$","/","?",":"),'',$tit);

$stars=str_replace(';','',$data[$i]['stars']);
$stars=explode(',',$stars);


$genre=str_replace(';','',$data[$i]['genre']);
$genre=explode(',',$genre);

$country=$data[$i]['country'];

$id=$data[$i]['imdb_id'];
$year = $data[$i]['release_year'];
$image=$data[$i]['img_src'];
$vidnode =$data[$i]['source_link'];
$openload =$data[$i]['openload'];
$streamango=$data[$i]['streamango'];
$rapid =$data[$i]['rapid'];
$rating=$data[$i]['imdb_rating'];

$openload_down=str_replace('/embed/','/f/',$openload);

$subtitle=$data[$i]['english_sub'];
$url= str_replace(array('/images/','.png'),'',$image);
$ex_id=$data[$i]['id'];

include('includes/movie_url_generator.php');


    echo '<url> <loc>';

echo $domain.$url;

echo'</loc></url>';




}


echo'</urlset>';
?>