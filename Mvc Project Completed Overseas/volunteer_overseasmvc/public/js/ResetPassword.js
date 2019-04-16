function validateFormData(){
    var errors="";
    var password_new = document.getElementById("newpassword").value;
    var repassword_new= document.getElementById("password").value;
    var repassword=password_new.trim(); ;
    var password=password_new.trim(); ;
    if (password==null || password=="")   {
         document.getElementById("newpwd_error").innerHTML = "New Password is Required";
         errors+="err";
     }
     else
     {
         document.getElementById("newpwd_error").innerHTML = "";
      
     }
     if (repassword==null || repassword=="")   {
       
         document.getElementById("pwd_error").innerHTML = "Re-Password is Required";
         errors+="err";
     }
     else
     {
         document.getElementById("pwd_error").innerHTML = "";
     }

     if(repassword!="" && password!="")
     {
            if (password != repassword) {
                errors+="err";
                document.getElementById("invalid_error").innerHTML = "Password dosen't match";
            }
            else{
                document.getElementById("invalid_error").innerHTML = "";
            }
    }
    if(errors == ""){
         return true;
     }
     else
     {
        return false;
     }
}

function checkdata(password,repassword)
{

    if(password!="")
    {
        if (password != repassword) {
            document.getElementById("invalid_error").innerHTML = "Password dosen't match";
            }
        else{
            document.getElementById("invalid_error").innerHTML = "";
            }
    }
    else if(password=="")
    {
        document.getElementById("invalid_error").innerHTML = "New Password is filled out first";
    }    
}

$(document).ready(function() {
 
    $("#password").blur(function() {
        var password=$("#newpassword").val();
        var repassword=$("#password").val();
        checkdata(password,repassword);
    });
    
    $( "#newpassword").blur(function() {
        var password=$("#newpassword").val();
        var repassword=$("#password").val();
        checkdata(password,repassword);
    });
});
