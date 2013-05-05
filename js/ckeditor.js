$(function() {
  CKEDITOR.disableAutoInline = true;
  
  // ACTIVATE CKEDITOR
  $('footer a.admin').on('click', function(){
    activate($('*[data-content-name]'));
    CKEDITOR.inlineAll();
    return false;
  });
  
  // Qui sommes nous ?
  function addLi() {
    var that = $(this); 
    var parent = that.parent('ul');
    var index = parent.find('li').size()+1;
    
    if ( that.index() >= (index-2) ) {
    var element = $('<li data-content-name="'+that.attr('data-content-name').slice(0,that.attr('data-content-name').lastIndexOf('_')+1)+index+'" contenteditable="true"></li>').appendTo(parent);
    activate(element);
    }
  }  
  $('#qui_sommes_nous ul').on('change', 'li[data-content-name]', addLi);  
  
  $('#qui_sommes_nous .bureau_content').hide().prev('h3').addClass('cursor').on('click', function(){
    $(this).next('.bureau_content').slideToggle();
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
    var name = $(this).attr('data-content-name');
  
    $.post('setdata.php', {   
      ajax: 'true',
      page: $('body').attr('id'),
      name: name,
      content: data
    })
    .done(function(data) {
      console.log(data);
    })
    .fail(function(data) {
      alert('An error occurs saving your modifications');
      console.log(data);
    });
  });
}