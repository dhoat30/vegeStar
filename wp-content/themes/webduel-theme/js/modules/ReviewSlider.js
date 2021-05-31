let $ = jQuery;

class ReviewSlider {
    constructor() {
        this.events();
    }
    events() {
        $('.review-section .owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            items: 1,
            nav: true,
            lazyLoad: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsiveClass: true


        });

    }
}
export default ReviewSlider;