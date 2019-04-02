$(document).ready(function(){

$(document).on('click', '.page-link', function(){  
    var page = $(this).attr("id");  
   
    sort1(page);  
});
});


function sort1(page)
{
var data1 = 'page='+page; 
//var siteurl='<?php echo $siteurl=SITE_URL; ?>';
var url1= 'OrganizationLists/ajaxData';

$.ajax({

url :url1 ,
type : 'POST',  
data : data1,
success : function(data) {

$('#ajaxdata').html(data);

},

});

}


function deleterecord(id){
    if(confirm("Are you sure you want to delete this Organization?")){
        window.location.href = 'OrganizationLists/edit/3/'+id;
    }
}