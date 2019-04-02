<?php
class Faq extends BaseController {

    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     * 	 
     */

    public function index() {       
        $this->load_model('FaqModel');
        $data=$this->faqmodel->allfaqdetails();
        $indexPageData = array();        
        $indexPageData['faqdetails'] = $data;
        $json_format = json_encode($indexPageData);
        $this->load_view('faq',array('indexPageData'=>$json_format));
   
    }
}
?>