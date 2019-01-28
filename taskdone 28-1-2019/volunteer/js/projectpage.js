function validateForm(){


      var  minage= document.getElementById("min-age").value;
      var maxage = document.getElementById("max-age").value;
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

            document.getElementById("activity-error").innerHTML = "please select activity";

        }else{
            document.getElementById("activity-error").innerHTML = "";
        }


  var optionSelIndex2=e1.options[e1.selectedIndex].value;
        if(optionSelIndex2==0){
            errors=errors+"1";

            document.getElementById("category-error").innerHTML = "please select category";

        }else{
            document.getElementById("category-error").innerHTML = "";
        }

 var optionSelIndex3=e3.options[e3.selectedIndex].value;
        if(optionSelIndex3==0){
            errors=errors+"1";

            document.getElementById("organization-error").innerHTML = "please select category";

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
       
  
    if (minage==null || minage=="")   {
        errors  = errors +"minage is Required" +"\n";
         document.getElementById("min-age-error").innerHTML = "minimum age is Required";
     }
     else
     {
         document.getElementById("min-age-error").innerHTML = null;
          if(regnum.test(minage)==false){
                    errors = errors + "1";
                    document.getElementById("min-age-error").innerHTML = "Min age shoud be in digits"
                }
      
     }

    if (maxage==null || maxage=="")   {
        errors  = errors +"maxage is Required" +"\n";
         document.getElementById("max-age-error").innerHTML = "maximum age is Required";
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
        alert("minimum age should not be greater than max age");
       //  document.getElementById("min-age-error").innerHTML = "minimum age is Required";
     }
     else
     {
        // document.getElementById("max-age-error").innerHTML = null;
      
     }
      if(maxage < minage)
      {
        errors="error";
        alert("maximum age should not be greater than min age");
       //  document.getElementById("min-age-error").innerHTML = "minimum age is Required";
     }
     else
     {
        // document.getElementById("max-age-error").innerHTML = null;
      
     }




         if(errors != ''){
            //alert(errors)
             return false;
         }
         else
         {
           alert("no error");
         return true;
         }
}
