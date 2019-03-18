<?php
class Contact extends BaseController {

    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     * 	 
     */

    public function index() {       
    
        $message = "";
        $email2 = "";
        $sucessfull = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $name = $_POST['name'];
            $message = $_POST['message'];
            $email2 = $_POST['email'];
            $message = wordwrap($message, 70);
            if (mail("saurabh.shukla@internal.mail", $name, $message)) {
            } else {
                $sucessfull = "sorry something going wrong";
            }
            if (mail($email2, "Admin", "Thank you for your feedback")) {
                $sucessfull = "Thank you for your feedback";
            } else {
                $sucessfull = "sorry something going wrong";
            }
        }
        $contactPageData['sucessfull'] = $sucessfull;
        $json_format = json_encode($contactPageData);
       
        $this->load_view('contact',array('contactPageData'=>$json_format));

        // $this->load_view('contact');
              
   
    }
   
    public function send() 
    {
      
    }




}
?>