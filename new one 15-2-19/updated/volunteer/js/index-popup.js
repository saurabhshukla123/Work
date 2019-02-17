function validateForm(){
    

    var name=document.getElementById("fname").value
     var datepicker3=document.getElementById("datepicker3").value

     var phonenumber=document.getElementById("phonenumber").value
  
     var mail=document.getElementById("email").value
        var e = document.getElementById("selectduration");
        var Regphone=/^\+[0-9]\d{11}$/;
    // var phonenumber=document.getElementById("phonenumber").value
 
    // var e = document.getElementById("duration");
    var isValid = true;
    
    if(phonenumber==null || phonenumber==""){
        document.getElementById("phonenumber-error").innerHTML ="";
    
    }
    if(phonenumber!=null && phonenumber!=""){
        if ((Regphone.test(phonenumber)) == false)    
        {
           
            document.getElementById("phonenumber-error").innerHTML ="Enter valid phone number with + preceeded eg. +919429266XXX";
            isValid=false;
        }
     else{
          document.getElementById("phonenumber-error").innerHTML ="";
         }

    }








       var optionSelIndex1=e.options[e.selectedIndex].value;
        if(optionSelIndex1==0){
           

            document.getElementById("duration-error").innerHTML = "please select duration";
              isValid=false;

        }
        else{
            document.getElementById("duration-error").innerHTML = "";
        }


    if (datepicker3 == "")   {
      
        document.getElementById("date-error").innerHTML = "Date is Required";
        isValid=false;
    }
    else
    {
       document.getElementById("date-error").innerHTML = "";
       //isValid=true
  
    }






    if (name == "")   {
      
        document.getElementById("fname-error").innerHTML = "Name is Required";
        isValid=false;
    }
    else
    {
       document.getElementById("fname-error").innerHTML = "";
       //isValid=true
  
    }
    if (mail=="")  
                 {
                    
                   document.getElementById("email-error").innerHTML = "Email is Required";
                     isValid=false;
                }
              else
                {
                     document.getElementById("email-error").innerHTML = "";
                             
                     var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                  
                    if (reg.test(mail) == false) 
                    {
                    
                        document.getElementById("email-error").innerHTML = "Invalid Email Address";

                        isValid=false;
                    }



                  }

     





      return isValid;
}





function validateEmail(email){
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var error = '';
    if (reg.test(email) == false) 
    {
    
        document.getElementById("email-error").innerHTML = "Invalid Email Address";

    return false;
    }
   

    return true;

}



function indexform_validate()
{
 var isValid=true;
 

    var e = document.getElementById("normal_select1");

var datepicker = document.getElementById("datepicker").value;

 if(datepicker==null || datepicker==""){
            document.getElementById("date-picker-error").innerHTML ="Select Date";
            isValid=false;
        }
     else{
          document.getElementById("date-picker-error").innerHTML ="";
           }


  var optionSelIndex1=e.options[e.selectedIndex].value;
        if(optionSelIndex1==0){
            document.getElementById("select-error").innerHTML = "please select duration";
              isValid=false;

        }
        else{
            document.getElementById("select-error").innerHTML = "";
        }




var duration = document.getElementById("normal_select1").value;

var selecteddate = document.getElementById("datepicker").value;
document.getElementById("datepicker3").value=selecteddate;
    
 return isValid;







}
    