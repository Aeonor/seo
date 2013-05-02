$(function() {console.log(IMAGE);console.log(FIELD);
    if (FIELD && FIELD != '') {
        var fieldd = $(window.parent.document).find('#' + FIELD);
        $('.image-preview').on('click', function() {
            fieldd.val($(this).find('img').attr('src'));
            window.parent.DIALOG.close();
        });
    }
    else if (IMAGE != '') { console.log(IMAGE);
        var fieldd = $(window.parent.document).find('#' + IMAGE); console.log(fieldd);
        $('.image-preview').on('click', function() {
            fieldd.attr('src', $(this).find('img').attr('src'));
            parent.$('#' + IMAGE).trigger("change");
            window.parent.DIALOG.close();
        });
    }
});