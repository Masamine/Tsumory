(function($){
	
	window.Manager = {};
	var _ui;
	var fileName = ["exvalidation", "exchecker-ja", "dropify"];
	var src      = "files/js/";
	
	for(var i = 0; i < fileName.length; i++) {
		writeJS(fileName[i], src);
	}
	
	$(document).ready(function(){
		
		Manager.init();
		validate();
		
		if($("body").attr("id") == "index") {
			//$("#regist").find(".submit").find("input").on("click", getThumb);
			//uploadImg();
			changeMode();
			$('.dropify').dropify();
		}
		
		return false;
		
	});
	
	Manager.init = function() {
		_ui       = Manager.ui;
		
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
	Get Thumbnail
	========================================================================== */
	function getThumb() {
		
		var thumb    = $("#dropzone");
		var filename = thumb.find("img").attr("title");
		$("#thumb").val(filename);
		
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
	
	/* =======================================================================
	Change Mode
	========================================================================== */
	function changeMode() {
		
		var btn    = $(".btn");
		var target = $(".box");
		
		btn.on({
			'click' : changeScene
		});
		
		function changeScene() {
			var id     = $(this).attr("id");
			target.fadeOut(150).filter("." + id).delay(150).fadeIn(150);
			$(".formError").fadeOut(150);
			target.find(".err").removeClass("err");
			
			return false;
		}
		
	}
	
	
	
	return false;
	
})(jQuery);