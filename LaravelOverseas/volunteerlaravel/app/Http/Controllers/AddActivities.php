<?php
class AddActivities extends BaseController
{

    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     *
     */

    public function index()
    {
        if (isset($_SESSION["role"])) {
            if ($_SESSION["role"] == "superadmin") {
               
            } 
            else {
                header('Location: Login');
            }
        }else
        {
            header('Location: Login');
        }


        $this->load_model('ActivitiesModel');
        $question = "";
        $answer = "";
        $sequencenumber = "";
        $id = "";
        if (isset($_SESSION["add2"])) {

        } 
        elseif (isset($_SESSION["edit2"])) {
        } else {
            header("Location: Login");
        }

        if (isset($_SESSION['role'])) {

            if ($_SESSION['role'] == "superadmin") {
                if ($_SESSION["add2"] == "add2") {
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $name = $_POST['name'];
                        $value = $this->activitiesmodel->insert($name);

                        if ($value == true) {
                            echo '<script language="javascript">';
                            echo 'alert("Activity added successfully")';
                            echo '</script>';
                            $_SESSION["status"]="added";
                            header('Location: ActivityLists');

                        } else {
                            echo '<script language="javascript">';
                            echo 'alert("Please fill details properly")';
                            echo '</script>';
                        }
                    }
                } else if ($_SESSION["edit2"] == "edit2") {
                    $activityid = $_SESSION["activityid"];
                    $result["activitiesdetails"] = $this->activitiesmodel->getactivities($activityid);       
                    $resultdata = json_encode($result);
                    $resultorg = json_decode($resultdata);
                
                    $flag=0;
                    
                    if(!empty($resultorg->activitiesdetails)){ 
                        foreach($resultorg->activitiesdetails as $row){
                            $name = $row->name;
                          
                       
                        }
                    }
                }
                if ($_SESSION["edit2"] == "edit2") {
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $activityid = $_SESSION["activityid"];
                        $name = $_POST['name'];
                        $result_faq_update = $this->activitiesmodel->updateActivity($activityid,$name);
                        if ($result_faq_update) {
                            echo '<script language="javascript">';
                            echo 'alert("Activity Updated successfully")';
                            echo '</script>';
                            $_SESSION["status"]="updated";
                            header('Location:ActivityLists');
                        } else {
                            echo '<script language="javascript">';
                            echo 'alert("Please fill details properly")';
                            echo '</script>';
                        }
                    }

                }

            }

        } else {
            header('Location: Login');
        }

        $json_format = json_encode($result);
        
        $this->load_view('admin/AddActivities',array('activitiesPageData' => $json_format));
      
    }
}
