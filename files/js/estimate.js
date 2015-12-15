/* =======================================================================
Estimate
========================================================================== */
(function($) {

  $(document).on('ready', function(){
    var unitset = $('.btnset');
    unitset.find('a').on('click', function(){ loadUnit(getParam(), $(this)); return false; });

    //$('input').on('dblclick', function(){ confirm('この項目を削除しますか？'); return false; });

    // $(window).on('beforeunload', function() {
    //   return "え！？入力したデータ消えちゃうよ？";
    // });
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
  function loadUnit(params, btn) {

    var projectID = params['ID'];
    var mode      = params['mode'];
    var func      = (mode == 'regist') ? 'unit' : 'all';
    var code      = btn.data('code');
    var html      = "";

    if(code == 'title') {
      html += '<div class="data list ttl">';
      html += '<ul class="table">';
      html += '<li class="ttl"><input type="text" value="見出し" /></li>';
      html += '</ul>';
      html += '<input type="hidden" value="'+ projectID +'">';
      html += '</div>';

      setHTML(html, 'regist');

      return false;
    }

    var data = {
      'mode' : mode,
      'id'   : projectID,
      'code' : code,
      'func' : func
    };

    $.ajax({
      type     : "POST",
      url      : "files/library/est.php",
      dataType : "json",
      data     : data,
      success: function(data, dataType) {

        //結果が0件の場合
        if(data.length == 0) {
          alert('データがありませんでした。');
          return false;
        }

        //返ってきたデータの表示
        for (var i = 0; i < data.length; i++){

          var d       = data[i];
          var code    = d.code;
          var content = d.content;
          var cost    = d.cost | 0;
          var sales   = d.sales | 0;
          var profit  = d.profit | 0;

          html += '<div class="data list">';
          html += '<ul class="table">';
          html += '<li class="code"><input type="text" value="'+ code +'" /></li>';
          html += '<li class="content"><input type="text" value="'+ content +'" /></li>';
          html += '<li class="count num"><input type="text" value="1" /></li>';
          html += '<li class="unit num"><input type="text" value="人日" /></li>';
          html += '<li class="org num"><input type="text" data-val="'+ cost +'" value="'+ separate(cost) +'" /></li>';
          html += '<li class="sales num"><input type="text" data-val="'+ sales +'" value="'+ separate(sales) +'" /></li>';
          html += '<li class="profit num"><input type="text" value="'+ profit +'%" /></li>';
          html += '<li class="selling num"><input type="text" data-val="'+ sales +'" value="'+ separate(sales) +'" /></li>';
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

    $('#' + parentID).append(data);

    return false;
  }

  // 正規表現でセパレート
  function separate(num) {
    return String(num).replace( /(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
  }

  return false;
  
})(jQuery);