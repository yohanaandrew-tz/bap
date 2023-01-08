<!DOCTYPE html>
<html>
    <head>
        <title>Members</title>
    <style>
        table{
            border: 3px solid blue;
            width: 100%;
            border-collapse:collapse;
        }
        th,td{ border: 2px solid blue; border-collapse:collapse;}
        th{
            background-color:blue;
            color:white;
        }
        a{text-decoration:none; color: white;}
        button{
            background-color:blue;
        }
        button:hover{background-color:red;}
        #add{
            display:none;
            border: 1px solid blue; 
            padding: 5px;
            border-radius: 20px;
            position: fixed;
            margin: auto;
            background-color:wheat;
        }
    </style>
    <link rel="stylesheet" href="css/w3.css">
    </head>
    <body>
        <h3>Members</h3>
        <button onclick="document.getElementById('add').style.display='block'"><a href="">Add +</a></button><br><br>
        <div id="add">
        Fill the form
            <form action="sub.php" method="POST">
              <p><label>Name:<input type="text" name="firstName" placeholder="Enter name here" required></label></p>
               <p> <label>Surname:<input type="text" name="lastName" placeholder="Enter surname here" required></label></p>
               <p><label>Gender:</label> <input type="radio" name="gender" value="M">M <input type="radio" name="gender" value="F">F
            </p>
            <p><label>Address:</label><select name="address">
                <option>Bigwa</option>
                <option>Kichangani</option>
                <option>Nanenane</option>
            </select>
            </p>
            <p><label>Postion:</label><select name="postion">
                <option>Pastor</option>
                <option>Accontant</option>
                <option>Member</option>
            </select>
            </p>
            <p><label>Mob:<label> <input type="number" name="tel_number"></p> 
            <input type="submit" value="Save" style="background-color:green; color:yellow;">  <button onclick="document.getElementById('add').style.display='none'"><a href="">Hide</a></button>
            </form>
        </div>
    <div class="w3-card-4 w3-margin">
<?php
$link = mysqli_connect("localhost", "root", "", "bpc-info");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Query
$sql = "SELECT * FROM members";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>S/N</th>";
                echo "<th>Name</th>";
                echo "<th>Surname</th>";
                echo "<th>Gender</th>";
                echo "<th>Address</th>";
                echo "<th>Postion</th>";
                echo "<th>Phone</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['firstName'] . "</td>";
                echo "<td>" . $row['lastName'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['postion'] . "</td>";
                echo "<td>" . $row['tel_number'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
    </body>
    </div>
</html>