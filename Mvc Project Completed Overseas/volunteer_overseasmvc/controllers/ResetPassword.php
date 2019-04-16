<?php
class ResetPassword extends BaseController {

    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     * 	 
     */

    public function index() {  
        $this->load_model('usermodel'); 
     
        //new password set 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if(isset($_POST['password']) && $_POST['password']!="")
                {
                        $encrypt_pwd = $_POST['password'];
                        
                        if(isset($_SESSION["tokenemailid"]))
                        {
                            //time expiry code start
                            date_default_timezone_set('Asia/Kolkata');
                            $datetime1 = new DateTime();
                            $datetime2 = new DateTime($_SESSION["tokendate"]);
                            $interval = $datetime1->diff($datetime2);
                            $year = $interval->format('%y years');
                            $month = $interval->format('%m months ');
                            $days = $interval->format('%a days ');
                            $hours = $interval->format('%h hours');
                            $minute = $interval->format('%i minutes');
                            $second = $interval->format('%s seconds');
                            echo $year;
                            echo $month;
                            echo $days;
                            echo $hours;
                            echo $minute;
                            echo $second;
                            if($year==0 && $month==0 && $days==0 && $hours==0 && isset($minute) && isset($second))
                            {
                                $updateemailid=$_SESSION["tokenemailid"];            
                                $password = md5($encrypt_pwd);
                                $result_update = $this->usermodel->updatePassword($updateemailid, $password);
                                if ($result_update) {
                                    echo '<script language="javascript">';
                                    echo 'alert("Password Updated successfully")';
                                    echo '</script>';
                                    $_SESSION["status"]="updated";
                                    $_SESSION["tokenemailid"]="";
                                    $siteurl=SITE_URL."Login";
                                    header("location: $siteurl");
                                } else {
                                    echo '<script language="javascript">';
                                    echo 'alert("Please fill details properly")';
                                    echo '</script>';
                                }
                                }
                                else
                                {
                                    $_SESSION["status"]="timeover";
                                    $siteurl=SITE_URL."Login";
                                    header("location: $siteurl");
                                    
                                }
                        //expire code ends
                    }
                }
                else
                {
                    // $siteurl=SITE_URL."ResetPassword";
                    // $this->load_view("ResetPassword/index/");
                }
            
        
            }
        else
        {

            $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $uri_segments = explode('/', $uri_path);
            $tokennumber=$uri_segments[4]; 
            if($tokennumber!="" && isset($tokennumber))
            {
                //get token details if not empty
                $userPageData = array();        
                $userPageData['userdetails']=$this->usermodel->getTokenDetails($tokennumber);
                $userpage=$userPageData['userdetails'];
                if(!empty($userpage)){
                    foreach($userpage as $row){
                        $emailid=$row['email'];
                        $_SESSION["tokenemailid"]=$emailid;
                        $date=$row['tokenDate'];
                        $_SESSION["tokendate"]=$date;

                    }
                }
                else
                {
                    $_SESSION["status"]="wrongtoken";
                    $siteurl=SITE_URL."Login";
                    header("location: $siteurl");

                }
            }
            else{
                $siteurl=SITE_URL."Login";
                header("location: $siteurl");
            }
         }
        
        $this->load_view('admin/ResetPassword');   
    }
}
?>