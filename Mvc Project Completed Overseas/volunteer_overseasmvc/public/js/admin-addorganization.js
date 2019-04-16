function validateForm(){
    
    // document.getElementById("name-error").innerHTML = "";
    // document.getElementById("mail-error").innerHTML = "";
    // document.getElementById("message-error").innerHTML = "";

      var organizationname = document.getElementById("organizationname").value;
      var mail = document.getElementById("organizationemail").value;
      var formurl = document.getElementById("website").value;  
      var contactname = document.getElementById("contactname").value;
    
    var errors = "";
    if (organizationname==null || organizationname=="")   {
        errors  = errors +"Name is Required" +"\n";
         document.getElementById("organization-name-error").innerHTML = "Name is Required";
     }
     else
     {
         document.getElementById("organization-name-error").innerHTML = null;
      
     }

     if (mail==null || mail=="")   {
       
         document.getElementById("organization-email-error").innerHTML = "Email is Required";
        errors="mail is requires";
      }
      else if(mail!=null)
     {
                  var value =validateEmail(mail);
                  if (value!="error") {

                  }
                  else
                  {

                    errors="error";
                  }
                    
     }


                 else
                 {
                   document.getElementById("organization-email-error").innerHTML = null;
                  
                 }

      


      
     //  else
     // {
     //     document.getElementById("organization-email-error").innerHTML = null;
      
     // }
     // errors = errors + validateEmail(email);
       
    if (contactname==null ||contactname=="")   {
       errors  = errors +"Textarea must be filled out nd minimumu character 2000 aloowed" +"\n";
       document.getElementById("contactno-error").innerHTML = "Contact Name is  Required";
    }else
    {
      document.getElementById("contactno-error").innerHTML = "";
    }
    if(formurl)
      { 
        var value =ValidURL(formurl);
        
        if (value!="error") {

        }
        else
        {

          errors="error";
        }

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

      
        document.getElementById("organization-email-error").innerHTML = "Invalid Email Address";
        error="error";
    }

    return error;

}


function ValidURL(str) {
  var regex = /(http|https):\/\/(\w+:{0,1}\w*)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
  var error = '';
  if(!regex .test(str)) {
         document.getElementById("website-error").innerHTML = "Url is not in format eg.https://www.xyz.com";
         error="error";
  } else {
    document.getElementById("website-error").innerHTML = "";
   error="";
  }
  return error;
}



function verifyEmail()
{
    var organizationEmail = $("#organizationemail").val() ;
    var oid = $("#oid").val() ;
    $.ajax({
        url : 'AddOrganization/checkmail',
        type : 'POST',
        data : {
            'email' : organizationEmail
        },
        beforeSend: function() {
            $('#loading').show();
        },
    
        success: function(response){ 
            $('#loading').hide();   
            if(response == 'exists'){            
                $("#organization-email-error").html("Email Already Exists");               
                return false;
            }
            if(response == 'not exists'){
                $("#organization-email-error").html("");               
                return true;
			}
			

        },
        error: function(xhr){
                alert("An error occured: " + xhr.status + " " + xhr.statusText);
                return false;
        }
    });
    return false;
}