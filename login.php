<?php
    include 'header.php';
    include 'user.php';
    session::checklogin();
?>
<?php
    $user = new user();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $userLogin = $user->userLogin($_POST);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./CSS/about.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<div class="bg">
    <?php include 'nav.php' ?>
                <ul class="navbar-nav">
                    <?php
                        $id = session::get("id");
                        $userlogin = session::get("login");
                        if ($userlogin == true) {
                    ?>
                    <?php } ?>
                </ul>
                <div class="col-md-4 ,rounded mx-auto d-block">
                <img src="./Img/login.png" class="img-fluid rounded-start p-2">
                </div>
    <div class="container">
        <div style="max-width: 600px; margin: 0 auto">
        <?php
            if (isset($userLogin)) {
                echo $userLogin;
            }
        ?>
            <form action="" method="POST">
                <div class="form-group mt-3">
                    <label for="email">Email</label>
                    <input name="email" id="email" class="form-control" type="email" placeholder="example@gmail.com">
                </div>
                <div class="form-group mt-3">
                    <label for="pass">Password</label>
                    <input name="pass" id="pass" class="form-control" type="password" placeholder="*****">
                </div>
                <div class="form-group mt-3">
                    <input name="submit" class="btn btn-success mt-3" type="submit" value="Login">
                    <input type="reset" class="btn btn-warning mt-3" value="Clear">
                </div>
            </form>
        </div>
    </div>
   <?php include 'footer.php'; ?>
</div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>   
</body>
</html>