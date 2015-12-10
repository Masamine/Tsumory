(function($){
	
	window.Manager = {};
	var _ui;
	var fileName = ["plugin/easing", "ui", "plugin/exvalidation", "plugin/exchecker-ja"];
	var src      = "files/js/";
	var isForm   = $('body').hasClass('isForm');
	
	for(var i = 0; i < fileName.length; i++) {
		writeJS(fileName[i], src);
	}
	
	$(document).on('ready', function(){
		
		Manager.init();
		_ui.accordion();
		_ui.designSelect();
		_ui.showSearch();

		if(isForm) validate();
		if($('body').hasClass('user')) $('.dropify').dropify();
		
		return false;
		
	});
	
	Manager.init = function() {
		_ui = Manager.ui;
		return false;
		
	};
	
	/* =======================================================================
	Write JS
	========================================================================== */
	function writeJS(fileName,src) {
		
		document.write('<script src="' + src + fileName + '.js"></script>');
		return false;
		
	}

	/* =======================================================================
	Validate
	========================================================================== */
	function validate() {
		var validation = $("#regist").exValidation({
			customBind : {
			  object   : $("#send"),
			  listener : 'click'
			},
			errTipPos: "right",
			errTipCloseBtn:false
		});
	}
	
	return false;
	
})(jQuery);