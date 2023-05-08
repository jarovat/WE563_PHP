<?php
session_start();
include("connection.php");

$fileupload = (isset($_POST['fileupload']) ? $_POST['fileupload'] : '');
$username = "jarovat";
$upload = $_FILES('$_POST[fileupload]');

if($_FILES['fileupload']['name'] != ''){
        $numrand = (mt_rand());
        $path="fileupload/";
        $type = strrchr($_FILES['fileupload']['name'],".");

        $newname = $numrand.$type;
        $path_copy = $path.$newname;
        $path_link = "fileupload/".$newname;

        move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);
        $sql = "UPDATE user SET 
        u_image='$newname'
        WHERE username = '$username' ";

        if ($conn->query($sql) === TRUE) {
                $_SESSION['username'] = $username ;
                $_SESSION['success'] = "แก้ไขเสร็จเรียบร้อย";
                header('location: testinput.php');
        }

        else {
        echo 'Error:' . $sql . "<br>" . $conn->error;
        }
}

else {
echo 'Error:' . $sql . "<br>" . $conn->error;
}
$conn->close();
?>