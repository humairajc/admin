
<?php include_once '../model/db_config.php'; ?>

<?php
    $cat_type_code="";
    $cat_type_name=""; 
    $error1=$error2=$error3=$success="";
    if($_SERVER['REQUEST_METHOD']=="POST"){
    $cat_type_name =trim($_POST['cat_type_name']);
    $cat_type_code =trim($_POST['cat_type_code']); 
        $cat_type_name =trim($_POST['name']);
        $cat_type_code =trim($_POST['code']);
        echo $cat_type_name;
        if(empty($cat_type_name)&&empty($cat_type_code)){
            $error1="Pleass fill up both froms";
        }
        elseif(empty($cat_type_name)){
            $error2="Pleass write catagory type name";
        }
        elseif(empty($cat_type_code)){
            $error3="Pleass write catagory type code";
        }
        else {
            $sql = "INSERT INTO category_type (cat_type_name, cat_type_code) VALUES (?, ?)";
            $sql_statment = mysqli_prepare($link,$sql);
            if ($sql_statment){
                
                mysqli_stmt_bind_param($sql_statment, "ss", $var1,$var2);
                $var1=$cat_type_name;
                $var2 = $cat_type_code;
                $execute = mysqli_stmt_execute($sql_statment);
                if($execute){
                    $success="Successfully Inserted";
                   // header("location: index.php");
                }
                else{
                    echo "Oops! Something went wrong. Please try again later.";
                }   
            }
        } 
     
    } 
             
 
?> 
 
<!doctype html>
<html lang="en">
  <?php include '../view/layout/header.php'; ?>
  <body>
   
<div class="wrapper">

   <?php include '../view/layout/side_navbar.php'; ?>	
   	
  <div id="content">

    <?php include '../view/layout/content_menu.php'; ?>
  
    <div class="container mt-5">
    
      <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <h3>Add Category Type</h3>
                <span id="main_notification" style="display:none;"></span>
                <?php
                if(!empty($success)){
                    echo'<span style="color:green;">'.$success.'</span>';
                }
                else {
                    echo'<span style="color:red;">'.$error1.'</span>';
                }
                ?>
            </div>
          <!--   <form accept="" class="shadow p-4" action="index.php" method="POST"> -->                  
            <form class="shadow p-4">    
                <div class="mb-3">
                    <label for="cat_type_name">Category Type Name</label>
                    <input value="<?php echo $cat_type_name; ?>" type="text" class="form-control" name="cat_type_name" id="cat_type_name" placeholder="Category Type Name">
                    <span id="sub_notification" style="display:none;"></span>
                    <?php
                      if(!empty($error2)){
                          echo'<span style="color:red;">'.$error2.'</span>';
                        }
                    ?>
                    
                </div>

                <div class="mb-3">
                    <label for="cat_type_code">Category Type Code</label>
                    <input value="<?php echo $cat_type_code; ?>" type="text" class="form-control" name="cat_type_code" id="cat_type_code" placeholder="Category Type Code">
                    <span id="sub_notification2" style="display:none;"></span>
                    <?php
                        if(!empty($error3)){
                          echo'<span style="color:red;">'. $error3.'</span>';
                        }
                    ?>
                </div>

                

                <a href="#" class="float-end text-decoration-none"></a>

                <div class="mb-3">
                     
                     <button type="button" class="btn btn-primary" onclick="Datainsert();">Add Category Type</button>
                </div>

                <hr>

            </form>
        </div>
        <div class="col-md-6" id="show_table_div" style="display:block">
            <div class="mb-3">
                <h3>Show Data</h3>

            </div>
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Cat_type_name</th>
                    <th scope="col">Cat_type_code</th>
                    <th scope="col">Action</th>
                </tr>
    
            </thead>
                <tbody id="show_data" >

                </tbody>
            </table>
        </div>

       
      </div>
        
    </div>
	 
	 
	  <div class="line"></div>
	 
  </div>
	  	  
</div> 	
        
  <?php include '../view/layout/js_lib.php'; ?>	 
    
  </body>
</html>