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
            
            if($key=='stars' || $key=='show_name' || $key=='genre' || $key=='seasons.published')
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
            if($key=='stars' || $key=='show_name' || $key=='genre' || $key=='seasons.published')
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
    $query_dt=query_data("SELECT *,seasons.id as season_id,shows.id as show_id from shows join seasons on shows.id=seasons.show_id where $str order by seasons.id desc ");
  }
  else
  {
    $query_dt=query_data("SELECT *,seasons.id as season_id,shows.id as show_id from shows join seasons on shows.id=seasons.show_id order by seasons.id desc limit 200");
  }

  // echo "SELECT *,seasons.id as season_id,shows.id as show_id from shows join seasons on shows.id=seasons.show_id where $str order by seasons.id desc";
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

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">



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
            <h1>All Shows</h1>
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
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Season ID:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="imdb_id" placeholder="IMDB ID">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Showname:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="show_name" placeholder="Movie Name">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Year:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="release_year" placeholder="Release Year Of Movie">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Genre:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="genre" placeholder="Genre">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Actor:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="stars" placeholder="Actor">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">IMDB Rating:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="imdb_rating" placeholder="Any Number From 1-10 ">
                      </div>
                    </div>
                  </div>
               

                </div>

                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-lg btn-primary">Filter</button>
                  <button type="submit" class="btn btn-lg btn-danger ml-3 ">Reset</button>
                </div>
              </form>
              <hr />
            </div>


            <!---------------Data Tables-------------------------------------------->


            <div class="card">
              <div class="card-header">
                <h4>All Seasons <label class="ml-5"></h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <div class="row">
                      <div class="col-sm-12">
                        <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                          <div class="row">
                            <div class="col-sm-12">
                              <table class="table table-striped dataTable no-footer" id="table-1" role="grid"
                                aria-describedby="table-1_info">
                                <thead>
                                  <tr role="row">
                                  <th>IMDB ID</th>
                          <th>Title</th>
                          <th>Season</th>
                          <th>Published Episodes</th>
                          <th>New Episodes(Released)</th>
                          <th>Action</th>

                                
                                  </tr>
                                </thead>
                                <tbody>

                                <?php 



$date1=date_create(date("Y-m-d"));


foreach($query_dt as $row)
{
  $count=0;
  $ep_arr=json_decode($row['ep_json'],true);
  foreach($ep_arr as $ind=>$val)
  {
    $date=$val['airdate'];
    $date2=date_create($date);
    $diff=date_diff($date2,$date1);
    $res=(int)$diff->format("%R%a");
    if($res>0)
    {
      $count++;
    }
  }

  $new_ep=$count-$row['total_ep'];




  $var_dt="del_entry(".$row['season_id'].",'season')";
echo'  <tr>
   <td>
     '.$row['imdb_id'].'
     
   </td>
   <td>';
   
  
       echo' <a href="#" class="font-weight-600"><img src="/images/'.$row['img_src'].'" alt="avatar" width="35" height="40" class="rounded-circle mr-1"> '.$row['show_name'] .' </a>';
   
    
 echo'  </td>
 <td>Season '.$row['season'].'</td>
   
   <td> '.$row['total_ep'].'</td>';

 if($new_ep>0)  {echo'<td> '.$new_ep.' <div class="badge badge-danger ml-1 px-3">New</div></td>';}
 else{echo'<td> 0 </td>';}

echo'  <td>
   <a href="edit_show.php?id='.$row['id'].'" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
   <a class="btn btn-danger btn-action " data-toggle="tooltip" title="" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="'.$var_dt.'" data-original-title="Delete"><i class="fas fa-trash"></i></a>
 </td>
 </tr>';

}


 ?>

                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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