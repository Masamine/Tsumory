/* =======================================================================
Submit
========================================================================== */
(function($, _) {

  $(document).on('ready', function(){

    $('#submit').on('click', submit);

    return false;
  });

  function submit() {

    $btn = $(this);

    setTimeout(function(){
      if(!$('#regist').find('input').hasClass('err')) {

        var client = $('#client').val();
        var staff  = $('#client_staff').val();
        var works  = $('#works').val();

        var array = {
          'type'   : "works",
          'client' : client,
          'staff'  : staff,
          'works'  : works
        };
        ajax(array);

      } else {
        console.log('Error');
      }
    }, 100);

  }

  function ajax(d) {

    $.ajax({
      type     : "POST",
      url      : "files/library/postData.php",
      dataType : "json",
      timeout  : 10000,
      data     : d
    }).done(function(data){
      alert('登録完了しました！');
      setHTML(data);
    }).fail(function(data){
      alert('登録失敗しました…');
    });

    return false;
  }

  function setHTML(d) {

    var $parent = $('#data');

    var type   = d.type;
    var id     = d.id;
    var client = d.client;
    var staff  = d.staff;
    var works  = d.works;
    var time   = d.time;
    var html   = "";

    if(type == 'works') {
      html += '<div class="list">';
        html += '<div class="names anim">';
          html += '<h2>'+ client +'</h2>';
          html += '<p class="works">'+ works +'</p>';
          html += '<p class="update">'+ time +'</p>';
        html += '</div>';

        html += '<div class="contents">';
          html += '<div class="inner">';
            html += '<div class="reg radbtn"><a href="estimate.php?mode=regist&pid='+ id +'">見積り登録</a></div>';
            html += '<table class="listnames">';
              html += '<colgroup>';
              html += '<col style="width:12%;">';
              html += '<col style="width:40%;">';
              html += '<col style="width:13%;">';
              html += '<col style="width:10%;">';
              html += '<col style="width:15%;">';
              html += '<col style="width:10%;">';
              html += '</colgroup>';
              html += '<tr>';
              html += '<td class="icon">関連チーム</td>';
              html += '<td class="detail">要件</td>';
              html += '<td class="price">売価金額</td>';
              html += '<td class="name">更新者</td>';
              html += '<td class="update">更新日時</td>';
              html += '<td class="btns">各種機能</td>';
              html += '</tr>';
            html += '</table>';
            html += '<p class="none">見積りはありません。</p>';
          html += '</div>';
        html += '</div>';
      html += '</div>';
    }

    $parent.prepend(html);
    $('#regist').find('.form').find('input').val("");

    $parent.find('.anim').stop().animate({
      'left'    : 0
    }, 300, 'easeOutCubic', function(){
      $parent.find('.anim').on('click', openList)
    });

    function openList() {
  
      var $this  = $(this);
      var target = $this.closest(".list");
  
      if(!target.hasClass("active") && !target.find(".contents").is(':animated')) {
        target.addClass("active").find(".contents").slideDown(420, "easeOutExpo");
      } else {
        target.removeClass("active").find(".contents").slideUp(420, "easeOutExpo");
      }
  
      return false;
    }

    return false;
  }

  return false;
  
})(jQuery, Manager);