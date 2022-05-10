<?php
require $_SERVER['DOCUMENT_ROOT'] . "/includes/connect.php";
require $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/functions.php";

$season_id=$_GET['id'];

$query_dt=query_data("select *,shows.id as show_id from shows join seasons on seasons.show_id=shows.id where seasons.id='$season_id'","UNITARY");

$show_id=$query_dt['show_id'];

// var_dump($query_dt);
// die();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>123movies Admin Panel- 123streamcms</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />

  <!-- The main CSS file -->
  <link href="fileuploader/assets/css/style.css" rel="stylesheet" />


  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">



  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">

  <style>
    .custom-control {
      font-weight: 600;
    }

    .custom-file-input:lang(en)~.custom-file-label::after {
      content: "Browse";
    }

    .custom-file-input:lang(en)~.custom-file-label::after {
      content: "Browse";
    }

    .custom-file-label:after {
      height: calc(2.25rem + 4px);
      line-height: 2.2;
      width: 113px;
      border-color: #95606000;
    }

    .custom-file-label::after {

      padding: .375rem 1.9rem;
      cursor: pointer;
      color: white;
      content: "Browse";
      background-color: #fc544b;
      border-left: inherit;
      border-radius: 0 .25rem .25rem 0;
    }
  </style>
</head>

<body>
  <div id="app" style="position:relative">
  <div id="overlay">
  <div class="cssload-container">
<div class="cssload-speeding-wheel"></div>
</div>
  </div>
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      <?php include 'includes/header.php'; ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Update Season</h1>
          </div>

          <div class="card " id="uploader">
            <div class="card-header mb-1">
              <h4>Mp4 Files <i class="far fa-file-video"></i></h4>


              </b>
            </div>
            <div class="card-body">

<?php

$quality=json_decode($query_dt['quality'],"MYSQLI_ASSOC");

foreach($quality as $key=>$arr)
{
  for($i=0;$i<$query_dt['total_ep'];$i++)
  {
    if($key=='ep_720p')
    {
      $format='720';
    }
    else
    {
      $format='1080';
    }
    echo' <div class="col-12 ">
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label ">'.$format.'p Video (.mp4): Episode '.($i+1).'</label>
      <div class="col-sm-8">
        <form id="upload'.$format.''.$i.'" class="fileupload" method="post" action="fileuploader/upload.php"
          enctype="multipart/form-data">
          <div id="drop">';
          if(isset($arr[$i]))
          {
            echo ' Uploaded: '.$arr[$i].'';

          }
          else
          {
            echo'Browse';
          }
           
    
           echo' <a>Browse</a>
            <input type="hidden" value="'.$format.'p" name="quality" />
            <input type="hidden" value="'.($i+1).'" name="episode">
            <input type="file" name="upl" multiple />
          </div>
    
          <ul>
            <!-- The file uploads will be shown here -->
          </ul>
    
    
        </form>
    
    
      </div>
    </div>
    </div>';
  }

}

$subtitles=json_decode($query_dt['english_sub'],"MYSQLI_ASSOC");


foreach($subtitles as $key=>$arr)
{
  for($i=0;$i<$query_dt['total_ep'];$i++)
  {
    echo'   
    <div class="col-12 ">
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label ">English Subtitles(only .vtt) :Episode
          '.($i+1).'</label>
        <div class="col-sm-8">
          <form id="uploadep'.$i.'" class="fileupload" method="post" action="fileuploader/upload.php"
            enctype="multipart/form-data">
            <div id="drop">';
            if(isset($arr[$i]))
            {
              echo ' Uploaded: '.$arr[$i].'';
  
            }
            else
            {
              echo'Browse';
            }

             echo' <a>Browse</a>
              <input type="hidden" value="english" name="subtitle" />
              <input type="file" name="upl" multiple />
              <input type="hidden" value="'.($i+1).'" name="episode">
            </div>

            <ul>
              <!-- The file uploads will be shown here -->
            </ul>


          </form>



        </div>
      </div>
    </div>';

  }
}
?>

         

            </div>

          </div>

          <div class="card edit-season">
            <div class="card-header ">
              <h4>Season Details <i class="far fa-edit"></i></h4>
            </div>
       <?php echo'     <div class="card-body">
              <form id="main" action="" method="post">
                <div class="row">
                  <div class="col-12">
                    <div class="row ml-4">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-1 col-form-label">IMDB ID:</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" value="'.$query_dt['imdb_id'].'" name="imdbID" placeholder="IMDB ID like tt4003440">
                          </div>
                          <div class="col-sm-7">
                            <button id="fetchImdb" class="btn btn-lg btn-danger">Fetch IMDB</button>
                            <button id="uniqueId" class="btn btn-lg btn-primary">Generate Unique ID</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Title:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="'.$query_dt['show_name'].'"  name="Title" placeholder="Season Title">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Season No:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="'.$query_dt['season'].'"  name="Season"
                              placeholder="Season Number in integer like 5">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Actors:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="'.$query_dt['stars'].'"  name="Actors"
                              placeholder="(,) Comma Seperated like star1,star2">
                          </div>
                        </div>
                      </div>



                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Genre:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="'.$query_dt['genre'].'"  name="Genre"
                              placeholder="(,) Comma Seperated like genre1,genre2">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Release year:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="'.$query_dt['release_year'].'"  name="Year" placeholder="Release Year">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Country:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="'.$query_dt['country'].'"  name="Country" placeholder="Country">
                          </div>
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Rated:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="'.$query_dt['rated'].'"  name="Rated" placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Runtime:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="'.$query_dt['duration'].'"  name="Runtime" placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Director:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="'.$query_dt['director'].'"  name="Director" placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Writer:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="'.$query_dt['writer'].'"  name="Writer" placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Language:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="'.$query_dt['language'].'"  name="Language" placeholder="">
                          </div>
                        </div>
                      </div>
                    
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">imdbVotes:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="'.$query_dt['votes'].'"  name="imdbVotes" placeholder="">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">IMDB rating:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="'.$query_dt['imdb_rating'].'"  name="imdbRating"
                              placeholder="Rating On a scale of 1-10">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Season plot:</label>
                          <div class="col-sm-9">
                            <textarea style="min-height:140px" class="form-control"   name="Plot"
                              placeholder="Season Description">'.$query_dt['description'].'</textarea>
                          </div>
                        </div>
                      </div>

                      <input type="hidden" value=" '.$season_id.'" class="form-control" name="seasonID">
                      <input type="hidden" value="'. $show_id.'" class="form-control" name="showID">
                      <input type="hidden" value="'.$query_dt['img_src'].'"  class="form-control" name="Poster">
                      <input type="hidden" value="'.$query_dt['total_seasons'].'"  class="form-control" name="totalSeasons">
                      <input type="hidden" value="'.$query_dt['total_ep'].'"  class="form-control" name="list_episode">';?>


                    </div>

                    <div class="col-md-12">
                      <hr>
                    </div>



                    <div class="card-header p-0">
                      <h4>Thumbnail <i class="far fa-images"></i></h4>

                    </div>
                    <div class="card-body col-12">
                      <div class="row">
                        <div class="col-md-6 pr-5">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customthumb" name="thumbnail">
                            <label class="custom-file-label" for="customthumb">Choose Thumbnail Image</label>
                          </div>

                        </div>
                        <div class="col-md-6 px-5">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customcover" onclick="readURL(this)"
                              name="cover">
                            <label class="custom-file-label" for="customcover">Choose Cover Image</label>
                          </div>

                        </div>
                      </div>
                    </div>

                    <div class="card-header mb-1 p-0">
                      <h4>Video Details <i class="far fa-file-video"></i></h4>

                    </div>
                    <div class="card-body">





                      <div class="col-12 ">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2  col-form-label">Publish :</label>
                          <div class="col-sm-8">
                            <select class="form-control " name="status">
                              <option value="true" selected="">Now</option>
                              <option value="false">Later</option>

                            </select>
                          </div>
                        </div>
                      </div>
                    </div>



                  </div>

                  <input type="hidden" name="type" value="season">


                </div>


                <div class="card-footer text-center">

                  <button type="submit" class="btn btn-lg btn-danger  ">Submit</button>
                </div>
              </form>
              <hr>
            </div>


            <!---------------Data Tables-------------------------------------------->






          </div>


        </section>
      </div>
      <?php include 'includes/footer.php'; ?>
      <hr>
    </div>


    <!---------------Data Tables-------------------------------------------->






  </div>



  <!-- General JS Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  <script src="assets/js/add-data.js"></script>

  <!-- JS Libraies -->
  <script src="assets/modules/sweetalert/sweetalert.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/modules-sweetalert.js"></script>

  <!-- JavaScript Includes -->

  <script src="fileuploader/assets/js/jquery.knob.js"></script>

  <!-- jQuery File Upload Dependencies -->
  <script src="fileuploader/assets/js/jquery.ui.widget.js"></script>
  <script src="fileuploader/assets/js/jquery.iframe-transport.js"></script>
  <script src="fileuploader/assets/js/jquery.fileupload.js"></script>

  <!-- Our main JS file -->
  <script src="fileuploader/assets/js/script.js"></script>


  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>




</body>

</html>