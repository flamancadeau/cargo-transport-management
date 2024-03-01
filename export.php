<?php
require_once("connection.php");
session_start();
error_reporting(1);
if(!isset($_SESSION['username'])){
    header("location:login.php");
    exit; // Terminate script after redirection
}

if(isset($_POST['export_record'])){
    $exportdate = date("Y-m-d"); // Use the correct date format

    // Sanitize user inputs
    $quantity = intval($_POST['quantity']);
    $select = mysqli_real_escape_string($conn, $_POST['select']);

    // Check if the selected furniture exists in the 'furniture' table
    $check_furniture = "SELECT * FROM furniture WHERE furnitureid = '$select'";
    $check_query = mysqli_query($conn, $check_furniture);

    if(mysqli_num_rows($check_query) > 0){
        $row = mysqli_fetch_assoc($check_query);
        
        // Check total import quantity
        $import_query = mysqli_query($conn, "SELECT SUM(quantity) AS total_import FROM import WHERE furnitureid = '$select'");
        $import_data = mysqli_fetch_assoc($import_query);
        $total_import = $import_data['total_import'];

        // Check total export quantity
        $export_query = mysqli_query($conn, "SELECT SUM(quantity) AS total_export FROM export WHERE furnitureid = '$select'");
        $export_data = mysqli_fetch_assoc($export_query);
        $total_export = $export_data['total_export'];

        // Calculate available stock
        $available_stock = $total_import - $total_export;

        // Check if requested quantity is available
        if($quantity <= $available_stock){
            // Insert export record
            $insert = "INSERT INTO `export`(`furnitureid`, `exportdate`, `quantity`) VALUES ('$select ',' $exportdate ','$quantity')";
            $insert_query= mysqli_query($conn, $insert);
            
            if($insert_query){
                echo "Data recorded successfully";
                header("location: view_export.php");
                exit; // Terminate script after redirection
            } else {
                echo "Error recording data";
            }
        } else {
            echo "The requested quantity is higher than available stock";
        }
    } else {
        echo "Invalid furniture selection";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Furniture</title>
    <style>
        /* CSS styles here */
    </style>
</head>
<body>
    <form action="" method="POST">
        <select name="select">
            <option value="">Select furniture to export</option>
            <?php
            $select_query = "SELECT * FROM furniture";
            $select_result = mysqli_query($conn, $select_query);

            if(mysqli_num_rows($select_result) > 0){
                while($row = mysqli_fetch_assoc($select_result)){
                    echo "<option value='".$row['furnitureid']."'>".$row['furnturename']."</option>";
                }
            }
            ?>
        </select>
        <br><br>
        <input type="date" value="<?php echo date("Y-m-d"); ?>" name="exportdate">
        <br><br>
        <input type="number" placeholder="Quantity" name="quantity">
        <br><br>
        <button type="submit" name="export_record">Record Data</button>
        <br>
        <br>
        <button type="submit" class="log" name="OUT" value="logout">LOGOUT</button>
    </form>

    <br><br><br>
    <!-- <form action="logout.php" method="post">
  
    </form> -->
</body>
</html>
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
        .log {
            background-color: #45a049;
            width: 40px;
            height: 40px;
            
        }
    </style>