(function($){
	
	window.Manager = {};
	var _ui;
	var fileName = ["exvalidation", "exchecker-ja"];
	var src      = "files/js/";
	
	for(var i = 0; i < fileName.length; i++) {
		writeJS(fileName[i], src);
	}
	
	$(document).ready(function(){
		
		Manager.init();
		validate();
		
		if($("body").attr("id") == "index") {
			$("#regist").find(".submit").find("input").on("click", getThumb);
			//uploadImg();
			changeMode();
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
	
	
	function uploadImg() {
		var URL_BLANK_IMAGE = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
		
		var doc = document;
		
		var elDrop  = doc.getElementById('dropzone');
		var elFiles = doc.getElementById('files');
		
		elDrop.addEventListener('dragover', function(event) {
			event.preventDefault();
			event.dataTransfer.dropEffect = 'copy';
			showDropping();
		});
		
		elDrop.addEventListener('dragleave', function(event) {
			hideDropping();
		});
		
		elDrop.addEventListener('drop', function(event) {
			event.preventDefault();
			hideDropping();
		
			var files = event.dataTransfer.files;
			showFiles(files);
		});
		
		function showDropping() {
			elDrop.classList.add('dropover');
		}
		
		function hideDropping() {
			elDrop.classList.remove('dropover');
		}
		
		function showFiles(files) {
			elDrop.innerHTML = '';
		
			for (var i=0, l=files.length; i<l; i++) {
				var file = files[i];
				var elFile = buildElFile(file);
				elDrop.appendChild(files);
			}
		}
		
		function buildElFile(file) {
			if (file.type.indexOf('image/') === 0) {
					var elImage = doc.createElement('img');
					elImage.src = URL_BLANK_IMAGE;
					elDrop.appendChild(elImage);
		
					attachImage(file, elImage);
			}
		
			return elDrop;
		}
		
		function attachImage(file, elImage) {
				var reader = new FileReader();
				reader.onload = function(event) {
			var src = event.target.result;
			elImage.src = src;
			elImage.setAttribute('title', file.name);
				};
				reader.readAsDataURL(file);
		}
		
		function escapeHtml(source) {
				var el = doc.createElement('div');
				el.appendChild(doc.createTextNode(source));
				var destination = el.innerHTML;
				return destination;
		}
	}
	
	
	return false;
	
})(jQuery);