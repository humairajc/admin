<?php include_once '../../model/db_config.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7f2e1bf77d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
 
    <title>Sub-category Table</title>
  </head>
  <body>
   
   <div class="wrapper">

   	
   	<div class="content">
   		<nav class="navbar navbar-expand-lg navbar-light bg-light">
   		
   		
   		
  <!--<a class="navbar-brand" href="#">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../../../controller/index.php"><i class="fas fa-home" >Home </i><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../controller/index.php">Back Add Sub-catagory</a>
      </li>
     
    </ul>
  </div>
 </nav>
 </div>
 </div>
 <p><h3 style="margin-left: 20%;color:lightgreen;">Sub-category List</h3></p>
 <style>
     
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 60%;
  margin-left:300px;
  margin-top:30px;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

</style>
 
 <table id="customers">
    <tr>
      <th>Sub-category ID</th>
      <th>Sub-category Name</th>
      <th>Sub-ategory Code</th>
    </tr>
    <?php 
    $sql="SELECT * from sub_category";

    $query=mysqli_query($link,$sql);
    while($info=mysqli_fetch_array($query)){
        ?>
        <tr>
           <td><?php echo $info['sub_cat_id']; ?> </td>
           <td><?php echo $info['sub_cat_name']; ?> </td>
           <td><?php echo $info['sub_cat_code']; ?> </td>
        </tr>
    <?php    
    };
   
    
 
    
    ?>
</table>    

  
    
    
    
    
    
  </body>
</html>