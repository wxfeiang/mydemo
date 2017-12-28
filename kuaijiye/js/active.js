
var zgone = new Swiper('.one-chenge .swiper-container', {
    /*pagination: '.swiper-pagination',*/
    nextButton: '.one-chenge .swiper-button-next',
    prevButton: '.one-chenge .swiper-button-prev',
    paginationClickable: true,
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: 3000,
    autoplayDisableOnInteraction: false
});

$("#ex-left li").each(function (index,elem) {
    //console.log($(this));
    $(this).click(function () {
        //全清
        $("#ex-left li").removeClass("ex-active");
        $("#exer-box .ex-right").css("display","none");

        //添加对应
        $(this).addClass("ex-active");
        // $("#box div").eq($(this).index()).css("display","block");
        //console.log(index);
        $("#exer-box .ex-right").eq(index).css("display","block");
    });

})
