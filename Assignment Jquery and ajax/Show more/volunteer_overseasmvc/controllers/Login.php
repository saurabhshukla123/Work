<?php
class Login extends BaseController
{

    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     *
     */

    public function index()
    {
        $this->load_model("LoginModel");
    
        if (isset($_SESSION["role"])) {
            if ($_SESSION["role"] == "superadmin") {
                header('Location: OrganizationLists');
            } elseif ($_SESSION["role"] == "organization") {
                header('Location: OrganizationLists');
            } else {

            }
        }
        $this->load_view('admin/Login');
    }



    public function loginverify()
    {
        $this->load_model("LoginModel");
        $error_pwd = "";
        $error_username = "";
        $error_invalid = "";
        $error=array();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $encrypt_pwd = $_POST['password'];
            $password = md5($encrypt_pwd);

            if (empty($username)) {
                $error_username = "Username is required";
                $error["username"]=$error_username;
            } else {
                $error_username = "";
                $error["username"]=$error_username;
            }

            if (empty($encrypt_pwd)) {
                $error_pwd = "Password is required";
                $error["password"]=$error_pwd;

            } else {
                $error_pwd = "";
                $error["password"]=$error_pwd;

            }
            if ($error_username == "" && $error_pwd == "") {

                $result=array();              
                $result['result_data'] = $this->loginmodel->validate($username, $password);  
                $json_format = json_encode($result); 
                $result = json_decode($json_format);           
                $flag=0;            
                    foreach ($result->result_data as $row ) {
                        $flag=1;                     
                         if ($row->status == 1) {
                            if ($row->role == "superadmin") {
                                $_SESSION["id"] = $row->id;
                                $_SESSION["email"] = $row->email;
                                $_SESSION["role"] = $row->role;
                                $error['valid']="true";
                            } else if ($row->role == "organization") {
                                $_SESSION["id"] = $row->id;
                                $_SESSION["email"] = $row->email;
                                $_SESSION["role"] = $row->role;
                                $error['valid']="true";
                            } else {

                            }
                        }
                         else if($row->status == 0) {
                            $error_invalid = "Sorry you are not Active user";
                            $error["invalid"]=$error_invalid;
                        }
                        else
                        {
                            $error_invalid = "Invalid username or password";
                            $error["invalid_userandpwd"]=$error_invalid;
                        }

                    }

                    if($flag!=1)
                    {
                    $error_invalid = "Invalid username or password";
                    $error["invalid_userandpwd"]=$error_invalid;
                    }
                    else
                    { $error_invalid = "";
                        $error["invalid_userandpwd"]=$error_invalid;

                    }

            }

        }
        $json_format = json_encode($error);
        echo $json_format;

    
    }

}
