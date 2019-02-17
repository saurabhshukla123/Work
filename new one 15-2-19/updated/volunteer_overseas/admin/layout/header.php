<?php
    $assets_url = ASSETS_URL;
    $siteURL = explode("/",$_SERVER['REQUEST_URI']);
?>
<!-- Header Start -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo $assets_url; ?>images/favicon.ico" />
    <title>Volunteer Overseas</title>
    <!--CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo $assets_url; ?>css/main.css">
    <!--Js -->

    <script>
        var assets_url = '<?php echo $assets_url; ?>';
        var site_url = '<?php echo ADMIN_SITE_URL; ?>';
        var user_id = '<?php //echo getUserId(); ?>';
        var FRONT_SITE_URL = '<?php echo SITE_PATH_FRONT; ?>';
    </script>
</head>
<body>
<div class="wrapper admin-wrapper ">
    <header <?php if(!checkIfLogin()) { echo 'style="padding: 11px 50px";'; }?>>
        <div class="row header-row">
            <div class="col-lg-2 col-sm-3 col-xs-6 logo-outer">
                <a href="<?php if(!checkIfLogin()) {  echo "home.php"; }else{ echo "dashboard.php"; } ?>" title="Volunteer Overseas" class="logo">
                    <img src="<?php echo $assets_url; ?>images/logo_1.png" alt="">
                    <img class="color-logo" src="<?php echo $assets_url; ?>images/logo.png" alt="">
                </a>
            </div>
            <div class="col-lg-10 col-sm-9 col-xs-6 menu-wrap">
                <nav>
                    <ul>
                        <?php if(checkIfLogin()) { ?>
                            <li><a href="user_list.php" title="Users">Users</a></li>                            
                        <?php } ?>
                    </ul>
                </nav>
                    <?php if(checkIfLogin()) { ?>
                        <div class="right-block">
                            <div class="col-lg-9">
                                <span class="logged-in-name"> <?php echo getLoginUserName(); ?></span><br>
                                <span class="logged-in-name">Currently logged in as: <?php echo getLoggedInUserRole(); ?></span>
                            </div>
                            <div class="col-lg-1">
                                <a href="<?php echo ADMIN_SITE_URL . 'logout.php';?>" class="btn" title="Login">Logout</a>
                            </div>
                        </div>
                    <?php } ?>
            </div>
        </div>
        <a href="#" title="" class="hamburger-icon"><span></span></a>
 </header>
<!-- Header End -->

