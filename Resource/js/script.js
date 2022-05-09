$(document).ready(function(){

    // sticky nav
    $('.new-area').waypoint(
        function(direction){
            if(direction== "down"){
                $('nav').addClass('sticky');
            }
            else{
                $('nav').removeClass('sticky');
            }
        },{
            offset: '730px'
        }
    )

    //Slider
    const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
    const imgContainer = document.querySelector(".aspect-ratio-169")
    let index = 0
    let imgNumber = imgPosition.length
    const dotItem = document.querySelectorAll(".dot")
    //console.log(imgPosition)
    //abc
    imgPosition.forEach(function(image, index){
        image.style.left = index*100 + "%"
        dotItem[index].addEventListener("click",function(){
        slider(index)    
        })
    })

    function imgSlide(){
        index++;
        if(index>=imgNumber){
            index = 0
        }
        slider(index)
    }   

    function slider(index){
        imgContainer.style.left = "-" +index*100+ "%"
        const dotActive = document.querySelector(".active")
        dotActive.classList.remove("active")
        dotItem[index].classList.add("active")
    }
    setInterval(imgSlide,5000)

    const itemSliderbar = document.querySelectorAll(".category-left-li")
    itemSliderbar.forEach(function(menu,index){
        menu.addEventListener("click",function(){
            menu.classList.toggle("block")
        })
        
    })





})