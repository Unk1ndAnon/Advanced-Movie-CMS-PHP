<?php


  require($_SERVER['DOCUMENT_ROOT']."/includes/connect.php");
  require($_SERVER['DOCUMENT_ROOT']."/admin/includes/functions.php");

 

  $str='';
  $count=0;

  foreach($_GET as $key=>$param)
  {
     
      if($param)
      {
      

          if($count==0)
          {
            
            if($key=='stars' || $key=='title' || $key=='genre' || $key=='published')
            {
                $str.=$key." like'%".$param."%'";
            }
            else
            {
                $str.=$key."='".$param."'";
            }
          }
          else
          {
            if($key=='stars' || $key=='title' || $key=='genre'||  $key=='published')
            {
                $str.="and ".$key." like'%".$param."%'";
            }
            else
            {
                $str.="and ".$key."='".$param."'";
            }

            
          }

          $count++;
      }
     
  }


//echo "SELECT * from movies_database where $str order by id desc ";
//die();
  if($str)
  {
    $query_dt=query_data("SELECT * from movies_database where $str order by id desc ");
  }
  else
  {
    $query_dt=query_data("SELECT * from movies_database order by id desc limit 1000");
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
            <h1>All Movies</h1>
          </div>


          <div class="card">
                  <div class="card-header">
                    <h4>Filter Results</h4>
                  </div>
                  <div class="card-body">
                      <form action="">
                      <div class="row">
                          <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">IMDB ID:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  name="imdb_id" placeholder="IMDB ID">
                                </div>
                                </div>
                          </div> 
                          <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Movie ID:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  name="id" placeholder="Movie id">
                                </div>
                                </div>
                          </div> 
                          <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Title:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  name="title" placeholder="Movie Name">
                                </div>
                                </div>
                          </div> 
                          <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Year:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  name="release_year" placeholder="Release Year Of Movie">
                                </div>
                                </div>
                          </div>
                          <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Genre:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  name="genre" placeholder="Genre">
                                </div>
                                </div>
                          </div>  
                          <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Actor:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  name="stars" placeholder="Actor">
                                </div>
                                </div>
                          </div> 
                          <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">IMDB Rating:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  name="imdb_rating" placeholder="Any Number From 1-10 ">
                                </div>
                                </div>
                          </div> 
                          <div class="col-md-6">
                                <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Published:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  name="published" placeholder="true or false ">
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
                    <h4>All Movies<label class="ml-5">
                    <!--  <b>With Selected</b>: <select data-type='movie' name="table-2_length" aria-controls="table-2" class="form-control form-control-sm ml-1"><option value="publish">Publish</option><option value="unpublish">Unpublish</option><option value="none" selected >None</option></select></label>-->
                    </h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12"><div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12"><table class="table table-striped dataTable no-footer" id="table-1" role="grid" aria-describedby="table-1_info">
                        <thead>                                 
                          <tr role="row">

                          <th>
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                              <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                            </div>
                          </th>
                              <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1" aria-label="Task Name: activate to sort column ascending" style="width: 60px;"> ID</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Progress" style="width: 240.8px;">Title</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Members" style="width: 200.2px;">Genre</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Members" style="width: 150.2px;">Published</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Members" style="width: 80px;">Year</th>
                          
                            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 50.2px;">Rating</th>
                         
                            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 93.2px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>                                 
                          
                        <?php 
                      foreach($query_dt as $key=>$row)
                    {     
                        $row['genre']=str_replace(';',' ',$row['genre']);
                        $row['stars']=str_replace(';',' ',$row['stars']);
                        $var_dt="del_entry(".$row['id'].",'movie')";
                          
                      echo'  <tr role="row" class="odd">
                      <td class="text-center">
                            <div class="custom-checkbox custom-control">
                              <input data-id="'.$row['id'].'" type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-'.$key.'">
                              <label for="checkbox-'.$key.'" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                            <td class="sorting_1">
                             '.$row['id'].'
                            </td>
                            <td>'.$row['title'].'</td>
                            <td >
                            '.$row['genre'].'
                              </div>
                            </td>
                            <td >
                            '.$row['published'].'
                              </div>
                            </td>
                            <td>
                            '.$row['release_year'].'
                            </td>
                           
                            <td>'.$row['imdb_rating'].'</td>
                            <td>
                           <a href="edit_movie.php?id='.$row['id'].'" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
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