/* =======================================================================
UI
========================================================================== */
(function($,_) {
  
  var _this, _window, SPEED;
  
  (function(){
    
    _.ui    = _this = {};
    _window = $(window);
    SPEED   = 420;

    showUser();
    showList();
    showForm();
    changeFocus();
    
  })();
  
  _this.accordion    = accordion;
  _this.designSelect = designSelect;
  _this.showSearch   = showSearch;

  /* ---------------------------------------
  Show Form Area
  --------------------------------------- */
  function showForm() {
    var btn    = $('.trigger').find('a');
    var target = $('.formBox');
    
    btn.on('click', function(){
      if(target.hasClass('active') && !target.is(':animated')) {
        btn.removeClass('active').text("新規登録");
        target.slideUp(SPEED, 'easeOutExpo');
        target.find(".form").find('input[name]').val("");
      } else if(!target.hasClass('active') && !target.is(':animated')){
        btn.addClass('active').text("登録キャンセル");
        target.slideDown(SPEED, 'easeOutExpo');
      }
      target.toggleClass('active');

      return false;
    });

    return false;
  }

  /* ---------------------------------------
  Show User Info
  --------------------------------------- */
  function showUser() {
    var btn = $("#avatar");
    var target = $('#menu');

    btn.on('click', function(){
      if(target.hasClass('active') && !target.is(':animated')) {
        target.slideUp(240, 'easeOutExpo');
      } else if(!target.hasClass('active') && !target.is(':animated')){
        target.slideDown(240, 'easeOutExpo');
      }
      target.toggleClass('active');
      
      return false;
    });

    return false;
  }
  
  /* ---------------------------------------
  Show List
  --------------------------------------- */
  function showList() {
    var target = $('#contents').find('.names');
    var length = target.length;
    
    for(var i = 0; i < length; i++) {
      target.eq(i).stop().delay(45 * (i + 1)).animate({
        'left'    : 0,
        'opacity' : 1
      }, 300, 'easeOutCubic');
    }
    $('.delete').find('a').on('click', deleteData);

    return false;
  }

  /* ---------------------------------------
  Delete Data
  --------------------------------------- */
  function deleteData() {
    var $this  = $(this);
    var id     = String($this.attr('href')).split('#')[1];
    var parent = $this.closest('.data');
    var title  = parent.find('.detail').text();

    if(confirm('「'+ title +'」を削除しますか？')) {
      animDelete(parent);
      
      var data = {
        'table' : 'posts',
        'id'    : id
      };
      useAjax(data, 'delete');
    }

    return false;
  }

  /* ---------------------------------------
  削除アニメーション
  --------------------------------------- */
  function animDelete(p) {

    TweenLite.to(p, 0.35, { ease: Expo.easeOut, left: 100 + '%', onComplete : function(){
      p.remove();
    }});

    return false;
  }

  /* ---------------------------------------
  Ajax
  --------------------------------------- */
  function useAjax(d, file) {
    $.ajax({
      type     : 'POST',
      url      : 'files/library/'+ file +'.php',
      dataType : 'json',
      timeout  : 10000,
      data     : d
    }).done(function(data){
      console.log(data);
    }).fail(function(data){
      alert('失敗しました。');
    });

    return false;
  }
  
  /* ---------------------------------------
  Accordion
  --------------------------------------- */
  function accordion() {

    var _a = _this = {};
    _a.openList = openList;
    
    if($("body").hasClass("noAcc")) return false;
    
    var $parent = $("#contents");

    $parent.find("div.names").on("click", openList);
  
    function openList() {
  
      var $this  = $(this);
      var target = $this.closest(".list");
  
      if(!target.hasClass("active") && !target.find(".contents").is(':animated')) {
        target.addClass("active").find(".contents").slideDown(SPEED, "easeOutExpo");
      } else {
        target.removeClass("active").find(".contents").slideUp(SPEED, "easeOutExpo");
      }
  
      return false;
    }
    
    return _a;
  }
  
  /* ---------------------------------------
  Design for Select
  --------------------------------------- */
  function designSelect() {
    
    var parent = $(".select");
    var btn    = parent.find(".input");
    var target = parent.find("li");
    
    btn.on("click", openSelect);
    target.on("click", selectNames);
    
    function openSelect() {
      
      var $this  = $(this);
      var parent = $this.closest(".select");
      
      if(!parent.hasClass("active")) {
        parent.addClass("active").find("ul").slideDown(SPEED, "easeOutExpo");
      } else {
        parent.removeClass("active").find("ul").slideUp(SPEED, "easeOutExpo");
      }
      
      return false;
    }

    function selectNames() {
      var $this  = $(this);
      var txt    = $this.text();
      var id     = $this.data('id');

      $this.closest(".active").find("li").removeClass("selc");
      $this.addClass("selc");
      $this.closest(".active").find("input").val(txt);
      $this.closest(".active").find(".id").val(id);
      parent.removeClass("active").find("ul").slideUp(SPEED, "easeOutExpo");

      return false;
    }
    
    return false;
  }
  
  /* ---------------------------------------
  Show Search
  --------------------------------------- */
  function showSearch() {
    
    var parent = $("#btnsearch");
    var btn    = parent.find("a");
    
    btn.on("click", searchBox);
    
    function searchBox() {
      
      var $this  = $(this);
      var target = $(".accBox");
      
      if(!$this.hasClass("active")) {
        $this.addClass("active");
        parent.addClass("active");
        target.filter("#search").stop().animate({"top" : 45}, SPEED, 'easeOutExpo');
      } else {
        $this.removeClass("active");
        parent.removeClass("active");
        target.filter("#search").stop().animate({"top" : -30}, SPEED, 'easeOutExpo');
        target.filter("#search").find(".select").removeClass("active").find("ul").slideUp(SPEED);
      }
      
      return false;
    }
    
    return false;
  }

  function changeFocus() {
    var target = $('#data').find('input');

    target.on({
      'focus' : function() {
        $(this).closest('.data').addClass('focus');
      },
      'blur' : function() {
        $(this).closest('.data').removeClass('focus');
      }
    });

    return false;
  }
  
  return _this;
  
})(jQuery,Manager);
