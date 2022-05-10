<?php
require $_SERVER['DOCUMENT_ROOT'] . "/includes/connect.php";
require $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/functions.php";

//swal("Good job!", "You clicked the button!", "success");
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
  <div id="app">
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
            <h1>Add New Movie</h1>
          </div>

          <div class="card " id="uploader">
            <div class="card-header mb-1">
              <h4>Mp4 Files <i class="far fa-file-video"></i></h4>

            </div>
            <div class="card-body">

              <div class="col-12 ">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label ">720p Video (.mp4):</label>
                  <div class="col-sm-8">
                    <form id="upload" class="fileupload" method="post" action="fileuploader/upload.php"
                      enctype="multipart/form-data">
                      <div id="drop">
                        Drop Here

                        <a>Browse</a>
                        <input type="hidden" value="720p" name="quality" />
                        <input type="file" name="upl" multiple />
                      </div>

                      <ul>
                        <!-- The file uploads will be shown here -->
                      </ul>


                    </form>


                  </div>
                </div>
              </div>
              <div class="col-12 ">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label ">1080p Video (.mp4) :</label>
                  <div class="col-sm-8">
                    <form id="upload1" class="fileupload" method="post" action="fileuploader/upload.php"
                      enctype="multipart/form-data">
                      <div id="drop">
                        Drop Here OR

                        <a>Browse</a>
                        <input type="hidden" value="1080p" name="quality" />
                        <input type="file" name="upl" multiple />
                      </div>

                      <ul>
                        <!-- The file uploads will be shown here -->
                      </ul>


                    </form>



                  </div>
                </div>
              </div>
              <div class="col-12 ">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label ">English Subtitles(only .vtt) :</label>
                  <div class="col-sm-8">
                    <form id="upload2" class="fileupload" method="post" action="fileuploader/upload.php"
                      enctype="multipart/form-data">
                      <div id="drop">
                        Drop Here OR

                        <a>Browse</a>
                        <input type="hidden" value="english" name="subtitle" />
                        <input type="file" name="upl" multiple />
                      </div>

                      <ul>
                        <!-- The file uploads will be shown here -->
                      </ul>


                    </form>



                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="card add-movie">
            <div class="card-header ">
              <h4>Movie Details <i class="far fa-edit"></i></h4>
            </div>
            <div class="card-body">
              <form id="main" action="" method="post">
                <div class="row">
                  <div class="col-12">
                    <div class="row ml-4">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-1 col-form-label">IMDB ID:</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" name="imdbID" placeholder="IMDB ID like tt4003440">
                          </div>
                          <div class="col-sm-7">
                          <button id='fetchImdb' class="btn btn-lg btn-danger">Fetch IMDB</button>
                          <button  id='uniqueId' class="btn btn-lg btn-primary">Generate Unique ID</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Title:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="Title" placeholder="Movie Title">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Actors:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="Actors"
                              placeholder="(,) Comma Seperated like star1,star2">
                          </div>
                        </div>
                      </div>
                    


                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Genre:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="Genre"
                              placeholder="(,) Comma Seperated like genre1,genre2">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Release year:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="Year" placeholder="Release Year">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Country:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="Country" placeholder="Country">
                          </div>
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Rated:</label>
                          <div class="col-sm-9">
                            <input type="text"  class="form-control" name="Rated"
                              placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Runtime:</label>
                          <div class="col-sm-9">
                            <input type="text"  class="form-control" name="Runtime"
                              placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Director:</label>
                          <div class="col-sm-9">
                            <input type="text"  class="form-control" name="Director"
                              placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Writer:</label>
                          <div class="col-sm-9">
                            <input type="text"  class="form-control" name="Writer"
                              placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Language:</label>
                          <div class="col-sm-9">
                            <input type="text"  class="form-control" name="Language"
                              placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Language:</label>
                          <div class="col-sm-9">
                            <input type="text"  class="form-control" name="Language"
                              placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">imdbVotes:</label>
                          <div class="col-sm-9">
                            <input type="text"  class="form-control" name="imdbVotes"
                              placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Production:</label>
                          <div class="col-sm-9">
                            <input type="text"  class="form-control" name="Production"
                              placeholder="">
                          </div>
                        </div>
                      </div>
              
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">IMDB rating:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="imdbRating"
                              placeholder="Rating On a scale of 1-10">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Movie plot:</label>
                          <div class="col-sm-9">
                            <textarea style="min-height:140px" class="form-control" name="Plot"
                              placeholder="Movie Description"></textarea>
                          </div>
                        </div>
                      </div>
                 
                      <input type="hidden" class="form-control" name="Poster"
                              >

                      
                    </div>

                    <div class="col-md-12">
                      <hr>
                    </div>



                    <div class="card-header p-0">
                      <h4>Thumbnail <i class="far fa-images"></i></h4> <span>* Don't add images when using imdbID, Images will be fetched automatically</span>

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

                  <input type="hidden" name="type" value="movie">


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