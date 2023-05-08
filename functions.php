<?php
session_start();
include("connection.php");
$userID = $_SESSION['userID'];
$coursesID = $_SESSION['coursesID'];
$_SESSION['coursesID'] = $coursesID;
$_SESSION['userID'] = $userID;

function avgRating($userId, $coursesID, $conn)
{
    $userId = $_SESSION['userID'];
    $coursesID = $_SESSION['coursesID'] ;
    $average = 0;
    $avgQuery = "SELECT cm_review FROM comment WHERE  c_id = '" . $coursesID . "'";
    $total_row = 0;
    
    if ($result = mysqli_query($conn, $avgQuery)) {
        // Return the number of rows in result set
        $total_row = mysqli_num_rows($result);
    } // endIf
    
    if ($total_row > 0) {
        foreach ($result as $row) {
            $average = round($row["cm_review"]);
        } // endForeach
    } // endIf
    return $average;
}
 // endFunction
function totalRating($coursesID, $conn)
{
    $coursesID = $_SESSION['coursesID'] ;
    $totalVotesQuery = "SELECT * FROM comment WHERE c_id = '" . $coursesID . "'";
    
    if ($result = mysqli_query($conn, $totalVotesQuery)) {
        // Return the number of rows in result set
        $rowCount = mysqli_num_rows($result);
        // Free result set
        mysqli_free_result($result);
    } // endIf
    
    return $rowCount;
}//endFunction
