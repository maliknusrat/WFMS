<?php
    $db = mysqli_connect("localhost","root","","db_lr");
    $user_id = session::get("id");
    $sql = "SELECT * FROM tabel_user WHERE id='$user_id'";
    $result = $db->query($sql);
    $row = $result-> fetch_assoc();
    
    if($row['type'] == "general"){
        $pageLink = "index.php";
    }
    if($row['type'] == "recommendingOfficer"){
        $pageLink = "volunterIndex.php";
    }
    else if($row['type'] == "accountOfficer"){
        $pageLink = "teamMemeberIndex.php";
    }
    else if($row['type'] == "admin"){
        $pageLink = "adminIndex.php";
    }
    
?>

<div class="container">
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mynav m-auto mb-2 mb-lg-0">
            <ul class="navbar-nav mt-2">
            <?php
                    $id = session::get("id");
                    $userlogin = session::get("login");
                    if ($userlogin == true) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="home.php"><b>HOME</b></a>
                </li>
                <?php
                //Checking if current page is user's own profile pages
                $pageName = basename($_SERVER['PHP_SELF']);
                $match = "profile.php";
                $current_user_id = isset($_GET['id']) ? $_GET['id'] : $id;
                if($pageName == $match && $current_user_id == $user_id)
                    $isOwnProfilePage = true;
                else
                    $isOwnProfilePage = false;
                ?>
                <li class="nav-item">
                    <a class="nav-link <?php if($isOwnProfilePage == true){echo "disabled";}?>" href="profile.php?id=<?php echo $id; ?>"><b>PROFILE</b></a>
                </li>
                <?php
                //Checking if current page is one of the index pages
                $pageName = basename($_SERVER['PHP_SELF']);
                $pageName = strtolower($pageName);
                $match = "index";
                $isIndexPage = false;
                for($i=0;$i<strlen($pageName); $i++)
                {
                    $flag = true;
                    for($j=0; $j<strlen($match); $j++)
                    {
                        if($pageName[$i] != $match[$j])
                        {
                            $flag = false;
                            break;
                        }
                        else
                        {
                            $i++;
                        }
                    }
                    if($flag == true)
                    {
                        $isIndexPage = true;
                        break;
                    }
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link <?php if($isIndexPage == true){echo "disabled";}?>" href="<?php echo $pageLink;?>"><b>INDEX</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?action=logout"><b>LOG OUT</b></a>
                </li>
                <?php }else{ ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">LOG IN</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
</div>