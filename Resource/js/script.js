$(document).ready(function(){

    //DataTable for cart table
    $('#table_cart').DataTable();

    //Jquery animate counting
    $(".num").counterUp();

    // sticky nav
    $('.featured-product-area').waypoint(
        function(direction){
            if(direction== "down"){
                $('.navbar').addClass('sticky');
            }
            else{
                $('.navbar').removeClass('sticky');
            }
        },{
            offset: '1800px'
        }
    )
    

    //Slick Slider
    $('.slick-slider').slick({
        autoplay: true,
        autoplaySpeed:1500,
        arrows: false,
        dots: true,
        fade: true
    });

    //Product details
    const bigImg = document.querySelector(".big-image");
    const smallImg = document.querySelectorAll(".small-image");
    smallImg.forEach(function(imgItem){
        imgItem.addEventListener("click",function(){
            bigImg.src = imgItem.src;
        })
    })

    // const bigImg = $(".big-image");
    // const smallImg = $(".small-image");
    // $.each(smallImg, function (imgItem) {
    //     imgItem.click( function () {
    //         bigImg.src = imgItem.src;
    //     })
    // })

    //Div clickable

    $('.clickable').click(function(){
        window.location = $(this).find("a").attr("href");
        //console.log(123);
    });
    
})