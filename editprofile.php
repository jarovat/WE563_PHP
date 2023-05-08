<?php
session_start();
include("connection.php");

$fileupload = (isset($_POST['fileupload']) ? $_POST['fileupload'] : '');
$username = $_POST['username'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$umail = $_POST['umail'];
$uedu = $_POST['uedu'];
$uex = $_POST['uex'];
$upload = $_FILES['fileupload'];

if($upload != ''){
        $numrand = (mt_rand());
        $path="fileupload/";
        $type = strrchr($_FILES['fileupload']['name'],".");

        $newname = $numrand.$type;
        $path_copy = $path.$newname;
        $path_link = "fileupload/".$newname;

        move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);
        $sql = "UPDATE user SET 
        u_name ='$fname', u_lastname='$lname', u_mail='$umail',
        u_edu='$uedu',u_ex='$uex',u_image='$newname'
        WHERE username = '$username' ";

        if ($conn->query($sql) === TRUE) {
                $_SESSION['username'] = $username ;
                $_SESSION['success'] = "แก้ไขเสร็จเรียบร้อย";
                header('location: form_editprofile.php');
        }

        else {
        echo 'Error:' . $sql . "<br>" . $conn->error;
        }

}
else{
$sql = "UPDATE user SET 
u_name ='$fname', u_lastname='$lname', u_mail='$umail',
u_edu='$uedu',u_ex='$uex'
WHERE username = '$username' ";

if ($conn->query($sql) === TRUE) {
        $_SESSION['username'] = $username ;
        $_SESSION['success'] = "แก้ไขเสร็จเรียบร้อย";
        header('location: form_editprofile.php');
}

else {
echo 'Error:' . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>