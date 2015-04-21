(function($){
	
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
	
})(jQuery);