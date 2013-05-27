$(function() {
  var activeTab = (typeof(TAB)=='undefined') ? 0 : TAB; 
  $('#tabs').tabs({ active: activeTab });
  
  if (FIELD && FIELD != '') {
    var fieldd = $(window.parent.document).find('#' + FIELD);
    $('.image-preview').on('click', function() {
      fieldd.val(getData($(this)));
      window.parent.DIALOG.close();
    });
  }
  else if (IMAGE != '') {
    var fieldd = $(window.parent.document).find('#' + IMAGE);
    $('.image-preview').on('click', function() {
      fieldd.attr('src', getData($(this)));
      parent.$('#' + IMAGE).trigger("change");
      window.parent.DIALOG.close();
    });
  }
    
  $('.link-preview').on('click', function() {
    var fieldd = $(window.parent.document).find('#' + FIELD);
    var id = getData($(this));
    fieldd.val('galerie.php?id='+id);
    window.parent.DIALOG.close();
  });
});

function getData(field) {
  if ( field.attr('data-id'))
    return field.attr('data-id');
  else if (field.find('img').size() > 0 ) {
    return field.find('img').attr('src');
  } 
}