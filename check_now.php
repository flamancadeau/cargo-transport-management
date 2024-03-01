


<?php
if(isset($_POST['send'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    $call="select*from manager";
    $hold=mysqli_query($conn,$call);
  if(mysqli_num_rows($hold)>0){
    if($data=mysqli_fetch_assoc($hold)){
         $data['username'];
         $data['password'];
         if($_SESSION['username']==$data['username']){
            if($_SESSION['password']==$data['password']){
                header("location:home.php");
            }else{
                echo "user doen't exist";
            }
         }

    }
  }
}


?>












<?php
session_start();

if (isset($_POST['send'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Assuming you have a database connection established before this point
    // $conn = mysqli_connect("your_host", "your_username", "your_password", "your_database");

    $call = "SELECT * FROM manager";
    $hold = mysqli_query($conn, $call);

    if ($hold) {
        while ($data = mysqli_fetch_assoc($hold)) {
            if ($username == $data['username'] && $password == $data['password']) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                header("location: home.php");
                exit(); // Ensure that the script stops execution after redirecting
            }
        }
        echo "Invalid username or password";
    } else {
        echo "Error in query: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
