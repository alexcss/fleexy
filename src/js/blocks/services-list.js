import Splide from '@splidejs/splide';
const initializeBlock = function (block) {
	let servicesRefSlider = block.querySelector('[data-services-list]');
	let servicesRefNav = block.querySelector('[data-services-nav]');

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
		perMove: 1,
		breakpoints: {
			991: {
				gap: '16px',
			},
		},
	});

	servicesSlider.sync(servicesNav);
	servicesSlider.mount();
	servicesNav.mount();
};

document.addEventListener('DOMContentLoaded', function () {
	let blocks = document.querySelectorAll('[data-services-list-block]');
	blocks.forEach((block) => {
		initializeBlock(block);
	});
});
