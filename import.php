<?php
require_once("connection.php");
session_start();
error_reporting(1);
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
        <!-- 
to be learned how to select in optiion

         -->
       <select name="select" id="">
        
        <?php
        $select="select*from furniture";
        $query=mysqli_query($conn,$select);
        if(mysqli_num_rows($query)>0){
            while($row=mysqli_fetch_assoc($query)){
                ?>
                
                <option value="<?php echo $row['furnitureid'];?>" > <?php echo $row['furnturename'];?></option>
                <?php
            }
        }
        
        ?>
       </select>
<br>
<input type="text" placeholder="importdate" value="<?php echo date("m-d-y"); ?>"name="importdate" id="">
<br>
<br>
<input type="text"  placeholder="quantity" name="quantity" id="">
<br>
<br>
<button type="submit" name="import_record">Record_Data</button>
<br>
<br>
<button type="submit" value="logout" class="logout-btn" value="logout" name="OUT">LOGOUT</button>
    </form>
 
   
       
    <?php
if(isset($_POST['OUT'])){
    // Check if the 'OUT' button is clicked
    $out = $_POST['OUT']; // Access 'OUT' instead of 'logout'
    if($out == "logout"){ // Assuming the value of the 'OUT' button is set to "OUT"
        // Redirect the user to the logout.php page using JavaScript
        echo '<script>window.location.href = "logout.php";</script>';
        exit(); // Ensure no further code execution after redirection
    }
}
?>

</body>
</html>
  <?php
    if (isset($_POST['import_record'])) {
        $importdate = $_POST['importdate'];
        $quantity = $_POST['quantity'];
        $furnitureid = $_POST['select'];

        // Check if record for selected furniture already exists
        $this_date = date("m-d-y");

        $insert_data = "INSERT INTO `import`(`furnitureid`, `importdate`, `quantity`) VALUES ('$furnitureid','$importdate','$quantity')";
        $query_data = mysqli_query($conn,$insert_data);
        
        if($query_data==1){
            header("location:view_import.php");
        }else{

            echo "DATA NOT INSERTED";
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





