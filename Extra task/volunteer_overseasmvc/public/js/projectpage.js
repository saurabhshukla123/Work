function validateForm(){


      var  minagestr= document.getElementById("min-age").value.trim();
      var maxagestr = document.getElementById("max-age").value.trim();
      var minage =parseInt(minagestr);
      var maxage =parseInt(maxagestr);

      var e = document.getElementById("activity");
       var e1 = document.getElementById("category");
      var e3 = document.getElementById("organization"); 
       var title = document.getElementById("title").value;

      var city = document.getElementById("city"); 
    
      var country = document.getElementById("country"); 

      var regnum = new RegExp('^[0-9]+$'); 
 

    

    var errors = "";

      var optionSelIndex1=e.options[e.selectedIndex].value;
        if(optionSelIndex1==0){
            errors=errors+"1";

            document.getElementById("activity-error").innerHTML = "Please select activity";

        }else{
            document.getElementById("activity-error").innerHTML = "";
        }


  var optionSelIndex2=e1.options[e1.selectedIndex].value;
        if(optionSelIndex2==0){
            errors=errors+"1";

            document.getElementById("category-error").innerHTML = "Please select category";

        }else{
            document.getElementById("category-error").innerHTML = "";
        }

 var optionSelIndex3=e3.options[e3.selectedIndex].value;
        if(optionSelIndex3==0){
            errors=errors+"1";

            document.getElementById("organization-error").innerHTML = "Please select category";

        }else{
            document.getElementById("organization-error").innerHTML = "";
        }

    var city=city.options[city.selectedIndex].value;
        if(city==0){
            errors=errors+"1";

            document.getElementById("city-error").innerHTML = "City is Required";

        }else{
            document.getElementById("city-error").innerHTML = "";
        }

    var country=country.options[country.selectedIndex].value;
        if(country==0){
            errors=errors+"1";

            document.getElementById("country-error").innerHTML = "Country is Required";

        }else{
            document.getElementById("country-error").innerHTML = "";
        }





    if (title==null || title=="")   {
        errors  = errors +"minage is Required" +"\n";
         document.getElementById("title-error").innerHTML = "Title is Required";
     }
     else
     {
         document.getElementById("title-error").innerHTML = null;
      
     }
       
  
    // if (minage==null || minage=="")   {
    //     errors  = errors +"minage is Required" +"\n";
    //      document.getElementById("min-age-error").innerHTML = "Minimum age is Required";
    //  }
     
  
    if (minagestr == null || minagestr =="" )   {
        errors  = errors +"minage is Required" +"\n";
         document.getElementById("min-age-error").innerHTML = "Minimum age is Required";
     }
     else
     {
         document.getElementById("min-age-error").innerHTML = null;
          if(regnum.test(minage)==false){
                    errors = errors + "1";
                    document.getElementById("min-age-error").innerHTML = "Min age shoud be in digits"
                }
      
     }

    if (maxagestr==null || maxagestr=="")   {
        errors  = errors +"maxage is Required" +"\n";
         document.getElementById("max-age-error").innerHTML = "Maximum age is Required";
     }
     else
     {
         document.getElementById("max-age-error").innerHTML = null;
         if(regnum.test(maxage)==false){
                    errors = errors + "1";
                    document.getElementById("max-age-error").innerHTML = "Max age shoud be in digits"
                }
      
     }


 

      if(minage > maxage)
      {
        errors="error";
        
         document.getElementById("min-max-error").innerHTML = "Minimum age should not be greater than max age";
        //alert("");
       //  document.getElementById("min-age-error").innerHTML = "minimum age is Required";
     }
     else
     {
          document.getElementById("min-max-error").innerHTML = "";
       
        // document.getElementById("max-age-error").innerHTML = null;
      
     }
    //   if(maxage < minage)
    //   {
    //     errors="error";
    //      // document.getElementById("min-max-error").innerHTML = "maximum age should not be greater than min age";
       
    //     //alert("maximum age should not be greater than min age");
    //    //  document.getElementById("min-age-error").innerHTML = "minimum age is Required";
    //  }
    //  else
    //  {

    //      document.getElementById("min-max-error").innerHTML = "";
      
    //  }




         if(errors != ''){
            //alert(errors)
             return false;
         }
         else
         {
          // alert("no error");
         return true;
         }
}



function showCity(adminproject_country)
{
    $('#city').empty();
    $.ajax({

    url : 'AddProjects/getCity',
    type : 'POST',
    dataType:'json',
 
    data : {
        'country_id' : adminproject_country
    },
    beforeSend: function() {
        $('#loading').show();
    },
    success : function(data) {
        $('#loading').hide();
        $('#city').append(data );
    },
    });
}
$(document).ready(function(){
	$('#city').empty();
    var adminproject_country = $("#country").val() ;
    $.ajax({

    url : 'AddProjects/getCity',
    type : 'POST',
    dataType:'json',
    data : {
        'country_id' : adminproject_country
    },
    success : function(data) {
        $('#city').append(data);
    },
    });



    $('#startdates').datepicker({
          multidate: true,
          dateFormat: 'yy/mm/dd'    
      });

      $('.date').datepicker({
        multidate: true
    });
    
    $('.date').datepicker('setDates', [new Date(2014, 2, 5), new Date(2014, 3, 5)])
      
});
