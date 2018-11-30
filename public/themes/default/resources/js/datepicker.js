class datepicker {
    constructor() {
        let lang = $("html").attr("lang");
        var dateFormat = "dd/mm/yy";

        $(".datepicker").datepicker(
            Object.assign($.datepicker.regional[ lang ], {
                dateFormat: 'dd/mm/yy',
                minDate: '-80Y',
                maxDate: '-18Y',
                defaultdate: '-18Y',
                changeMonth: true,
                changeYear: true
            })
       );

        var from = $( "#startDate" ).datepicker(
            Object.assign($.datepicker.regional[ lang ], {
                dateFormat: dateFormat,
                maxDate: 0,
                changeMonth: true,
                changeYear: true,
                yearRange: "-2:c",
            })
        ).on( "change", function() {
            to.datepicker( "option", "minDate", getDate( this ) );
        }),
        to = $( "#endDate" ).datepicker(
            Object.assign($.datepicker.regional[ lang ], {
                dateFormat: dateFormat,
                maxDate: 0,
                changeMonth: true,
                changeYear: true,
                yearRange: "-2:c",
            })
        ).on( "change", function() {
            from.datepicker( "option", "maxDate", getDate( this ) );
        });

        function getDate( element ) {
          var date;
          try {
            date = $.datepicker.parseDate( dateFormat, element.value );
          } catch( error ) {
            date = null;
          }
          return date;
        }

    }
}

export default new datepicker;
