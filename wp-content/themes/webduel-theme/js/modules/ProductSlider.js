
let $ = jQuery;

class ProductSlider {
    constructor() {
        this.events();
    }
    events() {
        $('.category-section .owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            lazyLoad: true,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsiveBaseElement: ".row-container",
            responsiveClass: true,
            stagePadding: 50,
            rewind: true,
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

export default ProductSlider;