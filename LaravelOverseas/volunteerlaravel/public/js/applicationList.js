$(document).on('click', '.page-link', function(){  
    var page = $(this).attr("id");  
   
    sort1(page);  
});

function sort1(page)
{
	var data1 = 'page='+page; 
    var siteurl=ASSETS_URL;
  var url1= siteurl + 'ApplicationLists/ajaxData';
 
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
