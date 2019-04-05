function alertBox(message)
{

$ .alert("Auto Close After: ", {withTime: true,type: 'success',title:message ,icon:'glyphicon glyphicon-heart',minTop: 300});
}

$( document ).ready(function() {
    $('.update_success').fadeOut(3000);
});