<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="Dynamic File Uploader to upload file with real time upload progress, total size of file etc.">
	<meta name="keywords" content="dynamic, uploader, upload, file, realtime, progress, procces, size, etc.">
	<meta name="author" content="Md. Saifur Rahman and Shakil Ahmed">
	<meta property="og:image" content="https://i.ibb.co/HtqRhv3/logo.png">
	<title>Dynamic File Uploader</title>
	<link rel="shortcut icon" href="https://i.ibb.co/k6ZrV5t/icons8-upload-64.png" type="image/x-icon">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;700&display=swap">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<style>
	

	body {
		background: linear-gradient(65deg, #686de0, #6c5ce7) no-repeat;
		min-height: calc(100vh - 16px);
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
		font-family: 'Comfortaa', cursive;
		line-height: 1.5;
		letter-spacing: 2px;
	}

	.container {
		width: 70%;
		margin: 0 auto;
	}

	a {
		color: #bdc3c7;
		text-decoration: none;
		-webkit-transition: ease all 0.3s;
		transition: ease all 0.3s;
	}

	a:hover {
		color: #ecf0f1;
	}

	.section {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		justify-content: center;
		-webkit-box-align: center;
		-ms-flex-align: center;
		align-items: center;
		text-align: center;
		-webkit-box-orient: vertical;
		-webkit-box-direction: normal;
		-ms-flex-direction: column;
		flex-direction: column;
	}

	.section .title {
		color: #ecf0f1;
		text-transform: capitalize;
		font-weight: 700;
	}

	.section .white {
		color: #ecf0f1;
	}

	.section form {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		min-height: 65vh;
		overflow: hidden;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		justify-content: center;
		-webkit-box-align: center;
		-ms-flex-align: center;
		align-items: center;
		-webkit-box-orient: vertical;
		-webkit-box-direction: normal;
		-ms-flex-direction: column;
		flex-direction: column;
	}

	.section form span.label {
		color: #ecf0f1;
		margin: 10px 0;
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		text-transform: capitalize;
	}

	.section form label.file{
		cursor: pointer;
	}

	.section form label.file .fas {
		color: #ecf0f1;
	}

	.section form label.file .block {
		display: block;
		margin: 10px 0;
	}

	.section form .preview {
		height: auto;
		width: 10vw;
		margin: 5px 0;
	}

	.section form input[type=file] {
		visibility: hidden;
	}

	.section form .submit {
		border: 1px solid #ecf0f1;
		background: transparent;
		color: #ecf0f1;
		padding: 10px 20px;
		font-size: 17px;
		letter-spacing: 2px;
		-webkit-transition: ease all 0.3s;
		transition: ease all 0.3s;
		margin: 20px 0;
		cursor: pointer;
		outline: none;
	}

	.section form .submit:hover {
		background: #ecf0f1;
		border: 1px solid transparent;
		color: #2c3e50;
	}

	.section form .show {
		visibility: visible;
	}

	.section form .hide {
		visibility: hidden;
	}

	.section form #pass{
		width: 70%;
	}

	@-webkit-keyframes progress-bar-stripes {
		from {
			background-position: 40px 0;
		}

		to {
			background-position: 0 0;
		}
	}

	@keyframes progress-bar-stripes {
		from {
			background-position: 40px 0;
		}

		to {
			background-position: 0 0;
		}
	}

	.section form div .progress {
		width: 100%;
		min-height: 20px;
		overflow: hidden;
		background: #f5f5f5;
		-webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
		box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
	}

	.section form div .progress-bar {
		width: 70%;
		height: 100%;
		font-size: 16px;
		padding: 5px 0;
		color: #fff;
		text-align: center;
		background-color: #a29bfe;
		-webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
		box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
		-webkit-transition: width .6s ease;
		transition: width .6s ease;
	}

	.section form div .progress-bar-striped,
	.section form div .progress-striped .progress-bar {
		background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
		background-size: 40px 40px;
	}

	.section form div .progress-bar.active,
	.section form div .progress.active .progress-bar {
		-webkit-animation: progress-bar-stripes 2s linear infinite;
		animation: progress-bar-stripes 2s linear infinite;
	}

	.section form div .progress-bar-success {
		background-color: #5cb85c !important;
	}

	.section form div .progress-striped .progress-bar-success {
		background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
	}

	.section .credit {
		height: 10vh;
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-align: end;
		-ms-flex-align: end;
		align-items: flex-end;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		justify-content: center;
		overflow: hidden;
	}

	.section .credit span {
		color: #ecf0f1;
		text-transform: capitalize;
	}

	</style>
</head>
<body>

	<div class="section">
		<div class="container">
			<h1 class="title">dynamic file uploader</h1>

			<form method="POST" id="upload_form" enctype="multipart/form-data">
				<span class="label">tap the plus icon to choose file</span>
				<input type="file" name="file[]" id="file" class="file" data-multiple-caption="{count} files are selected" multiple>

				<label for="file" class="file" >
					<span class="block white">No file is chosen</span>
					<i class="fas fa-plus-circle fa-2x"></i>
				</label>


				<!-- <img id="uploadPreview" class="preview" id="preview"> -->

				<button type="button" value="Upload" class="submit" id="submit">Upload</button>
                
				<div id="pass">
				
				</div>
			</form>
			
			

			<div class="credit">
				<span>copyright &copy; 2020. all right reserved by <a href="#">Codebumble Inc.</a></span>
			</div>
		</div>
	</div>

	<!-- <script src="app.js"></script> -->

	<script>
		// Files Counter
		(function (document, window, index) {
			var inputs = document.querySelectorAll('.file');
			Array.prototype.forEach.call(inputs, function (input) {
				var label = input.nextElementSibling,
					labelVal = label.innerHTML;

				input.addEventListener('change', function (e) {
					var fileName = '';
					if (this.files && this.files.length > 1)
						fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}',
							this.files.length);
					else
						fileName = e.target.value.split('\\').pop();

					if (fileName)
						label.querySelector('span').innerHTML = fileName;
					else
						label.innerHTML = labelVal;
				});

				// Firefox bug fix
				input.addEventListener('focus', function () {
					input.classList.add('has-focus');
				});
				input.addEventListener('blur', function () {
					input.classList.remove('has-focus');
				});
			});
		}(document, window, 0));


	// Preview

	// document.getElementById("file").addEventListener("change", function(){
	// 	var oFReader = new FileReader();
	// 	oFReader.readAsDataURL(document.getElementById("file").files[0]);

	// 	oFReader.onload = function (oFREvent) {
	// 		document.getElementById("uploadPreview").src = oFREvent.target.result;
	// 	};
	// })

	// Progress Bar
	function _(el) {
		return document.getElementById(el);
	}

	document.getElementById("submit").addEventListener("click", function () {
		$("#pass").html("");
		
        var input = document.getElementById('file');
        console.log(input.files.length);
        for (var i = 0; i < input.files.length; ++i) {
            $("#pass").append("<div class=\"progress\" id=\"progress-bar-sh-"+i+"\"><div id=\"myBar-"+i+"\" class=\"progress-bar progress-bar-striped active\" style=\"width:0%\">0%</div></div><div id=\"stats-"+i+"\" class=\"white\"><h3 id=\"status-"+i+"\"></h3><p id=\"loaded_n_total-"+i+"\"></p><p id=\"shakil-"+i+"\">Uploaded: <span id=\"n_loaded-"+i+"\"></span> / <span></span><span id=\"n_total-"+i+"\"></span><span id=\"n_per-"+i+"\"></span></p></div>");
	
            		var file = _("file").files[i];
		// alert(file.name+" | "+file.size+" | "+file.type);
		var formdata = new FormData();
		formdata.append("file", file);
		var ajax = new XMLHttpRequest();
		ajax.upload.addEventListener("progress", progressHandler.bind(null, i), false);
		ajax.addEventListener("load", completeHandler.bind(null, i), false);
		ajax.addEventListener("error", errorHandler.bind(null, i), false);
		ajax.addEventListener("abort", abortHandler.bind(null, i), false);
		ajax.open("POST", "dependency.php");
		ajax.send(formdata);
           }

	});
	
	function progressHandler(num,event) {
	    	var link = document.getElementById("status-"+num);
		var elem = document.getElementById("myBar-"+num);
		
		var percent = (event.loaded / event.total) * 100;
		var width = Math.round(percent);

		var frame = Math.round(percent);
		var id = setInterval(frame, 100);

		elem.style.width = width + '%';
		elem.innerHTML = width * 1 + '%';


		var load = (event.loaded / (1024 * 1024));
		var loaded = Math.round(load);

		var total = (event.total / (1024 * 1024));
		var totalr = Math.round(total);
		
		_("n_total-"+num).innerHTML = +totalr + " MB";
		_("n_loaded-"+num).innerHTML = +loaded + " MB";
		_("n_per-"+num).innerHTML = " (" + width + "%)";
		if(width == 100){
			elem.classList.add("progress-bar-success");
			elem.innerHTML = "Complete";
			link.classList.remove("hide");
			link.classList.add("show");
		}
	}

	document.getElementById("file").addEventListener("click",function() {
		$("#pass").html("");
		
});

	function completeHandler(num,event) {
	    $("#progress-bar-sh-"+num).css({ display: "none" });
	     $("#loaded_n_total-"+num).css({ display: "none" });
	     $("#shakil-"+num).css({ display: "none" });
		_("status-"+num).innerHTML = event.target.responseText;
		// _("progressBar").value = 0;
		
	}

	function errorHandler(num,event) {
	    $("#progress-bar-sh-"+num).css({ display: "none" });
	     $("#loaded_n_total-"+num).css({ display: "none" });
	     $("#shakil-"+num).css({ display: "none" });
		_("status-"+num).innerHTML = "Upload Failed";
	}

	function abortHandler(num,event) {
	    $("#progress-bar-sh-"+num).css({ display: "none" });
	     $("#loaded_n_total-"+num).css({ display: "none" });
	     $("#shakil-"+num).css({ display: "none" });
		_("status-"+num).innerHTML = "Upload Aborted";
	}
	
	</script>
	<script src="https://kit.fontawesome.com/6b46e3b6bd.js" crossorigin="anonymous"></script>
</body>
</html>
<!-- <script>
    var elem = document.getElementsByTagName("div")[6];
    elem.remove();
</script> -->
