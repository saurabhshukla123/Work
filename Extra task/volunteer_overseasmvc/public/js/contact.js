function validateForm(){

      var name = document.getElementById("name").value;
      var mail = document.getElementById("email").value;
      var message = document.getElementById("message").value;
      var errors = "";
    if (name==null || name=="")   {
        errors  = errors +"Name is Required" +"\n";
         document.getElementById("name-error").innerHTML = "Name is Required";
     }
     else
     {
         document.getElementById("name-error").innerHTML = "";
      
     }
     if (mail==null || mail=="")   {
       
         document.getElementById("email-error").innerHTML = "Email is Required";
        errors="mail is requires";
      }
      else
     {
         document.getElementById("email-error").innerHTML = "";
      
     }
 if(mail!=null || mail!=="")
      {
        validateEmail(mail);
      }

      else
     {
         document.getElementById("email-error").innerHTML = "";
      
     } 
    if (message==null || message=="" ||  message.length>2000)   {
       errors  = errors +"Textarea must be filled out nd minimumu character 2000 aloowed" +"\n";
       document.getElementById("message-error").innerHTML = "Textarea  is required and  minimumum character 2000 aloowed";
    }else
    {
      document.getElementById("message-error").innerHTML = "";
    }
        

         if(errors != ''){
            // alert(errors)
             return false;
         }
         else
         {
         return true;
         }
}


function validateEmail(email){
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var error = '';
    if (reg.test(email) == false) 
    {
      
        document.getElementById("email-error").innerHTML = "Invalid Email Address";
    }

    return error;

}

