//***************start slick arrow*******************************
$(document).ready(function(){
    $('.single').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        rtl:true,
        cssEase:'ease',
        autoplay:true,
        accessibility:true,
        autoplaySpeed: 2000,
        prevArrow: '.pre',
        nextArrow: '.nex',
        responsive: [
            {
                breakpoint: 1000,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
        ]
    });
});
//***************end slick arrow*******************************

//***************slider*******************************
$('.carousel').carousel({
    interval: 2000,
     pause:false,
});
//***************slider*******************************

//***************start loading page*******************************
function load() {
    var load = document.getElementById("load");
    load.style.visibility = "hidden";
    // alert("hidden")
}
//***************end loading page*******************************

//***************start scroll up*******************************
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }

}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

//***************end scroll up*******************************

//***************start nav scroll*******************************
// window.onscroll = function() {scroll_nave()};
//
// function scroll_nave() {
//     if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
//         document.getElementById("nav").style.opacity=0.5;
//     } else {
//         document.getElementById("nav").style.opacity=1;
//     }
// }
//***************end nav scroll*******************************


var s = document.getElementsByClassName('nav-item');

    // if(this.classList.contains('active')){
    //     console.log('yes');
    // }else{
    //     // for (var i=0 ; i<s.length-1;i++){
    //     //     s[i].classList.remove('active');
    //     // }
    //     console.log('no');
    //    // this.classList.add('active');
    // }
