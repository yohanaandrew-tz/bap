<?php
// the following is database connection
$conn = mysqli_connect("localhost", "root", "", "bpc-info");
if($conn === false){
    die("ERROR: Could not connect." . mysql_connect_error());
}

// to capture submitted info
$firstName = $_REQUEST['firstName'];
$lastName = $_REQUEST['lastName'];
$gender = $_REQUEST['gender'];
$address = $_REQUEST['address'];
$postion = $_REQUEST['postion'];
$tel_number = $_REQUEST['tel_number'];


$sql = "INSERT INTO members VALUES (NULL, '$firstName', '$lastName', '$gender', '$address', '$postion', '$tel_number')";

if(mysqli_query($conn, $sql)){
    echo "one member registered successfully";
    
}
else{
    echo "ERROR: Hush! Sorry $sql. "
    . mysqli_error($conn);
}  


mysqli_close($conn);
// to close database connection
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Submission</title>
        <style>
            a{text-decoration:none; color: white;}
        button{
            background-color:blue;
        }
        button:hover{background-color:red;}
        body{text-align:center;}
        </style>
    </head>
    <body>
        <button><a href="members.php">DONE</a></button>
    </body>
</html>