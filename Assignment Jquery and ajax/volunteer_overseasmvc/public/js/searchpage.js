$(document).ready(function () {
    $(".panel1").hide();
    $("#myModal").hide();
    $("#select1").dropkick({
        mobile: true
    });
    $("#select2").dropkick({
        mobile: true
    });
    $("#morefilter").click(function () {
        // $(".panel1").slideToggle();
        $(".panel1").slideToggle('slow', function() 
        { 
            $('.opacity-search').toggleClass('search_opacity', $(this).is(':visible'));
         });

    });
    $("#morefilter1").click(function () {
       
            $(".panel1").slideToggle('slow', function() 
            { 
                $('.opacity-search').toggleClass('search_opacity', $(this).is(':visible'));
             });
            
    });

    $("#closemodel").click(function () {
       
        $(".panel1").slideToggle('slow', function() 
        { 
            $('.opacity-search').toggleClass('search_opacity', $(this).is(':visible'));
         });
        
    });


    $("#searchfilterbutton").click(function () {
       
        $(".panel1").slideToggle('slow', function() 
        { 
            $('.opacity-search').toggleClass('search_opacity', $(this).is(':visible'));
         });
        
    });
    


    $("#morefilter123").click(function () {
        $("#myModal").toggle();
    });
    $("#slider-range").slider({
        range: true,
        min: 1,
        max: 25,
        values: [3, 16],
        slide: function (event, ui) {

            $("#minimumWeeeks").val(ui.values[0]);
            $("#maximumWeeeks").val(ui.values[1]);
         
            $("#amount").val(ui.values[0] + " Week" + " -" + ui.values[1] + " Week");
        }
    });
    $("#amount").val(+ $("#slider-range").slider("values", 0) +
        "  Week" + "-" + $("#slider-range").slider("values", 1) + "Week");

    $("#slider-rangetablet").slider({
        range: true,
        min: 1,
        max: 25,
        values: [3, 16],
        slide: function (event, ui) {
            $("#minimumWeeeks").val(ui.values[0]);
            $("#maximumWeeeks").val(ui.values[1]);
            $("#amounttablet").val(ui.values[0] + " Week" + " -" + ui.values[1] + " Week");
        }
    });
    $("#amounttablet").val(+ $("#slider-rangetablet").slider("values", 0) +
        "  Week" + "-" + $("#slider-rangetablet").slider("values", 1) + "Week");

        $(window).scroll(function () {
            if ($(window).scrollTop() > 0) {
                $("#navigation").addClass('small-header');
            }
            else {
                $("#navigation").removeClass('small-header');
            }
        }); 
});
