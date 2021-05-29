let $ = jQuery;

class AddToCartAnimation {
    constructor() {
        this.events();

    }
    events() {
        $('.products .product').hover(this.showAddToCartContainer, this.hideAddToCartContainer);
    }

    showAddToCartContainer(e) {
        console.log('this is a container');
        $(e.target).closest('.product').find('.add-to-cart-container').show();

    }
    hideAddToCartContainer(e) {
        console.log('this is a container hidden');
        $(e.target).closest('.product').find('.add-to-cart-container').hide();

    }
}
export default AddToCartAnimation;