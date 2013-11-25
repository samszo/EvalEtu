    $(document).ready(function() {
$('.thcv').click(function () {
     $("html, body").animate({ scrollTop: $('#carte').offset().top }, 1000, "easeInOutQuint");
});
$('.thweb').click(function () {
     $("html, body").animate({ scrollTop: $('#div2').offset().top }, 1000, "easeInOutQuint");
});
$('.thbook').click(function () {
     $("html, body").animate({ scrollTop: $('#div3').offset().top }, 1000, "easeInOutQuint");
});
$('.thmotion').click(function () {
     $("html, body").animate({ scrollTop: $('#div4').offset().top }, 1000, "easeInOutQuint");
});
$('.thcontact').click(function () {
     $("html, body").animate({ scrollTop: $('#div5').offset().top }, 1000, "easeInOutQuint");
});
    });