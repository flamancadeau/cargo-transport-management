<?php
require_once("connection.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if(isset($_GET['update'])){ 
        $id = $_GET['update'];
        $sql = "SELECT * from import where furnitureid='$id'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            while($show = mysqli_fetch_assoc($result)){


   
    ?>
    <form action="" method="post">
    <input type="text" placeholder="furnitureid" readonly value="<?php echo $show['furnitureid']?>"id="">
<br>
<br>
<input type="date" placeholder="importdate" value="<?php echo $show['importdate']?>" name="importdate" id="">
<br>
<br>
<input type="text"  placeholder="quantity" value="<?php echo $show['quantity']?>" name="quantity" id="">
<br>
<br>
<button type="submit" name="import_record">update_Data</button>


    </form>
<?php
            }
        }
    }
?>
</body>
</html>
<?php
if(isset($_POST['import_record'])){
    $importdate=$_POST['importdate'] ;
    $quantity=$_POST['quantity'];
    $update="UPDATE import set importdate='$importdate',quantity='$quantity' where furnitureid='$id'";
    $query=mysqli_query($conn,$update);
    if($query==1){
        echo "data updated";
        header("location:view_import.php");
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
