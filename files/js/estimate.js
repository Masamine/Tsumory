/* =======================================================================
Estimate
========================================================================== */
(function($) {

  $(document).on('ready', function(){
    var unitset = $('.btnset');
    unitset.find('a').on('mousedown', function(){ loadUnit(getParam(), $(this)); return false; });
    
    $(window).on('beforeunload', function() {
      return "え！？入力したデータ消えちゃうよ？";
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
  function loadUnit(params, btn) {

    var projectID = params['ID'];
    var mode      = params['mode'];
    var func      = (mode == 'regist') ? 'unit' : 'all';
    var code      = btn.data('code');
    var html      = "";

    //見出しボックス
    if(code == 'title') {
      html += '<div class="data list ttl newdata" style="left:100%;">';
      html += '<ul class="table">';
      html += '<li class="ttl"><input type="text" value="見出し" /></li>';
      html += '</ul>';
      html += '<input type="hidden" value="'+ projectID +'">';
      html += '</div>';

      setHTML(html, 'regist', 'title');

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

          html += '<div class="data list newdata" style="left:100%;">';
          html += '<ul class="table">';
          html += '<li class="code"><input type="text" data-key="code" value="'+ code +'" /></li>';
          html += '<li class="content"><input type="text" data-key="content" value="'+ content +'" /></li>';
          html += '<li class="count num"><input type="text" data-key="count" value="1" /></li>';
          html += '<li class="unit num"><input type="text" data-key="unit" value="人日" /></li>';
          html += '<li class="org num"><input type="text" data-key="org" data-val="'+ cost +'" value="'+ separate(cost) +'" /></li>';
          html += '<li class="sales num"><input type="text" data-key="sales" data-val="'+ sales +'" value="'+ separate(sales) +'" /></li>';
          html += '<li class="profit num"><input type="text" data-key="profit" value="'+ profit +'%" /></li>';
          html += '<li class="selling num"><input type="text" data-key="selling" data-val="'+ sales +'" value="'+ separate(sales) +'" /></li>';
          html += '</ul>';
          html += '<input type="hidden" value="'+ projectID +'">';
          html += '</div>';

        }

        setHTML(html, 'regist', 'cost');

      },
      error: function(XMLHttpRequest, textStatus, errorThrown){
        console.log('Error : ' + errorThrown);
      }
    });

    return false;
  }

  //HTMLをappend
  function setHTML(data, parentID, type) {

    if($('input:focus')[0]) {
      var parent = $('input:focus').closest('.data');
      $('#' + parentID).find(parent).after(data);
      console.log('after')
    } else {
      $('#' + parentID).append(data);
      console.log('append')
    }
    TweenLite.to('.newdata', 0.65, { ease: Expo.easeOut, left: 0, onComplete : function(){ $('.newdata').removeClass('newdata') } });

    $('.data').find('.count').find('input').off('keypress').keypress( function ( e ) {
      if ( e.which == 13 ) {
        pressReturn();
        return false;
      }
    } );

    if(type !== 'title') calTotal();

    return false;
  }

  // 正規表現でセパレート
  function separate(num) {
    return String(num).replace( /(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
  }

  /* =====================================================
  合計金額
  ===================================================== */
  function calTotal(diff) {

    var $total    = $('#total').find('span');
    var totalcost = $total.data('total') | 0;

    if(diff) {
      totalcost = totalcost + diff;
    } else {
      var sale      = $('.newdata').find('.selling').find('input').data('val') | 0;
      totalcost = totalcost + sale;
    }

    $total.text('￥' + separate(totalcost));
    $total.data('total', totalcost);

    return false;
  }

  /* =====================================================
  RETURN KEY ACTION
  ===================================================== */
  function pressReturn() {

    var target = $('input:focus');
    var parent = target.closest('ul');

    //人日数
    var count = target.val();
    //列の売原価
    var sales = parent.find('.sales').find('input').data('val') | 0;
    //現在の列合計
    var oldSubtotal = parent.find('.selling').find('input').data('val') | 0;
    //個数変更後の新しい列合計
    var newSubtotal = count * sales | 0;
    //列合計の差額
    var diff = newSubtotal - oldSubtotal;

    if(diff == 0) return false;

    parent.find('.selling').find('input').data('val', newSubtotal);
    parent.find('.selling').find('input').val("").val(separate(newSubtotal));

    //合計の再計算
    calTotal(diff);

    return false;
  }

  return false;
  
})(jQuery);