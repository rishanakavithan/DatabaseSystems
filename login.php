<?php
session_start();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

// if already logged in redirect to the index pagee
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location:index.php");
    exit;
}

$valid_username="admin";
$valid_password="admin";

$error ="";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // this is to retrive the already submitted password and usedname
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    //check the credentials
    if($user === $valid_username && $pass === $valid_password){
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $valid_username;
        header('Location:index.php');
        exit;
    } else{
        $error = 'Invalid Username Or Password. TRY AGAIN';
        header('Location:login.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1 id = "mainHeader"> Welcome to Ease Ltd </h1>
<br>
<br>
<br>
<h1 style="
    color: black;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    text-align: center;
    margin-bottom: 30px;
    font-size: 2.5rem;
    font-weight: 600;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
">Login</h1>
<?php if($error):?>
    <p style="color:red; font-size:20px;"><?php echo htmlspecialchars($error);?></p>
<?php endif;?>
<form method="post" action="login.php" style="max-width: 500px; margin: 0 auto; padding: 20px; background: #f9f9f9; border-radius: 8px; box-shadow: 0 0 15px rgba(0,0,0,0.1);">
    <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #333; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
        Username:
    </label>
    <input 
        type="text" 
        name="username" 
        required 
        style="
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            box-sizing: border-box;
        "
    >
    
    <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #333; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
        Password:
    </label>
    <input 
        type="password" 
        name="password" 
        required 
        style="
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            box-sizing: border-box;
        "
    >
    <button type="submit" style="
          font-size: 18px;
            padding: 12px 30px;
            background-color: #19A159;
            color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;">Login</button>
</form>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


</body>
<html>

<!-- Footer-->
<footer class = "footer">
        <p>&copy;2025 Ease Ltd ID23047207. All Rights Reserved</p>
</footer>