<?php class Pagination
{
    
    var $pn;
   var  $start_from;
   var $limit;
  var  $total_records;
    public function setdata($limit,$pn)
    {
        $this->limit=$limit;
        $this->pn=$pn;
        
        $this->pn = ($this->pn == 0 ? 1 : $this->pn);
      //  $this->pn = ($this->pn < 0 ? 1 : $this->pn);
        
       

        $this->start_from = ($this->pn - 1) * $this->limit;
        return $this->start_from;


    }
    public function setpagination($total_records)
    {
       
        $this->total_records=$total_records;
				$this->total_pages = ceil($this->total_records/ $this->limit);
               

                
            if($this->limit<$this->total_records)//if record greater than limit then show pagination
            {
            if($this->pn==1)
            {
            $pagLink .= "<li class='page-item active  disabled'> <a class='page-link' href=\"?page=1\" title=\"Page 0\">First</a></li> ";
            }
            else
            {
                $pagLink .= "<li class='page-item  '> <a class='page-link' href=\"?page=1\" title=\"Page 0\">First</a></li> ";
            
            }
            if ($this->pn > 1) {

            $page =$this->pn - 1;
            $pagLink .= "<li class='page-item  '> <a class='page-link' href=\"?page=$page\" title=\"Page $page\">Prev</a></li> ";
            } else {

            $pagLink .= " <li class='page-item '> <a class='page-link'>Prev</a></li>";
            }
            for ($i = 1; $i <= $this->total_pages; $i++) {
            if ($i == $this->pn) {
                    $pagLink .= "<li class='page-item active '><a class='page-link' href='?page="
                    . $i . "'>" . $i . "</a></li>";
            }
            
            }
            
        

            if ($this->pn < $this->total_pages && $this->pn != $this->total_pages) {

            $page = $this->pn + 1;
            $pagLink .= " <li class='page-item  '> <a class='page-link' href=\"?page=$page\" title=\"Page $page\">$page</a> </li>";
            if ($this->pn != $this->total_pages - 1) {
                    $pagLink .= " <li class='page-item disabled '> <a class='page-link' href=\"?page=$page\" title=\"Page $page\">...</a> </li>";
                    $pagLink .= " <li class='page-item  '> <a class='page-link' href=\"?page=$this->total_pages\" title=\"Page $this->total_pages\">$this->total_pages</a> </li>";
            }
            $pagLink .= " <li class='page-item  '> <a class='page-link' href=\"?page=$page\" title=\"Page $page\">Next</a> </li>";

            } else {

            $pagLink .= "  <li class='page-item '> <a class='page-link'>Next</a></li>";
            }
            if($this->pn==$this->total_pages)
            {
            $pagLink .= "<li class='page-item active  disabled'> <a class='page-link' href=\"?page=1\" title=\"Page 0\">Last</a></li> ";
            }
            else
            {
                $pagLink .= "<li class='page-item  '> <a class='page-link' href=\"?page=$this->total_pages\" title=\"Page 0\">Last</a></li> ";
            
            }
            //echo $pagLink;
         return   $pagLink;
        }


    }

}
?>