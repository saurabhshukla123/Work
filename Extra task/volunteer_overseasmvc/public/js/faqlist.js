function deleteFaq(id){
    if(confirm("Are you sure you want to delete this faq?")){
        window.location.href = 'FaqListing/edit/3/'+id;
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
var url1= siteurl + 'FaqListing/ajaxData';

$.ajax({

url :url1 ,
type : 'POST',  
data : data1,
beforeSend: function() {
$('#loading').show();
},
success : function(data) {
$('#loading').hide();
$('#ajax_part').html(data);

},

});

}
