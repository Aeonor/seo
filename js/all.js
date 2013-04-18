// FOR TINYMCE
function FileBrowser(field_name, url, type, win) {
  tinyMCE.activeEditor.windowManager.open({
    file : "filemanager.php?field=" + field_name + "&url=" + url + "",
    title : 'File Manager',
    width : 640,
    height : 450,
    resizable : "no",
    inline : "yes",
    close_previous : "no"
  }, {
    window : win,
    input : field_name
  });
  return false;
}
//

function activateTinyMCE() { 
  tinymce.init({
    selector: "*[data-content-name]",
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
    file_browser_callback : FileBrowser,
    autosave_ask_before_unload: true,
    forced_root_block : false,
   force_br_newlines : true,
   force_p_newlines : false

  });
}


function listenerTinyMCE() {

  // ONCHANGE LISTENER
  $('*[data-content-name]').on('click', function() {
    return false;
  }).on('focus', function(){
    $(this).data('content-editable-origin', $(this).html())
  }).on('blur', function(){ 
    if ( $(this).data('content-editable-origin') != $(this).html() ) {
      $(this).trigger('change');
    }
  }).on('change', function(){ 
    var that = $(this);
    var content = $(this).html();
    var name = $(this).attr('data-content-name');
  
    $.post('setdata.php', {   
      ajax: 'true',
      page: $('body').attr('id'),
      name: name,
      content: content
    })
    .done(function(data) {
      if ( that.text() == '' ) {
        that.remove();
      }
    })
    .fail(function(data) {
      alert('An error occurs saving your modifications');
      console.log(data);
    });
  });
}

$(function() {
  $('footer a.admin').on('click', function(){
    activateTinyMCE();
    listenerTinyMCE();
    return false;
  });    
});
