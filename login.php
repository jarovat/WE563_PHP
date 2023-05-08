<?php 
        session_start();
         include("connection.php");
         $errors = array();

         if (isset($_POST['login_user'])){
            $Username = mysqli_real_escape_string($conn, $_POST['username']);
            $Password = mysqli_real_escape_string($conn, $_POST['password']);
            

            if (count($errors) == 0){
              $Password = md5($Password);
              $sql= "SELECT * FROM user Where username = '$Username' and password = '$Password' ";
              $result = mysqli_query($conn,$sql);

              if (mysqli_num_rows($result) == 1){
                $row = $result->fetch_assoc();

                if ($row['u_status'] == 'A'){
                $_SESSION['username'] = $Username ;
                $_SESSION['u_status'] = $row['u_status'] ;
                header("location: admin_index.php");
                }
                else{
                $_SESSION['username'] = $Username ;
                $_SESSION['u_status'] = $row['u_status'] ;
                header("location: user_index.php");
                }
                
              }else{
                array_push($errors, "บัญชีผู้ใช้หรือรหัสผ่านผิดกรุณากรอกอีกครั้ง");
                $_SESSION['error'] = "บัญชีผู้ใช้หรือรหัสผ่านผิดกรุณากรอกอีกครั้ง" ;
                header("location: form_login.php");
              }
            }
          }
                 
?>