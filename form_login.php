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
    <title>Login</title>
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

</head>

<body >
    <div class="container login">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-sm-12 col-xl-6 pt-5 ">
                    <h1 class="center ">
                        <span class="icon"><b>CE</b></span>
                        Clean Energy
                    </h1>
                    <img src="image/csm_home-parallax-stage-illustration-big_186afe2b52.png" style="width: 100%;"
                        alt="">
                </div>
                <div class="col-sm-12 col-xl-6  login p-5">
                    
                    <form name="frmlogin" class="row g-3 needs-validation" method="post" action="login.php" novalidate>
                    <div class="txtlogin">
                        <h3 class="center">เข้าสู่ระบบ</h3>
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
                        <div class="mb-3 mt-3 ">
                            <label for="username" class="form-label">ชื่อบัญชีผู้ใช้:</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username"
                                required>
                            <div class="invalid-feedback">คุณต้องกรอกช่องนี้.</div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">รหัสผ่าน:</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password"
                                name="password" required>
                            <div class="invalid-feedback">คุณต้องกรอกช่องนี้.</div>
                        </div>
                        <div class="center">
                        <button type="submit" class=" btn btn-success btn-lg " name="login_user">เข้าสู่ระบบ</button>
                        </div>
                        <div class="center">
                            <hr>
                            คุณมีบัญชีผู้ใช้หรือไม่ ? <a href="form_signup.php" >ลงทะเบียนเข้าใช้งาน</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
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
</script>
</body>

</html>
