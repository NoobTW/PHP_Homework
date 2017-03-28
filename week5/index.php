<!DOCTYPE html>
<html lang="zh_TW-Hant">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>世界末日</title>
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
		input[type="number"]{
			width: 100%;
			background: transparent;
			border: 0;
			border-bottom: 1px solid #aaa;
			outline: 0;
			padding: .5rem 1rem;
			margin-bottom: .5rem;
		}
		input[type="number"]:focus{
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
	<?php if( !(isset($_POST['month']))) { ?>
		<div class="wrapper bounceInDown animated">
			<header>
				<h1>世界末日</h1>
			</header>
			<div class="container">
				<form action="" method="POST">
					<div class="title required">輸入月份</div>
					<input type="number" name="month" class="textbox" required />
					<div><input type="submit" value="查詢"></div>
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
				<h1>世界末日</h1>
			</header>
			<div class="container">
				<?php date_default_timezone_set('Asia/Taipei'); 
					$month = array('January', 'Febuary', 'March', 'April',
					'May', 'June', 'July', 'August', 'September', 'October',
					'November', 'December');
					if(isset($_POST['month'])){
						if($_POST['month'] > 0 && $_POST['month'] <= 12){
							$month = $month[($_POST['month'] - 1)];
						}else{
							$month = 'ERROR!';
						}
					}else{
						$month = 'ERROR!';
					}
				?>
				<div>您查詢的月份是：
					<div><img src="https://fakeimg.pl/350x200/ff4500/fff/?text=<?php echo $month?>"></div>
				</div>
				<div>現在時間：<?php echo date('Y-m-d H:i:s');?></div>
				<?php 
					$endOfYear = strtotime('2017-12-31 23:59');
					$timeNow = strtotime(date('Y-m-d'));
					$timeDelta = $endOfYear - $timeNow;
					$dTimeDelta = new Datetime();
					$dTimeDelta->setTimestamp($timeDelta);
				?>
				<div>離世界末日還有：<?php echo $dTimeDelta->format('m 個月 d 天 H 時 i 分')?></div>
				<div><input type="submit" value="再查詢一次！" onclick="javascript: history.back();" /></div>
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
