<?php
    session_start();
    include("connection.php");
    if (!isset($_SESSION['username'])){
        header('location: form_login.php');
    }
  else {
      $username = $_SESSION['username'];
      $coursesID = (isset($_GET['coursesID']) ? $_GET['coursesID'] : '');
      $sql = "SELECT * FROM user WHERE username = '$username'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          $row = $result->fetch_array(); 
          $userID = $row['u_id'];
          $_SESSION['username'] = $username ;
          $_SESSION['userid'] = $userID ;
          $_SESSION['coursesID'] = $coursesID;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Courses</title>
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
<div class="container col-12">
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
        <div class="container-fluid signup mt-3 ">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="txtlogin pbt">
                        <h3 class="center"><?php if ($coursesID != ''){ echo "แก้ไขคอร์ส " ;} 
                                    else { echo "สร้างคอร์ส";}
                               ?></h3>
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
                    <form name="form1" enctype="multipart/form-data" method="post" class="needs-validation" novalidate
                    action=<?php if ($coursesID != ''){ echo "editcourses.php" ;} 
                                    else { echo "addcourses.php"; } ?>>
                        <?php if ($coursesID != ''){
                                 $sql = "SELECT * FROM courses WHERE c_id = '$coursesID'";
                                 $result = $conn->query($sql);
                                 if ($result->num_rows > 0) {
                                     $rowc = $result->fetch_array();}
                                 } ?>
                        <div class="mb-3 mt-3 form-floating">
                            <input type="text" class="form-control" id="c_name" placeholder="Enter Cousesname" name="c_name" required
                             value="<?php if ($coursesID){echo $rowc['c_name'];}
                                            else echo "" ; ?>"   >
                            <label for="cname">ชื่อคอร์ส</label>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-floating mb-3 mt-3 ">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                            name="c_detail" style="height: 200px;"><?php if ($coursesID){echo $rowc['c_detail'];} else echo "" ; ?></textarea>
                            <label for="floatingTextarea">รายละเอียดคอร์ส</label>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        
                        <div class=" mb-3 mt-3">
                            <select class="form-select" aria-label="Default select example" name="energy">
                                <option value="">กรุณาเลือกประเภทพลังงาน</option>
                            <?php 
                                $sql = "SELECT * FROM energy ";
                                $result = $conn->query($sql);
                                while ( $row = mysqli_fetch_assoc($result)) {
                                        if($rowc['e_id'] == $row["e_id"])
                                        {
                                            $sel = "selected";
                                        }
                                        else
                                        {
                                            $sel = "";
                                        }
                            ?>
                            <option value="<?php echo $row["e_id"];?>" <?php echo $sel;?> >
                                <?php echo $row["e_name"];?>
                            </option>
                                <?php
                                }
                                ?>
		                    </select>
                        </div>
                        <div class="mb-3">
                            ไฟล์ภาพประกอบ
                            <input type="file" class="form-control mt-3" aria-label="file example" 
                            name="fileupload" id="fileupload"  required>
                            <div class="invalid-feedback">Invalid form file feedback</div>
                        </div>
                        <hr>
                        
                        <div class="center">
                            <button type="submit" class=" btn btn-success btn-lg " name="btncourses">
                               <?php if ($coursesID != ''){ echo "แก้ไขคอร์ส " ;} 
                                    else { echo "สร้างคอร์ส";}
                               ?>
                            </button>
                        </div>

                    </form>
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

  if($coursesID != ''){
	window.onLoad=data_show('energy','<?php echo $row['e_name'] ?>'); 
}	
</script>
</div>
</body>

</html>
<?php
      
        }
      }

?>