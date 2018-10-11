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
  
    }
}

export default new datepicker;