<?php
include("connection.php");
$query = mysqli_query($conn,"SELECT AVG(rating) as AVGRATE from rating_data where status=1");
$row = mysqli_fetch_array($query);
$AVGRATE=$row['AVGRATE'];
$query = mysqli_query($conn,"SELECT count(rating) as Total from rating_data where status=1");
$row = mysqli_fetch_array($query);
$Total=$row['Total'];
$query = mysqli_query($conn,"SELECT count(remark) as Totalreview from  rating_data where status=1");
$row = mysqli_fetch_array($query);
$Total_review=$row['Totalreview'];
$review = mysqli_query($conn,"SELECT remark,rating,email from rating_data where status=1 order by date_time desc limit 4 ");
$rating = mysqli_query($conn,"SELECT count(*) as Total,rating from rating_data group by rating order by rating desc");
?>