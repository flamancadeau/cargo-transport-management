<?php
session_start();
if($_SESSION['username']){
echo "welcome to view furniture";
}else{
    header("location:login.php");
}
require_once("connection.php");
?>
<!-- <form action="" method="post">
  <input type="search" name="search" id="">
  <input type="submit" value="search" name="" id=""> -->
</form>
<table border="2px" >
<tr>
    <th>furnitureid</th>
    <th>furnturename</th>
    <th>furnitureownname</th>
    <th colspan="2px" >action</th>
</tr>
<?php
$select="SELECT*FROM  furniture";
$query=mysqli_query($conn,$select);
if(mysqli_num_rows($query)>0){
    while($show=mysqli_fetch_assoc($query)){


?>
<tr>
    <td><?php echo $show['furnitureid']?></td>
    <td><?php echo $show['furnturename']?></td>
    <td><?php echo $show['furnitureownname']?></td>
    <td><a href="view_furniture.php?delete=<?php echo $show['furnitureid']  ?>">delete</td></a>
    <td><a href="update_furniture.php?update=<?php echo $show['furnitureid']  ?>">update</td></a>
</tr>
<?php
    }
}
?>

</table>
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
    $delete_query="DELETE from furniture where furnitureid='$delete'";
    $query=mysqli_query($conn,$delete_query);
    if($query==1){
        echo "<script>alter('data deleted')</script>";
         header("location:view_furniture.php");
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