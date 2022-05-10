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
            <h1>All Episodes</h1>
          </div>


          <div class="card">
                  <div class="card-header">
                    <h4>Filter Results</h4>
                  </div>
                  <div class="card-body">
                      <form action="">
                      <div class="row">
                         <!-- <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Episode ID:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  name="episode_id" placeholder="IMDB ID">
                                </div>
                                </div>
                          </div> -->
                          <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Showname:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  name="episode_name" placeholder="Show Name">
                                </div>
                                </div>
                          </div> 
                          
                      </div>
                    
                  <div class="card-footer text-center">       
                    <button type="submit" class="btn btn-lg btn-primary">Filter</button>
                    <button type="submit" class="btn btn-lg btn-danger ml-3 ">Reset</button>
                  </div>
              </form>
                  <hr/>
                </div>


                <!---------------Data Tables-------------------------------------------->


                <div class="card">
                  <div class="card-header">
                    <h4>All Episodes</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12"><div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12"><table class="table table-striped dataTable no-footer" id="table-1" role="grid" aria-describedby="table-1_info">
                        <thead>                                 
                          <tr role="row">
                              <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1" aria-label="Task Name: activate to sort column ascending" style="width: 60px;">Episode ID</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Progress" style="width: 260.8px;">Episode Name</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Members" style="width: 80.2px;">Season No.</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Members" style="width: 120.2px;">Showname.</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Members" style="width: 80.2px;">Episode No.</th>
                           
                         
                            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 93.2px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>                                 
                          
                        <?php 
                      foreach($query_dt as $row)
                    {     
                    //    $row['genre']=str_replace(';',' ',$row['genre']);
                      //  $row['stars']=str_replace(';',' ',$row['stars']);
                        $var_dt="del_entry(".$row['episode_id'].",'episode')";

                     

                      $show_name=  query_data("Select * from shows where show_id='".$row['show_id']."'","UNITARY");
                          
                      echo'  <tr role="row" class="odd">
                            <td class="sorting_1">
                             '.$row['episode_id'].'
                            </td>
                            <td>'.$row['episode_name'].'</td>
                            <td >
                            '.$row['season'].'
                              </div>
                            </td>
                            <td >
                            '.$show_name['show_name'].'
                              </div>
                            </td>
                            <td >
                            '.$row['episode_number'].'
                              </div>
                            </td>
                           
                            <td>
                           <a href="edit_episode.php?id='.$row['episode_id'].'" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                           <a class="btn btn-danger btn-action " data-toggle="tooltip" title="" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="'.$var_dt.'" data-original-title="Delete"><i class="fas fa-trash"></i></a>
                         </td>
                          </tr>';
                    }
                    ?>
                      
                        
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