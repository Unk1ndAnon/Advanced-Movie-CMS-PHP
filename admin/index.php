<?php


  require($_SERVER['DOCUMENT_ROOT']."/includes/connect.php");
  require($_SERVER['DOCUMENT_ROOT']."/admin/includes/functions.php");



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
  <link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">

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
            <h1>Dashboard</h1>
          </div>

          <?php

              $movie_dt=query_data("select count(id) as num from movies_database ","UNITART");
              $shows_dt=query_data("select count(id) as num from shows","UNITART");
           //  $episode_dt=query_data("select count(episode_id) as num from episodes","UNITART");
              $publish_dt=query_data("select count(id) as num from movies_database where published='true' ","UNITART");
              $unpublish_dt=query_data("select count(id) as num from movies_database where published='false' ","UNITART");
              $shows_p_dt=query_data("select count(id) as num from seasons where published='true'","UNITART");
              $shows_up_dt=query_data("select count(id) as num from seasons where published='false'","UNITART");

            
            ?>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-file-video"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Movies</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $movie_dt['num']?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-tv"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Tvshows</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $shows_dt['num']?>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Users</h4>
                  </div>
                  <div class="card-body">
                    47
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                  <i class="far fa-file-video"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>published Movies</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $publish_dt['num']?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file-video"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>unpublished Movies</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $unpublish_dt['num']?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                  <i class="far fa-file-video"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>published Seasons</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $shows_p_dt['num']?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file-video"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>unpublished Seasons</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $shows_up_dt['num']?>
                  </div>
                </div>
              </div>
            </div>



          </div>


          <div class="row">

            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Latest Movies</h4>
                  <div class="card-header-action">
                    <a href="all_movies.php" class="btn btn-primary">View All</a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                      <thead>
                        <tr>
                          <th>IMDB ID</th>
                          <th>Title</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <!--------------------------------- Iterating Latest Movies ----------------------------------->

                        <?php 

                      $query_dt=query_data("SELECT * from movies_database order by id desc limit 12");
                     

                      foreach($query_dt as $row)
                      {
                        $var_dt="del_entry(".$row['id'].",'movie')";
                          
                     echo'  <tr>
                         <td>
                           '.$row['imdb_id'].'
                           
                         </td>
                         <td>';
                          
                         
                             echo' <a href="#" class="font-weight-600"><img src="/images/'.$row['img_src'].'" alt="avatar" width="35" height="40" class="rounded-circle mr-1"> '.$row['title'].'</a>';
                          
                         
                           
                      echo'   </td>
                        <td>
                         <a href="edit_movie.php?id='.$row['id'].'" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
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

            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Latest TV Seasons</h4>
                  <div class="card-header-action">
                    <a href="all_shows.php" class="btn btn-primary">View All</a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                      <thead>
                        <tr>
                        <th>IMDB ID</th>
                          <th>Title</th>
                          <th>Season</th>
                          <th>Published Episodes</th>
                          <th>New Episodes(Released)</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <!--------------------------------- Iterating Latest Movies ----------------------------------->

                        <?php 

                      $query_dt=query_data("SELECT *,seasons.id as season_id,shows.id as show_id from shows join seasons on shows.id=seasons.show_id order by seasons.id desc limit 12");

                    
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
  <script src="assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
  <script src="assets/modules/chart.min.js"></script>
  <script src="assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="assets/modules/summernote/summernote-bs4.js"></script>
  <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/index-0.js"></script>

  <!-- JS Libraies -->
  <script src="assets/modules/sweetalert/sweetalert.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/modules-sweetalert.js"></script>



  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/all.js"></script>
</body>

</html>