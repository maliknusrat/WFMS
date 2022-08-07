<?php
include 'header.php';
?>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_lr');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $fullname   = $_POST['fullname'];
    $email  = $_POST['email'];
    $phone = $_POST['phone'];
    $details = $_POST['details'];
    $sql = "INSERT INTO contact (fullname,phone, email, details)
        VALUES ('$fullname','$phone', '$email','$details')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Wow! User Registration Completed.')</script>";
        $fullname = "";
        $number = "";
        $email = "";
        $details = "";
    } else {
        echo "<script>alert('Woops! Something Went Wrong.')</script>";
    }
}
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact US</title>
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./CSS/NAV.css">
    <link rel="stylesheet" href="./CSS/about.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <?php include 'nav.php' ?>
    <div class="bg">
        <div class="container">
            <h3 class="display-4 text-center my-4"><b>Contact US</b></h3>
            <div class="container">
                <div style="max-width: 600px; margin: 0 auto">
                    <form action="" method="POST">
                        <div class="form-group mt-3">
                            <label for="name">Full Name *</label>
                            <input name="fullname" id="fullname" class="form-control" type="text" placeholder="fullname" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="email">Email *</label>
                            <input name="email" id="email" class="form-control" type="email" placeholder="Example@gmail.com" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="phone">Contact Number *</label>
                            <input name="phone" id="phone" class="form-control" type="number" placeholder="01XXXXXXXXX" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="pass">Address *</label>
                            <input name="pass" id="pass" class="form-control" type="text" placeholder="Address" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="pass">Details *</label>
                            <input name="details" id="details" class="form-control" type="text" placeholder="Write here........" required>
                        </div>
                        <div class="form-group mt-3">
                            <a href="login.php">
                                <input name="submit" class="btn btn-primary mt-3" type="submit" value="SUBMIT">
                            </a>
                            <input type="reset" class="btn btn-warning mt-3" value="Clear">
                        </div>
                    </form>
                </div>
            </div>
            <?php include 'footer.php' ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>