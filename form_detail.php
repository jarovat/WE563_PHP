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
            $_SESSION['username'] = $username ;
            $sql = "SELECT * FROM courses ";
            $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_array(); 
                    $userID = $row['u_id'];
                    $coursesID = $_GET['coursesID'];
                    $_SESSION['coursesID'] = $coursesID;
                    $_SESSION['userID'] = $userID;
          
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
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <title>Clean Ennergy</title>
</head>

<style>
ul {
    margin: 0px;
    padding: 10px 0px 0px 0px;
}

li.star {
    list-style: none;
    display: inline-block;
    margin-right: 5px;
    cursor: pointer;
    color: #9E9E9E;
}

li.star.selected {
    color: #ff6e00;
}

.row-title {
    font-size: 20px;
    color: #00BCD4;
}

.review-note {
    font-size: 12px;
    color: #999;
    font-style: italic;
}
.row-item {
    margin-bottom: 20px;
    border-bottom: #F0F0F0 1px solid;
}
p.text-address {
    font-size: 12px;
}



</style>

<body onload="showRatingData('getRatingData.php')">
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

        <div class="container-fluid col-12 mt-3" id="Solar">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-xl-6 p-5 ">
                    <?php
                      include("connection.php");
                      $sql = "SELECT * FROM courses WHERE c_id = '$coursesID' ";
                      $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_array();
                            echo "<h3>".$row['c_name']."</h3>";
                            }
                        
                    ?>
                    <div class="row">
                        <div class="col-auto">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <div class="col-auto">
                            <a>3.0 (10 Review)</a>
                        </div>
                    </div>
                    <?php echo "<p class='mt-2'>".$row['c_detail']."</p>"; ?>
                    <div class="col-auto ">
                        <button type="button"
                            class="btn btn-success  mt-3 col-xl-btn-lg col-md-btn-sm">เข้าเรียน</button>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-xl-6 ">
                    <?php echo  "<img class='bgbody' src='fileupload/".$row['c_image']."' alt=''>" ?>
                </div>
            </div>
        </div>


        <div class="col-12 p-5">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">รายละเอียดคอร์ส</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">ผู้สอน</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                        type="button" role="tab" aria-controls="contact" aria-selected="false">รีวิว</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <?php    
        include("connection.php");
        $sql = "SELECT * FROM chapter WHERE c_id = '$coursesID' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){

        echo "<div class='tab-pane fade show active' id='home' role='tablist' aria-labelledby='home-tab'>";
        echo    "<div class='container-fluid'>";
        echo        "<div class='col-12 '>";
        echo            "<h5>เนื้อหาของคอร์สนี้</h5>";
        echo        "</div>";
        echo        "<div class='row'>";
                        echo   "<div class='col-1'>";
                        echo    "<p>1</p>";
                        echo    "</div>";
                        echo    "<div class='col-8'>";
                        echo    "<p>".$row['ct_name']."</p>";
                        echo    "</div>";
                        echo    "<div class='col-3' style='text-align: center;'>";
                        echo    "<button onclick='myFunction()'><i class='bi bi-play-circle' style='font-size: 16px;'></i></button>";
                        echo    "</div>";
                        echo    "<div style='display: none;' id='myDIV'>";
                        echo    "<p>คำอธิบาย : ".$row['ct_detail']."</p>";
                        echo    "<iframe  src='image/solarvideo.m4' ></iframe>";
                        echo    "</div>";          
        echo        "</div>";
        echo    "</div>";
        echo "</div>";
            } 
       }
    ?>

                <?php
    include("connection.php");
            $sql = "SELECT * FROM user WHERE u_id = $userID ";
            $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_array();
            echo "<div class='tab-pane fade' id='profile' role='tablist' aria-labelledby='profile-tab'>";
            echo    "<div class='row'>";
            echo        "<div class='col-auto'>";
            echo            "<img class=' shadow' width='150px' src='fileupload/".$row['u_image']."'>";
            echo        "</div>";
            echo        "<div class='col-6'>";
            echo            "<ul>";
            echo                "<li><p>".$row['u_name']."  ".$row['u_lastname']."</li></p>";
            echo                "<li><p>".$row['u_edu']."</p></li>";
            echo                "<li><p>".$row['u_ex']."</p></li>";                                        
            echo                "<li><p>".$row['u_mail']."</p></li>";
            echo            "</ul>";
            echo        "</div>";
            echo    "</div>";
            echo "</div>";
                }
            
    ?>
                <div class="tab-pane fade" id="contact" role="tablist" aria-labelledby="contact-tab">

                    <div class="container">
                        <div class="card">
                            <div class="card-header">คะแนนรีวิวคอร์สนี้</div>
                            
                                <div class="card-body">
                                    <div class="col text-center">
                                        <h1 class="text-warning mt-4 mb-4">
                                            <b><span id="average_rating">0.0</span> / 5</b>
                                        </h1>
                                        <div>
                                     
                                        </div>
                                        <h3><span id="total_review">0</span> Review</h3>
                                    </div>

                                    <div class="container mt-5">
                                        <h5 class="center">รีวิวจากผู้ใช้อื่น</h5><br>
                                        <span id="user_list"></span>
                                    </div>
                                              
                                </div>
                            </div>
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
<script type="text/javascript">

    function showRatingData(url){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200)
            {
                document.getElementById("user_list").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", url, true);
        xhttp.send();

    } 

    function mouseOverRating(coursesID, rating) {

        resetRatingStars(coursesID)

        for (var i = 1; i <= rating; i++)
        {
            var ratingId = coursesID + "_" + i;
            document.getElementById(ratingId).style.color = "#ff6e00";

        }
    }

    function resetRatingStars(coursesID){
        for (var i = 1; i <= 5; i++)
        {
            var ratingId = coursesID + "_" + i;
            document.getElementById(ratingId).style.color = "#9E9E9E";
        }
    }

   function mouseOutRating(coursesID, userRating) {
	   var ratingId;
       if(userRating !=0) {
    	       for (var i = 1; i <= userRating; i++) {
    	    	      ratingId = coursesID + "_" + i;
    	          document.getElementById(ratingId).style.color = "#ff6e00";
    	       }
       }
       if(userRating <= 5) {
    	       for (var i = (userRating+1); i <= 5; i++) {
	    	      ratingId = coursesID + "_" + i;
	          document.getElementById(ratingId).style.color = "#9E9E9E";
	       }
       }
    }

    function addRating (coursesID, ratingValue) {
            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function ()
            {
                if (this.readyState == 4 && this.status == 200) {

                    showRatingData('getRatingData.php');
                    
                    if(this.responseText != "success") {
                    	   alert(this.responseText);
                    }
                }
            };

            xhttp.open("POST", "insertRating.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            var parameters = "index=" + ratingValue + "&restaurant_id=" + coursesID;
            xhttp.send(parameters);
    }
</script>


<?php
          }
        }
    }
?>