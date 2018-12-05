<?php session_start();

	if(isset($_SESSION['exists'])){
		unset($_SESSION['exists']);
	}
	if(isset($_SESSION['ava_error'])){
		unset($_SESSION['ava_error']);
	}
	if(isset($_SESSION['pw_error'])){
		unset($_SESSION['pw_error']);
	}
	if(isset($_SESSION['users']['temp'])){
		unset($_SESSION['users']['temp']);
		header ('location: ../asm04.php');
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
	 crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
	 crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<style>
		.no-drop {cursor: no-drop;}
		input{
			display: inline;
		}
		.right{
			text-align: right;
		}
		img{
			width: 200px;
			height: 160px;
		}
	 </style>

</head>

<body>
	<div class="container my-5">
		<h1>Danh sách tài khoản</h1>
		
			<table class="table mt-5">
				<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Tên tài khoản</th>
						<th scope="col">Mật khẩu</th>
						<th scope="col">Họ và tên</th>
						<th scope="col">Giới tính</th>
						<th scope="col">Địa chỉ</th>
						<th scope="col">Ảnh đại diện</th>
						<th scope="col">Sở thích</th>
						<th scope="col">Chức năng</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=0;
					if (isset($_SESSION['users'])){
						foreach ($_SESSION['users'] as $key => $value){ 
							$i++ ;
					
						?>
					<tr>
						<th scope="row">
							<?=$i?>
						</th>
						<td><?=$key?></td>
						<td><?=$value['password']?></td>
						<td><?=$value['name']?></td>
						<td><?=$value['gender']?></td>
						<td><?=$value['location']?></td>
						<td><img src="<?=$value['avatar']?>" alt="Avatar của <?=$value['name']?>"> </td>
						<td><?php 
						
						if ($value['hobbies']!=NULL){
						foreach ($value['hobbies'] as $value){
							echo $value."<br>";
						}}
							?></td>
						<td>
							<form action="../asm04.php" method="POST"><button type="submit" class="btn btn-link" name="delete" value="<?=$key?>"><i class="fas fa-times fa-2x text-danger"></i> Xóa user</button></form>
						</td>
					</tr>
					<?php }}?>
				</tbody>
			</table>

			<a class="btn btn-primary" id="back" href="asm04.php" >Trở về</a>
	</div>

	<?php

			// unset($_SESSION['cart']);

            ?>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
	 crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
	 crossorigin="anonymous"></script>
</body>

</html>