// Project Module Start -->

$(document).ready(function () {     //Multistep form
    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-fill');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find('input,textarea'),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');

    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});

//  Main Project table data insert -->

$('#project_form').submit(function(e){
    e.preventDefault();
    var data = new FormData(this);
    
    console.log(data);
    $.ajax({
        type: 'POST',
        url: site_url+'project_db.php',
        dataType: 'json',
        data: data,
        processData: false,
        contentType: false,

        success: function(response){
            console.log(response);
            if(response.status == 0){
                addErrorMessage(response);
            }
            if(response.status == 1){
                addSuccessMessage(response);
                $("#addGallery").css({ display: "block" });
                $('#last_project_id').val(response.lastId);
                addGalleryOption(response.DropId,response.DropName);

            }
            removeAlert();

        }
    })
})

function addGalleryOption(DropId,DropName){
    $("#addProjectCost").css({ display: "block" });
    $('#project_gallery_id')
        .append($("<option></option>")
            .attr("value",DropId)
            .text(DropName))
        .attr("name",'project[project_gallery_id]')
    $('#project_gallery_id option[value='+DropId+']').attr("selected",true);

    $('#project_cost_id')
        .append($("<option></option>")
            .attr("value",DropId)
            .text(DropName))
        .attr("name",'project[project_id]')
       
    $('#project_cost_id option[value='+DropId+']').attr("selected",true);

    $('#project_include_id')
        .append($("<option></option>")
            .attr("value",DropId)
            .text(DropName))
        .attr("name",'project[project_id]')
        
    $('#project_include_id option[value='+DropId+']').attr("selected",true);

    $('#project_date_id')
        .append($("<option></option>")
            .attr("value",DropId)
            .text(DropName))
        .attr("name",'project[project_id]');
}
// Project gallery data insert  -->

$('#project_gallery').submit(function(e){
    e.preventDefault();
    var data = new FormData(this);
    console.log(data);
    $.ajax({
        type: 'post',
        url: site_url+'project_db.php',
        dataType: 'json',
        data: data,
        processData: false,
        contentType: false,
        success: function(response){
            console.log(response);

            if(response.status == 1){
                $('input[type=file]').val('');
                addSuccessMessage(response);
                var directory = '../public/images/projects_gallery/';

                $.each(response.imgArray , function(index, value) {
                    var image = directory+value;
                    $('#dynamicProjectImg').append( ' <div class="col-sm-2 img-wrap "><div  class="galleryImg-box" id=' +index+ '  style="background-image: url('+image+'); display:block ;"><span class="close delete_projectgalleryimg" title="Delete" data-toggle="modal"  data-target="#deleteProjectModal"  data-id= '+index+' id='+index+' >&times;</span></div> </div>')
                })
                $("#addProjectCost").css({ display: "block" });
                $('#last_project_gallery_id').val(response.DropId);
            }
            removeAlert();
        }
    })
})

// <-- End


// Project cost data insert  -->
$('#project_cost').submit(function(e){
    e.preventDefault();
    var data = new FormData(this);
    console.log(data);
    $.ajax({
        type: 'post',
        url: site_url+'project_db.php',
        dataType: 'json',
        data: data,
        processData: false,
        contentType: false,
        success: function(response){
            console.log(response);
            if(response.status == 0){
                addErrorMessage(response);
            }
            if(response.status == 1){
                addSuccessMessage(response);
                $("#addProjectInclude").css({ display: "block" });
                $('#last_project_cost_id').val(response.DropId);
            }
            removeAlert();
        }
    })
})


// Project Include Checks data insert  -->

$('#project_include_checks').submit(function(e){
    e.preventDefault();
    var data = new FormData(this);
    console.log(data);
    $.ajax({
        type: 'post',
        url: site_url+'project_db.php',
        dataType: 'json',
        data: data,
        processData: false,
        contentType: false,
        success: function(response){
            console.log(response);
            if(response.status == 0){
                addErrorMessage(response);
            }
            if(response.status == 1){
                addSuccessMessage(response);
                $("#finish_btn").css({ display: "block" });
                $('#last_project_include_id').val(response.DropId);
            }
            removeAlert();
        }
    })
})

// Project start date data insert  -->

$('#project_start_date').submit(function(e){
    e.preventDefault();
    var data = new FormData(this);
    console.log(data);
    $.ajax({
        type: 'post',
        url: site_url+'project_db.php',
        dataType: 'json',
        data: data,
        processData: false,
        contentType: false,
        success: function(response){
            console.log(response);
            if(response.status == 0){
                addErrorMessage(response);
            }
            if(response.status == 1){
                addSuccessMessage(response);
                $('#last_project_start_id').val(response.DropId);

                setTimeout(function(){
                    window.location.href = 'project_list.php';
                },2000);
            }
            removeAlert();
        },
    })
})
//   <--- End

// Project Listing Page

$('.delete_project').on('click' ,function(){
    var id = $(this).data('id');
    $('#delete_Listmodal').attr('data-id', id);
    console.log(id);
})
$(document).on('click','#delete_Listmodal',function(){
    var project_id = $(this).data("id");
    console.log(project_id);
    jQuery.get(
        site_url + 'project_list_db.php',
        { deleteid: project_id },
        '',
        'json').done(function (response) {

        if (response.status == 1) {

            showProjectSuccess(response.msg);
            setTimeout(function () {
                window.location.href = 'project_list.php';
            }, 2000);
        } else {
            showProjectError('Oops try again');
        }
    });
});

//   * Dynamic add row for Project Cost Form Start*


var counter = 1;

$("#addrow").on("click", function () {
    var newRow = $("<tr>");
    var cols = "";


    cols += '<td><input type="text" class="form-control " name="project[project_week][]"  pattern="[0-9]+" required></td>';
    cols += '<td><input type="text" class="form-control " name="project[project_cost][]"  pattern="[0-9]+" required></td>';

    cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
    newRow.append(cols);
    $("table.order-list").append(newRow);
    counter++;
});



$("table.order-list").on("click", ".ibtnDel", function (event) {
    $(this).closest("tr").remove();
    counter -= 1
});

//   <-- End

//   * Dynamic add row for Project Include Checks Form Start*


var counterinc = $('#update_ProjectId').val();
if(counterinc){
    counterinc++;
}
else{
    counterinc = 1;
}

$("#addincluderow").on("click", function () {


    var newRow = $("<tr>");
    var cols = "";


    cols += '<td><input type="text" class="form-control " name="project[project_text][]"   required></td>';
    cols += '<td><ul class="radio-listing clearfix" name="project[include]"><li><input type="radio" id="include' + counterinc + '"  value="1" name="include[project_include'+counterinc+'][]" checked><label for="include' + counterinc + '">Included</label></li><li><input type="radio"  id="notinclude'+ counterinc +'" value="0" name="include[project_include'+counterinc+'][]"><label for="notinclude' + counterinc + '">Not Included</label></li></ul>  </td>';



    cols += '<td><input type="button" class="includebtnDel btn btn-md btn-danger "  value="Delete"></td>';
    newRow.append(cols);
    $("table.include-list").append(newRow);
    counterinc++;
});


$("table.include-list").on("click", ".includebtnDel", function (event) {
    $(this).closest("tr").remove();
    counterinc -= 1
});

//   <-- End

//   * Dynamic add row for Project Start Date Form Start*


var counter = 1;

$("#addstartdaterow").on("click", function () {
    var newRow = $("<tr>");
    var cols = "";


    cols += '<td><div class="form-group hidden-xs icon-control"><input type="text" class="form-control datepicker enterd-date approx-date-datepicker"  name="project[project_start_date][]" placeholder="yyyy/mm/dd"  required> <img class="ui-datepicker-trigger" src="public/images/orange-calander-icon.png" alt="..." title="..."></div> </td>';

    cols += '<td><input type="button" class="datebtnDel btn btn-md btn-danger"  value="Delete"></td>';
    newRow.append(cols);
    $("table.date-list").append(newRow);
    $(".datepicker").datepicker({
        dateFormat: "yy-mm-dd",
    });
    counter++;
});



$("table.date-list").on("click", ".datebtnDel", function (event) {
    $(this).closest("tr").remove();
    counter -= 1
});

//   <-- End

//  Main Project table data Update -->

$('#project_form_update').submit(function(e){
    e.preventDefault();
    var data = new FormData(this);
    console.log(data);
    $.ajax({
        type: 'post',
        url: site_url+'project_update_db.php',
        dataType: 'json',
        data: data,
        processData: false,
        contentType: false,

        success: function(response){
            console.log(response);
            if(response.status == 0){
                addErrorMessage(response);
            }
            if(response.status == 1){
                addSuccessMessage(response);

            }
            removeAlert();

        }
    })
})


// Project gallery data Update  -->

$('#project_gallery_update').submit(function(e){
    e.preventDefault();
    var data = new FormData(this);
    console.log(data);
    $.ajax({
        type: 'post',
        url: site_url+'project_update_db.php',
        dataType: 'json',
        data: data,
        processData: false,
        contentType: false,
        success: function(response){
            console.log(response);

            if(response.status == 1){
                var directory = '../public/images/projects_gallery/';
                $.each(response.imgArray , function(index, value) {
                    var image = directory+value;
                    $('#dynamicImg').append( ' <div class="col-sm-2 img-wrap "><div  class="galleryImg-box" id=' +index+ '  style="background-image: url('+image+'); display:block ;"><span class="close delete_galleryimg" title="Delete" data-toggle="modal"  data-target="#deleteUpdateModal"  data-id= '+index+' id='+index+' >&times;</span></div> </div>')

                })
                addSuccessMessage(response);
            }
            removeAlert();
        }
    })
})

// <-- End

// Project cost data Update  -->
$('#project_cost_update').submit(function(e){
    e.preventDefault();
    var data = new FormData(this);
    console.log(data);
    $.ajax({
        type: 'post',
        url: site_url+'project_update_db.php',
        dataType: 'json',
        data: data,
        processData: false,
        contentType: false,
        success: function(response){
            console.log(response);
            if(response.status == 0){
                addErrorMessage(response);
            }
            if(response.status == 1){
                addSuccessMessage(response);
            }
            removeAlert();
        }
    })
})

// Project Include Checks data Update  -->

$('#project_include_checks_update').submit(function(e){
    e.preventDefault();
    var data = new FormData(this);
    console.log(data);
    $.ajax({
        type: 'post',
        url: site_url+'project_update_db.php',
        dataType: 'json',
        data: data,
        processData: false,
        contentType: false,
        success: function(response){
            console.log(response);
            if(response.status == 0){
                addErrorMessage(response);
            }
            if(response.status == 1){
                addSuccessMessage(response);

            }
            removeAlert();
        }
    })
})

// Project start date data Update  -->

$('#project_start_date_update').submit(function(e){
    e.preventDefault();
    var data = new FormData(this);
    console.log(data);
    $.ajax({
        type: 'post',
        url: site_url+'project_update_db.php',
        dataType: 'json',
        data: data,
        processData: false,
        contentType: false,
        success: function(response){
            console.log(response);
            if(response.status == 0){
                addErrorMessage(response);
            }
            if(response.status == 1){
                addSuccessMessage(response);

                setTimeout(function(){
                    window.location.href = 'project_list.php';
                },2500);

            }
            removeAlert();
        },
        
    })
     
});
// Delete of inserted Image In Project Insert Form Start-->
$(document).on('click','.delete_projectgalleryimg' ,function(){
    var id = $(this).attr('id');
    $('#delete_projectImgmodal').val(id);
    console.log(id);
});

function deleteProjectImg(){
    var imgId = $('#delete_projectImgmodal').val();
    console.log(imgId);
    $.ajax({
        type: 'POST',
        url: site_url+'project_db.php',
        dataType: 'json',
        data: {imgId : imgId },
        success: function(response){
            console.log(response);
            if(response.status == 0){
                addErrorMessage(response);
            }
            if(response.status == 1){
                $('input[type=file]').val('');
                setTimeout(function(){
                    $('#'+response.imageId).remove();
                },400);

            }
            removeAlert();
        }
    })

};
//  <--End
//
// Delete of image in project Update Form Start-->

$(document).on('click','.delete_galleryimg' ,function(){
    var id = $(this).attr('id');
    $('#delete_Imagemodal').val(id);
    console.log(id);
})

function deleteGalleryImg(){
    var imgId = $('#delete_Imagemodal').val();
    console.log(imgId);
    $.ajax({
        type: 'POST',
        url: site_url+'project_update_db.php',
        dataType: 'json',
        data: {imgId : imgId },
        success: function(response){
            console.log(response);
            if(response.status == 0){
                addErrorMessage(response);
            }
            if(response.status == 1){
                console.log(response);
                setTimeout(function(){
                    $('#'+response.imageId).remove();
                },400);

            }
            removeAlert();
        }
    })
};
// <--End



function deleteCostRow(projectcostId){
    var projectId = $('#delete_'+projectcostId).data('count');
    $.ajax({
        type: 'POST',
        url: site_url+'project_update_db.php',
        dataType: 'json',
        data: {projectcostId : projectcostId ,projectId :projectId},
        success: function(response){
            console.log(response);
            if(response.status == 0){
                addErrorMessage(response);
            }
            if(response.status == 1){
                setTimeout(function(){
                    $('#costRow_'+response.projectcostId).remove();
                    if(response.count == 1){
                        $(".costRowbtnDel").hide();
                    }
                    
                },400);
            }
            removeAlert();
        }
    })
}

function deleteIncludeRow(projectIncludeId){
    $.ajax({
        type: 'POST',
        url: site_url+'project_update_db.php',
        dataType: 'json',
        data: {projectIncludeId : projectIncludeId },
        success: function(response){
            console.log(response);
            if(response.status == 0){
                addErrorMessage(response);
            }
            if(response.status == 1){
                setTimeout(function(){
                    $('#includeRow_'+response.projectIncludeId).remove();
                },400);

            }
            removeAlert();
        }
    })
}

function deleteDateRow(projectDateId){
    var projectId = $('#dateDel_'+projectDateId).data('date');
    $.ajax({
        type: 'POST',
        url: site_url+'project_update_db.php',
        dataType: 'json',
        data: {projectDateId : projectDateId ,projectId :projectId},
        success: function(response){
            console.log(response);
            if(response.status == 0){
                addErrorMessage(response);
            }
            if(response.status == 1){
               
                setTimeout(function(){
                    $('#dateRow_'+response.projectDateId).remove();
                    if(response.count == 1){
                        $(".dateRowbtnDel").hide();
                    }
                },400);

            }
            removeAlert();
        }
    })
}
function addSuccessMessage(response){
    $('#project_alert').removeClass('alert-danger');
    $('#project_alert').addClass('alert-success');
    $('#project_alert').css({display:'block'});
    $('#project_msg').text(response.msg);

}
function addErrorMessage(response){
    $('#project_alert').removeClass('alert-success');
    $('#project_alert').addClass('alert-danger');
    $('#project_alert').css('display','block');
    $('#project_msg').text(response.msg);
}
function dateErrorMessage(msg){
    $('#project_alert').removeClass('alert-success');
    $('#project_alert').addClass('alert-danger');
    $('#project_alert').css('display','block');
    $('#project_msg').text(msg);
}
function removeAlert(){
    setTimeout(function(){
        $('#project_alert').css({display:'none'});
    },2000);

}
function showProjectSuccess(msg) {
    $('#projectList_alert').css('display','block');
    $('#projectList_alert').removeClass('alert-danger');
    $('#projectList_alert').addClass('alert-success');
    $('#projectList_msg').text(msg);

}
function showProjectError(msg){
    $('#projectList_alert').removeClass('alert-success');
    $('#projectList_alert').addClass('alert-danger');
    $('#projectList_alert').css('display','block');
    $('#projectList_msg').text(msg);
}