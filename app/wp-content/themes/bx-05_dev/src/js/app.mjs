import { menu } from './menu.mjs';
menu();

import { smoothScroll } from './smoothscroll.mjs';
smoothScroll();

import { urlCopy } from './urlcopy.mjs';
urlCopy();

import { lazyLoad } from './lazyload.mjs';
lazyLoad();

import { redume } from './redume.mjs';
redume();

import { reviewOpen } from './review-open.mjs';
reviewOpen();

import { fslightbox } from 'fslightbox';

import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

const swiper = new Swiper('.swiper', {
  loop: true,
  slidesPerView: 1,
  spaceBetween: 0,
  speed: 500,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
    waitForTransition: false,
  },
  effect: 'fade',
  fadeEffect: {
    crossFade: true,
  },
  pagination: {
    el: '.swiper-pagination',
    type: 'bullets',
    clickable: true,
  },
});
