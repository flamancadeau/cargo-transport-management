<?php
session_start();
if($_SESSION['username']){
    echo $_SESSION['username']." "."welcome";
}
else{
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>

    <form action="" method="post">
        <select name="select_values_insert" id="">
        <option>insert records</option>>
<option value="export">export</option>
<option value="import">import</option>
<option value="furniture">furniture</option>

        </select>
        <button type="submit">Record_Data</button>
       
    </form>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br><br><br><br>
    <form action="" method="post">
        
        <select name="select_values_view" id="">
        <option>view records</option>
<option value="export">export</option>
<option value="import">import</option>
<option value="furniture">furniture</option>

        </select>
        <button type="submit">View|Record_Data</button>
        <br>
    
    </form>
</body>
</html>


<form action="" method="post">

        <br>
        <br>
        <button type="submit" value="report" name="report">GENERATE REPORT</button>
        <br><br><br>
        <button type="submit" value="logout"  name="logout">LOGOUT</button>
    </form>
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
    $selectoption=$_POST['select_values_insert'];
    switch( $selectoption){
        case 'export';
        header("location:export.php");
        exit();

        case 'import';
        header("location:import.php");
        exit();

        case 'furniture';
        header("location:furniture.php");
        exit();
    }
}



?>
<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
    $selectoption=$_POST['select_values_view'];
    switch( $selectoption){
        case 'export';
        header("location:view_export.php");
        exit();

        case 'import';
        header("location:view_import.php");
        exit();

        case 'furniture';
        header("location:view_furniture.php");
        exit();
        case 'report';
        header("location:report.php");
    }
}



?>
<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
$report=$_POST['report'];
switch($report){
    case 'report';
    header("location:report.php");
    exit();
}
}

?>
<?php
if(isset($_POST['logout'])){
  
        header("location:logout.php");
        
}

?>
<style>
        <style>
        body {
            background: linear-gradient(pink, black, white);
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            margin-bottom: 20px;
            text-align: center;
        }
        select, button {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin: 5px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
        
    </style>