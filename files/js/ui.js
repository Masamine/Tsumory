/* =======================================================================
UI
========================================================================== */
(function($,_) {
	
	var _this, _window, SPEED;
	
	(function(){
		
		_.ui    = _this = {};
		_window = $(window);
		SPEED   = 240;
		
	})();
	
	_this.accordion    = accordion;
	_this.designSelect = designSelect;
	_this.showSearch   = showSearch;
	_this.showModal    = showModal;
	
	/* ---------------------------------------
	Accordion
	--------------------------------------- */
	function accordion() {
		
		if($("body").hasClass("noList")) return false;
		
		var $parent = $("#contents");

		$parent.find("div.names").on("click", openList);
	
		function openList() {
	
			var $this  = $(this);
			var target = $this.closest(".list");
	
			if(!target.hasClass("active")) {
				target.addClass("active").find(".contents").slideDown(SPEED);
			} else {
				target.find(".contents").slideUp(SPEED, function(){target.removeClass("active");});
			}
	
			return false;
		}
		
		return false;
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
				parent.addClass("active").find("ul").slideDown(SPEED);
			} else {
				parent.removeClass("active").find("ul").slideUp(SPEED);
			}
			
			return false;
		}

		function selectNames() {
			var $this = $(this);
			var txt    = $this.text();

			$this.closest(".active").find("li").removeClass("selc");
			$this.addClass("selc");
			$this.closest(".active").find("input").val(txt);
			parent.removeClass("active").find("ul").slideUp(SPEED);

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
				target.filter("#search").stop().animate({"margin-top" : -33}, SPEED);
			} else {
				$this.removeClass("active");
				parent.removeClass("active");
				target.filter("#search").stop().animate({"margin-top" : -110}, SPEED);
				target.filter("#search").find(".select").removeClass("active").find("ul").slideUp(SPEED);
			}
			
			return false;
		}
		
		return false;
	}
	
	/* ---------------------------------------
	Show Modal
	--------------------------------------- */
	function showModal() {
		
		var $btn   = $(".radbtn").find("a");
		var parent = $("#all");
		var target = $("#modal");
		
		$btn.on('click', show);
		
		function show() {
			if($(this).hasClass("modal")) {
				target.addClass("active");
				parent.addClass("modal");
				
				$btn.filter(".close").on('click', hide);
				
				return false;
			}
		}
		
		function hide() {
			target.removeClass("active");
			parent.removeClass("modal");
			return false;
		}
		
		return false;
		
	}
	
	return false;
	
})(jQuery,Manager);