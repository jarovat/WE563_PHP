<?php 
session_start();
include("connection.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="form.js"></script>
</head>

<body >
    <div class="container col-sm-12 col-md-5 signup p-5">
        <h3 class="center pbt">
            <span class="icon"><b>CE</b></span>
            Clean Energy
        </h3>
        <hr>
        <div class="container-fluid mt-3">
            <div class="row ">
                <div class="col-sm-12 col-xl-12 ">
                    <div class="txtlogin center">
                        <h3 class="center">ลงทะเบียนเข้าใช้งาน</h3>
                    </div>
                    <?php if (isset($_SESSION['error']))  : ?>
                        <div class="error">
                            <p class="center mt-3">
                                <?php 
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);
                                ?>
                            </p>
                        </div>
                    <?php endif ?>
                    <form name="form1" action="signup.php" method="post" class="needs-validation" novalidate >
                        <div class="mb-3 mt-3 ">
                            <label for="username" class="form-label">ชื่อบัญชีผู้ใช้:</label>
                            <input type="text" class="form-control" id="username" onblur="chkUser(this)" placeholder="กรอกชื่อบัญชีผู้ใช้" name="username"
                                required>
                            <div class="invalid-feedback">คุณต้องกรอกช่องนี้.</div>
                        </div>
                        <div class="mb-3 mt-3 ">
                            <label for="email" class="form-label">E-mail:</label>
                            <input type="text" class="form-control" id="email" onblur="chkMail(this)"  placeholder="กรอก E-mail" name="email"
                                required>
                            <div class="invalid-feedback">คุณต้องกรอกช่องนี้.</div>
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">รหัสผ่าน:</label>
                            <input type="password" class="form-control" id="pwd" onblur="chkPass(this)" placeholder="กรอกรหัสผ่าน "
                                name="pwd" required>
                            <div class="invalid-feedback">คุณต้องกรอกช่องนี้.</div>
                        </div>
                        <div class="mb-3">
                            <label for="pwd2" class="form-label"> ยืนยันรหัสผ่าน:</label>
                            <input type="password" class="form-control" id="pwd2" onblur="chkRepass(this)" placeholder="กรอกรหัสผ่านอีกครั้ง"
                                name="pwd2" required>
                            <div class="invalid-feedback">คุณต้องกรอกช่องนี้.</div>
                        </div>
                        <div class="center">
                        <button type="submit" class=" btn btn-success btn-lg " name="btnsignup">ลงทะเบียน</button>
                        </div>
                        <div class="center">
                            <hr>
                            คุณมีบัญชีอยู่แล้ว ? <a href="form_login.php" >เข้าสู่ระบบ</a>
                        </div>
                    </form>
                </div>

  <script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

  function chkUser(){
    let username = document.getElementById("username").value;
    if (username.length >= 4 && password.length <= 8){
     return true ;   
    }
    else{
        alert("ชื่อบัญชีผู้ใช้จะต้องอยู่ระหว่าง 4-8 ตัวอักษร!");
        return false;
    }
}

function chkMail(){
    let email = document.getElementById("email").value;
    var emailFilter=/^.+@.+\..{2,3}$/;
    if (!(emailFilter.test(email))) {
        alert ("ท่านใส่อีเมล์ไม่ถูกต้อง");
        return false;
    }
    else {
        return true;
    }
}

function chkPass(){
    let password = document.getElementById("pwd").value;
    if (password.length >= 4 && password.length <= 8){
     return true ;   
    }
    else{
        alert("รหัสผ่านจะต้องอยู่ระหว่าง 4-8 ตัวอักษร!");
        return false;
    }
}

function chkRepass(){
    let password = document.getElementById("pwd").value;
    let password2 = document.getElementById("pwd2").value;
    if (password == password2){
        return true;
    }
    else {
        alert("รหัสผ่านทั้ง 2 ช่องไม่ตรงกัน")
        return false;
    }
}

  </script>
            </div>
        </div>
    </div>
</body>


</html>