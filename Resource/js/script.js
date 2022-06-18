$(document).ready(function(){

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
    const imgPosition = document.querySelectorAll(".aspect-ratio-169 img");
    const imgContainer = document.querySelector(".aspect-ratio-169");
    let index = 0;
    let imgNumber = imgPosition.length;
    const dotItem = document.querySelectorAll(".dot");
    imgPosition.forEach(function(image, index){
        image.style.left = index*100 + "%"
        dotItem[index].addEventListener("click",function(){
        slider(index);
        })
    })

    function imgSlide(){
        index++;
        if(index>=imgNumber){
            index = 0;
        }
        slider(index);
    }   

    function slider(index){
        imgContainer.style.left = "-" +index*100+ "%";
        const dotActive = document.querySelector(".active");
        dotActive.classList.remove("active");
        dotItem[index].classList.add("active");
    }
    setInterval(imgSlide,5000)

    const itemSliderbar = document.querySelectorAll(".category-left-li")
    itemSliderbar.forEach(function(menu,index){
        menu.addEventListener("click",function(){
            menu.classList.toggle("block");
        })
        
    })

    //Product details
    
    const bigImg = document.querySelector(".big-image");
    const smallImg = document.querySelectorAll(".small-image");
    smallImg.forEach(function(imgItem){
        imgItem.addEventListener("click",function(){
            bigImg.src = imgItem.src;
        })
    })

    //Div clickable

    $('.clickable').click(function(){
        window.location = $(this).find("a").attr("href");
        //console.log(123);
    });

    // Validication contact

    const btnSubmit = document.querySelector(".send-btn");
    const userName = document.querySelector(".name");
    const email = document.querySelector(".email");
    const text_area = document.querySelector("textarea");
    const alertSuccess = document.querySelector(".alert-success");
    const alertError = document.querySelector(".alert-error");

    const mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    alertError.addEventListener("click",function(){
        alertError.style.visibility = "hidden";
    })

    alertSuccess.addEventListener("click",function(){
        alertSuccess.style.visibility = "hidden";
    })

    btnSubmit.addEventListener("click", function(){
        //console.log(12);
        validicationForm();
        
    })

    function validicationForm(){
        
        if(userName.value == "" || text_area.value == "" || email.value == "")
        {
            alertError.innerHTML = "Please fill out all in the form!"
            alertError.style.visibility = "visible";
            alertSuccess.style.visibility = "hidden";  
        }
        else if(validicationEmail() == false)
        {   
            alertError.innerHTML = "Please fill out right email format!"
            alertError.style.visibility = "visible";
            alertSuccess.style.visibility = "hidden"; 
        }
        else{
            alertError.style.visibility = "hidden";
            alertSuccess.style.visibility = "visible";
        }
    }

    function validicationEmail(){
        if(email.value.match(mailformat))
        {
            return true;
        }
        else
        {
            return false; 
        }
    }
    
})