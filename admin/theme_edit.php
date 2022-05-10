<?php


  require($_SERVER['DOCUMENT_ROOT']."/includes/connect.php");
  require($_SERVER['DOCUMENT_ROOT']."/admin/includes/functions.php");

 

  $query_dt=query_data("SELECT * from theme ","UNITARY");

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
  <link rel="stylesheet" href="assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">

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
            <h1>Theme Options</h1>
          </div>

       <div class="card edit-theme">
       <form action="" method="post">


                  <div class="card-header ">
                    <h4>Logo/favicon</h4>
                  </div>

                  <div class="card-body ml-4">
                      
                      <div class="row">
                         
                      <div class="col-md-6 pr-5">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customthumb" name="logo">
                            <label class="custom-file-label" for="customthumb"><?php echo $query_dt['logo']?></label>
                            </div>

                          </div>
                          <div class="col-md-6 px-5">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customcover"  name="favicon">
                            <label class="custom-file-label" for="customcover"><?php echo $query_dt['favicon']?></label>
                            </div>

                          </div>
                           
                       </div>
                    </div> 
                    
                    

                     <div class="card-header ">
                    <h4>Social Data </h4>
                  </div>

                  <div class="card-body ml-4">
                      
                      <div class="row">

                       <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Facebook:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="facebook" value="<?php echo $query_dt['facebook']?>" >
                                </div>
                                </div>
                          </div> 

                           <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Twitter:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="twitter" value="<?php echo $query_dt['twitter']?>" >
                                </div>
                                </div>
                          </div> 
                          <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Youtube:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="youtube" value="<?php echo $query_dt['youtube']?>" >
                                </div>
                                </div>
                          </div> 

                        
                         
                    
                       </div>
                    </div>


                    
                    <div class="card-header ">
                    <h4>Theme Colours: </h4>
                  </div>

                  <div class="card-body ml-4">
                      
                      <div class="row">

                       <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Background Color:</label>
                                <div class="col-sm-9">
                                <div class="input-group colorpickerinput">
                        <input type="text" name="bg_color" value="<?php echo $query_dt['bg_color']?>" class="form-control">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <i class="fas fa-fill-drip"></i>
                          </div>
                        </div>
                      </div>
                         
                                </div>
                                </div>
                          </div> 


                           <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Main Color:</label>
                                <div class="col-sm-9">
                                <div class="input-group colorpickerinput">
                        <input type="text" name="main_color" value="<?php echo $query_dt['main_color']?>" class="form-control">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <i class="fas fa-fill-drip"></i>
                          </div>
                        </div>
                      </div>
                         
                                </div>
                                </div>
                          </div> 



                      </div>
                   </div>






                     <div class="card-header ">
                    <h4>Common Data: </h4>
                  </div>

                  <div class="card-body ml-4">
                      
                      <div class="row">
                      <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Pagination limit:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="pagination_limit" value="<?php echo $query_dt['pagination_limit']?>" >
                                </div>
                                </div>
                          </div> 


                           <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">No of Similar Movies:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="similar_movies" value="<?php echo $query_dt['similar_movies']?>" >
                                </div>
                                </div>
                          </div> 
                       </div>
                    </div>






                     <div class="card-header ">
                    <h4>Home Share content:<small>  (You can use HTML Tags and Attributes)</small> </h4>
                  </div>

                  <div class="card-body ml-4">
                      
                      <div class="row">

                     <div class="col-md-12">
                         <div class="form-group row">
                             
                                <div class="col-sm-12">
                                <textarea style="min-height:140px" class="form-control" name="home_share_content" placeholder="Write the content here"><?php echo $query_dt['home_share_content']?></textarea>
                                </div>
                                </div>
                        </div>

                         
                     

                         
                    
                       </div>
                    </div>



                    <div class="card-header ">
                    <h4>Video Share content <small>(You can use HTML Tags and Attributes)</small></h4>
                  </div>

                  <div class="card-body ml-4">
                      
                      <div class="row">

                     <div class="col-md-12">
                         <div class="form-group row">
                             
                                <div class="col-sm-12">
                                <textarea style="min-height:140px" class="form-control" name="video_share_content" placeholder="Write the content here"><?php echo $query_dt['video_share_content']?></textarea>
                                </div>
                                </div>
                        </div>

                         
                     

                         
                    
                       </div>
                    </div>




<div class="card-header ">
                    <h4>Comment </h4>
                  </div>

                  <div class="card-body ml-4">
                      
                      <div class="row">

                     <div class="col-md-12">
                         <div class="form-group row">
                             
                                <div class="col-sm-12">
                                <textarea style="min-height:140px" class="form-control" name="comment" placeholder="Write script here"><?php echo $query_dt['comment']?></textarea>
                                </div>
                                </div>
                        </div>

                         
                     

                         
                    
                       </div>
                    </div>

                       <input type="hidden" name="type" value="edit_theme">
                    
                  <div class="card-footer text-center">       
                   
                    <button type="submit" class="btn btn-lg btn-danger  ">Update</button>
                  </div>

                    </form>
        </div>


                  <hr>

          
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

  

  <script src="assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>




  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>

  <script>
      $(".colorpickerinput").colorpicker({
  format: 'hex',
  component: '.input-group-append',
});





</script>


</body>
</html>

