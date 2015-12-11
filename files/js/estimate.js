/* =======================================================================
Estimate
========================================================================== */
(function($) {

  $(document).on('ready', function(){
    $(window).on('click', function(){
      loadUnit(getParam());
    });
  });

  //パラメータ取得
  function getParam() {

    var url    = location.href;
    var params = url.split("?");
        params = params[1].split("&");
    var paramsArray = {
      'mode' : params[0].split('=')[1],
      'ID'   : params[1].split('=')[1]
    };
    return paramsArray;
  }

  //見積りデータ読み込み（modeの値によって読み込む内容を変化）
  function loadUnit(params) {

    var projectID = params['ID'];
    var mode      = params['mode'];
    var func      = (mode == 'regist') ? 'unit' : 'all';

    var data = {
      'mode' : mode,
      'id'   : projectID,
      'code' : 'D-A',
      'func' : func
    };

    $.ajax({
      type     : "POST",
      url      : "files/library/est.php",
      dataType : "json",
      data     : data,
      success: function(data, dataType) {
        //結果が0件の場合
        if(data == null) alert('データが0件でした');

        var html = "";

        //返ってきたデータの表示
        for (var i = 0; i < data.length; i++){

          var d = data[i];

          html += '<div class="data list">';
          html += '<ul class="table">';
          html += '<li class="code"><input type="text" value="'+ d.code +'" /></li>';
          html += '<li class="content"><input type="text" value="'+ d.content +'" /></li>';
          html += '<li class="count num"><input type="text" value="" /></li>';
          html += '<li class="unit num"><input type="text" value="人日" /></li>';
          html += '<li class="org num"><input type="text" value="'+ d.cost +'" /></li>';
          html += '<li class="sales num"><input type="text" value="'+ d.sales +'"  /></li>';
          html += '<li class="profit num"><input type="text" value="'+ (d.sales | 0) / (d.cost | 0) +'%" /></li>';
          html += '<li class="selling num"><input type="text" /></li>';
          html += '</ul>';
          html += '<input type="hidden" value="'+ projectID +'">';
          html += '</div>';

        }

        setHTML(html, 'regist');

      },
      error: function(XMLHttpRequest, textStatus, errorThrown){
        console.log('Error : ' + errorThrown);
      }
    });

    return false;
  }

  //HTMLをappend
  function setHTML(data, parentID) {

    $('#' + parentID).prepend(data);

    return false;
  }

  return false;
  
})(jQuery);