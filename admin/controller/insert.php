<?php include_once '../model/db_config.php'; ?>

<?php
    $cat_type_code="";
    $cat_type_name=""; 
    $error1=$error2=$error3=$success="";
    if($_SERVER['REQUEST_METHOD']=="POST"){
    //$cat_type_name =trim($_POST['cat_type_name']);
    //$cat_type_code =trim($_POST['cat_type_code']); 
   
        $cat_type_name =trim($_POST['name']);
        $cat_type_code =trim($_POST['code']);
        //echo $cat_type_name;
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
            $existed_sql_name = "SELECT * FROM category_type WHERE cat_type_name='$cat_type_name' ";
            $existed_sql_code = "SELECT * FROM category_type WHERE cat_type_code='$cat_type_code' ";
            $existed_sql_name= mysqli_query($link, $existed_sql_name);
            $existed_sql_code= mysqli_query($link, $existed_sql_code);
              if($existed_sql_name->num_rows>0 && $existed_sql_code->num_rows>0){
                echo (1);
              }
              else{
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
                       echo $success;
                    }
                    else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }   
                }

              }
           
        } 
     
    } 
             
 
?>