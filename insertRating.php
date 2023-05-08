<?php
require_once ('connection.php');
// Here the user id is harcoded.
// You can integrate your authentication code here to get the logged in user id

if (isset($_POST["index"], $_POST["c_id"])) {
    
    $restaurantId = $_POST["c_id"];
    $rating = $_POST["index"];
    
    $checkIfExistQuery = "select * from comment where u_id = '" . $userID . "' and c_id = '" . $coursesID . "'";
    if ($result = mysqli_query($conn, $checkIfExistQuery)) {
        $rowcount = mysqli_num_rows($result);
    }
    
    if ($rowcount == 0) {
        $insertQuery = "INSERT INTO comment(u_id,c_id, cm_review) VALUES ('" . $userID . "','" . $coursesID . "','" . $rating . "') ";
        $result = mysqli_query($conn, $insertQuery);
        echo "success";
    } else {
        echo "Already Voted!";
    }
}
