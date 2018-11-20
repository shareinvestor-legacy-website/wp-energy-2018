class viewport {
    constructor() {
        if($('[data-vp-add-class]').length) {
            $('[data-vp-add-class]').viewportChecker();
        }
    }
}

export default new viewport;