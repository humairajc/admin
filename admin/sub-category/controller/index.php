
<?php include_once '../model/db_config.php'; ?>

<?php 
     $sub_cat_code="";
     $sub_cat_name="";
    $error1=$error2=$error3=$success="";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $sub_cat_name =trim($_POST['sub_cat_name']);
        $sub_cat_code =trim($_POST['sub_cat_code']);
        if(empty($sub_cat_name)&&empty($sub_cat_code)){
            $error1="Pleass fill up the both form";
        }
        elseif(empty($sub_cat_name)){
            $error2="Pleass write Sub_catagory name";
        }
        elseif(empty($sub_cat_code)){
            $error3="Pleass write Sub_catagory code";
        }
        else {
            $sql = "INSERT INTO sub_category (sub_cat_name, sub_cat_code) VALUES (?, ?)";
            $sql_statment = mysqli_prepare($link,$sql);
            if ($sql_statment){
               // print_r('ssssss');
                mysqli_stmt_bind_param($sql_statment, "ss", $var1,$var2);
                $var1=$sub_cat_name;
                $var2 = $sub_cat_code;
                $execute = mysqli_stmt_execute($sql_statment);
                if($execute){
                    $success="Successfully Inserted";
                    //header("location: index.php");
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

   
   	
   	<div id="content">

    <?php include '../view/layout/content_menu.php'; ?>
  
	<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="mb-3">
                <h3>Add Sub_category </h3>
                <?php
                if(!empty($success)){
                    echo'<span style="color:green;">'.$success.'</span>';
                }
                else {
                    echo'<span style="color:red;">'.$error1.'</span>';
                }
                ?>
            </div>
            <form accept="" class="shadow p-4" action="index.php" method="POST">                  
                <div class="mb-3">
                    <label for="sub_cat_name">Sub_category Name</label>
                    <input value="<?php echo $sub_cat_name ?>" type="text" class="form-control" name="sub_cat_name" id="sub_cat_name" placeholder="Sub_category Name">
                    <?php
                      if(!empty($error2)){
                          echo'<span style="color:red;">'.$error2.'</span>';
                        }
                    ?>
                </div>

                <div class="mb-3">
                    <label for="sub_cat_code">Sub_category Code</label>
                    <input value="<?php echo $sub_cat_code ?>" type="text" class="form-control" name="sub_cat_code" id="sub_cat_code" placeholder="Sub_category Code">
                    <?php
                        if(!empty($error3)){
                          echo'<span style="color:red;">'. $error3.'</span>';
                        }
                   ?>
                </div>

                <!-- <label class="mb-3">
                    <input type="checkbox" name="RememberMe"> Remember Me
                </label> -->

                <a href="#" class="float-end text-decoration-none"></a>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Add Sub_category </button>
                </div>

            
            </form>
        </div>
    </div>
</div>
	
	 
	 

	 <div class="line"></div>
	 
</div>
	  
	  
  </div> 	
        
  <?php include '../view/layout/js_lib.php'; ?>	 
    
  </body>
</html>