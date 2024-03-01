<?php
require_once("connection.php");
$message='';

?>

<?php
if(isset($_POST['GO'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    $insert=" INSERT INTO manager () VALUE(NULL,'$username','$password')";
    $combine=mysqli_query($conn,$insert);
    if($combine==1){
//    echo "data recorded";
     
    }


if($_SESSION['username']&&$_SESSION['password']){

    // header("location:home.php");
    echo $_SESSION['username']." "."welcome";
    
 }else{
    $message="<div id='text'>Must create your account</div>";
 }
 session_destroy();
}

?>

    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create|manager</title>
</head> 
<body>
    <form action="" method="post">
    
        <input type="text" placeholder="username" name="username" id="">
        <br>
        <br>
        <input type="password" placeholder="password" name="password" id="">
        <br>
        <br>
        <button type="submit" name="GO" >CREATE</button>
        <br>
     <?php echo $message;?>
    </form>
</body>
</html>


<style>
        body {
            padding: 10px;
            margin-top: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(blue, white, blue);
        }
        form {
            background: white;
            padding: 40px;
            width: 320px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 20px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button[type="submit"] {
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        #text {
            color: red;
            margin-bottom: 20px;
            text-align: center;
        }

  
    #text{
        color:red;
    }
</style>
<?php
if(isset($_POST['GO'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    $insert=" INSERT INTO manager () VALUE(NULL,'$username','$password')";
    $combine=mysqli_query($conn,$insert);
    if($combine==1){
//    echo "data recorded";
     
    }


if($_SESSION['username']&&$_SESSION['password']){

    header("location:home.php");

 }else{
    $message="<div id='text'>Must create your account</div>";
 }
}
?>