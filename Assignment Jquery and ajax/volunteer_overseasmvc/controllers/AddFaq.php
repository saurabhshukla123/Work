<?php
class AddFaq extends BaseController
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


        $this->load_model("FaqModel");
        $question = "";
        $answer = "";
        $sequencenumber = "";
        $id = "";
        if (isset($_SESSION["add2"])) {

        } elseif (isset($_SESSION["edit2"])) {
        } else {
            header("Location: Login");
        }

        if (isset($_SESSION['role'])) {

            if ($_SESSION['role'] == "superadmin") {
                if ($_SESSION["add2"] == "add2") {
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $question = $_POST['question'];
                        $answer = $_POST['answer'];
                        $sequencenumber = $_POST['sequencenumber'];
                    //    $data = array($question, $answer, $sequencenumber);
                        $value = $this->faqmodel->insert($question, $answer, $sequencenumber);

                        if ($value == true) {
                            echo '<script language="javascript">';
                            echo 'alert("Faq added successfully")';
                            echo '</script>';
                            header('Location: FaqListing');

                        } else {
                            echo '<script language="javascript">';
                            echo 'alert("please fill details properly")';
                            echo '</script>';
                        }
                    }
                } else if ($_SESSION["edit2"] == "edit2") {
                    $projectid = $_SESSION["projectid"];
                    $result["faq_details"] = $this->faqmodel->faqdetails($projectid);                 
                    $resultdata = json_encode($result);
                    $resultorg = json_decode($resultdata);
                
                    $flag=0;
                    
                    if(!empty($resultorg->faq_details)){ 
                        foreach($resultorg->faq_details as $row){
                            $question = $row->question;
                            $answer = $row->answer;
                            $sequencenumber = $row->sequence_number;
                        }
                    }
                }
                if ($_SESSION["edit2"] == "edit2") {
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $projectid = $_SESSION["projectid"];
                        $question = $_POST['question'];
                        $answer = $_POST['answer'];
                        $sequencenumber = $_POST['sequencenumber'];
                       // $faq_update = new faq();
                        $result_faq_update = $this->faqmodel->updateFaq($question, $answer, $projectid, $sequencenumber);
                        if (mysqli_affected_rows($result_faq_update)) {
                            echo '<script language="javascript">';
                            echo 'alert("Faq Updated successfully")';
                            echo '</script>';
                            header('Location:FaqListing');
                        } else {
                            echo '<script language="javascript">';
                            echo 'alert("please fill details properly")';
                            echo '</script>';
                        }
                    }

                }

            }

        } else {
            header('Location: Login');
        }

        $json_format = json_encode($result);
        
        $this->load_view('admin/AddFaq',array('FaqData' => $json_format));
      
    }
}
