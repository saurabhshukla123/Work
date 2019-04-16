<?php
class AddCity extends BaseController
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


        $this->load_model('CityModel');
        $this->load_model('CountriesModel');
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
                $result["country"]= $this->countriesmodel->allCountries();

                if ($_SESSION["add2"] == "add2") {
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $name = $_POST['name'];
                        $countryid = $_POST['country'];
                        $value = $this->citymodel->insert($name,$countryid);

                        if ($value == true) {
                            echo '<script language="javascript">';
                            echo 'alert("City added successfully")';
                            echo '</script>';
                            $_SESSION["status"]="added";
                            header('Location: CityLists');

                        } else {
                            echo '<script language="javascript">';
                            echo 'alert("Please fill details properly")';
                            echo '</script>';
                        }
                    }
                } else if ($_SESSION["edit2"] == "edit2") {
                    $city_id = $_SESSION["cityid"];

                    $result["citydetails"] = $this->citymodel->getallcityAndCountry($startfrom,$offset,$city_id);      
                    
                    $resultdata = json_encode($result);
                    $resultorg = json_decode($resultdata);
                
                    $flag=0;
                    
                    if(!empty($resultorg->citydetails)){ 
                        foreach($resultorg->citydetails as $row){
                            $name = $row->name;
                            $countryname=$row->countryname;
                          
                       
                        }
                    }
                }
                if ($_SESSION["edit2"] == "edit2") {
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $city_id = $_SESSION["cityid"];
                        $name = $_POST['name'];
                        $countryid = $_POST['country'];
                        $result_faq_update = $this->citymodel->updateCountry($city_id,$name,$countryid);
                        if ($result_faq_update) {
                            echo '<script language="javascript">';
                            echo 'alert("Activity Updated successfully")';
                            echo '</script>';
                            $_SESSION["status"]="updated";
                            header('Location:CityLists');
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
        
        $this->load_view('admin/AddCity',array('cityPageData' => $json_format));
      
    }
}
