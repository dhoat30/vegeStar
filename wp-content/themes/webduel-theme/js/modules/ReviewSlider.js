let $ = jQuery;

class ReviewSlider {
    constructor() {
        //this.events();
    }
    events() {
        $('review-section .owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            lazyLoad: true,
            autoplay: false,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsiveBaseElement: ".row-container",
            responsiveClass: true,
            stagePadding: 50,
            responsive: {
                0: {
                    items: 1
                },
                500: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                },
                1366: {
                    items: 5,
                    loop: false
                }
            }
        });

    }
}
export default ReviewSlider;