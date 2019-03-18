<?php
$assets_url = ASSETS_URL;
$contactPageData = json_decode($contactPageData);

if(!empty($contactPageData->sucessfull)){
	$sucessfull=$contactPageData->sucessfull;
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact us</title>
    <link rel="stylesheet" href=" public/css/bootstrap.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="public/css/style.css" type="text/css">
    <link rel="stylesheet" href="public/css/media.css" type="text/css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto:300,400,700');
    </style>
    <script src="public/css/js/bootstrap.js"> </script>
    <script src="public/css/js/bootstrap.min.js"> </script>
</head>
<body>
    <div>
        <header class="headerformatcontact">
            <?php include 'header.php';?>
            <div id="imagetext-contactus">
                <h1 class="font-weight-bold">Contact Us</h1>
            </div>
        </header>
    </div>
    <div class="container-fluid pt-4 ml-4  container-fluid-contact container-mobile-contactus">
        <div class="row ">
        <label class="text-success "><?php echo $sucessfull; ?></label>
            <div class="col-md-12 ">

                <div class="font-sizexl pr-5 pl-3 text-muted remove-margin-content container-mobile-contactus-padding">
                    Got questions for your Volunteer Overseas team ? No problem! We've got answers...or at least the
                    best guidance to help you book your dream program abroad. Don't hesitate to drop us a line, and
                    your trusted Volunteer Overseas travel guides will get back to you in record time. Thank you!
                </div>
            </div>
        </div>
        <div class="container pb-5 container-contact">
            <div class="row pt-15 contact-form">

                <div class="col-lg-9 col-md-12 ">

                    <form  onsubmit="return validateForm()"  method="post" >

                        <div class="row pt-5 ">
                            <div class="col-md-6 col-12 div1-gutters-contact ">
                                <input type="text" class="form-control border-no-radius" id="name"  name="name" placeholder="Name"
                                    width=60>
                                <label class="pink" id="name-error" value=""></label>
                            </div>
                            <div class="col-md-6 col-12 div2-gutters-contact mobile-view ">
                                <input type="email" class="form-control mobile-view-email border-no-radius" placeholder="Email" name="email"
                                    id="email">
                                <label class="pink" id="email-error" value=""></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-12 ">
                                <textarea rows="8" cols="92" placeholder="Message" id="message"  name="message"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <label class="pink" id="message-error" value=""></label>
                            </div>
                        </div>
                        <div class="row pt-3 ">
                            <div class="col-md-12">
                                <center>
                                    <input type="submit" class="btn btn-send-contact-page noradius mobile-button-width "
                                        onplick="return validateForm()" value="Send">
                                </center>

                            </div>
                        </div>
                    </form>
                </div>


            </div>


        </div>
    </div>
    </div>
    <footer class="bg-dark text-light">
     <?php include 'footer.php';?>
    </footer>
    <script src="public/js/jquery-3.3.1.min.js"> </script>
    <script src="public/js/bootstrap.js"> </script>
    <script src="public/js/contact.js"> </script>    
	 <script src="public/js/commonjs.js"> </script>
</body>
</html>