$(document).ready(function(){
$(document).on('click', '.page-link', function(){  
    var page = $(this).attr("id");  
   
    sort1(page);  
});

});

function sort1(page)
{
var data1 = 'page='+page; 
// var siteurl='<?php echo $siteurl=SITE_URL; ?>';
var url1= 'ProjectLists/ajaxData';

$.ajax({

url :url1 ,
type : 'POST',  
data : data1,
beforeSend: function() {
    $('#loading').show();
},
success : function(data) {
    $('#loading').hide();
$('#ajax1').html(data);

},

});

}
function deleterecord(id){
    if(confirm("Are you sure you want to delete this Project?")){
        window.location.href = 'ProjectLists/edit/3/'+id;
    }
}