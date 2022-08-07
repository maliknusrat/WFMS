<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include 'user.php';
include 'header.php';
session::checksession();

$pageType = 'admin';
include 'individualSessionCheck.php';
?>
<?php
$loginmgs = session::get("loginmgs");
if (isset($loginmgs)) {
    echo $loginmgs;
}
session::set("loginmgs", NULL);
?>
<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = mysqli_connect('localhost', 'root', '', 'db_lr');
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
    <title>NEW DONATION REQUEST</title>
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./CSS/about.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <div class="bg">
        <?php
        include 'navbar.php';
        ?>
        <div class="panel-heading">
            <h3 class="text-center mt-3">NEW CONTACT INFORMATION</h3>
        </div>

        <!-- Table Start -->
        <?php
            
        ?>
        <div style="height: 400px; overflow-y: auto;">
            <table id="" class="table table-striped table-bordered">
                <thead class="table-success text-center">
                    <tr>
                        <th>S.L </th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>PHONE</th>
                        <th>DETAILS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM contact";
                    $res =  $conn->query($sql);
                    $row = $res->fetch_assoc();
                    $ID = $row['ID'];
                    $fullname = $row['fullname'];
                    
                    echo '<td>'.$row['ID'].'</td>';
                    echo '<td>'.$row['fullname'].'</td>';
                    echo '<td>'.$row['email'].'</td>';
                    echo '<td>'.$row['phone'].'</td>';
                    echo '<td>'.$row['details'].'</td>';
                    ?>
                </tbody>
            </table>
        </div>
        <!-- Table End -->
        </form>
    </div>
    </div>
    <?php include 'footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </div>
</body>

</html>