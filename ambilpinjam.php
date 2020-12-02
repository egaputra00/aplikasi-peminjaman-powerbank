<?php
	if (ISSET($_POST['submitt'])) {
		include 'config.php';
		$kode = $_POST['kode'];
		$keterangan = $_POST['keterangan'];

		echo $kode;
		
		$query = "SELECT * FROM peminjaman WHERE kode_booking = '$kode'";
		$sql = mysqli_query($connect, $query);
		$datapeminjaman = mysqli_fetch_array($sql);

		if($datapeminjaman) {
			switch ($keterangan) {
				case 'Ambil':
						if($datapeminjaman['ambil'] == '0'){
							$query2 = "SELECT * FROM powerbank WHERE id_powerbank LIKE '".$datapeminjaman['id_powerbank']."'";
							$sql2 = mysqli_query($connect, $query2);
							$datapowerbank = mysqli_fetch_array($sql2);
									
							$id = $datapowerbank['id_powerbank'];
							$stocknow = $datapowerbank['stock'] - 1;
							$timestamp = date('Y-m-d H:i:s');

							$updatestock = "UPDATE powerbank SET stock='$stocknow' WHERE id_powerbank=$id";
							$updateST = mysqli_query($connect, $updatestock);

							$updatepickup = "UPDATE peminjaman SET ambil=1 WHERE id_powerbank=$id";
							$updatePIC = mysqli_query($connect, $updatepickup);

							$logpeminjaman = "INSERT INTO detail_peminjaman(id_peminjaman, keterangan, waktu) VALUES('".$datapeminjaman['id_peminjaman']."', '$keterangan', '$timestamp')";
							$log = mysqli_query($connect, $logpeminjaman);
							exit(header("Location: index.php"));
						};
						if($datapeminjaman['ambil'] == '1'){
							?>
								<script>
									alert("no booking sudah di ambil!");
								</script>
							<?php
						};
					break;
				case 'Kembali':
						if($datapeminjaman['ambil'] == '1'){
							$query2 = "SELECT * FROM powerbank WHERE id_powerbank LIKE '".$datapeminjaman['id_powerbank']."'";
							$sql2 = mysqli_query($connect, $query2);
							$datapowerbank = mysqli_fetch_array($sql2);
									
							$id = $datapowerbank['id_powerbank'];
							$idpeminjaman = $datapeminjaman['id_peminjaman'];
							$stocknow = $datapowerbank['stock'] + 1;
							$timestamp = date('Y-m-d H:i:s');

							$updatestock = "UPDATE powerbank SET stock='$stocknow' WHERE id_powerbank=$id";
							$update = mysqli_query($connect, $updatestock);

							$deletepeminjaman = "DELETE FROM detail_peminjaman WHERE id_peminjaman='$idpeminjaman'";
							$deletePEM = mysqli_query($connect, $deletepeminjaman);

							exit(header("Location: index.php"));
						};
						if($datapeminjaman['ambil'] == '0'){
							?>
								<script>
									alert("no booking belum di ambil!");
								</script>
							<?php
						};
					break;
				default:
						
					break;
			}
		}
		if(!$datapeminjaman){
			?>
				<script>
					alert("no booking tidak di temukan!");
				</script>
			<?php
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Peminjaman</title>

</head>
<body style="
				padding: 0px;
			margin:0px;
			font-size: 16px;
">

	<main>
		<section class="" style="
			background-image: url(Style/img/bacgroundPBB.jpg);
			width: 100%;
			height: 100vh;
		">
			<div class="" style="
				width: 80%;
				height: 30% auto;
				background-image: url(Style/img/bacgroundPB.jpg);
				background-size: cover;
				background-repeat: no-repeat;
				background-attachment: fixed;
				position: relative;
				left: 23vh;
				top: 10vh;
				display: flex;
				border-radius: 10px;
			">
				<div style="
					flex: 1;
					margin: 20px 30px 20px 30px;
					padding: 15px;
					background-color: rgba(255, 255, 255, 0.5);
					border-radius: 15px;
				">	

					<h3 style="
						text-align: center;
						font-weight: bold;
						font-size: 18px;
						margin: 0px;
						padding: 0px;
						margin-bottom: 10px;
					">Form Pengambilan dan Pengembalian</h3>
					<!-- buat action methodnya diatur lg -->
					<!-- Ada 2 form type yg atas buat get yang bawah buat post -->

						<form action="ambilpinjam.php" method="post">
						<label>Kode Booking</label><br>
						<input type="text" name="kode" style="
							width: 95%;
				 			outline: none;
				 			border: none;
				 			height: 20px;
				 			padding: 10px;
				 			text-align: center;
				 			border-radius: 20px;
				 			.cursor: not-allowed;
				 			background-color: #f9f9f9;
				 			margin-bottom: 0px;
				 			margin-top: 10px;
						">
						<label for="lpem">Keterangan</label><br>
						<select name="keterangan" style="
							width: 95%;
				 			outline: none;
				 			border: none;
				 			padding: 10px;
				 			border-radius: 20px;
				 			cursor: pointer;
				 			background-color: #f9f9f9;
				 			margin-bottom: 15px;
				 			margin-top: 10px;
						">
							<optgroup label="Opsi Keterangan">
								<option value="Ambil">Pengambilan</option>
								<option value="Kembali">Pengembalian</option>
							</optgroup>
						</select>
						<input type="submit" name="submitt" value="Submit" style="
						width: 20vh;
						position: relative;
						bottom: 20px;
						margin-top: 20px;
						border-radius: 10px;
						margin-bottom: 20px;
						border: none;
						outline: none;
						padding: 5px 10px 5px 10px;
						cursor: pointer;
						background-color: cyan;
						">
					</form>
					
				</div>
				<div style="
					flex: 1;
					margin: 20px 30px 20px 30px;
					padding: 10px;
				">
					<div style="
				position: relative;
				margin-top: 10vh;
				width: 50vh; 	
				padding: 15px;
			">
				<img style="
					width: 20vh;
					height: 20vh;
					margin-left: 15vh;
					border-radius: 90px;
					background-position: center;
					background-size: cover;" src="Style/img/powerbank.jpg">
				<div style="
					color: white;

				">
						<h3 style="text-align: center;">Rent Powerbank</h3>
						<p style="text-align: justify;">We will serve all about your needs in activities, do not let your activities hampered because your battery has run out</p>
				</div>
			</div>
				</div>
			</div>	
		</section>
	</main>
</body>
</html>