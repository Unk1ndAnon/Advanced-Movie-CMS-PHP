<?php


  require($_SERVER['DOCUMENT_ROOT']."/includes/connect.php");
  require($_SERVER['DOCUMENT_ROOT']."/admin/includes/functions.php");

 
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

   <!-- General CSS Files -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
 
 

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">

  <style>
      .custom-control{
          font-weight:600;
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
cursor:pointer;
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
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
     
     <?php include('includes/header.php')?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
              <?php   $new_dt=query_data("SELECT * from shows join season on shows.show_id=season.show_id order by season_id desc limit 3");?>
            <h1>Add New Episodes </h1>
          </div>
          <div class="card add-episode">
                  <div class="card-header ">
                    <h4>Basic Details <i class="far fa-edit"></i>  <small>Recently Added Seasons(season_id): <?php foreach($new_dt as $arr) echo $arr['show_name']."(".$arr['season_id']. ") ";?>  </small></h4>
                  </div>
                  <div class="card-body">
                      <form action="" method="post">
                      <div class="row">
                          <div class="col-12">
                              <div class="row ml-4">
                      <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Season ID*:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="season_id" placeholder="Season ID of Show ">
                                </div>
                                </div>
                          </div>
                          <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Episode Number:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="episode_number" placeholder="i.e Episode 10">
                                </div>
                                </div>
                          </div> 
                          <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Episode Name(Optional):</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="episode name" placeholder="i.e Training camp from cleveland browns">
                                </div>
                                </div>
                          </div> 
                         
                          
                            
                           
                           

                        
                          
                          
                           

                          
                        <!--  <div class="col-md-6">
                          <div class="form-group p-0 mb-2 col-12">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" name="slider" value="slider" class="custom-control-input" id="slider">
                              <label class="custom-control-label pl-2" for="slider">Add To Slider</label>
                              
                            </div>
                          </div>
                          <div class="form-group p-0 col-12">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" name="featured" value="featured" class="custom-control-input" id="featured">
                              <label class="custom-control-label pl-2" for="featured">Add To Featured</label>
                              
                            </div>
                          </div>
                          </div>-->
                          
                          
    </div>

                          <div class="col-md-12">
                          <hr>
    </div>

                         

                          
                        

                           <div class="card-header mb-1 p-0">
                              <h4>Video Details (Iframe) <i class="far fa-file-video"></i></h4>

                          </div>
                    <div class="card-body">
                          <div class="col-12 ">
                          <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label ">Iframe Source Server 1 * :</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="link_1" placeholder="i.e //vidcloud.icu/streaming.php?id=MjMwNjc5&amp;title=The+House+That+Jack+Built&amp;typesub=SUB&amp;sub=&amp;cover=Y292ZXIvdGhlLWhvdXNlLXRoYXQtamFjay1idWlsdC1sYXJnZS5wbmc=">
                                </div>
                          </div>
                          </div>
                          <div class="col-12 ">
                          <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2  col-form-label">Iframe Source Server 2 :</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="link_2" placeholder="i.e https://streamango.com/embed/edtflndpesacaant">
                                </div>
                          </div>
                          </div>
                          <div class="col-12 ">
                          <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2  col-form-label">Iframe Source Server 3 :</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="link_3" placeholder="">
                                </div>
                          </div>
                          </div>
                          <div class="col-12 ">
                          <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2  col-form-label">Download Link :</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="download_link" placeholder="">
                                </div>
                          </div>
                          </div>
                          <div class="col-12 ">
                          <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2  col-form-label">Video Quality :</label>
                                <div class="col-sm-8">
                                <select class="form-control " name="quality">
                                    <option value="SD">SD</option>
                                    <option value="HD" selected="">HD</option>
                                    <option value="CAM">CAM</option>
                                </select>
                                </div>
                          </div>
                          </div>

                          <div class="col-12 ">
                          <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2  col-form-label">Publish :</label>
                                <div class="col-sm-8">
                                <select class="form-control " name="status">
                                    <option value="published" selected="">Now</option>
                                    <option value="pending">Later</option>
                                   
                                </select>
                                </div>
                                    </div>
                          </div>
                          </div>
                                   
                          

                    </div>    
                    
                    <input type="hidden" name="type" value="episode">
                         
                          
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
  <?php include('includes/footer.php')?>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
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

  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>