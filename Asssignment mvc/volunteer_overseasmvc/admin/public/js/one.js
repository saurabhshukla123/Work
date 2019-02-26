/**
 * Created by PCQ62 on 12/11/2018.
 */

// Start organization alert messages functions
function showOrganizationValidationError(msg) {
    $('.organization_alert').removeClass('alert-success').addClass('alert-danger');
    $('.organization_alert').css('display', 'block');
    $('.organization_msg').text(msg);
    $('#organization_form .form-group').addClass('validation-error');
}

function showOrganizationSuccess(msg) {
    $('.organization_alert').removeClass('alert-danger').addClass('alert-success');
    $('.organization_alert').css('display', 'block');
    $('.organization_msg').text(msg);
    $('#organization_form .form-group').removeClass('validation-error');
}

// End organization alert messages functions

// Start organization form functions

// Add new organization
$("#organization_form").submit(function (e) {

    e.preventDefault();
    var data = new FormData(this);
    $('#organization_button').attr('disabled', 'disabled');
    $.ajax({
        type: 'post',
        url: site_url + 'organization_db.php',
        dataType: 'json', // for sending binary data of image at server side
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {

            console.log("response=", response);
            $('.error').text('');
            $('#organization_button').removeAttr('disabled');
            if (response.status == 0) {

                $.each(response.validationError, function (key, value) {
                    $('#error' + key).text(value);
                });
            } else if (response.status == 1) {
                showOrganizationSuccess(response.msg);
                setTimeout(function () {
                    window.location = "organization_list.php";
                }, 2000);
            } else if (response.status == 2) {
                showOrganizationValidationError(response.msg);
            } else if (response.status == 3) {
                showOrganizationSuccess(response.msg);
            }
        },
        error: function (response) {
            $('#organization_button').removeAttr('disabled');
            console.log('error', response);
            // ajaxError();
        }
    });
});

// Delete an organization
$('.deleteOrganization').on('click', function (e) {
    var organization_id = $(this).data("id");
    $('#delete-organization-button').attr('data-id', organization_id);

});

$('#delete-organization-button').click(function (e) {
    var organization_id = $(this).data("id");
    jQuery.get(
        site_url + 'organization_list.php',
        { deleteid: organization_id },
        '',
        'json').done(function (response) {

        if (response.status == 1) {
            showOrganizationSuccess(response.msg);
            setTimeout(function () {
                window.location = '';
            }, 2000);
        } else {
            showOrganizationValidationError('Unable to delete organization');
        }
    });
});

// Update organization details
$("#update_organization_form").submit(function (e) {

    e.preventDefault();
    var data = new FormData(this);
    console.log(data);
    $('#update_organization_button').attr('disabled', 'disabled');
    $.ajax({
        type: 'POST',
        url: site_url + 'update_organization_db.php',
        dataType: 'json', // for sending binary data of image at server side
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {

            $('.error').text('');
            $('#update_organization_button').removeAttr('disabled');
            if (response.status == 0) {

                $.each(response.validationError, function (key, value) {
                    $('#error' + key).text(value);
                });

            } else if (response.status == 1) {
                showOrganizationSuccess(response.msg);
                setTimeout(function () {
                    window.location = "organization_list.php";
                }, 2000);


            } else if (response.status == 2) {
                showOrganizationValidationError(response.msg);
            }
        },
        error: function () {
            $('#update_organization_button').removeAttr('disabled');
            console.log('error');
            // ajaxError();
        }
    });
});

// End organization form functions


// Start category alert messages functions

function showCategoryValidationError(msg) {
    $('.category_alert').removeClass('alert-success').addClass('alert-danger');
    $('.category_alert').css('display', 'block');
    $('.category_msg').text(msg);
    $('#category_form .form-group').addClass('validation-error');
}

function showCategorySuccess(msg) {
    $('.category_alert').removeClass('alert-danger').addClass('alert-success');
    $('.category_alert').css('display', 'block');
    $('.category_msg').text(msg);
    $('#category_form .form-group').removeClass('validation-error');
}

// End category alert messages functions

// Start category form functions

// Add new category
$("#category_form").submit(function (e) {
    e.preventDefault();
    var data = new FormData(this);

    $('#category_button').attr('disabled', 'disabled');
    $.ajax({
        type: 'post',
        url: site_url + 'category_db.php',
        dataType: 'json',
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {

            console.log("response=", response);
            $('.error').text('');
            $('#category_button').removeAttr('disabled');
            if (response.status == 0) {

                $.each(response.validationError, function (key, value) {
                    $('#error' + key).text(value);
                });
            } else if (response.status == 1) {
                showCategorySuccess(response.msg);
                setTimeout(function () {
                    window.location = "category_list.php";
                }, 2000);
            } else if (response.status == 2) {
                showCategoryValidationError(response.msg);
            }
        },
        error: function (response) {
            $('#category_button').removeAttr('disabled');
            console.log('error', response);
            // ajaxError();
        }
    });
});

// Delete category
$('.deleteCategory').click(function (e) {
    var category_id = $(this).data("id");
    $('#delete-category-button').attr('data-id', category_id);
});

$('#delete-category-button').click(function (e) {
    var category_id = $(this).data("id");
    jQuery.get(
        site_url + 'category_list.php',
        { deleteid: category_id },
        '',
        'json').done(function (response) {

        if (response.status == 1) {
            showCategorySuccess(response.msg);
            setTimeout(function () {
                window.location = '';
            }, 2000);
        } else {
            showCategoryValidationError('Unable to delete category');
        }
    });
});

// Update category details
$("#update_category_form").submit(function (e) {

    e.preventDefault();
    var data = new FormData(this);

    $('#update_category_button').attr('disabled', 'disabled');
    $.ajax({
        type: 'post',
        url: site_url + 'update_category_db.php',
        dataType: 'json',
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {

            $('.error').text('');
            $('#update_category_button').removeAttr('disabled');
            if (response.status == 0) {

                $.each(response.validationError, function (key, value) {
                    $('#error' + key).text(value);
                });

            } else if (response.status == 1) {
                showCategorySuccess(response.msg);
                setTimeout(function () {
                    window.location = "category_list.php";
                }, 2000);


            } else if (response.status == 2) {
                showCategoryValidationError(response.msg);
            }
        },
        error: function () {
            $('#update_category_button').removeAttr('disabled');
            console.log('error');
            // ajaxError();
        }
    });
});

// End category form functions

// Start activity alert messages functions

function showActivityValidationError(msg) {
    $('.activity_alert').removeClass('alert-success').addClass('alert-danger');
    $('.activity_alert').css('display', 'block');
    $('.activity_msg').text(msg);
    $('#activity_form .form-group').addClass('validation-error');
}

function showActivitySuccess(msg) {
    $('.activity_alert').removeClass('alert-danger').addClass('alert-success');
    $('.activity_alert').css('display', 'block');
    $('.activity_msg').text(msg);
    $('#activity_form .form-group').removeClass('validation-error');
}

// End activity alert messages functions


// Start acitivity form functions

// Add new activity
$("#activity_form").submit(function (e) {
    e.preventDefault();
    var data = new FormData(this);

    $('#activity_button').attr('disabled', 'disabled');
    $.ajax({
        type: 'post',
        url: site_url + 'activity_db.php',
        dataType: 'json',
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {

            console.log("response=", response);
            $('.error').text('');
            $('#activity_button').removeAttr('disabled');
            if (response.status == 0) {

                $.each(response.validationError, function (key, value) {
                    $('#error' + key).text(value);
                });
            } else if (response.status == 1) {
                showActivitySuccess(response.msg);
                setTimeout(function () {
                    window.location = "activity_list.php";
                }, 2000);
            } else if (response.status == 2) {
                showActivityValidationError(response.msg);
            }
        },
        error: function (response) {
            $('#activity_button').removeAttr('disabled');
            console.log('error', response);
            // ajaxError();
        }
    });
});

// Delete activity
$('.deleteActivity').click(function (e) {
    var activity_id = $(this).data("id");
    $('#delete-activity-button').attr('data-id', activity_id);
});

$('#delete-activity-button').click(function (e) {
    var activity_id = $(this).data("id");
    jQuery.get(
        site_url + 'activity_list.php',
        { deleteid: activity_id },
        '',
        'json').done(function (response) {

        if (response.status == 1) {
            showActivitySuccess(response.msg);
            setTimeout(function () {
                window.location = '';
            }, 2000);
        } else {
            showActivityValidationError('Unable to delete activity');
        }
    });
});

// Update activity details
$("#update_activity_form").submit(function (e) {

    e.preventDefault();
    var data = new FormData(this);

    $('#update_activity_button').attr('disabled', 'disabled');
    $.ajax({
        type: 'post',
        url: site_url + 'update_activity_db.php',
        dataType: 'json',
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {

            $('.error').text('');
            $('#update_activity_button').removeAttr('disabled');
            if (response.status == 0) {

                $.each(response.validationError, function (key, value) {
                    $('#error' + key).text(value);
                });

            } else if (response.status == 1) {
                showActivitySuccess(response.msg);
                setTimeout(function () {
                    window.location = "activity_list.php";
                }, 2000);


            } else if (response.status == 2) {
                showActivityValidationError(response.msg);
            }
        },
        error: function () {
            $('#update_activity_button').removeAttr('disabled');
            console.log('error');
            // ajaxError();
        }
    });
});
// End activity form functions

// Start FAQ alert messages functions

function showFAQValidationError(msg) {
    $('.faq_alert').removeClass('alert-success').addClass('alert-danger');
    $('.faq_alert').css('display', 'block');
    $('.faq_msg').text(msg);
    $('#faq_form .form-group').addClass('validation-error');
}

function showFAQSuccess(msg) {
    $('.faq_alert').removeClass('alert-danger').addClass('alert-success');
    $('.faq_alert').css('display', 'block');
    $('.faq_msg').text(msg);
    $('#faq_form .form-group').removeClass('validation-error');
}

// End FAQ alert messages functions


// Start faq form functions


// Add new faq
$("#faq_form").submit(function (e) {
    e.preventDefault();
    // var data = new FormData(this);
    var data = {};

    data.faq_question = $('[name="faq_question"]').val();
    data.faq_answer = CKEDITOR.instances.editor1.getData();

    $('#faq_button').attr('disabled', 'disabled');
    $.ajax({
        type: 'post',
        url: site_url + 'faq_db.php',
        dataType: 'json',
        data: data,

        success: function (response) {

            console.log("response=", response);
            $('.error').text('');
            $('#faq_button').removeAttr('disabled');
            if (response.status == 0) {

                $.each(response.validationError, function (key, value) {
                    $('#error' + key).text(value);
                });
            } else if (response.status == 1) {
                showFAQSuccess(response.msg);
                setTimeout(function () {
                    window.location = "faq_list.php";
                }, 2000);
            } else if (response.status == 2) {
                showFAQValidationError(response.msg);
            }
        },
        error: function (response) {
            $('#faq_button').removeAttr('disabled');
            console.log('error', response);
            // ajaxError();
        }
    });
});

// Delete faq
$('.deleteFAQ').click(function (e) {
    var FAQ_id = $(this).data("id");
    $('#delete-faq-button').attr('data-id', FAQ_id);
});

$('#delete-faq-button').click(function (e) {
    var FAQ_id = $(this).data("id");
    jQuery.get(
        site_url + 'faq_list.php',
        { deleteid: FAQ_id },
        '',
        'json').done(function (response) {

        if (response.status == 1) {
            showFAQSuccess(response.msg);
            setTimeout(function () {
                window.location = '';
            }, 2000);
        } else {
            showFAQValidationError('Unable to delete activity');
        }
    });
});

// Update faq details
$("#update_faq_form").submit(function (e) {

    e.preventDefault();
    var data = {};
    data.faq_id = $('[name="faq_id"]').val();
    data.faq_question = $('[name="faq_question"]').val();
    data.faq_answer = CKEDITOR.instances.editor1.getData();


    $('#update_faq_button').attr('disabled', 'disabled');
    $.ajax({
        type: 'post',
        url: site_url + 'update_faq_db.php',
        dataType: 'json',
        data: data,

        success: function (response) {

            $('.error').text('');
            $('#update_faq_button').removeAttr('disabled');
            if (response.status == 0) {

                $.each(response.validationError, function (key, value) {
                    $('#error' + key).text(value);
                });

            } else if (response.status == 1) {
                showFAQSuccess(response.msg);
                setTimeout(function () {
                    window.location = "faq_list.php";
                }, 2000);


            } else if (response.status == 2) {
                showFAQValidationError(response.msg);
            }
        },
        error: function () {
            $('#update_faq_button').removeAttr('disabled');
            console.log('error');
            // ajaxError();
        }
    });
});
// End faq form functions