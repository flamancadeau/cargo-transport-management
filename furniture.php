<?php
require_once("connection.php");
session_start();
if($_SESSION['username']){
    // echo "welcome our summarised report";
    }else{
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
<input type="text" placeholder="furnturename" name="furnturename" id="">
<br>
<br>
<input type="text"  placeholder="furnitureownname" name="furnitureownname" id="">
<br>
<br>
<button type="submit" name="furniture_record" >Record_Data</button>
    </form>
    <form action="" method="post">
        <button type="submit" value="logout" class="logout-btn" name="logout">LOGOUT</button>
        </form>
        <?php
if(isset($_POST['logout'])){
    
        header("location:logout.php");
}

?> 
</body>
</html>
<?php
if(isset($_POST['furniture_record'])){
    $furnturename=$_POST['furnturename'];
    $furnitureownname=$_POST['furnitureownname'];
    $insert="INSERT INTO furniture () VALUE (null,'$furnturename','$furnitureownname')";
    $con_query=mysqli_query($conn,$insert);
    if($con_query==1){
        echo "Data recorded";
       
        header("location:view_furniture.php");
        exit();
    }else{
        echo "Data doesn't recorded";
    }
}




?>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px; /* Added to limit form width */
            width: 100%; /* Added to make the form responsive */
            box-sizing: border-box; /* Added to include padding in width calculation */
        }
        select, input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box; /* Added to include padding in width calculation */
        }
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>