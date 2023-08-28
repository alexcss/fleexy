import Splide from '@splidejs/splide';
import { AutoScroll } from '@splidejs/splide-extension-auto-scroll';

let options = {
  type: 'loop',
  autoWidth: true,
  arrows: false,
  pagination: false,
  drag: false,
  focus: 'center',
  autoScroll: {
    speed: 0.7,
    pauseOnHover: false,
    pauseOnFocus: false,
  },
  gap: '70px',
  breakpoints: {
    639: {
      gap: '40px'
    },
  }
}

const initializeBlock = function (block) {
  let slider = block.querySelector('.splide');
  if (slider) {
    new Splide(slider, options).mount({ AutoScroll });
  }
}
document.addEventListener('DOMContentLoaded', function () {
  let blocks = document.querySelectorAll('[data-slider-block]');
  blocks.forEach((block) => {
    initializeBlock(block);
  });
});
