<?php
session_start();
include('connection.php');
$errors = array();
$Username = $_SESSION['username'] ;
    if (isset($_POST['btncourses'])){
        $fileupload = (isset($_POST['fileupload']) ? $_POST['fileupload'] : '');
        $userID = $_SESSION['userid'];
        $c_name = $_POST['c_name'];
        $detail = $_POST['c_detail'];
        $status = "W";
        isset( $_POST['energy'] ) ? $energyID = $_POST['energy'] : $energyID = "";
        $upload = $_FILES['fileupload'];  
        
            if($upload != ''){
                    $numrand = (mt_rand());
                    $path="fileupload/";
                    $type = strrchr($_FILES['fileupload']['name'],".");

                    $newname = $numrand.$type;
                    $path_copy = $path.$newname;
                    $path_link = "fileupload/".$newname;

                    move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);



                    $user_check_query = "SELECT * FROM courses WHERE  c_name = '$c_name' ";
                    $query = mysqli_query($conn, $user_check_query);
                    $result = mysqli_fetch_assoc($query);
                        if ($result['c_name'] === $c_name){
                            array_push($errors, "ชื่อคอร์สเรียนนี้มีคนใช้แล้วกรุณาใช้ชื่อใหม่");
                            $_SESSION['error'] = "ชื่อคอร์สเรียนนี้มีคนใช้แล้วกรุณาใช้ชื่อใหม่ ";
                            header('location: form_addcourses.php');
                        }
                        
                        if (count($errors) == 0){
                            $sql = "INSERT INTO courses (c_name, c_detail, c_image, c_status, e_id, u_id) 
                            VALUES ('$c_name', '$detail', '$newname', 'W', '$energyID', '$userID')";
                            $result = mysqli_query($conn, $sql) ;

                            mysqli_close($conn);
                            if($result){
                                echo "<script type='text/javascript'>";
                                echo "alert('Save Succesfuly');";
                                echo "window.location = 'form.php'; ";
                                echo "</script>";
                                }
                                else{
                                echo "<script type='text/javascript'>";
                                echo "alert('Error!!');";
                                echo "</script>";
                            }
                            $_SESSION['username'] = $Username;
                            $_SESSION['coursesID'] = $coursesID;
                            header('location: form_yourcourses.php');
                            
                        } 
            }
            else {
                echo 'Error if fileupload '. "<br>" . $conn->error;
                array_push($errors, "ตรวจสอบข้อมูลอีกครั้ง");
                $_SESSION['error'] = "ตรวจสอบข้อมูลอีกครั้ง";
                header("location: form_addcourses.php");
            }        
    }else {
        echo 'Error:' . $sql . "<br>" . $conn->error ;
        array_push($errors, "ตรวจสอบข้อมูลอีกครั้ง");
        $_SESSION['error'] = "ตรวจสอบข้อมูลอีกครั้ง";
        header("location: form_addcourses.php");
        }


?>