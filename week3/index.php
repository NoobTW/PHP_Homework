<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zh_TW-Hant">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>PHP 重修班</title>
	<link rel="stylesheet" href="https://cdn.noob.tw/normalize.css">
	<link rel="stylesheet" href="https://cdn.noob.tw/animate.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/earlyaccess/notosanstc.css">
	<style>
		body{
			background: #59f;
			font-family: 'Noto Sans TC', sans-serif;
		}
		* {
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
		}
		.wrapper{
			font-size: 1.2rem;
			color: #333;
			margin: 0 auto;
			text-align: center;
			max-width: 500px;
		}
		.container{
			padding: 1rem;
			padding-top: 1.5rem;
			box-shadow: 5px 5px 15px 3px #777;
			background: #eee;
		}
		.title{
			text-align: left;
			font-size: .9rem;
		}
		input[type="text"]{
			width: 100%;
			background: transparent;
			border: 0;
			border-bottom: 1px solid #aaa;
			outline: 0;
			padding: .5rem 1rem;
			margin-bottom: .5rem;
		}
		input[type="text"]:focus{
			border-bottom: 1px solid #333;
		}
		.required:after{
			content: '*';
			font-size: .8rem;
			padding-left: .5rem;
			color: red;
		}
		input[type="submit"]{
			background: #fff;
			outline: 0;
			border: 1px solid #333;
			padding: .5rem 1rem;
			margin-top: 1rem;
		}
		input[type="submit"]:hover{
			background: #ddd;
			cursor: pointer;
		}
		#background{
			position: fixed;
			bottom: .5rem;
			right: 2rem;
			opacity: .5;
		}
		.container li{
			text-align: left;
			line-height: 1.2rem;
		}
		#background.reverse{
			left: 2rem;
			right: auto;
		}
		.reverse img{
			-moz-transform: scaleX(-1);
			-o-transform: scaleX(-1);
			-webkit-transform: scaleX(-1);
			transform: scaleX(-1);
			filter: FlipH;
			-ms-filter: "FlipH";
		}
	</style>
</head>
<body>
	<?php if( !(isset($_POST['student_id']) && isset($_POST['name']))) { ?>
		<div class="wrapper bounceInDown animated">
			<header>
				<h1>PHP 重修報名</h1>
			</header>
			<div class="container">
				<form action="" method="POST">
					<div class="title required autofocus">學號</div>
					<input type="text" name="student_id" required/>
					<div class="title required">姓名</div>
					<input type="text" name="name" required/>
					<div class="title">有什麼想對丁丁說</div>
					<input type="text" name="opition">
					<div><input type="submit" value="報名"></div>
				</form>
			</div>
			<footer>

			</footer>
		</div>
		<div id="background" class="animated slideInRight">
			<img src="http://dia.nuk.edu.tw/upload/teach/61/5581442a1b1cf1312da1b1ab4edd2341cfde0e29.jpg" alt>
		</div>
	<?php }else{?>
		<div class="wrapper bounceInDown animated">
			<header>
				<h1>PHP 重修報名</h1>
			</header>
			<div class="container">
				你已經成功報名 PHP 重修班，相信丁丁會很開心的。報名資料：
				<ul>
					<li><span class="title">姓名：</span><?php echo isset($_POST['name']) ? $_POST['name'] : "-未輸入-" ?></li>
					<li><span class="title">學號：</span><?php echo isset($_POST['student_id']) ? $_POST['student_id'] : "-未輸入-" ?></li>
					<li><span class="title">想對丁丁說的話：</span><?php echo isset($_POST['opition']) ? $_POST['opition'] : "-未輸入-" ?></li>
					<?php
						if(isset($_SESSION['student_id'])){
							if($_SESSION['student_id'] == $_POST['student_id']){
								$_SESSION['times']++;
								if($_SESSION['times'] > 1){?>
					<li>你已經報名了<?php echo $_SESSION['times']?>年</li>
								<?php }
							}else{
								$_SESSION['times'] = 1;
							}
						}
						$_SESSION['student_id'] = $_POST['student_id'];
					?>
				</ul>
				<div><input type="submit" value="再報名一次！" onclick="javascript: history.back();" /></div>
			</div>
			<footer>

			</footer>
		</div>
		<div id="background" class="animated slideInLeft reverse">
			<img src="http://dia.nuk.edu.tw/upload/teach/61/5581442a1b1cf1312da1b1ab4edd2341cfde0e29.jpg" alt>
		</div>
	<?php }?>
</body>
</html>