<?php


  require($_SERVER['DOCUMENT_ROOT']."/includes/connect.php");
  require($_SERVER['DOCUMENT_ROOT']."/admin/includes/functions.php");

 

  $query_dt=query_data("SELECT * from footer ","UNITARY");

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
            <h1>Edit Footer</h1>
          </div>

       <div class="card edit-footer">
       <form action="" method="post">


                  <div class="card-header ">
                    <h4> Footer Widget </h4>
                  </div>

                  <div class="card-body ml-4">
                      
                      <div class="row">
                         
                      <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Footer 1*:</label>
                                <div class="col-sm-9">
                                <textarea style="min-height:220px" class="form-control" name="footer_1" placeholder=""><?php echo $query_dt['footer_1']?></textarea>
                                </div>
                                </div>
                          </div>
                          <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Footer 2*:</label>
                                <div class="col-sm-9">
                                <textarea style="min-height:220px" class="form-control" name="footer_2" placeholder=""><?php echo $query_dt['footer_2']?></textarea>
                                </div>
                                </div>
                          </div>
                          <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Footer 3*:</label>
                                <div class="col-sm-9">
                                <textarea style="min-height:220px" class="form-control" name="footer_3" placeholder=""><?php echo $query_dt['footer_3']?></textarea>
                                </div>
                                </div>
                          </div>
                          <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Footer 4*:</label>
                                <div class="col-sm-9">
                                <textarea style="min-height:220px" class="form-control" name="footer_4" placeholder=""><?php echo $query_dt['footer_4']?></textarea>
                                </div>
                                </div>
                          </div>

                           
                       </div>
                    </div> 
                    
                    

                       <input type="hidden" name="type" value="edit_footer">
                    
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

  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>

