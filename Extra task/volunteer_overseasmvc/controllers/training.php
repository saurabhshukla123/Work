<?php

class Training extends BaseController
{

    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     *
     */
    public function index()
    {
        // $this->load_view('header');

        // $this->load_model('CategoryModel');

        // $indexPageData = array();

        // $json_format = json_encode($indexPageData);

        // $this->load_view('training/training',array('indexPageData'=>$json_format));

        // $this->load_view('footer');
        date_default_timezone_set('Asia/Kolkata');
        $datetime1 = new DateTime();
        $datetime2 = new DateTime('2019-04-04 16:14:42');
        $interval = $datetime1->diff($datetime2);
        $year = $interval->format('%y years');
        $month = $interval->format('%m months ');
        $days = $interval->format('%a days ');
        $hours = $interval->format('%h hours');
        $minute = $interval->format('%i minutes');
        $second = $interval->format('%s seconds');
        echo $year;
        echo $month;
        echo $days;
        echo $hours;
        echo $minute;
        echo $second;
        $date = new DateTime();
        echo "Date formatr";
       $dateformat=date_format($date, 'Y-m-d H:i:s');
       echo $dateformat;
       echo "ends"; 
       if($year==0 && $month==0 && $days==0 && $hours==0 && isset($minute) && isset($second))
        {
            echo "in time";
        }
        else
        {
            echo " Not in time";
            
        }

        // echo $year;

        die();

    }
}
