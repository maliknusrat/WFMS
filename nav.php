<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./CSS/NAV.css">
</head>

<body>
  <nav class="navbar sticky-top navbar-expand-lg navbar-light mynav">
    <div class="container-fluid container">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mynav m-auto mb-lg-0">
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
                        <li class="nav-item itempad">
                            <a class="nav-link" href="index.php">INDEX</a>
                        </li>
                        <li class="nav-item itempad">
                            <a class="nav-link" href="?action=logout">LOG OUT</a>
                        </li>
                        <?php }else{ ?>
                          <li class="nav-item itempad ">
                                <a class="nav-link" href="login.php">LOG IN</a>
                          </li>
                        <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
</body>

</html>