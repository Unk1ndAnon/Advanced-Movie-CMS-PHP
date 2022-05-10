<?php


  require($_SERVER['DOCUMENT_ROOT']."/includes/connect.php");
  require($_SERVER['DOCUMENT_ROOT']."/admin/includes/functions.php");



  $query_dt=query_data("SELECT * from general_setting ","UNITARY");

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
            <h1>Site Settings</h1>
          </div>

       <div class="card setting-general">
                  <div class="card-header ">
                    <h4>General Setting <i class="far fa-edit"></i></h4>
                  </div>
                  <div class="card-body">
                      <form action="" method="post">
                      <div class="row">
                          <div class="col-12">
                              <div class="row ml-4">
                      <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Site Title:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="title" value="<?php echo $query_dt['title']?>" >
                                </div>
                                </div>
                          </div>
                          <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Site Keywords:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="keywords"  value="<?php echo $query_dt['keywords']?>"  placeholder="Keywords-(,) Comma Seperated">
                                </div>
                                </div>
                          </div> 
                          <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Tagline/Description:</label>
                                <div class="col-sm-9">
                                <textarea style="min-height:140px" class="form-control" name="description" placeholder=""><?php echo $query_dt['description']?></textarea>
                                </div>
                                </div>
                          </div>
                         
                          
                      
                    
                         

                          <div class="card-header p-0">
                              <h4>Admin Email <i class="fas fa-user-cog"></i></h4>

                          </div>
                      <div class="card-body col-12">
                          <div class="row">
                          <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Admin Email:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="admin_email" value="<?php echo $query_dt['admin_email']?>"  >
                                </div>
                                </div>
                          </div> 
                          <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Admin Api-key:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="api_key" value="<?php echo $query_dt['api_key']?>"  >
                                </div>
                                </div>
                          </div> 
                         
    </div>
    </div>  

                           <div class="card-header mb-1 p-0">
                              <h4>Google Analytics  <i class="far fa-chart-bar"></i></h4>

                          </div>
                    <div class="card-body">
                    <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Google Analytics Code*:</label>
                                <div class="col-sm-9">
                                <textarea style="min-height:200px" class="form-control" name="analytics" placeholder=""><?php echo $query_dt['analytics']?></textarea>
                                </div>
                                </div>
                          </div>


                             
                         
                          
                                   
                          

                    </div>    
                    
                    <input type="hidden" name="type" value="setting_general">
              
                         
                          
                      </div>

                      
                    
                  <div class="card-footer text-center">       
                   
                    <button type="submit" class="btn btn-lg btn-danger  ">Update</button>
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

