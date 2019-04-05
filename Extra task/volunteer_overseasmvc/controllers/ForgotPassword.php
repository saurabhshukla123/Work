<?php
class ForgotPassword extends BaseController {

    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     * 	 
     */

    public function index() {       

        $this->load_model('usermodel');
        $siteurl=SITE_URL;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            date_default_timezone_set('Asia/Kolkata');
            $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $tokennumber=substr(str_shuffle($permitted_chars), 0, 26);
            $date1 = new DateTime();           
           $dateformat=date_format($date1, 'Y-m-d H:i:s');
            $date=$dateformat;
            //$date=date("Y-m-d")." ".date("h:i:s");
            $userPageData = array();        
            $userPageData['userdetails']=$this->usermodel->getdetails($email);
            $userpage=$userPageData['userdetails'];
            $name="";
            if(!empty($userpage)){
                foreach($userpage as $row){
                    $emailid=$row['email'];
                    $createddate=$row['created_at'];
                   
                    $userPageData['updatetoken']=$this->usermodel->updateTokenDetail($emailid, $tokennumber,$date);
                    //send mail
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $email_to=$emailid;
                    $email_subject="Password Reset Link";
                    $message = "<html><head>
                    <title>Password Reset Link</title>
                    </head>
                    <body>
                    Hello ".$emailid.",
                    <h2>Your request for password reset is as below:-</h2>
                    <br>
                    <p>Follow this link to reset your password <a href=".$siteurl."ResetPassword/index/".$tokennumber.">Click here for reset</a> </p>
                    <p>If you have not  requested  ignore this mail !</p>
                    <P style='color:blue;'><h2>Thanks and Regards:Volunteer Overseas</h2></p> 
                    </body>";
                
                    if(mail($email_to, $email_subject , $message,$headers))
                    {
                        $_SESSION['status']="sent";
                    //echo "Mailsent ";
                    }
                    else
                    {
                        $_SESSION["status"]="failed";
                        // echo "Mail not sent ";

                    }

                    //mail code ends

                }
            }
            else
            {
                 $_SESSION['status']="not exists";
            }
      

       }
     $this->load_view('admin/ForgotPassword');   
    }
}
?>