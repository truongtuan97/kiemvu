<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Play Game</title>
	<link rel="stylesheet" href="{{ asset('assets/play-game/assets/css/bootstrap/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/play-game/assets/css/main.css') }}">
</head>
<body>
	<div id="wrapper">
		<div id="box">
			<div class="nav-left">
				<div class="logo npad">
					<a href="#"><img src="{{ asset('assets/play-game/assets/images/logo.png') }}"></a>
				</div>
				<div class="ninfo npad">
					<a href="#"><img src="{{ asset('assets/play-game/assets/images/ic-hotline.png') }}"></a>
					<a href="#"><img src="{{ asset('assets/play-game/assets/images/ic-email.png') }}"></a>
					<a href="#"><img src="{{ asset('assets/play-game/assets/images/btn-nap.png') }}"></a>
				</div>
				<div class="playing-sv d-flex align-items-center justify-content-center">
					<div>
						<p>server đang chơi</p>
						<h5>Kiếm Vũ {{ $serverId }}</h5>
					</div>
				</div>
				<div class="select-sv">
					<select class="form-control">
						<option value="">CHỌN SERVER</option>
					</select>
				</div>
				<div class="nopen">
					<ul>
						<li>
							<p>10H - 20/06: kHAI MỞ S11<br> <b>KIẾM VŨ 3</b></p>
						</li>
						<li>
							<p>10H - 20/06: kHAI MỞ S11<br> <b>KIẾM VŨ 3</b></p>
						</li>
					</ul>
				</div>
				<div class="ntutorial">
					<ul class="d-flex flex-wrap justify-content-between">
						<li><a href="#"><img src="{{ asset('assets/play-game/assets/images/ic-hd.png') }}"></a></li>
						<li><a href="#"><img src="{{ asset('assets/play-game/assets/images/ic-ds.png') }}"></a></li>
						<li><a href="#"><img src="{{ asset('assets/play-game/assets/images/ic-fanpage.png') }}"></a></li>
						<li><a href="#"><img src="{{ asset('assets/play-game/assets/images/ic-hq.png') }}"></a></li>
					</ul>
				</div>
				<div class="nqc text-center mt-2">
					<a href="#"><img src="{{ asset('assets/play-game/assets/images/ic-qc.png') }}"></a>
				</div>				
			</div><!--nav-left-->
			<!-- <a href="javascript:;" class="side-button"><img src="{{ asset('assets/play-game/assets/images/ic-drop.png') }}"></a> -->
			<div class="nav-right" style="width: 100%; height: 100%; position: fixed; top: 0; left: 265px; z-index: 1;">
				<iframe name="main" id="main" src="{{ $loginLink }}" frameborder="0" width="100%" height="100%" align="right">
					<FONT FACE=ARIAL SIZE=3 COLOR="RED">Your Browser doesn't Support Required Component.</FONT>
				</iframe>
			</div>
		</div>

		<div class="show-kichhoat">
			<a href="#"><img src="{{ asset('assets/play-game/assets/images/ic-kichhoat.png') }}"></a>
		</div>
	</div>
</body>
<script src="{{ asset('assets/play-game/assets/js/jquery-3.5.1.min.js') }}"></script>
<script>
	$(document).ready(function($){
		function toggle(id) {
		    var el = document.getElementById(id);
		    var img = document.getElementById("arrow");
		    var box = el.getAttribute("class");
		    if(box == "hide"){
		        el.setAttribute("class", "show");
		    }
		    else{
		        el.setAttribute("class", "hide");
		    }
		}

		$('.side-button').click(function(event) {
			toggle('box');
		});
	});
</script>
</html>