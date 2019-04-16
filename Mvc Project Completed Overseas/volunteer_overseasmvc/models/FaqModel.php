<?php
// include 'volunteer/dynamicquery.php';
// include($_SERVER['DOCUMENT_ROOT']."/volunteer/dynamicquery.php");

class FaqModel extends BaseModel
{
    function insert($question,$answer,$sequencenumber)
    {
        $table = 'faq';
        $data = array($question,$answer,$sequencenumber);
        $col = array('question','answer','sequence_number');
        $q1=new BaseModel();
        $value=$q1->insert($table,  $data,  $col);
        return $value;
    }

    function allfaqdetails($startfrom=0,$offset=12)
     {  
        $view_data_history = new BaseModel();
        $data = array();
        $data['table'] = "faq";
        $data['columns'] = "id,question,answer,sequence_number";
        $data['ORDER BY'] = "sequence_number";
        if(isset($startfrom) && isset($offset))
        {
            $data['LIMIT']=" $startfrom,$offset ";
        }
        $result = $view_data_history->select($data);
        return $result;  
    }
    function faqdetails($id)
     {  
        $view_data_history = new BaseModel();
        $data = array();
        $data['table'] = "faq";
        $data['WHERE']="id=".$id;
        $data['columns'] = "question,answer,sequence_number";
        $data['ORDER BY'] = "sequence_number";
        $result = $view_data_history->select($data);
        return $result;  
    }
    function delete($id)
    {  
       $view_data_history = new BaseModel();         
       $result = $view_data_history->delete("faq",$id,"id");
       return $result;  
   }

   
 public function updateFaq($que, $ans, $id,$sequencenumber)
 {
     $update= new BaseModel();
     $table="faq";
     $data = array(
         "question" => $que,
         "sequence_number" => $sequencenumber,
         "answer" => $ans
     );
     $where = "id = '$id'";
     $update_faq=$update->updateData($table, $data, $where,$sequencenumber);
     return $update_faq;
 }



 function count_records()
 {
     $view_data_history2 = new BaseModel();
     $fields = "id,question,answer";
     $tablename = "faq";
     $conditions="";
     $activity_result2 = $view_data_history2->count($fields,$tablename,$conditions);
     return $activity_result2;
     
 }
    
}
?>