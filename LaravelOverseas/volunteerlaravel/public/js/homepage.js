$(document).ready(function () {
    $("#normal_select1").dropkick({
        mobile: true
    });
    $("#select_id_activity").dropkick({
        mobile: true
    });
    


    $("#normal_select2").dropkick({
        mobile: true
    });
$('.owl-one').owlCarousel({
    loop: false,
    margin: 10,
    nav: true,
    dots: false,
    navText: ["<img src='public/images/left-arrow.png' >", "<img src='public/images/right-arrow.png'>"],
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 4
        }
    }
})
$('.owl-two').owlCarousel({
    loop: false,
    margin: 10,
    nav: true,
    dots: false,
    navText: ["<img src='public/images/left-arrow.png'  >", "<img src='public/images/right-arrow.png'>"],

    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 6
        }
    }
})
$('.owl-three').owlCarousel({
    loop: false,
    margin: 10,
    nav: true,
    dots: false,
    navText: ["<img src='public/images/left-arrow.png' >", "<img src='public/images/right-arrow.png'>"],

    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 5
        }
    }
})
});