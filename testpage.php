<?php  
 //pagination.php  
 include 'conn-db.php';

 $record_per_page = 5;  
 $page = '';  
 $output = '';  

 if(isset($_POST["page"]))  
 {  
      $page = $_POST["page"];  
 }  
 else  
 {  
      $page = 1;  
 }  


 $start_from = ($page - 1)*$record_per_page;  
 $query = "SELECT * FROM user ORDER BY id DESC LIMIT $start_from, $record_per_page";  
 $result = $mysqli->query($query);
 
 while($row = mysqli_fetch_array($result))  
 {  
    $ID = $row['id'];
    
    echo "<div class=user-data>";
    echo "<p>".$row["name"]."</p>";
    echo "<p>".$row["email"]."</p>";
    echo "<p>".$row["phoneNumber"]."</p>";
    echo "<p>".$row["userType"]."</p>";

    echo "<p class=action >";
    echo "<a href="."./adminEdit.php?id=". $row['id'] .">"."<img  src=./assets/editing.png>"."</a>";
    echo "<a href=./adminDelete.php?id=". $row['id'] .">"."<img src=./assets/delete.png>"."</a>";
 

    echo "</p>";

    echo "</div>";
 }  
 
 $page_query = "SELECT * FROM user ORDER BY id DESC";  
 $page_result =  $result = $mysqli->query($page_query);
  
 $total_records = mysqli_num_rows($page_result);  
 $total_pages = ceil($total_records/$record_per_page);  
 echo "<div class = page-box>";
 for($i=1; $i<=$total_pages; $i++)  
 {  

      $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
 }  
 echo $output;  
 echo "</div>";
