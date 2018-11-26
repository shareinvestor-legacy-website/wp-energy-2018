class datepicker {
    constructor() {
        $("#startDate,#endDate").datepicker({
            dateFormat: 'dd/mm/yy',
            minDate: '-2Y',
            maxDate: '-1d',
            defaultdate: '-1d',
            changeMonth: true,
            changeYear: true
        });
        $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy',
            minDate: '-80Y',
            maxDate: '-18Y',
            defaultdate: '-18Y',
            changeMonth: true,
            changeYear: true
        });

    }
}

export default new datepicker;
