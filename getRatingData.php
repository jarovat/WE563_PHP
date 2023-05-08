<?php

require_once "connection.php";
require_once "functions.php";
// Here the user id is harcoded.
// You can integrate your authentication code here to get the logged in user id
$coursesID = '1';


$query = "SELECT * FROM comment WHERE c_id = '$coursesID'";
$result = mysqli_query($conn, $query);

$outputString = '';

foreach ($result as $row) {
    $sql = "SELECT * FROM user WHERE u_id = $row[u_id] ";
    $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $rown = $result->fetch_array(); }
    $userRating = $row['cm_review'];
    $avgRating = avgRating($row['u_id'], $row['cm_id'], $conn);
    $totalRating = totalRating($row['cm_id'], $conn);
    $outputString .= '
    <div class="row-item">
        <div class="row-title">' . $rown['u_name'] .' '. $rown['u_lastname'].'</div> 
        <div class="response" id="response-' . $row['c_id'] . '"></div>
        <ul class="list-inline"  onMouseLeave="mouseOutRating(' . $row['cm_id'] . ',' . $userRating . ');"> ';
    
            for ($count = 1; $count <= 5; $count ++) {
                $starRatingId = $row['cm_id'] . '_' . $count;
                
                if ($count <= $userRating) { 
                    $outputString .= '<li value="' . $count . '" id="' . $starRatingId . '" class="star selected">&#9733;</li>';
                } else {
                    $outputString .= '<li value="' . $count . '"  id="' . $starRatingId . '" class="star" onclick="addRating(' . $row['c_id'] . ',' . $count . ');" onMouseOver="mouseOverRating(' . $row['c_id'] . ',' . $count . ');">&#9733;</li>';
                }
            } // endFor
            
            $outputString .= '
        </ul>

        <p class="review-note">Total Reviews: ' . $totalRating . '</p>
        <p class="text-address">' . $row["cm_text"] . '</p>
    </div>
 ';
}
echo $outputString;
    
?>