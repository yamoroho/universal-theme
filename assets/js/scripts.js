const swiper = new Swiper('.swiper-container', {
  // Optional parameters
  loop: true,

  autoplay: {
    delay: 3000,
  },

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },
});

let menuTogle = $('.header-menu-toggle');
menuTogle.on('click', function (event){
  event.preventDefault();
  $('.header-nav').slideToggle(200);
})