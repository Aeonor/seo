$(function() {
  var activeTab = (typeof(TAB)=='undefined') ? 0 : TAB; 
  $('#tabs').tabs({ active: activeTab });
  
  if (FIELD && FIELD != '') {
    var fieldd = $(window.parent.document).find('#' + FIELD);
    $('.image-preview').on('click', function() {
      fieldd.val($(this).find('img').attr('src'));
      window.parent.DIALOG.close();
    });
  }
  else if (IMAGE != '') {
    console.log(IMAGE);
    var fieldd = $(window.parent.document).find('#' + IMAGE);
    console.log(fieldd);
    $('.image-preview').on('click', function() {
      fieldd.attr('src', $(this).find('img').attr('src'));
      parent.$('#' + IMAGE).trigger("change");
      window.parent.DIALOG.close();
    });
  }
    
  $('.link-preview').on('click', function() {
    var fieldd = $(window.parent.document).find('#' + FIELD);
    var id = $(this).attr('data-id');
    fieldd.val('galerie.php?id='+id);
    window.parent.DIALOG.close();
  });
});