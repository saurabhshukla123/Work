<?php

class WorkPage extends BaseController {

    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     * 	 
     */
    public function index() {       
        // $this->load_view('header');
                
        // $this->load_model('CategoryModel');
        
        // $indexPageData = array();        
        
        // $json_format = json_encode($indexPageData);

        $this->load_view('workPage');
       
        // $this->load_view('footer');
    }
}