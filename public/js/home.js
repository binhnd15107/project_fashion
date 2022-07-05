$(function(){
  Swal.fire({
    title: 'Custom width, padding, background.',
    width: 600,
    padding: '3em',
    background: '#fff url(./public/assets/img/cute-cartoon-sweet-cartoon.gif)',
    backdrop: `
      rgba(0,0,123,0.4)
      url("./public/assets/img/cute-cartoon-sweet-cartoon.gif")
      left top
      no-repeat
    `
  })
})
$(function () {

  $('.slider-img').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    centerModel: true,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 2000,
    prevArrow: $("#arrow-prev"),
    nextArrow: $("#arrow-next"),
  });

})

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

  $('.main-blog').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    centerModel: true,
  
    // dots:true,
    autoplay: true,
    autoplaySpeed: 2000,
    prevArrow: $("#arrow-prev3"),
    nextArrow: $("#arrow-next3"),

    speed: 800,
  });

})
// $('.main-carousel').flickity({
//   wrapAround: true,
//   cellAlign: 'left',
//   contain: true,
//   freeScorll: true,
// });
// $(document).ready(function () {
//   $(window).scroll(function () {
//     if ($(this).scrollTop()) {
//       $('header').addClass('sticky');
//     }
//     else {
//       $('header').removeClass('sticky');
//     }
//   });
// });