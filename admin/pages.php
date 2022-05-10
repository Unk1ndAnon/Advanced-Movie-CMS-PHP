<?php


  require($_SERVER['DOCUMENT_ROOT']."/includes/connect.php");
  require($_SERVER['DOCUMENT_ROOT']."/admin/includes/functions.php");

  $str='';
  $count=0;

  foreach($_GET as $key=>$param)
  {
     
      if($param)
      {
      
         $str.=$key." like'%".$param."%'";
      }
     
  }



  if($str)
  {
    $query_dt=query_data("SELECT episode_id,episode_name, episode_number,season,show_id FROM episodes JOIN season on season.season_id=episodes.season_id where $str order by episode_id desc LIMIT 200");
  }
  else
  {
    $query_dt=query_data("SELECT episode_id,episode_name, episode_number,season,show_id FROM episodes JOIN season on season.season_id=episodes.season_id order by episode_id desc LIMIT 700");
  }

  
 



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
   <link rel="stylesheet" href="assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">


  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
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
            <h1>All Pages</h1>
          </div>

                <!---------------Data Tables-------------------------------------------->


                <div class="card">
                  <div class="card-header">
                    <h4>Edit page</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12"><div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12"><table class="table table-striped dataTable no-footer" id="table-1" role="grid" aria-describedby="table-1_info">
                        <thead>                                 
                          <tr role="row">
                              <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1" aria-label="Task Name: activate to sort column ascending" style="width: 60px;">Serial No</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Progress" style="width: 260.8px;">Page</th>
                          
                            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 93.2px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>                                 
                          
                        </tr>
                          <tr role="row" class="odd">
                            <td class="sorting_1">
                             #
                            </td>
                            <td>All Movies</td>
                            
                            <td>
                           <a href="edit_page.php?id=movies" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                         
                         </td>
                          </tr>
                          </tr>
                          <tr role="row" class="odd">
                            <td class="sorting_1">
                             #
                            </td>
                            <td>All Tv Shows</td>
                            
                            <td>
                           <a href="edit_page.php?id=tvseries" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                         
                         </td>
                          </tr>
                          </tr>
                          <tr role="row" class="odd">
                            <td class="sorting_1">
                             #
                            </td>
                            <td>Latest Movies</td>
                            
                            <td>
                           <a href="edit_page.php?id=latest" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                         
                         </td>
                          </tr>
                          </tr>
                          <tr role="row" class="odd">
                            <td class="sorting_1">
                             #
                            </td>
                            <td>ON-AIR Shows</td>
                            
                            <td>
                           <a href="edit_page.php?id=onair" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                         
                         </td>
                          </tr>
                        <tr role="row" class="odd">
                            <td class="sorting_1">
                             #
                            </td>
                            <td>Search Page</td>
                            
                            <td>
                           <a href="edit_page.php?id=search" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                         
                         </td>
                          </tr>
                          <tr role="row" class="odd">
                            <td class="sorting_1">
                             #
                            </td>
                            <td>Country Page</td>
                            
                            <td>
                           <a href="edit_page.php?id=country" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                         
                         </td>
                          </tr>
                          </tr>
                          <tr role="row" class="odd">
                            <td class="sorting_1">
                             #
                            </td>
                            <td>Release Year Page</td>
                            
                            <td>
                           <a href="edit_page.php?id=release" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                         
                         </td>
                          </tr>
                          </tr>
                          <tr role="row" class="odd">
                            <td class="sorting_1">
                             #
                            </td>
                            <td>Genre Page</td>
                            
                            <td>
                           <a href="edit_page.php?id=genre" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                         
                         </td>
                          </tr>
                          </tr>
                          <tr role="row" class="odd">
                            <td class="sorting_1">
                             #
                            </td>
                            <td>Stars Page</td>
                            
                            <td>
                           <a href="edit_page.php?id=stars" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                         
                         </td>
                          </tr>
                      
                        
                        </tbody>
                      </table></div></div></div></div></div></div>
                    </div>
                  </div>
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
  
   <!-- JS Libraies -->
   <script src="assets/modules/datatables/datatables.min.js"></script>
  <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/modules-datatables.js"></script>

    <!-- JS Libraies -->
    <script src="assets/modules/sweetalert/sweetalert.min.js"></script>

<!-- Page Specific JS File -->
<script src="assets/js/page/modules-sweetalert.js"></script>

  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/all.js"></script>
  <script src="assets/js/custom.js"></script>

</body>
</html>