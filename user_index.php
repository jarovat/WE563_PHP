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
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <title>Clean Ennergy</title>
    <style type="text/css">
    .hint{ font-size: 16px; border: 1px solid gray; padding: 5px ;}
    .hint tr td a{ text-decoration:none; }
    .hint tr td a:hover{ background-color:#CCC; }
   
</style>
    <script>
     $(document).ready(function(){
       $("#word").keyup(function(){
         $.post("autocomplete.php", { word: $("#word").val()},
         function(data, status){
           $("#hint_text").html(data);
         });
       });
     });

     function setword(courses){
       $("#word").val(courses);
       $("#hint_text").html('');
     }
    </script>
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

  <div class="col-12 bgheader">
    <h1 class="headertext">
      <span class="w3-padding w3-black w3-opacity-min"><b>CE</b></span>
      Clean Energy
    </h1>  
  </div>

  <div class="container-fluid  mt-5 "> 
    <div class="row">
      <div class="col-sm-auto col-md-7 "></div>
      <div class="col-sm-12 col-md-5">
      <form class="search mt-3">
      <input class="search form-control" type="search" id="word" placeholder="ค้นหาคอร์ส ...">
      <span id="hint_text"></span>
      </form>
      </div>
    </div>
  </div>
    
  <div class="container-fluid col-12 " id="about">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-xl-12">
        <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">
          พลังงานสะอาดคืออะไร ?
        </h3>
        <p>
          พลังงานสะอาดคือพลังงานที่ได้จากทรัพยากรทางธรรมชาติหรือกระบวนการผลิตที่เกิดขึ้นได้ซ้ำๆอย่างไม่มีจำกัดพลังงานสะอาดถือเป็นพลังงานแห่งอนาคตที่เป็นมิตรกับสิ่งแวดล้อมเนื่องจากไม่สร้างผลกระทบไม่ทำลายสิ่งแวดล้อมหรือปล่อยก๊าซคาร์บอนไดออกไซด์ออกสู่ชั้นบรรยากาศเหมือนพลังงานในรูปแบบอื่นๆไม่ว่าจะเป็นระหว่างกระบวนการผลิตแปรรูปการใช้ประโยชน์ไปจนถึงการจัดการของเสียทำให้พลังงานสะอาดกลายมาเป็นพลังงานทางเลือกใหม่ที่มีความสำคัญมาก
          พลังงานสะอาดสามารถแย่งแยกย่อยออกเป็นได้อีก 2ประเภท
          คือพลังงานที่มาจากธรรมชาติ และพลังงานที่มนุษย์สามารถสร้างขึ้นได้เอง
        </p>
      </div>
    </div>
  </div>

  <div class="container-fluid col-12 " id="Energy Sources">
    <div class="col-sm-12 col-md-12 col-xl-12 ">
      <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">
        แหล่งกำเนิดพลังงานสะอาด
      </h3>
      <p>
        พลังงานสะอาดสามารถแย่งแยกย่อยออกเป็นได้อีก 2 ประเภท คือ
        พลังงานที่มาจากธรรมชาติ เช่น ลม น้ำ แสงแดด ความร้อนใต้พิภพ
        ส่วนพลังงานสะอาดอีกประเภทหนึ่งคือพลังงานที่มนุษย์สามารถสร้างขึ้นได้เอง
        เช่น พลังงานขยะ พลังงานชีวภาพ และ พลังงานชีวมวล
        ที่ผลิตได้จากเศษวัสดุเหลือใช้ เช่น หญ้าเนเปียร์ ข้าวโพด ชานอ้อย ฟางข้าว
        ฯลฯ รวมถึงภาคปศุสัตว์ เช่น มูลสัตว์แหล่งพลังงานสะอาดที่สำคัญมีดังนี้
      </p>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mt-3 ">

      <div class="col">
        <div class="card h-100" style="border-radius: 15px;">
          <img src="image/solar-panels-istock.jpg" class="myimg" alt="...">
          <div class="card-body">
            <h5 class="card-title">Solar Energy</h5>
            <p class="card-text">
              พลังงานแสงอาทิตย์เป็นทางเลือกพลังงานสะอาดที่ใช้ประโยชน์จากแหล่งพลังงานธรรมชาติอย่างแสงอาทิตย์
              ซึ่งเป็นทรัพยากรที่มีมากที่สุดของโลกอย่างหนึ่งเพื่อนำมาแปรรูปเป็นพลังงานด้วยระบบโซลาร์เซลล์ที่จะทำหน้าที่ในการเปลี่ยนพลังงานแสงอาทิตย์ให้เป็นพลังงานไฟฟ้า
              <a class="link active" href="#Solar">ดูเพิ่มเติม </a>
            </p>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100" style="border-radius: 15px;">
          <img src="image/PTT_hydroelectric-power-plant-impacts-forests_01.jpg" class="myimg" alt="...">
          <div class="card-body">
            <h5 class="card-title">Hydro Energy</h5>
            <p class="card-text">พลังงานน้ำเป็นพลังงานทดแทนจากธรรมชาติที่สร้างได้จากอ่างเก็บน้ำหรือเขื่อน
              โดยอาศัยหลักการเคลื่อนที่ของน้ำที่จะเคลื่อนที่จากที่สูงลงสู่ที่ต่ำ
              เพื่อหมุนใบพัดของกังหันน้ำและเครื่องปั่นไฟฟ้าหรือเครื่องกำเนิดไฟฟ้าในโรงไฟฟ้าพลังน้ำด้วยพลังงานจลน์
              และได้มาซึ่งพลังงานไฟฟ้า<a class="link active" href="#Hydro">ดูเพิ่มเติม </a></p>

          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100" style="border-radius: 15px;">
          <img src="image/shorewind11.jpg" class="myimg" alt="...">
          <div class="card-body">
            <h5 class="card-title">Wind Energy</h5>
            <p class="card-text">
              เราสามารถผลิตกระแสไฟฟ้าจากพลังงานลมได้ด้วยการใช้กังหันลมในการเปลี่ยนพลังงานจลน์ที่เกิดจากการเคลื่อนที่ของลม
              จากนั้นจึงเปลี่ยนเป็นพลังงานกลอีกทอดหนึ่งเพื่อใช้ในการหมุนเครื่องกำเนิดไฟฟ้าและเปลี่ยนพลังงานกลเป็นพลังงานไฟฟ้าต่อไป
              <a class="link active" href="#Wind">ดูเพิ่มเติม </a></p>

          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100" style="border-radius: 15px;">
          <img src="image/PTTCOVER91_03.jpg" class="myimg" alt="...">
          <div class="card-body">
            <h5 class="card-title">Biogas/Biomass Energy</h5>
            <p class="card-text">
              พลังงานชีวภาพและพลังงานชีวมวลเป็นพลังงานที่ได้จากการแปรรูปวัสดุเหลือใช้จากภาคการเกษตร
              ให้เป็นพลังงานแก๊สและพลังงานไฟฟ้าด้วยกระบวนการแปรรูปวัตถุชีวภาพตั้งแต่การเผา
              การผลิตก๊าซ และการหมักผลผลิตทางการเกษตรและมวลสารของสิ่งมีชีวิต<a class="link active" href="#Biogas">ดูเพิ่มเติม </a></p>

          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100 " style="border-radius: 15px;">
          <img src="image/415831.jpg" class="myimg" alt="...">
          <div class="card-body parent">
            <h5 class="card-title">Geothermal Energy</h5>
            <p class="card-text">
              พลังงานใต้พิภพ คือ
              พลังงานที่ได้จากการนำความร้อนที่กักเก็บไว้ใต้ผิวโลก
              โดยใช้แรงจากไอน้ำแรงดันสูงที่สะสมอยู่ใต้ชั้นหินไปหมุนกังหันและให้พลังงานกับเครื่องกำเนิดไฟฟ้า
              และได้เป็นพลังงานไฟฟ้า...<a class="link active" href="#Geothermal">ดูเพิ่มเติม </a> </p>

          </div>
        </div>
      </div>
    </div>
  </div>

</div>

</body>
<footer class="text-center text-white bg-dark">
  <div class="container-fluid  justify-content-center align-items-center">
    <h5 class="text-white">Contect Me</h5>
    <div class="row text-center col-4">
  
    </div>
  </div>
</footer>
</html>
<?php
    }
  }
}
?>