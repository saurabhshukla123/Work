<?php

include "../admin/include/init.php";
include "../admin/layout/header.php";


if(isset($_SESSION['user_id']))
{
    header('Location: dashboard.php');
}
?>

<section class="login_wrapper " style="background: url(<?php echo $assets_url; ?>images/banner-img.jpg);">
    <div class="login_outer">
        <h1>Welcome to Volunteer Overseas</h1>
        <form class="loginform" action="" method="post" name="loginform" id="login_form">
            <div class="alert alert-dismissible alert-danger login_alert text-center" role="alert" style="display:none">
                <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>-->
                <span class="login_msg"></span>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="User Name" name="login[email]">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" name="login[password]">
            </div>
            <div class="form-group">
               <p><!--<a href="<?php /*echo SITE_URL . 'register';*/?>">Register</a> | --><a href="#" class="forgot_link" title="Forgot password?">Forgot password?</a> </p>
            </div>
            <div class="button-outer text-center">
                <button type="submit" class="btn btn-fill btn-large" id="login_button">Sign In</button>
            </div>
        </form>
    </div>
</section>
</div>
<?php
include "../admin/layout/footer.php";
?>