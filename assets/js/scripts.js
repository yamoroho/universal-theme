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