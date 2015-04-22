/* =======================================================================
UI
========================================================================== */
(function($,_) {
	
	var _this, _window;
	
	(function(){
		
		_.ui    = _this = {};
		_window = $(window);
		
	})();
	
	_this.accordion    = accordion;
	_this.designSelect = designSelect;
	
	/* -------------------------
	Accordion
	------------------------- */
	function accordion() {
		
		var $parent = $("#contents");

		$parent.find("div.names").on("click", openList);
	
		function openList() {
	
			var $this  = $(this);
			var target = $this.closest(".list");
			var SPEED  = 300;
	
			if(!target.hasClass("active")) {
				target.addClass("active").find(".contents").slideDown(SPEED);
			} else {
				target.find(".contents").slideUp(SPEED, function(){target.removeClass("active");});
			}
	
			return false;
		}
		
		return false;
	}
	
	/* -------------------------
	Design for Select
	------------------------- */
	function designSelect() {
		
		var parent = $(".select");
		var btn    = parent.find("input");
		var target = parent.find("li");
		
		btn.on("click", openSelect);
		target.on("click", selectNames);
		
		function openSelect() {
			
			var $this  = $(this);
			var parent = $this.closest(".select");
			var SPEED  = 300;
			
			if(!parent.hasClass("active")) {
				parent.addClass("active").find("ul").slideDown(SPEED);
			} else {
				parent.removeClass("active").find("ul").slideUp(SPEED);
			}
			
			return false;
		}

		function selectNames() {
			var $this = $(this);
			var txt    = $this.text();

			$this.closest(".active").find("li").removeClass("select");
			$this.addClass("select");
			$this.closest(".active").find("input").val(txt);
			parent.removeClass("active").find("ul").slideUp(300);

			return false;
		}
		
		return false;
	}
	
	return false;
	
})(jQuery,Manager);