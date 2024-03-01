<?php
require_once("connection.php");
if(isset($_GET["date_d"]) AND isset($_GET["delete"])){

    $delete_c=$_GET['delete'];
    $date_c = $_GET["date_d"];

    $delete_data="DELETE FROM import WHERE furnitureid='$delete_c' AND importdate='$date_c'";
    $see_url_deleted_id=mysqli_query($conn,$delete_data);

    if($see_url_deleted_id==1){
     
      header("location:view_import.php");
        
    }else{

        echo "Data not deleted";
    }

        
}else{

    echo "Not Allowed Access This Page";
}




?>