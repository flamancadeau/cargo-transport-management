<?php
require_once("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>
<body>
<?php

if(isset($_GET['update'])){
    $id = $_GET['update'];
    $sql = "SELECT *FROM export where furnitureid='$id'"; 
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($show=mysqli_fetch_assoc($result)){

?>
    <form action="" method="post">
    <input type="text" placeholder="furnitureid" readonly value="<?php echo $show['furnitureid']?>" name="furnitureid" id="">
    <br>
        <br>
<input type="text" placeholder="exportdate" value="<?php echo $show['exportdate']?>" name="exportdate" id="">
<br>
<br>
<input type="text"  placeholder="quantity" value="<?php echo $show['quantity']?>" name=" quantity" id="">
<br>
<br>
<button type="submit" name="furniture_record" >update_Data</button>
    </form>
</body>
</html>

<?php


        }
    }


}

?>


<?php
if(isset($_POST['furniture_record'])){
    $exportdate=$_POST['exportdate'] ;
    $quantity=$_POST['quantity'];
    $update="UPDATE  export set exportdate='$exportdate',quantity='$quantity' where furnitureid='$id'";
    $query=mysqli_query($conn,$update);
    if($query==1){
        echo "data updated";
        header("location:view_export.php");
    }else{
        echo "action failed";
    }

}


?>

<style>
    body{
       padding:10px 10px;
       margin-top: 150px;
       margin-left: 500px;
       padding-left: 5px;
       display: flax;
       text-align: center;
    }
    form{
       background:linear-gradient(blue,white,blue);
       padding: 60px 60px 60px;
       width: 320px;
       height: 200px;
       border-radius: 1rem
    }
    input{
        padding: 10px;
    }
    button{
        padding:10px
    }
    button:hover{
        color:blue;
        font-size: 10px;
        font-weight: bold;
        background: green;
        opacity: 50%;
    }
    input:hover{
        background: yellow;
    }
    input,button{
        
    }
 
</style>
