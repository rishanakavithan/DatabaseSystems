<?php

// This is to set the Oracle SID so the script know which database to connect to
//putenv("ORACLE_SID=teaching"); // this is causing errors

if($Connection = oci_connect("username","password")){ // this user name and password is wrong for secutity reasons
    print"<br>";
    print"<h2 style ='font-weight: bold;'>Our Branches:  </h2>";
    print"<br>";
    print"Click on the Branch to view Rooms";
    $sql = "SELECT * FROM BRANCH";


    //Parase Oracle query
    $Statement = oci_parse($Connection,$sql);

    //Execute Oracle query
    oci_execute($Statement);

    $numcols = oci_num_fields($Statement);
    print "<table width = 300 border=1><tr>";
    for($i=1; $i<=$numcols; $i++){

        //Print column heading
        $colname = oci_field_name($Statement, $i);
        print "<td>$colname</td>";
    }
    print"</tr>";

    //Get a row and print it column by column
    while(oci_fetch($Statement)){

        $branchID = oci_result($Statement,'BRANCHID#');
        print"<tr onclick=\"window.location='room.php?branchID=$branchID'\">";

        for($i=1; $i<=$numcols; $i++){
            $col = oci_result($Statement, $i);
            PRINT"<td>$col</td>";
        }
        print"</tr>";
    }
    print"</table>";
    $numrows = oci_num_rows($Statement);
    print"<br>";
    print"<h2>We have $numrows branches across UK </h2>";

    oci_close($Connection);
    //print"Logged off.";
    print"<br>";
    print"<br>";
    print"<br>";
} else{
    var_dump(oci_error($Connection));
}
?>