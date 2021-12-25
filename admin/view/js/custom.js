 $(document).ready(function () {
  showData();
 //console.log( "ready!" );
}); 
function Datainsert(){
  var cat_type_name = document.getElementById("cat_type_name").value;
  var cat_type_code = document.getElementById("cat_type_code").value;
  var error2="Pleass write catagory type name";
  var error3="Pleass write catagory type code";
  if(cat_type_name=='' || cat_type_code==''){
    if(cat_type_name==''&& cat_type_code==''){

      var error1=" Pleass fill up both froms. ";
     
      document.getElementById("main_notification").innerHTML=error1;
      document.getElementById("main_notification").style.display="block";
      document.getElementById("main_notification").style.color="red";
      document.getElementById("sub_notification").style.display="none";
      document.getElementById("sub_notification2").style.display="none";
      document.getElementById("sub_notification").innerHTML=error2;
      document.getElementById("sub_notification").style.display="block";
      document.getElementById("sub_notification").style.color="red";     
      
      document.getElementById("sub_notification2").innerHTML=error3;
      document.getElementById("sub_notification2").style.display="block";
      document.getElementById("sub_notification2").style.color="red";

    }
    else if(cat_type_name == ""){

      var error2="Pleass write catagory type name";
        
       document.getElementById("sub_notification").innerHTML=error2;
       document.getElementById("sub_notification").style.display="block";
       document.getElementById("sub_notification").style.color="red";
       document.getElementById("main_notification").style.display="none";
       document.getElementById("sub_notification2").style.display="none";
      

    }
    else if(cat_type_code ==""){
        
      var error3="Pleass write catagory type code";
        document.getElementById("sub_notification2").innerHTML=error3;
        document.getElementById("sub_notification2").style.display="block";
        document.getElementById("sub_notification2").style.color="red";
        document.getElementById("main_notification").style.display="none";
        document.getElementById("sub_notification").style.display="none";
       
    }
   
}  
else{
  $.ajax({
     
      method: "POST",
      url:"insert.php",
      data: {
          name:cat_type_name,
          code:cat_type_code
      },
      success: function(data){
        alert(data);
        if(data==1){
           alert("Boths valus are alrady existed");

        }
       // else{
            //var success="successfully inserted";
            //document.getElementById("main_notification").innerHTML=success;
            //document.getElementById("main_notification").style.display="block";
            //document.getElementById("main_notification").style.color="green";
            //document.getElementById("sub_notification").style.display="none";
            //document.getElementById("sub_notification2").style.display="none";

        //}
          showData();

      }
    
  });
  

}  

  //alert("show");
}
function showData(){
  $.ajax({
      method: "POST",
      url:"show.php",
      success: function(data){
          $('#show_data').html(data);
         // document.getElementById("show_table_div").style.display="block";
          showData();
      }

  });  
}

