$(document).on('keypress',function(e) {
    if(e.which == 13) {
        event.preventDefault();
        document.getElementById("submitButton").click();
    }
});


function Login()
{

username=$("#username").val();
password=$("#password").val();
$("#username_error").html("");
$("#pwd-error").html("");
$("#invalid_error").html("");
// token=$("#token").val();

var data1 = {
username: username,
password: password
};

alert("hello");
$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
$.ajax({

url : 'Login/loginverify',
type : 'POST',
data : data1,
beforeSend: function() {
        $('#loading').show();
    },

success : function(data) {	 
$('#loading').hide();
var result = JSON.parse(data);
if(result.invalid_userandpwd){
$("#invalid_error").html(result.invalid_userandpwd);		
}
if(result.invalid){
$("#invalid_error").html(result.invalid);		
}
if(result.password){
$("#pwd-error").html(result.password);			
}
if(result.username){
$("#username_error").html(result.username);				
}
if(result.valid){
    if(result.valid=="true")
    {
        window.location.href="OrganizationLists";
    }
}
},
});


}