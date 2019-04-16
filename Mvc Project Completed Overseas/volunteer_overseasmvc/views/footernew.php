<?php
	$assets_url = ASSETS_URL;
?>
<!----Modal Start------>
<div class="modal fade login-popup vertical-align-middle" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="modal-content">
            <h4>Volunteer Overseas Login</h4>
            <div class="form-wrap">

                <form class="loginform" action="" method="post" name="loginform" id="login_form">
                    <div class="alert alert-dismissible alert-danger login_alert" role="alert" style="display:none">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <span class="login_msg"></span>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="User Name" name="login[email]">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="login[password]">

                            </div>
                        </div>
                    </div>
                    <div class="button-outer text-center">
                        <button type="submit" class="btn btn-fill btn-large" id="login_button">Login</button>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="button-outer text-center">
                                <br><p>Not a Member? <a href="<?php echo SITE_URL . 'register';?>">Register</a></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!----Modal End------>

<!-- Footer Start -->
<footer>
    <div class="footer-row">
        <a href="<?php echo SITE_URL;?>" title="volunteer overseas" class="footer-logo"><img src="<?php echo $assets_url; ?>images/logo_1.png" alt="Logo"></a>
        <ul>
            <li><a href="faq" title="FAQ">FAQ</a></li>
            <li><a href="contact" title="Contact us">Contact Us</a></li>
        </ul>
    </div>
</footer>
</body>
</html>
<!-- Footer End -->