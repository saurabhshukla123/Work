function validateForm(){
    
    // document.getElementById("name-error").innerHTML = "";
    // document.getElementById("mail-error").innerHTML = "";
    // document.getElementById("message-error").innerHTML = "";

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
         document.getElementById("name-error").innerHTML = null;
      
     }

     if (mail==null || mail=="")   {
       
         document.getElementById("email-error").innerHTML = "Email is Required";
        errors="mail is requires";
      }
      else
     {
         document.getElementById("email-error").innerHTML = null;
      
     }

      


      if(mail!=null || mail!=="")
      {
        validateEmail(mail);
      }

      else
     {
         document.getElementById("email-error").innerHTML = null;
      
     }
     // errors = errors + validateEmail(email);
       
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

// function validateForm() {
//   var name = document.getElementById("name").value;

//   var mail = document.getElementById("email").value;

//   var message = document.getElementById("message").value;

//   if (name == "") {
//     document.getElementById("name-error").innerHTML = "error";
//     // alert("Name must be filled out");
//   }
//    ValidateEmail(mail);

//   if (mail == "") {
//     alert("email must be filled");
//   }
       
//   if (message == "") {
//     alert("message must be filled");
//   }
//   var msglength=message.length;
//   if (msglength>2000) 
//   {
//   	alert("message length exceeded");

//   }
// } 




// function ValidateEmail(mail) 
// {
//  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
//   {
//     return (true)
//   }
//     alert("You have entered an invalid email address!")
//     return (false)
// }