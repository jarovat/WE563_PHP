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
          $sql = "SELECT * FROM user WHERE username = '$username'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
                $row = $result->fetch_array(); 
                $userID = $row['u_id'];
                $_SESSION['username'] = $username ;
                $_SESSION['userid'] = $userID ;
                $energyID = $_GET['energy'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

  <title>Clean Ennergy</title>
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
  <div class="container-fluid col-12  " id="Solar">
    <div class="row">
      <div class="col-sm-12  p-5 ">
        <?php
        include("connection.php");
        $sql = "SELECT * FROM energy WHERE e_id = '$energyID' ";
        $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()){
                echo "<h3>".$row["e_name"]."</h3>";
                echo "<p class='pt-2'>".$row["e_detail"]."</p>";
            }
        } else {
            echo "ไม่มีข้อมูล";
        }
        $conn->close();
        ?>
        <h3>คอร์สเรียน</h3>
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-1">
          <?php
          include("connection.php");
          $sql = "SELECT * FROM courses WHERE e_id = '$energyID' ";
          $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()){
                  echo "<div class='col-sm-12 col-md-6 col-xl-4'>";
                    echo "<div class='card h-100' style='border-radius: 15px;'>";
                      echo "<img src='fileupload/".$row['c_image']."' class='myimg' alt='...'>";
                      echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>".$row["c_name"]."</h5>";
                            echo "<div class='row'>";
                              echo "<div class='col-auto'>";
                                echo "<span class='fa fa-star checked'></span>";
                                echo "<span class='fa fa-star checked'></span>";
                                echo "<span class='fa fa-star checked'></span>";
                                echo "<span class='fa fa-star '></span>";
                                echo "<span class='fa fa-star '></span>";
                              echo "</div>";
                              echo "<div class='col-auto'>";
                                echo "<a>3.0 (10 Review)</a>";
                              echo "</div>";
                            echo "</div>";    
                            echo "<p class='card-text mt-2'>".iconv_substr($row["c_detail"],0,300,'UTF-8')."</p>";   
                      echo "</div>";
                        echo "<a href='form_detail.php?coursesID=$row[c_id]' class='btn btn-secondary'>ดูเพิ่มเติม</a>";
                      echo "</div>";
                  echo "</div>";
                }
            } else {
                echo "ไม่ได้สร้างคอร์สไว้";
            }
            $conn->close();
        ?>
        </div>
      </div>
    </div>
  </div>
</div>  
</body>
<footer>
  <div class="container-fluid col-12 p-5" id="support">
    <div class="row">
      <div class="col-sm-12">
        <a class="p-5" href="#about">About</a>
        <a href="#Energy Sources">Energy Sources</a>
        <a class="p-5" href="#Support">Support</a>
        <i class="bi bi-facebook"></i>
        <i class="bi bi-instagram"></i>
      </div>
    </div>
  </div>
</footer>

</html>
<?php
          }
        }
    }
?>