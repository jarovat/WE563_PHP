<?php 
    session_start();
    include("connection.php");
    if (!isset($_SESSION['username'])){
        header('location: form_login.php');
      }
      else {
        if( $_SESSION["u_status"] != 'S'){
          header('location: form_login.php');
        }
        else {
            $username = $_SESSION['username'];
            $sql = "SELECT * FROM user WHERE username = '$username' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_array();     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="form.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</head>
<body>
<div class="p-5">
    <div class="">
        <nav class="navbar navbar-expand-sm bg-white">
        <div class="container-fluid d-flex flex-lg-row flex-md-column shadow2">
            <a class="navbar-brand my-2" href="#"><b class="icon">CE</b> Clean Energy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="fas fa-bars"></i>
            </span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 mt-4">
                <li class="nav-item mt-2">
                    <a class="nav-link   " aria-current="page" href="user_index.php#about">พลังงานสะอาด</a>
                    </li>
                    <li class="nav-item mt-2">
                    <a class="nav-link   " aria-current="page" href="user_index.php#Energy Sources">แหล่งกำเนิดพลังงานสะอาด</a>
                    </li>
                    <li class="nav-item dropdown me-3 mt-2">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        คอร์สเรียน
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php echo  "<li><a class='dropdown-item' href='form_energy.php?energy=1'>พลังงานแสงอาทิตย์</a></li>"; ?>
                    <?php echo  "<li><a class='dropdown-item' href='form_energy.php?energy=2'>พลังงานน้ำ</a></li>"; ?>
                    <?php echo  "<li><a class='dropdown-item' href='form_energy.php?energy=3'>พลังงานลม</a></li>"; ?>
                    <?php echo  "<li><a class='dropdown-item' href='form_energy.php?energy=4'>พลังงานแก๊ส</a></li>"; ?>
                    <?php echo  "<li><a class='dropdown-item' href='form_energy.php?energy=5'>พลังงานใต้พิภพ</a></li>"; ?>
                    </ul>
                    </li>
                    <li class="nav-item mt-2">
                    <a class="nav-link me-3  " aria-current="page" href="#support">ติดต่อเรา</a>
                    </li>
                    <li class="nav-item dropdown me-3 ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-circle "></i>
                    </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="form_editProfile.php">โปรไฟล์</a></li> 
                        <li><a class="dropdown-item" href="form_yourcourses.php">คอร์สเรียนของคุณ</a></li>
                        <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
                        </ul>
                    </li>
                    
                
                <form>
            </ul>
            </div>
        </div>
        </nav>
    </div>
    <form method="POST" action="testinput.php" enctype="multipart/form-data" name="uploadfile" id="uploadfile">

        <div class="container rounded bg-white mb-5 login">
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
            <?php if (isset($_SESSION['success']))  : ?>
                <div class="success">
                    <p class="center mt-3">
                        <?php 
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        ?>
                    </p>
                </div>
            <?php endif ?>
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <?php  echo "<img class='mt-5 shadow' width='150px' src='fileupload/".$row['u_image']."'>"   ?>
                        <input type="hidden" class="mt-3 center " placeholder="Username" 
                                name="username" value="<?php echo $row['username'] ?>" />              
                    </div>
                </div>
                <div class="col-md-7 border-right">
                
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right ">หน้าโปรไฟล์</h4>
                        </div>
                        <div class="row mt-2 ">
                            <div class="col-md-6">
                                <label class="labels">รูปโปรไฟล์</label>
                                <input type="file" class="form-control " aria-label="file example" name="fileupload" id="fileupload" >
                            <div class="invalid-feedback">Invalid form file feedback</div>
                            </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="labels">ชื่อ</label>
                                <input type="text" class="form-control" placeholder="first name" 
                                name="fname" value="<?php echo $row['u_name'] ?>"/>
                            </div>
                            <div class="col-md-6">
                                <label class="labels">นามสกุล</label>
                                <input type="text" class="form-control" 
                                name="lname" value="<?php echo $row['u_lastname'] ?>" placeholder="surname">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">อีเมล </label>
                                <input type="text" class="form-control" placeholder="enter email " 
                                name="umail" value="<?php echo $row['u_mail'] ?>">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 mt-3">
                                <span>การศึกษา</span>
                                <textarea class="form-control" placeholder="education"
                                name="uedu" id="floatingTextarea" style="height: 100px;"><?php echo $row['u_edu'] ?></textarea>
                            </div>
                        </div>
                        <div class="row mt-3 ">
                            <div class="col-md-12 mt-3">
                                <span>ประสบการณ์ทำงาน</span>
                                <textarea class="form-control" placeholder="Experience"
                                name="uex" id="floatingTextarea" style="height: 100px;"><?php echo$row['u_ex']?></textarea>
                            </div> 
                        </div>
                        <div class="center mt-5">
                            <button type="submit" class=" btn btn-success btn-lg " id="editProfile">บันทึกการแก้ไข</button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </form>
</div>
</body>
</html>
<?php
    }
    }
    }
?>
