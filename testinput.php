<?php
include("connection.php");
$sql = "SELECT * FROM user WHERE username = '$username' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_array();
             echo "<img class='mt-5 shadow' width='150px' src='fileupload/".$row['u_image']."'>" ; 
            }
            echo"<form method='post' action='cehotestinput.php' enctype='multipart/form-data'>";
            echo "<input type='file' aria-label='file example' name='fileupload' id='fileupload' >";
            echo "<input type='submit'></form>";
           
        
?>