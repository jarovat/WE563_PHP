<?php 
session_start();
  if (!isset($_SESSION['username'])){
    $_SESSION['msg'] = "You must login first!";
    header('location: form_login.php');
  }
  else {
    if( $_SESSION["u_status"] != 'A'){
      echo " you should login as Admin";
      header('location: form_login.php');
    }
    else {
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
  <title>Clean Ennergy</title>
</head>

<body>
  <div class="p-5">
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="success">
        <h3>
          <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>
  <div class="sticky-top">
    <nav class="navbar navbar-expand-sm navbar-light  border-bottom shadow-sm ">
      <div class="container-fluid d-flex flex-lg-row flex-md-column ">
        <a class="navbar-brand mx-4" href="#"><b class="icon">CE</b> Clean Energy</a></a>
        <button class="navbar-toggler justify-content-end" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse  justify-content-end" id="navbarSupportedContent">
          <form class="search d-flex  mx-auto">
            <input class="search form-control" type="search" placeholder="Search Courses ...">
          </form>
          <ul class="navbar-nav ">
            <li class="nav-item ">
              <a class="nav-link active me-3 " aria-current="page" href="Index.html#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active me-3  " aria-current="page" href="Index.html#Energy Sources">Energy Sources</a>
            </li>
            <li class="nav-item dropdown me-3">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Courses
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="solar.html">Solar Energy</a></li>
                <li><a class="dropdown-item" href="hydro.html">Hydro Energy</a></li>
                <li><a class="dropdown-item" href="wind.html">Wind Energy</a></li>
                <li><a class="dropdown-item" href="biogas.html">Biogas/Biomass Energy</a></li>
                <li><a class="dropdown-item" href="geothermal.html">Geothermal Energy</a></li>
              </ul>
            </li>
            <li class="nav-item ">
              <a class="nav-link active me-3  " aria-current="page" href="#Energy Sources">Support</a>
            </li>
            <li class="nav-item center">
              <div class="btn-group">
                <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-person-circle p-2"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="Profile.html">Profile</a></li>
                  <li><a class="dropdown-item" href="yourcourses.html">Your Courses</a></li>
                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
              </div>
            </li>
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

  <div class="container-fluid col-12 p-5" id="about">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-xl-12">
        <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">
          About
        </h3>
        <p>
          พลังงานสะอาดคือพลังงานที่ได้จากทรัพยากรทางธรรมชาติหรือกระบวนการผลิตที่เกิดขึ้นได้ซ้ำๆอย่างไม่มีจำกัดพลังงานสะอาดถือเป็นพลังงานแห่งอนาคตที่เป็นมิตรกับสิ่งแวดล้อมเนื่องจากไม่สร้างผลกระทบไม่ทำลายสิ่งแวดล้อมหรือปล่อยก๊าซคาร์บอนไดออกไซด์ออกสู่ชั้นบรรยากาศเหมือนพลังงานในรูปแบบอื่นๆไม่ว่าจะเป็นระหว่างกระบวนการผลิตแปรรูปการใช้ประโยชน์ไปจนถึงการจัดการของเสียทำให้พลังงานสะอาดกลายมาเป็นพลังงานทางเลือกใหม่ที่มีความสำคัญมาก
          พลังงานสะอาดสามารถแย่งแยกย่อยออกเป็นได้อีก 2ประเภท
          คือพลังงานที่มาจากธรรมชาติ และพลังงานที่มนุษย์สามารถสร้างขึ้นได้เอง
        </p>
      </div>
    </div>
  </div>

  <div class="container-fluid col-12 px-5" id="Energy Sources">
    <div class="col-sm-12 col-md-12 col-xl-12 ">
      <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">
        Energy Sources
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

    <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">

      <div class="col-sm-12 col-md-6 col-xl-3">
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

      <div class="col-sm-12 col-md-6 col-xl-3">
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

      <div class="col-sm-12 col-md-6 col-xl-3">
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

      <div class="col-sm-12 col-md-6 col-xl-3">
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

      <div class="col-sm-12 col-md-6 col-xl-3">
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
?>