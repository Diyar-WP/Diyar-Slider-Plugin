/**
 * Swiper dependencies
 *
 * @see https://swiperjs.com/get-started
 */
import { Swiper } from 'swiper';
import { Autoplay, Keyboard, Navigation, Pagination, Parallax, Grid } from 'swiper/modules';

/**
 * Initialize the slider.
 *
 * @param {Element} container HTMLElement.
 * @param {Object}  options   Slider parameters.
 *
 * @return {Object} Returns initialized slider instance.
 *
 * @see https://swiperjs.com/swiper-api#parameters
 */
export function SwiperInit(container, options = {}) {
	const parameters = {
		autoplay: options?.autoplay ?? true,
		centeredSlides: options?.centerSlides ?? false,
		createElements: true,
		grabCursor: options?.grabCursor ?? true,
		initialSlide: 0,
		keyboard: true,
		modules: [Autoplay, Keyboard, Navigation, Pagination, Parallax, Grid],
		navigation: options?.navigation ?? false,
		speed: options?.speed ?? 3000,
		loop: options?.loop ?? true,
		pagination: options.pagination ? { ...options.pagination, clickable: true } : false,
		simulateTouch: options?.simulateTouch ?? true,
		slidesPerView: options?.slidesPerView ?? 1,
		spaceBetween: (options?.slidesPerView ?? 1) === 1 ? 0 : 40,
		breakpoints: {
			768: {
				slidesPerView: options?.slidesPerViewSmall ?? 1,
				spaceBetween: (options?.slidesPerView ?? 1) === 1 ? 0 : 20
			},
			1024: {
				slidesPerView: options?.slidesPerViewMedium ?? 1,
				spaceBetween: (options?.slidesPerView ?? 1) === 1 ? 0 : 30,
			}
		}
	};

	return new Swiper(container, parameters);
}
