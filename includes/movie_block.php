<?php

  if($arr['uploaded_by']){ $cdn='';} else {$cdn=$img_cdn;}
  $description=$arr['description'];
      
  $tit=$arr['title'];
  $tit = str_replace(array('!',"'",".","@","^","$","/","?",":"),'',$tit);
  
//   $stars=str_replace(';','',$arr['stars']);
//   #  $stars=explode(',',$stars);
//   $genre=str_replace(';','',$arr['genre']);
//   #  $genre=explode(',',$genre);
  
  $country=$arr['country'];
  $id=$arr['imdb_id'];
  $year = $arr['release_year'];
  $image=$arr['img_src'];
  $image=$cdn.$image;
  $vidnode =$arr['source_link'];
  $rating=$arr['imdb_rating'];
  $duration=$arr['duration'];
  $url= str_replace(array('/images/','.png'),'',$image);
  $ex_id=$arr['id'];
  
  include($_SERVER['DOCUMENT_ROOT'].'/includes/movie_url_generator.php');

    echo'<div class="item">
                            <div class="item-flip">
                                <div class="movie-card-thumb">
                                    <img src="/images/'.$image.'" style="height: 248px;width:100%">
                                </div>
                                <div class="movie-card-info">
                                    <a  class="movie-card-link" href="'.$url.'">
                                    &nbsp;</a>
                                    <div class="item-details-inner">
                                        <h2 class="movie-card-title">'.$tit.'</h2>
                                        <div class="movie-card-rating">
                                        <div class="imdb-rating-container">
                                            <a class="imdb-rating-icon link" href="#"  title="IMDB Link">
                                            <i class="icon-star"></i>
                                            <span class="ng-binding">'.$rating.'</span>
                                            </a>
                                        </div>
                                        <div class="mf-year ng-binding">
                                        '.$year.'											
                                        </div>
                                        </div>
                                        <a class="btn btn-red btn-play" href="'.$url.'">
                                        Watch
                                        </a>
                                    </div>
                                </div>
                            </div>
                      </div>';

  ?>