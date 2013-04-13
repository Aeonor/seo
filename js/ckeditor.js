$(function() {
  CKEDITOR.disableAutoInline = true;
  
  // ACTIVATE CKEDITOR
  $('footer a.admin').on('click', function(){
    activate($('*[contentname]'));
    CKEDITOR.inlineAll();
    return false;
  });
           

});

function activate(elements){
  // ACTIVATE EDITING
  elements.attr('contenteditable', true);

  // ONCHANGE LISTENER
  elements.on('focus', function(){
    $(this).data('content-editable-origin', $(this).html())
  }).on('blur', function(){ 
    if ( $(this).data('content-editable-origin') != $(this).html() ) {
      $(this).trigger('change');
    }
  }).on('change', function(){ 
    var data = $(this).html();
    var name = $(this).attr('contentname');
    console.log({    
      ajax: 'true',
      page: $('body').attr('id'),
      name: name,
      content: data
    });
    $.post('setdata.html', {    
      ajax: 'true',
      page: $('body').attr('id'),
      name: name,
      content: data
    })
    .done(function(data) {})
    .fail(function(data) {  alert('An error occurs saving your modifications'); console.log(data); });
  });
}