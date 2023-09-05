import 'vite/modulepreload-polyfill';

if (import.meta.env.DEV) {
	import('@vite/client');
}

import './vendors/_bootstrap';

import Splide from '@splidejs/splide';
import { AutoScroll } from '@splidejs/splide-extension-auto-scroll';

import {HeaderBar} from "@/src/js/components/HeaderBar";
new HeaderBar();

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
	gap: '24px',
	breakpoints: {
		639: {
			gap: '16px',
		},
	},
};

const initializeBlock = function (block) {
	let slider = block.querySelector('.splide');
	if (slider) {
		new Splide(slider, options).mount({ AutoScroll });
	}
};
document.addEventListener('DOMContentLoaded', function () {
	let blocks = document.querySelectorAll('[data-slider-block]');
	blocks.forEach((block) => {
		initializeBlock(block);
	});

	let servicesRefSlider = document.querySelector('[data-services-list]');
	let servicesRefNav = document.querySelector('[data-services-nav]');

	if (servicesRefNav && servicesRefNav) {
    let servicesNav = new Splide(servicesRefNav, {
      gap: '8px',
      arrows: false,
      isNavigation: true,
      pagination: false,
      autoWidth: true,
      drag: false,
    });

    let servicesSlider = new Splide(servicesRefSlider, {
      gap: '24px',
      pagination: false,
      breakpoints: {
        991: {
          gap: '16px',
        },
      },
    });

    servicesSlider.sync(servicesNav);
    servicesSlider.mount();
    servicesNav.mount();
	}
});
