var swiper = new Swiper(".mySwiper", {
  loop: true,
  spaceBetween: 30,
  slidesPerView: 9,
  freeMode: true,
  watchSlidesProgress: true,
});
var swiper2 = new Swiper(".mySwiper2", {
  loop: true,
  spaceBetween: 20,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: swiper,
  },
});


// Swiper all projects

var swiperPjs = new Swiper(".mySwiper-pjs", {
  slidesPerView: 2,
  loop: true,
  spaceBetween: 50,
  freeMode: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 50,
    },
    1024: {
      slidesPerView: 5,
      spaceBetween: 50,
    },
  }
});

// Swiper welcome images

var swiperWelcomeImg = new Swiper(".mySwiper-welcome-img", {
  spaceBetween: 30,
  centeredSlides: true,
  loop: true,
  speed: 1000,
  allowTouchMove: false,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});



// Settare autoplay in nuovo swiper solo per anteprima così da far partire l'autoplay in leggero ritardo

// Don't enable autoplay and then start it after timeout:

// Swiper welcome images

var swiperWelcomePrew = new Swiper(".mySwiper-welcome-prew", {
  spaceBetween: 30,
  centeredSlides: true,
  loop: true,
  speed: 1000,
  allowTouchMove: false,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});


// Necessario per allineare la sincronizzazione degli swiper
// let firstSlide = document.querySelector('#firstSlide');
// if (firstSlide.classList.contains('swiper-slide-active')) {
//   firstSlide.setAttribute('data-swiper-autoplay', 2500); // Rimuovi l'attributo "data-swiper-autoplay"
//   swiperWelcomePrew.autoplay.start();
// }


// Swiper end page welcome
var swiper = new Swiper(".mySwiperEndWelcome", {
  slidesPerView: 1,
  spaceBetween: 10,
  loop: true,
  speed: 2500,
  allowTouchMove: false,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 4,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 5,
      spaceBetween: 50,
    },
  },
});