<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit(); // Ensure that the script stops executing after redirection
}

require("connection.php");

// Your SQL query with proper JOINs
$sql = "SELECT 
            furniture.furnitureid,
            furniture.furnturename,
            furniture.furnitureownname,
            import.importdate,
            import.quantity AS import_quantity,
            export.exportdate,
            export.quantity AS export_quantity
        FROM 
            furniture 
        LEFT JOIN 
            import ON furniture.furnitureid = import.furnitureid 
        LEFT JOIN 
            export ON furniture.furnitureid = export.furnitureid";
$result = $conn->query($sql);

$total_import_quantity = 0;
$total_export_quantity = 0;

?>

<table border="1" class="container">
    <tr>
        <th>Furniture ID</th>
        <th>Furniture Name</th>
        <th>Owner Name</th>
        <th>Import Date</th>
        <th>Import Quantity</th>
        <th>Export Date</th>
        <th>Export Quantity</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["furnitureid"] . "</td>";
            echo "<td>" . $row["furnturename"] . "</td>";
            echo "<td>" . $row["furnitureownname"] . "</td>";
            echo "<td>" . $row["importdate"] . "</td>";
            echo "<td>" . $row["import_quantity"] . "</td>";
            echo "<td>" . $row["exportdate"] . "</td>";
            echo "<td>" . $row["export_quantity"] . "</td>";
            echo "</tr>";

            // Calculate total import and export quantities
            $total_import_quantity += $row["import_quantity"];
            $total_export_quantity += $row["export_quantity"];
        }

        // Calculate remaining quantity in stock
        $remaining_quantity = $total_import_quantity - $total_export_quantity;

        // Output the totals
        echo "<tr>";
        echo "<td colspan='4'><strong>Total Imported Quantity:</strong></td>";
        echo "<td><strong>$total_import_quantity</strong></td>";
        echo "<td colspan='2'></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td colspan='4'><strong>Total Exported Quantity:</strong></td>";
        echo "<td colspan='2'></td>";
        echo "<td><strong>$total_export_quantity</strong></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td colspan='4'><strong>Remaining Quantity in Stock:</strong></td>";
        echo "<td colspan='3'><strong>$remaining_quantity</strong></td>";
        echo "</tr>";
    } else {
        echo "<tr><td colspan='7'>No results found</td></tr>";
    }
    ?>

</table>
<br><br><br>
<form action="" method="post">
        <button type="submit" value="logout" class="logout-btn" name="logout">LOGOUT</button>
        </form>
        <?php
if(isset($_POST['logout'])){
    
        header("location:logout.php");
}

?>
<style>
    table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

table th, table td {
  padding: 10px;
  text-align: left;
  border: 1px solid #ccc;
}

table th {
  background-color: #f0f0f0;
}

table tr:nth-child(even) {
  background-color: #f9f9f9;
}
/* .container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 40vh;
} */

.logout-btn {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.logout-btn:hover {
  background-color: #45a049;
}
</style>