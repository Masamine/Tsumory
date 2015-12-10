/* =======================================================================
Estimate
========================================================================== */
(function($) {

  $(document).on('ready', function(){
    $(window).on('click', loadDB);
  });

  function loadDB() {

    var data = {'request' : 'C-A'};

    $.ajax({
      type     : "POST",
      url      : "files/library/est.php",
      dataType : "json",
      data     : data,
      success: function(data, dataType) {
        //結果が0件の場合
        if(data == null) alert('データが0件でした');
        
        //返ってきたデータの表示
        for (var i = 0; i < data.length; i++){
          console.log(data[i]['id']);
        }
      },
      error: function(XMLHttpRequest, textStatus, errorThrown){
        console.log('Error : ' + errorThrown);
      }
    });

    return false;
  }

  return false;
  
})(jQuery);