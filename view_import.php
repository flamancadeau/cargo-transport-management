<?php
require_once("connection.php");
session_start();
error_reporting(1);
if($_SESSION['username']){
echo "welcome to view imported product";
}else{
    header("location:login.php");
}

?>

<table border="2px">
<tr>
    <th>furnitureid</th>

<th>furniturename</th>

    <th>importdate</th>
    <th>quantity</th>

      
   
    <th colspan="2">action</th>

</tr>   
<?php
$select="SELECT * FROM import INNER JOIN furniture ON furniture.furnitureid=import.furnitureid";
$query=mysqli_query($conn,$select);
if(mysqli_num_rows($query)>0){
    while($show=mysqli_fetch_assoc($query)){
 

?> 
<tr>
    <td><?php echo $show ['furnitureid'] ?></td>
    <td><?php echo $show ['furnturename']?></td>
    <td><?php echo $show ['importdate'] ?></td>
    <td><?php echo $show ['quantity'] ?></td>
    
    <td><a href="delete.php?date_d=<?php echo $show['importdate'] ?>&&delete=<?php echo $show['furnitureid'] ?>">delete</td></a>
    <td><a href="update_import.php?update=<?php  echo $show ['furnitureid']?>">update</td></a>
    

</tr>
<?php
       
    }
}
?>

</table>
<br><br><br>
<form action="" method="post">
        <button type="submit" value="logout"  name="logout" class="logout-btn ">LOGOUT</button>
        </form>
        
        <br><br><br>
<form action="" method="post">
        <button type="submit" value="home" class="logout-btn " name="home">RETURN_HOME_PAGE</button>
        </form>


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