<?php
session_start();
include('connection.php');
$errors = array();
$Username = $_SESSION['username'] ;
$coursesID = $_SESSION['coursesID'];
    if (isset($_POST['btncourses'])){
        $fileupload = (isset($_POST['fileupload']) ? $_POST['fileupload'] : '');
        $userID = $_SESSION['userid'];
        $c_name = $_POST['c_name'];
        $detail = $_POST['c_detail'];
        $status = "W";
        isset( $_POST['energy'] ) ? $energyID = $_POST['energy'] : $energyID = "";
   
            if($_FILES['fileupload']['name'] != ""){
                    $numrand = (mt_rand());
                    $path="fileupload/";
                    $type = strrchr($_FILES['fileupload']['name'],".");

                    $newname = $numrand.$type;
                    $path_copy = $path.$newname;
                    $path_link = "fileupload/".$newname;

                    move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);

                        if (count($errors) == 0){
                            $sql = "UPDATE courses SET  
                            c_name = '$c_name', c_detail = '$detail', c_image = '$newname', e_id = '$energyID' 
                            WHERE c_id = '$coursesID' ";
                            mysqli_query($conn, $sql);
                            $_SESSION['username'] = $Username;
                            $_SESSION['coursesID'] = $coursesID;
                            header('location: form_yourcourses.php');
                        } 
            }
            else {
                $sql = "UPDATE courses SET  
                c_name = '$c_name', c_detail = '$detail', e_id = '$energyID' 
                WHERE c_id = '$coursesID' ";
                mysqli_query($conn, $sql);
                $_SESSION['username'] = $Username;
                $_SESSION['coursesID'] = $coursesID;
                header('location: form_yourcourses.php');
            }        
    }
    else {
        echo 'Error:' . $sql . "<br>" . $conn->error ;
        array_push($errors, "ตรวจสอบข้อมูลอีกครั้ง");
        $_SESSION['error'] = "ตรวจสอบข้อมูลอีกครั้ง";
        header("location: form_addcourses.php");
        }


?>