<?php

class Training extends BaseController {

    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     * 	 
     */
    public function mvc() {       
        $this->load_view('header');
                
        $this->load_model('CategoryModel');
        
        $indexPageData = array();        
        
        $json_format = json_encode($indexPageData);

        $this->load_view('training/training',array('indexPageData'=>$json_format));
       
        $this->load_view('footer');
    }
}