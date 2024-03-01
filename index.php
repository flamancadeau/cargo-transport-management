<?php
require_once("connection.php");
?>
<?php
session_start();
$message='';
?>






<?php


if (isset($_POST['send'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['username']=$_POST['username'];
$_SESSION['password']=$password;
    $call = "SELECT * FROM manager";
    $hold = mysqli_query($conn,$call);

    if ($hold) {
        while ($data = mysqli_fetch_assoc($hold)) {
            if ($username == $data['username'] && $password == $data['password']) {
          
                header("location: home.php");
                exit(); 
            }
        }
        $message="<div id='text'>Invalid username or password</div>";
    } 
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login|manager</title>
</head>
<body>
<img src="logo/log.png" alt="Description of the image" width="200" height="100">
    <form action="" method="post">
      
        
        <input type="text" placeholder="username" name="username" id="">
        <br>
        <br>
        <input type="password" placeholder="password"  name="password" id="">
        <br>
        <br>
        <button type="submit" name="send" >LOGIN</button>
        <br>
        
        <?php  echo $message ?>
        <br>
        <button type="submit" name="create" >create Account</button>
    </form>
</body>
</html>
<?php
if(isset($_POST['create'])){
    header("location:create.php");
 
}
?>






<style>
        body {
            padding: 10px;
            margin-top: 50px; /* Adjusted margin-top */
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
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Added box shadow for depth */
        }
        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 20px; /* Increased spacing between input fields */
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button[type="submit"],
        button[name="create"] {
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button[type="submit"]:hover,
        button[name="create"]:hover {
            background-color: #45a049;
        }
        #text {
            color: red;
            margin-bottom: 20px; /* Added spacing below error message */
            text-align: center; /* Centered error message */
        }
        img {
            display: block; /* Ensuring the image is a block element */
            margin: 0 auto 20px; /* Centering the image horizontally with some space below */
        }
    </style>