        
function deleteActivity(id){
    if(confirm("Are you sure you want to delete this Activity?")){
        window.location.href = 'ActivityLists/edit/3/'+id;
    }
}
$(document).on('click', '.page-link', function(){  
var page = $(this).attr("id");  

sort1(page);  
});


function sort1(page)
{
var data1 = 'page='+page; 
var siteurl=ASSETS_URL;
var url1= siteurl + 'ActivityLists/ajaxData';
$.ajax({

url :url1 ,
type : 'POST',  
data : data1,
beforeSend: function() {
$('#loading').show();
},
success : function(data) {
$('#loading').hide();
$('#ajax').html(data);

},

});

}
