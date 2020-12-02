<!DOCTYPE html>
<html>
<head>
	<title>Peminjaman PowerBank</title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body style="
	font-size: 15px;
	font-family: 'poppins';
	padding: 0px;
	margin: 0px;
	background-image: url(Style/img/regis.jpg);
	">
	<div class="container-umum" style="
	width: 100%;
	height: 90vh;
	">
		<div class="cont-login" style="
			width: 100%;
			height: 100%;
			display: flex;
			align-items: center;
			justify-content: center;
		">
		
			<form action="regis.php" method="post" style="
				background-color: rgba(200,2,40,0.3);
				padding: 10px;
				margin: 10px;
				border-radius: 20px;
				width: 60vh;
			">
			<h2 style="
				font-size: 20px;
				color: white;
				letter-spacing: 1px;
				font-weight: bold;
				text-align: center;
			">Registrasi
			 Peminjaman PowerBank</h2>
			<ul style="
				list-style: none;
				font-family: serif;
				font-weight: bold;
				color: white;
			">
				<li style="">
					<label for="fnama">Nama Lengkap</label></br>
					<input type="text" name="nama" placeholder="Username/Email" style="
						outline: none;
						border: none;
						border-radius: 10px;
						font-size: 17px;
						background-color: #f9f9f9;
						padding: 10px 15px 10px 15px;
						margin-top: 5px;
						margin-bottom: 10px;
						width: 80%;
					">
				</li>
				<li style="">
					<label for="fnama">Password</label></br>
					<input type="Password" name="password" placeholder="Password" style="
						outline: none;
						border: none;
						border-radius: 10px;
						font-size: 17px;
						background-color: #f9f9f9;
						padding: 10px 15px 10px 15px;
						margin-top: 5px;
						margin-bottom: 10px;
						width: 80%;
					">
				</li>
				<li>
					<label for="fnama">Email</label></br>
					<input type="email" name="mail" placeholder="Email" style="
						outline: none;
						border: none;
						border-radius: 10px;
						font-size: 17px;
						background-color: #f9f9f9;
						padding: 10px 15px 10px 15px;
						margin-top: 5px;
						margin-bottom: 10px;
						width: 80%;
					">
				</li>
				<li>
					<label for="fnama">Jenis Kelamin</label></br>
					<select name="jk" style="
						outline: none;
						border: none;
						border-radius: 10px;
						font-size: 17px;
						background-color: #f9f9f9;
						padding: 10px 15px 10px 15px;
						margin-top: 5px;
						margin-bottom: 10px;
						width: 80%;
					">
						<optgroup label="Jenis Kelamin" style="
						outline: none;
						border: none;
						border-radius: 10px;
						font-size: 17px;
						background-color: #f9f9f9;
						padding: 10px 15px 10px 15px;
						margin-top: 5px;
						margin-bottom: 10px;
						width: 80%;
					">
						<option value="f" style="
						outline: none;
						border: none;
						border-radius: 10px;
						font-size: 17px;
						background-color: #f9f9f9;
						padding: 10px 15px 10px 15px;
						margin-top: 5px;
						margin-bottom: 10px;
						width: 80%;
					">Wanita</option>
						<option value="m" style="
						outline: none;
						border: none;
						border-radius: 10px;
						font-size: 17px;
						background-color: #f9f9f9;
						padding: 10px 15px 10px 15px;
						margin-top: 5px;
						margin-bottom: 10px;
						width: 80%;
					">Pria</option>
					</optgroup>
					</select>
				</li>
				<li>
					<label for="fnama">No. Handphone</label></br>
					<input type="text" name="notelp" placeholder="No. Handphone" style="
						outline: none;
						border: none;
						border-radius: 10px;
						font-size: 17px;
						background-color: #f9f9f9;
						padding: 10px 15px 10px 15px;
						margin-top: 5px;
						margin-bottom: 10px;
						width: 80%;
					">
				</li>
				
				
			</ul>
			<button type="submit" name="submit" style="
				outline: none;
						border: none;
						border-radius: 10px;
						font-size: 17px;
						background-color: #f9f9f9;
						padding:5px 10px 5px 10px;
						margin-top: 5px;
						margin-bottom: 10px;
						width: 30vh;
						margin-left: 15vh;
						margin-right: 15vh;
						cursor: pointer;

			">Registrasi</button>
			</form>
			
		</div>
	</div>
	<?php
		$nama = $notelp = $mail = $pass = $jenisK = "a";
		if (ISSET($_POST['submit'])) {
			$nama = $_POST['nama'];
			$notelp = $_POST['notelp'];
			$mail = $_POST['mail'];
			$jenisK = $_POST['jk'];
			$pass = $_POST['password'];

			$password = md5($pass);

			include 'config.php';
			$result = mysqli_query($connect, "INSERT INTO user VALUES('','$nama','$password','$jenisK','$mail','$notelp')");
			if ($result){
			?>
			<script>
				alert("Berhasil!");
				window.location.href= 'login.php';
			</script>
			<?php
			}
		}
		// echo $nama;
		// echo $notelp;
		// echo $mail;
		// echo $pass;
		// echo $jenisK;
	?>

</body>
</html>