// $('.hihi').slick({
//     infinite: true,
//     slidesToShow: 3,
//     slidesToScroll: 1,
//     arrows:true,
  
//     autoplaySpeed:2000,
//     dots:false,
//     centerMode:true,
//     centerPadding:'0',
//   });


$(function () {

  $('.slider-img2').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    centerModel: true,
    arrows: true,
    // dots:true,
    autoplay: true,
    autoplaySpeed: 2000,
    prevArrow: $("#arrow-prev2"),
    nextArrow: $("#arrow-next2"),

    speed: 800,
  });

})
$(function () {

  $('.for_slick_slider').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    centerModel: true,
    arrows: true,
    // dots:true,
    autoplay: true,
    autoplaySpeed: 2000,
    prevArrow: $("#slideLeft"),
    nextArrow: $("#slideRight"),
    speed: 800,
  });

})

  let thumbails=document.getElementsByClassName('thumbnail');
  let activeImages=document.getElementsByClassName('active');
  $(()=> {
    $('.thumbnail').click(function(){
      let imgPath=$(this).attr('src');
    
     $('#featured').attr('src',imgPath);

      })

  })
  // let buttonRight=document.getElementById('slideRight');

  // let buttonLeft=document.getElementById('slideLeft');
  // buttonLeft.addEventListener('click',function(){
  //   document.getElementById('for_slick_slider').scrollLeft -=180
  // })
  // buttonRight.addEventListener('click',function(){
  //   document.getElementById('for_slick_slider').scrollLeft +=180
  // })
