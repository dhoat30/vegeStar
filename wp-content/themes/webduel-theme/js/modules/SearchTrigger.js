let $ = jQuery;

class SearchTrigger {
    constructor() {
        this.events();
    }
    events() {
        $(document).on('click', '.search-icon', this.showSearchForm);
        $('.search-code .fa-times').on('click', this.hideSearchForm)
    }

    showSearchForm(e) {
        $('.search-code').show();
    }
    hideSearchForm() {
        $('.search-code').hide();
    }
}

export default SearchTrigger;