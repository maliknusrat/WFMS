<?php
include 'header.php';
include 'user.php';
?>

<?php
if (isset($_GET['action']) && $_GET['action'] == "logout") {
  session::distroy();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/Style.css">
  <link rel="stylesheet" href="CSS/NAV.css">
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>Waste Food Management System</title>
</head>

<body>
  <nav class="navbar sticky-top navbar-expand-lg navbar-light mynav">
    <div class="container-fluid container">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mynav m-auto mb-2 mb-lg-0">
          <li class="nav-item itempad ">
            <a class="nav-link active" aria-current="page" href="home.php">HOME</a>
          </li>
          <li class="nav-item itempad ">
            <a class="nav-link" href="About.php">ABOUT</a>
          </li>
          <li class="nav-item itempad ">
            <a class="nav-link" href="Contact.php">CONTACT</a>
          </li>
          <li class="nav-item itempad ">
            <a class="nav-link" href="registrationform.php">REGISTRATION</a>
          </li>
          <?php
          $id = session::get("id");
          $userlogin = session::get("login");
          if ($userlogin == true) {
          ?>
            <?php
            //Checking if current page is one of the index pages
            $pageName = basename($_SERVER['PHP_SELF']);
            $pageName = strtolower($pageName);
            $match = "index";
            $isIndexPage = false;
            for ($i = 0; $i < strlen($pageName); $i++) {
              $flag = true;
              for ($j = 0; $j < strlen($match); $j++) {
                if ($pageName[$i] != $match[$j]) {
                  $flag = false;
                  break;
                } else {
                  $i++;
                }
              }
              if ($flag == true) {
                $isIndexPage = true;
                break;
              }
            }
            ?>

            <?php
            $db = mysqli_connect("localhost", "root", "", "db_lr");
            $user_id = session::get("id");
            $sql = "SELECT * FROM tabel_user WHERE id='$user_id'";
            $result = $db->query($sql);
            $row = $result->fetch_assoc();
            if ($row['type'] == "general") {
              $pageLink = "index.php";
            }
            if ($row['type'] == "recommendingOfficer") {
              $pageLink = "volunterIndex.php";
            } else if ($row['type'] == "accountOfficer") {
              $pageLink = "teamMemeberIndex.php";
            } else if ($row['type'] == "admin") {
              $pageLink = "adminIndex.php";
            }
            ?>
            <li class="nav-item itempad">
              <a class="nav-link <?php if ($isIndexPage == true) {
                                    echo "disabled";
                                  } ?>" href="<?php echo $pageLink; ?>">INDEX</a>
            </li>
            <li class="nav-item itempad">
              <a class="nav-link" href="?action=logout">LOG OUT</a>
            </li>
          <?php } else { ?>
            <li class="nav-item itempad ">
              <a class="nav-link" href="login.php">LOG IN</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Carouser -->
  <div class="title">
    <marquee class="news-content">
      <p>
      <h3><b>Welcome to Waste Food Management System</b></h3>
      </p>
    </marquee>
  </div>
  <div class="container mt-6">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="Img/img1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="Img/img3.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="Img/img2.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <div class="container textbar">
    <p>Almost 1 3rd of all food produced for human consumption ends up being thrown away.This accounts for almost 1.3 billion tons per year.Meanwhile, scores of people around the globe go hungry or are under-nourished.This Food Waste Management Website helps reduce wastage and feed the underprivileged.Besides the Website, there are two kinds of users in this system; The Donor and The Admin.Admin with leftovers can add a request with details about the food.The Admin can then approve the request and assign an employee to pick up the food.Think before waste your food, someone is starving.</p>
  </div>
  <div class="container mt-5">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-inner my-1">
        <div class="carousel-item active">
          <img src="./images/css/image1.jpg" class="d-block img-fluid" alt="images1">
        </div>
        <div class="carousel-item">
          <img src="./images/css/image2.jpg" class="d-block img-fluid" alt="images2">
        </div>
        <div class="carousel-item">
          <img src="./images/css/image3.jpg" class="d-block img-fluid" alt="images3">
        </div>
        <div class="carousel-item">
          <img src="./images/css/image4.jpg" class="d-block img-fluid" alt="images4">
        </div>
        <div class="carousel-item">
          <img src="./images/css/image5.jpg" class="d-block img-fluid" alt="images5">
        </div>
        <div class="carousel-item">
          <img src="./images/css/image6.jpg" class="d-block img-fluid" alt="images5">
        </div>
        <div class="carousel-item">
          <img src="./images/css/image7.jpg" class="d-block img-fluid" alt="images5">
        </div>
        <div class="carousel-item">
          <img src="./images/css/image8.jpg" class="d-block img-fluid" alt="images5">
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <?php include 'footer.php' ?>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->

</body>

</html>