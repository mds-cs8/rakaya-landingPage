
<?php

// retrive data
include 'conn-db.php';

// find out the number of results stored in database
$limit = 5;
$page = 0;
$output = '';


// determine which page number visitor is currently on
if (isset($_POST['page']))
 {
    $page = $_POST['page'];
  
  } else {
    $page = 1;
  }

  
  // determine the sql LIMIT starting number for the results on the displaying page
  $start_from = ($page-1)*$limit;
  $query=mysqli_query($mysqli, "SELECT *from user ORDER BY id DESC LIMIT   $start_from, $limit ");
        $output  .= '
        <div class="box">
    <header>
        <h3>الاسم</h3>
        <h3>الايميل</h3>
        <h3>رقم الجوال</h3>
        <h3>نوع المستخدم</h3>
        <h3>الاجراء</h3>
    </header>

    
 ';


 if(mysqli_num_rows($query)>0)
 {
    while ($row = mysqli_fetch_array($query)) 
    { 
      
     $ID=$row['id'];

     $output  .= '
    echo "<div class=user>";
    echo "<p>".$row["name"]."</p>";
    echo "<p>".$row["email"]."</p>";
    echo "<p>".$row["phoneNumber"]."</p>";
    echo "<p>".$row["userType"]."</p>";

    echo "<p class=action >";
    echo "<a href="."./adminEdit.php?id="'. $row['id'] .">".'"<img  src=./assets/editing.png>"."</a>";
    echo "<a href=./adminDelete.php?id="'. $row['id'] .">".'"<img src=./assets/delete.png>"."</a>";
 

      ';
    }//end while
     
 }//end if
 else
 {
    $output  .= '
         echo "data not found" ;
    ';

 }

 $output  .= '
            echo "</p>";
            echo "</div>";
    ';

    //paginATION
$query=mysqli_query($mysqli, "SELECT * FROM user");
$total_records=mysqli_num_rows($query);
$total_pages = ceil($total_records/$limit);
$output  .= ' <ul class = pagination-box> ';

if($page>1)
{
    $previous = $page -1 ;
    $output  .= ' <li class = "page-item" id="1"><span class="page-link" >اول صفحة</span>  </li> ';
    $output  .= ' <li class = "page-item" id=".$previous."  ><span class="page-link" ><i class="fafa-arrow-left"></li> ';

}
for ($i=1;$i<=$total_pages;$i++) {
   $action_class="";
   if($i==$page)
   {
    $action_class="active";
   }
  
   $output  .= ' <li class = "page-item" '.$previous.' " id=" '.$i.'" ><span class="page-link" >'.$i.'</span><i class="fafa-arrow-left"></li> ';

}
if($page<$total_pages)
{
    $page++;
    $output .= '<li class = "page-item" id="'.$page.'"><span class="page-link" ><i class="fafa-arrow-right"></i></span></li>' ;
    $output .= '<li class = "page-item" id="'.$total_pages.'" ><span class="page-link">Last page</span></li>' ; 
}

$output .= '</ul>';
echo $output; 

?>

