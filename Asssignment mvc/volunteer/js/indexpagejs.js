	$(document).ready(function () {
			$("#datepicker").datepicker();
			$("#datepicker1").datepicker();
			$("#datepicker3").datepicker();

			$("#normal_select").dropkick({
				mobile: true
			});
			$("#normal_select1").dropkick({
				mobile: true
			});
		
			$("#apply_now").click(function (event) {
				event.preventDefault();
				return indexform_validate();
			});

			// table - CODE 

			var $table = $('.table-wrapper table');

			var leftTimeout, left = $('.left');

			function scrollLeft() {
				$('.table-wrapper').scrollLeft($('.table-wrapper').scrollLeft() - 50);
				$.each($table.find('tr'), function () {
					$(this).children().last().detach().prependTo(this);
				});
			}

			left.mousedown(function () {
				scrollLeft();
				leftTimeout = setInterval(function () {
					scrollLeft();
				}, 500);

				return false;
			});
			$(document).mouseup(function () {
				clearInterval(leftTimeout);
				return false;
			});

			var rightTimeout, right = $('.right');

			function scrollRight() {
				$('.table-wrapper').scrollLeft($('.table-wrapper').scrollLeft() + 50);
				$.each($table.find('tr'), function () {
					$(this).children().first().detach().appendTo(this);
				});
			}

			right.mousedown(function () {
				scrollRight();
				leftTimeout = setInterval(function () {
					scrollRight();
				}, 500);

				return false;
			});
			$(document).mouseup(function () {
				clearInterval(rightTimeout);
				return false;
			});

			//table-CODE-END
			//owl carousel
			$('.owl-carousel').owlCarousel({
				loop:true,
				margin:1,
				nav:true,
				dots:false,
				
				navText: ["<img src=''>", "<img src='images/right-white-arrow.png' class='left-arrow-index'>"],
				responsive:{
					0:{
						items:2
					},
					600:{
						items:4
					},
					1000:{
						items:4
					}
				}
			})
			//owl carousel end






		});

		$(document).ready(function(){
			$(".show").hide();
			$("#applynowmobile").click(function(){
				$('#myModal').modal('show');
		  });
		});


		//By default value for cost
		document.getElementById("cost_value").innerHTML = "$714";

		function cost_update(sel) {
			var opts = ['$147', '$123', '$324'],
				opt;
			var len = sel.options.length;
			for (var i = 0; i < len; i++) {
				opt = sel.options[i];

				if (opt.selected) {
					document.getElementById("cost_value").innerHTML = opts[i];

				}
			}
		}

		var stickyOffset = $('.sticky').offset().top;
		
		$(window).scroll(function () {
			// stickyOffset = $('.sticky').offset().top;
			var sticky = $('.sticky'),
				scroll = $(window).scrollTop();
			if (scroll >= stickyOffset) {
				
				sticky.addClass('fixed');
			}
			else{
			
				sticky.removeClass('fixed');
			}
		});

		var stickyOffset = $('.apply-form-side').offset().top;
		$(window).scroll(function () {
			var sticky = $('.apply-form-side'),
				scroll = $(window).scrollTop();

			if (scroll >= stickyOffset) sticky.addClass('index_small_form');
			else sticky.removeClass('index_small_form');
		});




		$(document).ready(function () {
			$(window).scroll(function () {
				var scrollDistance = $(window).scrollTop();

				$('section').each(function (i) {

					// console.log(i)(i)
					if ($(this).position().top <= scrollDistance) {
						$('#myScrollspy a.active').removeClass('active');
						$('#myScrollspy a').eq(i).addClass('active');
					}
				});
			}).scroll();
		});






		//Code for header fix

		$(window).scroll(function () {
			if ($(window).scrollTop() > 0) {				
				var sticky1 = $('.sticky1');
				sticky1.addClass('header-fixed-nav');				
				$("#loginbtn").addClass('button-fix-login');
				$("#overseaslogo").attr('src', "images/logo.png");
			}
			else {
				var sticky1 = $('.sticky1');
				sticky1.removeClass('header-fixed-nav');				
				$("#loginbtn").removeClass('button-fix-login');
				$("#overseaslogo").attr('src', "images/logo_1.png");
			}
		});


		//End
