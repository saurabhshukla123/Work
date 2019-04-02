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
    <title><?php echo (isset($title) ? $title : 'Volunteer Overseas'); ?></title>
    <!--CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo $assets_url; ?>css/main.css">
    <!--Js -->
    <script>
        var assets_url = '<?php echo $assets_url; ?>';
        var site_url = '<?php echo SITE_URL; ?>';
        var user_id = '<?php echo getUserId(); ?>';

    </script>
    <script type="text/javascript" src="<?php echo $assets_url; ?>js/main.js"></script>
</head>
<?php 
    $qString = explode("?", $siteURL[2]);
?>

<body>
<div class="wrapper">
    <header class="<?php if($qString[0] == "search" ){ echo 'secondary-header'; } ?>">
        <div class="row header-row">
            <div class="col-lg-2 col-sm-3 col-xs-6 logo-outer">
                <a href="<?php echo SITE_URL;?>" title="Volunteer Overseas" class="logo"><img src="<?php echo $assets_url; ?>images/logo_1.png" alt=""><img class="color-logo" src="<?php echo $assets_url; ?>images/logo.png" alt=""></a>
            </div>
            <div class="col-lg-10 col-sm-9 col-xs-6 menu-wrap">
                <nav>
                    <ul>
                        <li><a href="works" title="How It Works">how it works</a></li>
                        <li><a href="contact" title="Contact Us">Contact us</a></li>
                    </ul>
                </nav>
                <div class="right-block">
                        <ul>
                            <li class="login-link">
                                <a href="<?php echo SITE_URL; ?>admin/home.php" class="btn" title="Login">Login</a>
                            </li>
                        </ul>
                </div>
            </div>
        </div>
        <a href="#" title="" class="hamburger-icon"><span></span></a>
    </header>
<!-- Header End -->