<?php
class AddCategory extends BaseController
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


        $this->load_model("CategoriesModel");
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
                        $value = $this->categoriesmodel->insert($name);

                        if ($value == true) {
                            echo '<script language="javascript">';
                            echo 'alert("Category added successfully")';
                            echo '</script>';
                            $_SESSION["status"]="added";
                            header('Location: CategoryLists');

                        } else {
                            echo '<script language="javascript">';
                            echo 'alert("Please fill details properly")';
                            echo '</script>';
                        }
                    }
                } else if ($_SESSION["edit2"] == "edit2") {
                    $categoryid = $_SESSION["categoryid"];
                    $result["categorydetails"] = $this->categoriesmodel->getcategories($categoryid);       
                    $resultdata = json_encode($result);
                    $resultorg = json_decode($resultdata);
                
                    $flag=0;
                    
                    if(!empty($resultorg->categorydetails)){ 
                        foreach($resultorg->categorydetails as $row){
                            $name = $row->name;
                          
                       
                        }
                    }
                }
                if ($_SESSION["edit2"] == "edit2") {
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $categoryid = $_SESSION["categoryid"];
                        $name = $_POST['name'];
                        $result_faq_update = $this->categoriesmodel->updateCategory($categoryid,$name);
                        if ($result_faq_update) {
                            echo '<script language="javascript">';
                            echo 'alert("Category Updated successfully")';
                            echo '</script>';
                            $_SESSION["status"]="updated";
                            header('Location:CategoryLists');
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
        
        $this->load_view('admin/AddCategory',array('categoriesPageData' => $json_format));
      
    }
}
