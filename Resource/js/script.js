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
    
    //Slider
    // const imgPosition = document.querySelectorAll(".aspect-ratio-169 img");
    // const imgContainer = document.querySelector(".aspect-ratio-169");
    // let index = 0;
    // let imgNumber = imgPosition.length;
    // const dotItem = document.querySelectorAll(".dot");
    // imgPosition.forEach(function(image, index){
    //     image.style.left = index*100 + "%"
    //     dotItem[index].addEventListener("click",function(){
    //     slider(index);
    //     })
    // })

    // function imgSlide(){
    //     index++;
    //     if(index>=imgNumber){
    //         index = 0;
    //     }
    //     slider(index);
    // }   

    // function slider(index){
    //     imgContainer.style.left = "-" +index*100+ "%";
    //     const dotActive = document.querySelector(".active");
    //     dotActive.classList.remove("active");
    //     dotItem[index].classList.add("active");
    // }
    // setInterval(imgSlide,5000)

    // const itemSliderbar = document.querySelectorAll(".category-left-li")
    // itemSliderbar.forEach(function(menu,index){
    //     menu.addEventListener("click",function(){
    //         menu.classList.toggle("block");
    //     })
        
    // })

    //Slick Slider

    $('.slick-slider').slick({
        autoplay: true,
        speed: 800,
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