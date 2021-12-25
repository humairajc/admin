
<?php 
    include_once '../model/db_config.php';
    
    $sql = "SELECT  * FROM category_type ORDER BY cat_type_id DESC  " ;
    $execute = mysqli_query($link,$sql);
    if($execute->num_rows>0){
        while($row=$execute->fetch_assoc()){
         echo '<tr>';
           echo '<td>'.$row['cat_type_name'].'</td>';
           echo '<td>'.$row['cat_type_code'].'</td>';
           //echo '<td> <a href="#">'.'Edit'.'</a></td>';
           echo '<td><a  href="../sub-category/controller/index.php">'.'Edit'.'</a></td>';
           echo '<td>'.'Delete'.'</td>';
         echo '</tr>';
      
     }
   }
  
 
    
?>  
   
   
