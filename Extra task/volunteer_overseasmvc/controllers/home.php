<?php
class Home extends BaseController {

    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     * 	 
     */

    public function index() {       
        $this->load_model('CategoriesModel');
        $this->load_model('HomeModel');
        $this->load_model('ActivitiesModel');       
        $indexPageData = array();        
        $indexPageData['categories'] = $this->categoriesmodel->getallcategories();
        $indexPageData['activities'] = $this->activitiesmodel->getallactivities();
        $indexPageData['trendingprojects'] = $this->homemodel->get_trending_projects(); 
        $indexPageData['featuresdestination'] = $this->homemodel->get_feature_projects();
        $indexPageData['affordable_project'] = $this->homemodel->get_affordable_projects();
        $json_format = json_encode($indexPageData);
        $this->load_view('home',array('indexPageData'=>$json_format));
   
    }
}