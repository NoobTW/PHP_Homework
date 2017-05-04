<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php
		// var_dump($_FILES);
		$count = count($_FILES);
		for($i=1;$i<=$count;$i++){
			$f = $_FILES["file".$i];
			echo $f["name"]. "<br>";
			echo $f["size"] . "<br>";
			echo $f["type"] . "<br>";
			move_upload_file($f['tmp_name'], './uploads/'.$f['name']);
		}
	?>
	

</body>
</html>
