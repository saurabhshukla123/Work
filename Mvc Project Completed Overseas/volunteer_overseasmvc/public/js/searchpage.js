$(document).ready(function () {
    $(".panel1").hide();
    $("#panel2").hide();
    $("#myModal").hide();
    $("#select1").dropkick({
        mobile: true
    });
    $("#select2").dropkick({
        mobile: true
	});
	$("#activities").dropkick({
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
    
    $("#tabletmorefilter").click(function () {
       
        $(".panel1").slideToggle('fast', function() 
        { 
            $('.opacity-search').toggleClass('search_opacity', $(this).is(':visible'));
         });
        
        //  $(".panel2").hide();
        
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

//code for sorting
function sort()
{
	var counter=0;
	checkbox1="";
	checkbox2="";
	checkbox3="";
	checkbox1=($('#1').is(':checked'))?'1':'';
    checkbox2=($('#2').is(':checked'))?'2':'';
	checkbox3=($('#3').is(':checked'))?'3':'';
	select1=$("#select1").val();
	activities=$("#activities").val();
	country=$("#country").val();
	minimumage=$("#minimumage").val();
	weeksminimum=$("#minimumWeeeks").val();
	weeksmaximum=$("#maximumWeeeks").val();
	startdate=$("#startyear").val()+"-"+$("#startmonth").val()+"-"+$("#startdate").val();
	enddate=$("#endyear").val()+"-"+$("#endmonth").val()+"-"+$("#enddate").val();

	if(minimumage!="")
	{
     counter=counter+1;
	}
	if(weeksminimum!="" && weeksmaximum!="")
	{
		counter=counter+1;
	}
	if(startdate!="--" && enddate!="--")
	{
	counter=counter+1;
	}


	if(counter==0)
	{
		$("#filterresult").text("");
	}
	else
	{
	$("#filterresult").text(counter);
	}
	if(counter==0)
	{
		$("#filterresulttablet").text("");
	}
	else
	{
	$("#filterresulttablet").text(counter);
	}
	if(counter==0)
	{
		$("#filterresulttabletmobile").text("");
	}
	else
	{
	$("#filterresulttabletmobile").text(counter);
	}
	var data1 = 'checkbox1='+ checkbox1 + '&checkbox2='+ checkbox2 + '&checkbox3='+ checkbox3+'&select1='+select1+'&activities='+activities+'&country='+country+'&minimumage='+ minimumage+'&weeksminimum='+weeksminimum+'&weeksmaximum='+weeksmaximum+'&startdate='+startdate+'&enddate='+enddate; 
  
	$.ajax({
    url : 'search/ajax',
    type : 'POST', 
	data : data1,
	
    beforeSend: function() {
        $('#loading').show();
    },
    success : function(response) {
		$('#loading').hide();
    var result1 = JSON.parse(response);
		if(result1.checkedresult){
			$("#resultchecked").html(result1.checkedresult);		

			}
			if(result1.searchdata){
				 $("#searchdata").append(result1.searchdata);
	
			}
			if(result1.showmore){
			$("#showmore").html(result1.showmore);			
			}
    },

    });
}
});




$(document).on('click','.show_more',function(){

    var pagevalue = parseInt($(this).attr("id"));
    var   page=pagevalue;
  $('.show_more').hide();
    $('.loding').show();
    sort1(page);

});



//sort function for sorting

function sort()
{
	var counter=0;
	checkbox1="";
	checkbox2="";
	checkbox3="";
	checkbox1=($('#1').is(':checked'))?'1':'';
    checkbox2=($('#2').is(':checked'))?'2':'';
	checkbox3=($('#3').is(':checked'))?'3':'';
	select1=$("#select1").val();
	activities=$("#activities").val();
	country=$.trim($("#country").val());
	minimumage=$("#minimumage").val();
	weeksminimum=$("#minimumWeeeks").val();
	weeksmaximum=$("#maximumWeeeks").val();
	startdate=$("#startyear").val()+"-"+$("#startmonth").val()+"-"+$("#startdate").val();
	enddate=$("#endyear").val()+"-"+$("#endmonth").val()+"-"+$("#enddate").val();

	activities1=$("#activities option:selected").text();
	countryname=$.trim(country);
	if(typeof(countryname) != "undefined" && countryname !== null && countryname!="")
	{
		$("#country_mobile").text(countryname);
	}
	else
	{
		$("#country_mobile").text("Anywhere");
	}
	str="";
	$('.category').each(function (i) {
	

		if($(this).is(':checked') )
		{
			if($(this).attr("id")=="1")
			{
				str+="Volunteer";
				//alert("1 is clicked");
			}
			
			if($(this).attr("id")=="2")
			{
				if(str!="")
				{
					str +=",Teach";
				}
				else
				{
					str +="Teach";
				}


			
				//alert("2 is clicked");
			}
			
			if($(this).attr("id")=="3")
			{
				if(str!="")
				{
					str+=",Intern";
					
				}
				else
				{
				str+="Intern";
				}
				//alert("3 is clicked");
				
			}
		}

	});

				if(str=="")
				{
					$("#category_mobile").text("Volunteer,Teach,Intern");
						
				}
				else{
					$("#category_mobile").text(str);
				}




	if(activities1=="Please select")
	{
		$("#activity_mobile").text("AnyOne");
	}
	else{
		$("#activity_mobile").text(activities1);
	}
	

	if(minimumage!="")
	{
     counter=counter+1;
	}
	if(weeksminimum!="" && weeksmaximum!="")
	{
		counter=counter+1;
	}
	if(startdate!="--" && enddate!="--")
	{
	counter=counter+1;
	}


	if(counter==0)
	{
		$("#filterresult").text("");
	}
	else
	{
	$("#filterresult").text(counter);
	}
	if(counter==0)
	{
		$("#filterresulttablet").text("");
	}
	else
	{
	$("#filterresulttablet").text(counter);
	}
	if(counter==0)
	{
		$("#filterresulttabletmobile").text("");
	}
	else
	{
	$("#filterresulttabletmobile").text(counter);
	}
	var data1 = 'checkbox1='+ checkbox1 + '&checkbox2='+ checkbox2 + '&checkbox3='+ checkbox3+'&select1='+select1+'&activities='+activities+'&country='+country+'&minimumage='+ minimumage+'&weeksminimum='+weeksminimum+'&weeksmaximum='+weeksmaximum+'&startdate='+startdate+'&enddate='+enddate; 
  
	$.ajax({
    url : 'search/ajax',
    type : 'POST', 
	data : data1,
	beforeSend: function() {
        $('#loading').show();
    },
    success : function(response) {
		$('#loading').hide();
		var result1 = JSON.parse(response);
		if(result1.checkedresult){
			$("#resultchecked").html(result1.checkedresult);		

			}
			if(result1.searchdata){
				 $("#searchdata").append(result1.searchdata);
	
			}
			if(result1.showmore){
			$("#showmore").html(result1.showmore);			
			}
    },

    });
}

// code for reset filter
function resetduration()
{
    $("#minimumWeeeks").val("");
    $("#maximumWeeeks").val("");
}
function resetstartdate()
{
    $("#startyear").val("");
    $("#startmonth").val("");
    $("#startdate").val("");
    $("#endyear").val("");
    $("#endmonth").val("");
    $("#enddate").val("");
    
}

// function for show more button

function sort1(page)
{
	var counter=0;
	checkbox1="";
	checkbox2="";
	checkbox3="";
	checkbox1=($('#1').is(':checked'))?'1':'';
    checkbox2=($('#2').is(':checked'))?'2':'';
	checkbox3=($('#3').is(':checked'))?'3':'';

	


	select1=$("#select1").val();
	activities=$("#activities").val();
	country=$("#country").val();
	minimumage=$("#minimumage").val();
	weeksminimum=$("#minimumWeeeks").val();
	weeksmaximum=$("#maximumWeeeks").val();
	startdate=$("#startyear").val()+"-"+$("#startmonth").val()+"-"+$("#startdate").val();
	enddate=$("#endyear").val()+"-"+$("#endmonth").val()+"-"+$("#enddate").val();

	$("#activity_mobile").val(activities);
    page=page;
	if(minimumage!="")
	{
     counter=counter+1;
	}
	if(weeksminimum!="" && weeksmaximum!="")
	{
		counter=counter+1;
	}
	if(startdate!="--" && enddate!="--")
	{
	counter=counter+1;
	}

	//$("#filterresult").val()="33";
	if(counter==0)
	{
		$("#filterresult").text("");
	}
	else
	{
	$("#filterresult").text(counter);
	}
	var data1 = 'checkbox1='+ checkbox1 + '&checkbox2='+ checkbox2 + '&checkbox3='+ checkbox3+'&select1='+select1+'&activities='+activities+'&country='+country+'&minimumage='+ minimumage+'&weeksminimum='+weeksminimum+'&weeksmaximum='+weeksmaximum+'&startdate='+startdate+'&enddate='+enddate+'&page='+page; 
 
	$.ajax({

    url : 'search/ajax',
    type : 'POST',
//    dataType:'json',
	data : data1,
	beforeSend: function() {
        $('#loading').show();
    },
    success : function(data) {
		$('#loading').hide();
    	var result = JSON.parse(data);
    	if(result.checkedresult){
			$("#resultchecked").html(result.checkedresult);		
				
			}
			if(result.searchdata){
	
 			$("#searchdata").append(result.searchdata);
				}
			if(result.showmore){
			$("#showmore").html(result.showmore);			
			}
         $('.loding').hide();


       
         
    },

    });

}
