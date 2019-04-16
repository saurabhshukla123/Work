function validateFormData(){
    var emailvalue = document.getElementById("email").value;
    var email=emailvalue.trim();  
    
    if (email==null || email=="")   {       
        document.getElementById("email_error").innerHTML = "Email is Required";
        return false;
     }
     else
     {
         document.getElementById("email_error").innerHTML = "";      
     }
  
}