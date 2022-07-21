var form = {

    privacyStatement () {
        let $checkbox = $('input[name="privacyStatement"]');
		let $btn = $('button[type="submit"]');

        if($btn.length && $checkbox.length) {
            $checkbox.click(function () {
                if($(this).prop('checked')) {
                    $btn.removeAttr('disabled');
                } else {
                    $btn.attr('disabled', 'disabled');
                }
            })
        }

    },
    init() {
        this.privacyStatement();
    }
}

module.exports = form
