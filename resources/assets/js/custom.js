//global loads


//elfinder for tinymce
function elFinderBrowser(field_name, url, type, win) {
    tinymce.activeEditor.windowManager.open({
        file: '/admin/elfinder/tinymce4',// use an absolute path!
        title: 'Medias',
        width: $(window).width() * 0.9  ,
        height: $(window).height() * 0.9 ,
        resizable: 'yes'
    }, {
        setUrl: function (url) {
            win.document.getElementById(field_name).value = url;
        }
    });
    return false;
}



//tinymce init
$(function () {

    tinymce.init({

        selector: '.tinymce',
        theme: 'modern',
        width: '100%',
        height: 300,
        relative_urls : false,
        remove_script_host : false,
        document_base_url : '//'+window.location.hostname + '/',
        allow_script_urls: true,
        convert_urls: false,
        plugins: [
            'advlist autolink link image lists charmap  hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'save table contextmenu directionality  template paste textcolor codemirror'
        ],
        menubar: 'edit insert view format table',
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image |  media fullpage | forecolor backcolor  | code',
        file_browser_callback : elFinderBrowser,
        codemirror: {
            indentOnInit: true, // Whether or not to indent code on init.
            path: '/assets/vendor/codemirror' // Path to CodeMirror distribution
        },
        forced_root_block: false,
        valid_elements: "+*[*]",
        valid_children: "+a[div|h1|h2|h3|h4|h5|h6|p]"
    });

});



//elfinder for standalone popup
window.pathname = function (url) {
    var path = $('<a href="' + url + '">').prop("pathname");
    return path.substring(1);
}

//urls -> [url1, url2, url3]
window.processSelectedFile =  function(urls, requestingField) {
    $('#' + requestingField).val(urls).trigger('change');
}

$(document).on('click','.elfinder-choose',function (event) {
    event.preventDefault();
    var updateID = $(this).attr('data-inputid'); // Btn id clicked
    var elfinderUrl = '/admin/elfinder/popup/';

    // trigger the reveal modal with elfinder inside
    var triggerUrl = elfinderUrl + updateID;
    $.colorbox({
        href: triggerUrl,
        fastIframe: true,
        iframe: true,
        width: $(window).width() * 0.9,
        height: $(window).height() * 0.9
    });
});



//elfinder for media menu
$(document).on('click','.elfinder-browse',function (event) {
    event.preventDefault();
    var elfinderUrl = '/admin/elfinder';

    // trigger the reveal modal with elfinder inside
    var triggerUrl = elfinderUrl ;
    $.colorbox({
        href: triggerUrl,
        fastIframe: true,
        iframe: true,
        width: $(window).width() * 0.9,
        height: $(window).height() * 0.9
    });
});

