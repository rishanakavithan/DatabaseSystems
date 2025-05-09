<?php
session_start();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

// if already logged in redirect to thelogin pagee
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
    header("Location:login.php");
    exit;
}
?>

<!Doctype html>
<html>
    <head>
    <title>Ease Ltd</title>
        <link rel="stylesheet" href="style.css">
        
    </head>
    <body>
    <h1 id = "mainHeader"> Welcome to Ease Ltd </h1>

    <form action="logout.php" method="post" >
        <button type="submit" style="
        font-size: 18px;
        padding: 10px 30px;
        background-color: rgb(151, 3, 33);
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        float:right;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);">LogOut</button>
    </form>



    <?php
    include("branch.php")
    ?>

    <form action ="supplier.php" method="get" style = "display:inline-block;margin-left:650px; margin-right: 150px;">
        <div style="text-align: center;">
    <button type="submit" style="font-size:25px;  padding: 20px 50px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3); background-color:rgb(151, 3, 33);">
    Suppliers
</button>
</div>
</form>


<form action ="employee.php" method="get" style = "display:inline-block;">
        <div style="text-align: center;">
    <button type="submit" style="font-size:25px;  padding: 20px 50px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3); background-color:rgb(151, 3, 33);">
    Employees
</button>
</div>
</form>
<br>
<br>
<br>
</body>
</html>
       
<!-- Footer-->
<footer class = "footer">
        <p>&copy;2025 Ease Ltd ID23047207. All Rights Reserved</p>
</footer>