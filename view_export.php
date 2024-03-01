<?php
session_start();

if($_SESSION['username']){
echo "welcome to view exported product";
}else{
    header("location:login.php");
}
require_once("connection.php");
?>

<table border="2px">
<tr>
    <th>furnitureid</th>
    <?php
    $call="SELECT*FROM furniture";
    $query=mysqli_query($conn,$call);
    if(mysqli_num_rows($query)>0){
      $shows=mysqli_fetch_assoc($query);

      ?>
<th>furniturename</th>
<?php
    }
    ?>
    
    <th>exportdate</th>
    <th>quantity</th>
    <th colspan="2">action</th>

</tr>   
<?php
$select="SELECT * FROM export INNER JOIN furniture ON furniture.furnitureid=export.furnitureid";
$query=mysqli_query($conn,$select);
if(mysqli_num_rows($query)>0){
    while($show=mysqli_fetch_assoc($query)){
?> 
<tr>
    <td><?php echo $show ['furnitureid']?></td>
    <td><?php echo $show ['furnturename']?></td>
    <td><?php echo $show ['exportdate'] ?></td>
    <td><?php echo $show ['quantity'] ?></td>
    <td><a href="view_export.php?delete=<?php echo $show['furnitureid'] ?>">delete</td></a>
    <td><a href="update_export.php?update=<?php  echo $show ['furnitureid']  ?>">update</td></a>
    

</tr>
<?php
       
    }
}
?>
<</table>
<br><br><br>
<form action="" method="post">
        <button type="submit" value="logout" class="logout-btn " name="logout">LOGOUT</button>
        </form>
        <br><br><br>
<form action="" method="post">
        <button type="submit" value="home" class="logout-btn " name="home">RETURN_HOME_PAGE</button>
        </form>
<?php
if(isset($_GET['delete'])){
    $delete=$_GET['delete'];
    $delete_data="DELETE FROM export where furnitureid='$delete'";
    $see_url_deleted_id=mysqli_query($conn,$delete_data);
    if($see_url_deleted_id==1){
      echo"<script> alert('data deleted')</script>";

      header("location:view_export.php");
    }
        
    
}



?>
<?php
if(isset($_POST['logout'])){
    
        header("location:logout.php");
}

?>
<?php
if(isset($_POST['home'])){
    
        header("location:home.php");
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