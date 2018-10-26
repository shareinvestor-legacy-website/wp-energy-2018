$(function() {
    try {
        $('.ellipsis').each(function(index, element) {
            var className = $(element).attr('class');
            var myRegexp = /(?:^|\s)ellipsis-(.*?)(?:\s|$)/g;
            var match = myRegexp.exec(className);

            if(match != null && match[1].length && $.isNumeric(match[1])) {
                $clamp(element, { clamp: match[1] });
            } else {
                $clamp(element, { clamp: 3 });
            }
        });
    }
    catch(err) {
      console.log(err)
    }
})
