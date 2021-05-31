import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel';
let $ = jQuery;

class ProductSlider {
    constructor() {
        this.events();
    }
    events() {
        $('.owl-carousel').owlCarousel({
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