<?php
include('../includes/connect.php');
include('../includes/functions.php');

//types: movie,tv,mv_tren,new_ep
//Datagroups: movie_grp,tv_grp

$types_query['movie']['base']="Select id from movies_database where published='true'";
$types_query['movie']['sub']="Select * from movies_database where published='true' ";
$types_query['tv']['base']="Select id from shows where published='true'";
$types_query['tv']['sub']="Select * from showswhere published='true'";
$types_query['mv_tren']['base']="Select id from movies_database where   published='true'";
$types_query['mv_tren']['sub']="Select * from movies_database where  published='true'";
$types_query['new_ep']['base']="Select id from new_eps_database where   published='true'";
$types_query['new_ep']['sub']="Select * from movies_datbase where";

foreach($_POST as $key=>$val)
{
    $_POST[$key]=mysqli_real_escape_string($con,$val);
}


$query=[];
$str_pass=false;

if($_POST['genres'])
{
    $genre_arr=explode(',',$_POST['genres']);

    foreach($genre_arr as $key=>$val)
    {
        $genre_arr[$key]="genre like '%$val%'";
    }

    $query[]=implode(' and ',$genre_arr);
    $str_pass=true;
}

if($_POST['abc']!='All')
{
    $aplha=$_POST['abc'];
    if($_POST['data_grp']=='movie')
    {
        $query[]="title regexp '^[$aplha]+'";
    }
    else
    {
        $query[]="show_name regexp '^[$aplha]+'"; 
    }
    $str_pass=true;
}

if($_POST['q'])
{
    if($_POST['data_grp']=='movie')
    {
        $query[]="title like '%".$_POST['q']."%'";
    }
    else
    {
        $query[]="show_name like '%".$_POST['q']."%'";
    }
    $str_pass=true;

}

$query_str=implode(' and ',$query);

$sort_by['Year']=" order by release_year desc";
$sort_by['Rating']=" order by imdb_rating desc";

if($_POST['data_grp']=='movie')
{
    $sort_by['Recent']=" order by id desc";  
}
else
{
    $sort_by['Recent']=" order by season_id desc";
}

$query_str.=$sort_by[$_POST['sortby']];

// Pagination code start......................../

        $page=$_POST['page'];
        $dt_pagination=$theme_dt['pagination_limit'];
        $query=$types_query[$_POST['type']]['base'];

        if($str_pass)
        {
            $query=$types_query[$_POST['type']]['sub']." and ".$query_str;
        }
        else
        {
            $query=$types_query[$_POST['type']]['sub'].$query_str;
        }

        $query_dt=query_data($query);

        $total_no_of_results=count($query_dt);

        //.................Pagination Parameters......................//


        $results_per_page=$dt_pagination;
        $offset=$results_per_page*($page-1);
        $pagination_limit=5;
        $pagination_max=$total_no_of_results/$results_per_page;

        if($str_pass)
        {
            $data = query_data($types_query[$_POST['type']]['sub']." and ".$query_str." limit $results_per_page offset $offset");
        }
        else
        {
            $data = query_data($types_query[$_POST['type']]['sub'].$query_str." limit $results_per_page offset $offset");
        }

        if($_POST['data_grp']=='movie')
        {
            foreach($data as $arr)
            {
                include('../includes/movie_block.php');
            }
        }
        if($_POST['data_grp']=='tv')
        {
            foreach($data as $arr)
            {
                include('../includes/tv_block.php');
            }
        }
        if($_POST['data_grp']=='ep')
        {
            foreach($data as $arr)
            {
                include('../includes/ep_block.php');
            }
        }

       
       
        // Pagination starts.............................

        echo"input type='hidden' class='nextpage' value='2'>
            <input type='hidden' class='isload' value='true'>
            <nav class='pagination'>
                <ul>";

        $pagination_start=(int)($page/$pagination_limit)*$pagination_limit;


         if($pagination_start==0)
         {
             $pagination_start=1;
         }
    
         if($pagination_start+$pagination_limit<$pagination_max)
         {
             if($pagination_start!=1)
             {
               echo" <li class='button'><a href='#' data-page='' data-type='prev' onclick='gotoPage(".($pagination_start-1).")'>Prev</a></li>";
             }
           
            for($i=$pagination_start;$i<$pagination_start+$pagination_limit;$i++)
            {
              if($page==$i)
              {
                  echo" <li><a class='current first num' onclick='gotoPage($i)' href='#'>$i</a></li>";
              }
              else
              {
                echo" <li><a class='first num' onclick='gotoPage($i)' href='#'>$i</a></li>";
              }
            }
      
            echo"<li><span>...</span></li>";
            echo" <li><a class='first num' onclick='gotoPage(".floor($pagination_max).")' href='#'>".floor($pagination_max)."</a></li>";            
           echo"   <li class='button'><a href='#' data-page='5' data-type='next' onclick='gotoPage($i)'>Next</a></li>";
         //  echo'<li class="page-item"><a title="Last" class="page-link" href="/trending?page='.floor($pagination_max).'">»</a></li>';
        }
    
        else
        {
            //case where total pagination limit < 5  like 1 2 3 4 ........
            if($pagination_start!=1)
            echo" <li class='button'><a href='#' data-page='' data-type='prev' onclick='gotoPage(".($pagination_start-1).")'>Prev</a></li>";
    
            for($i=$pagination_start;$i<=$pagination_max;$i++)
            {
                         if($page==$i)
              {
                echo" <li><a class='current first num' onclick='gotoPage($i)' href='#'>$i</a></li>";
              }
              else
              {
                echo" <li><a class=' first num' onclick='gotoPage($i)' href='#'>$i</a></li>";
              }
            }
      
            
         
       
      
        }

        echo" </ul>
        </nav>";
        

?>