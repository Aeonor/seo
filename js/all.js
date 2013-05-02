// FOR TINYMCE
function directFileBrowser(field) {
    window.DIALOG = tinyMCE.editors[0].windowManager.open({
        file: "filemanager.php?image=" + field,
        title: 'File Manager',
        width: 640,
        height: 450,
        resizable: "no",
        inline: "yes",
        close_previous: "no"
    }, {
        window: window,
        input: field
    });
    return false;
}

function FileBrowser(field_name, url, type, win) {
    window.DIALOG = tinyMCE.activeEditor.windowManager.open({
        file: "filemanager.php?field=" + field_name + "&url=" + url + "",
        title: 'File Manager',
        width: 640,
        height: 450,
        resizable: "no",
        inline: "yes",
        close_previous: "no"
    }, {
        window: win,
        input: field_name
    });
    return false;
}


function activateTinyMCE() {
    tinymce.init({
        selector: "*[data-content-name]:not(img)",
        language: 'fr',
        inline: true,
        theme: "modern",
        plugins: [
            "advlist autolink lists link image charmap hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "template paste"
        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar2: "media | forecolor backcolor",
        templates: [
            {
                title: 'Test template 1',
                content: '<b>Test 1</b>'
            },
            {
                title: 'Test template 2',
                content: '<em>Test 2</em>'
            }
        ],
        file_browser_callback: FileBrowser,
        autosave_ask_before_unload: true,
        forced_root_block: false,
        force_br_newlines: true,
        force_p_newlines: false

    });

    $('img[data-content-name]').addClass('contenteditable').on('click', function(e) {
        e.stopPropagation();
        $(this).attr('id', 'IMAGE_TO_MODIFY');
        directFileBrowser($(this).attr('id'));
        return false;
    });
}


function listenerTinyMCE() {
    // ONCHANGE LISTENER
    $('*[data-content-name]').on('click', function() {
        return false;
    }).on('focus', function() {
        $(this).data('content-editable-origin', $(this).html());
    }).on('blur', function() {
        if ($(this).data('content-editable-origin') != $(this).html()) {
            $(this).trigger('change');
        }
    }).on('change', function() { 
        var that = $(this);
        var content = ( $(this).is('img') ) ? $(this).attr('src') : $(this).html();
        var name = $(this).attr('data-content-name');

        $.post('setdata.php', {
            ajax: 'true',
            page: $('body').attr('id'),
            name: name,
            content: content
        })
                .done(function(data) {
            
        })
                .fail(function(data) {
            alert('An error occurs saving your modifications');
            console.log(data);
        });
    });
}

function admin() {
    $("#admin-form").dialog({
        autoOpen: false,
        height: 300,
        width: 400,
        modal: true,
        buttons: {
            "Se connecter": function() {
                $.post("login.php", {
                    ajax: true,
                    submit: 'submit',
                    login: $("#admin-form #name").val(),
                    password: $("#admin-form #password").val()
                }, function(data) {
                    if (data) {
                        location.reload(true);
                    }
                    else {
                        $('#admin-form .validateTips').val('<strong>Une erreur s\'est produite lors de la tentative de connexion, réessayez');
                    }
                });
            },
            Cancel: function() {
                $(this).dialog("close");
            }
        },
        close: function() {

        }
    });

    $('footer a.admin').on('click', function() {
        $('#admin-form').dialog('open');
        return false;
    });

}

$(function() {
    // TinyMCE
    $('#cache a.admin-button').data('active', false).on('click', function() {
        if ($(this).data('active')) {
            $('<div class="ui-widget-overlay ui-front"></div><div class="loading"></div>').appendTo('body');
            setTimeout(function() {
                location.reload(true);
                location.assign(location.href);
            }, 1000); // recharge après 1seconde
        }
        else {
            activateTinyMCE();
            listenerTinyMCE();
            $(this).html('<i class="icon-check icon-white"></i> Valider les modifications');
        }
        $(this).data('active', !$(this).data('active'));
        return false;
    });

    $('*[data-content-name]').on('focus', function() {
    });

    // Admin
    admin();

    // Qui sommes nous 
    var h3 = $('#qui_sommes_nous .bureau h3').addClass('cursor').on('click', function() {
        $(this).next('.bureau_content').slideToggle();
    }).next('.bureau_content').hide();
});
