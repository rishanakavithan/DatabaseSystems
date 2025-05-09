<!Doctype html>
<html>
    <head>
    <title>Ease Ltd</title>
        <link rel="stylesheet" href="style.css">
        
    </head>
    <body>
    <h1 id = "mainHeader"> Welcome to Ease Ltd </h1>
    <div style="display: flex; justify-content: space-between;">
    <form action="index.php" method="post">
        <button type="submit" style="
            font-size: 18px;
            font-weight: bold;
            padding: 10px 30px;
            background-color: bisque;
            color: rgb(151, 3, 33);
            border: 2px solid rgb(151, 3, 33);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        ">Home</button>
    </form>
    
    <form action="logout.php" method="post">
        <button type="submit" style="
            font-size: 18px;
            padding: 10px 30px;
            background-color: rgb(151, 3, 33);
            color: black;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border: none;
        ">LogOut</button>
    </form>
</div>
<?php

// This is to set the Oracle SID so the script know which database to connect to
//putenv("ORACLE_SID=teaching"); // this is causing errors


if(!isset($_GET['customID']) ){
    die("No customer is being specified");
}

$customID = trim($_GET['customID']);

if($Connection = oci_connect("username","password")){ // this user name and password is wrong for secutity reasons
    print"<br>";
    print"<h2 style ='font-weight: bold;'>Customer:  </h2>";
    print"<br>";
    $sql = "SELECT * FROM CUSTOMER WHERE  customID# = :customID";


    //Parase Oracle query
    $Statement = oci_parse($Connection,$sql);

    oci_bind_by_name($Statement,":customID",$customID);

    //Execute Oracle query
    oci_execute($Statement);

    $numcols = oci_num_fields($Statement);
    print "<table width = 300 border=1><tr>";
    for($i=1; $i<=$numcols; $i++){

        //Print column heading
        $colname = oci_field_name($Statement, $i);
        print "<td >$colname</td>";
    }
    print"</tr>";

    //Get a row and print it column by column
    while(oci_fetch($Statement)){
        $customID = oci_result($Statement,'CUSTOMID#');
        print"<tr onclick=\"window.location='customertype.php?customID=$customID'\">";

        for($i=1; $i<=$numcols; $i++){
            $col = oci_result($Statement, $i);
            PRINT"<td>$col</td>";
        }
        print"</tr>";
    }
    print"</table>";
    $numrows = oci_num_rows($Statement);
    print"<br>";


    oci_close($Connection);
    //print"Logged off.";
    print"<br>";
    print"<br>";
    print"<br>";
    print"<br>";
    print"<br>";
    print"<br>";
    print"<br>";
    print"<br>";
    print"<br>";
    print"<br>";
    print"<br>";
    print"<br>";
    print"<br>";
    print"<br>";
    print"<br>";
    print"<br>";
    print"<br>";
    print"<br>";
    print"<br>";
    print"<br>";
    print"<br>";
    print"<br>";
} else{
    var_dump(oci_error($Connection));
}
?>
<!-- Footer-->
<footer class = "footer">
        <p>&copy;2025 Ease Ltd ID23047207. All Rights Reserved</p>
</footer>