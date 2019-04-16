<?php
class ProjectDetail extends BaseController {

    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     * 	 
     */

    public function index() {      
        $this->load_model('ProjectModel');        
    
        $projectPageData = array();
        if(isset($_SESSION["sucess"]))
        {
            if($_SESSION["sucess"]=="1")
            {
                $_SESSION["sucess"]="reset";
                echo "<script>alert('Registered sucessfully'); </script>";
        
            }
            else if($_SESSION["sucess"]=="0")
            {
                $_SESSION["sucess"]="reset";

                echo "<script>alert('Sorry Not registered'); </script>";
        
            }
        }
        if(isset($_GET["id"]))
        {
            $_SESSION["projectid"]=$_GET["id"];
        }
        else
        {
            $_GET["id"]= $_SESSION["projectid"];
        }

        //code for counter
        $_SESSION["projectid"]=$_GET["id"];            
        $projectPageData['project_details'] = $this->projectmodel->getprojectDetailPage($_GET["id"]);   

        $resultdata = json_encode($projectPageData);
        $projectdetail = json_decode($resultdata);

        
        $status=0;
        if (!empty($projectdetail->project_details)) {
            foreach ($projectdetail->project_details as $value) {
                if($value->title!="" && !empty($value->title))
                {
                    $status=1;
                }
            }
        }

        if($status==1)
        {
        }
        else{
            header('Location:home');
        }
        


     
        $date=date("Y-m-d")." ".date("h:i:s");
        //counter for visitors
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
      $flag=0;
        if(isset($_COOKIE['projectid'])) {

            foreach ($_COOKIE['projectid'] as $name => $value) {
                $name = htmlspecialchars($name);
                if($name==$_SESSION["projectid"])
                    {
                        $flag=1;
                 
                    }


                }
                    if($flag==0)
                    {
                        $cookie_value =$_SESSION["projectid"];
                        $cookie_name = 'projectid['.$cookie_value.']';
                        setcookie($cookie_name,$cookie_value, time() + (86400 * 30), "/");
                        $projectPageData['userip'] =$this->projectmodel-> getProjectViewDetails($_SESSION["projectid"],$ip);
                        $resultdata = json_encode($projectPageData);
                        $resultuserip = json_decode($resultdata);
                          
                        $userstatus=1;
                        foreach($resultuserip->userip as $row){
                                if($row->user_ip==$ip)
                                {
                                    $userstatus=0;
                                }
                            }
                            if($userstatus==1)
                            {
                              $projectPageData['viewhistory'] =$this->projectmodel->insert_project_viewhistory($_SESSION["projectid"],$date, $ip);
                            }
                    }
        } else {
            $cookie_value =$_SESSION["projectid"];
            $cookie_name = 'projectid['.$cookie_value.']';
            setcookie($cookie_name,$cookie_value, time() + (86400 * 30), "/");
            
            $projectPageData['userip'] =$this->projectmodel->getProjectViewDetails($_SESSION["projectid"],$ip);
            $resultdata = json_encode($projectPageData);
            $resultuserip1 = json_decode($resultdata);
              
              $userstatus1=1;
                foreach($resultuserip1->userip as $row){
                        if($row->user_ip==$ip)
                        {
                            $userstatus1=0;
                        }
                    }
                    if($userstatus1==1)
                    {
                      $projectPageData['viewhistory'] =$this->projectmodel->insert_project_viewhistory($_SESSION["projectid"],$date, $ip);
                    }
       }


   



        //code ends for counter
        $projectPageData['startMonths'] = $this->projectmodel->getProjectStartDatesMonths($_GET["id"]); 
        $projectPageData['project_images'] = $this->projectmodel->getProjectGallery($_GET["id"]);
        $projectPageData['project_checkin'] = $this->projectmodel-> getProjectChecks($_GET["id"]);
        $projectPageData['project_week'] = $this->projectmodel-> getProjectCosts($_GET["id"]);  
        $projectPageData['project_start_dates'] =$this->projectmodel->getProjectStartDates($_GET["id"]);
        $projectPageData['project_view'] =$this->projectmodel-> getProjectView($_GET["id"]);
        
        $json_format = json_encode($projectPageData);
        $this->load_view('projectdetail',array('projectPageData'=>$json_format));   
       
      
    
    }
    public function addproject()
    {  
       $this->load_model('Applications');
       $this->load_model('ProjectModel');     

       $name=$_POST['fname'];
       $projectid=$_SESSION["projectid"];
       $date=$_POST['datepicker3'];
       $selectduration=$_POST['selectduration'];
       $email=$_POST['email'];
       $phonenumber=$_POST['phonenumber'];
       $projectimage="";
       $projectname="";
       $application =new Applications();
       $flag=$application->insert_applications($name, $phonenumber, $projectid, $date, $email, $selectduration);
       if($flag==true)
       {
            echo "<script>alert('Registered sucessfully'); </script>";
      //  sendmail($name, $phonenumber, $date, $email, $selectduration, $projectid);
            //Mail Code

            $projectData['project_details'] = $this->projectmodel->getprojectDetailPage($projectid);
            $json_format = json_encode($projectData);
            $projectDataResult = json_decode($json_format);
            if (!empty($projectDataResult->project_details)) {
                foreach ($projectDataResult->project_details as $value) {
                    
                    $projectname = $value->title;
                     $projectimage=$value->image;
                 }
            }


            $imageurl=UPLOAD_IMAGE_URL1.$projectimage;
            $email_subject="Request For ".$projectname;
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $email_to=$email;
            $message = "<html><head>
            <title>".$projectname."</title>
            </head>
            <body>
            
            <bR>Hello ".$name.",<br><br>
            We have received your request for ".$projectname.". <br>

            <img width='200px' height='200px' src=\"".$imageurl."\">
            <br> Your filled details are as follows:-<br>
            <br>ProjectName = ".$projectname.".
            <br>Phone Number =".$phonenumber.".
            <br>Project StartDate =".$date.".
            <br>Email = ".$email.".
            <br>Duration = ".$selectduration." Weeks.<br>
            

            Thank you for your interest in ".$projectname." . We will contact you soon  
            </body>";
         
            if(mail($email_to, $email_subject , $message,$headers))
            {
            echo "Mailsent ";
            }
            else
            {
                echo "Mail not sent ";

            }

         //Mailcode ends
        $_SESSION["sucess"]="1";
        header("Location:../projectdetail");   
 
        }
       else
       {
        $_SESSION["sucess"]="0";
        echo "<script>alert('Sorry Not Registered'); </script>";
        header("Location:../projectdetail"); 
      
       }

  
    }
    public function ajax_cost()
    {
        $this->load_model('ProjectModel');        
       // $project_details =new projects();
        $value=  $_POST["week"];       
        $projectid=$_SESSION["projectid"];
        $response=$this->projectmodel->getProjectCostsOnWeek($projectid,$value); 
        $value_response=$response[0]['cost'];
        echo $value_response;           
    }


    public function sendmail($name, $phonenumber, $date, $email, $selectduration,$projectid)
    {
                        
                // $email_subject="Request For ".$projectid;
                // $headers  = 'MIME-Version: 1.0' . "\r\n";
                // $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                // $email_to="saurabh.shukla@internal.mail";
                // $message = "<html><head>
                // <title>Your email at the time</title>
                // </head>
                // <body>
                // <center>
                // <bR>Hello ".$name.",<br>
                // We have recived your request for ".$projectid." <br>

                // <img src=\"".UPLOAD_IMAGE_URL1."\">
                // <br> Your filled details are as follows:-
                // <br>ProjectName = ".$projectid."
                // <br>Phone Number =".$phonenumber."
                // <br>Project StartDate =".$date."
                // <br>Email = ".$email."
                // <br>Duration = ".$selectduration."
                 
                // </body>";

                // if(mail($email_to, $email_subject , $message,$headers))
                // {
                // echo "Mailsent ";
                // }
                // else
                // {
                //     echo "Mail not sent ";

                // }

    }
}
?>