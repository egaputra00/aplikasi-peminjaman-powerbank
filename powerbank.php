<?php
ob_start();

	if (ISSET($_POST['submitt'])){
		 include 'config.php';
		 $merk = $_POST['merkPB'];
		 $hari = $_POST['hari'];
		 $id = $_POST['id'];

		 $jenis = $merk;
	switch ($jenis) {
		case 'Robot1500':
				$jenis=1;
			break;
		case 'Robot5200':
				$jenis=2;
			break;
		case 'Robot11200':
				$jenis=3;
			break;
		case 'Vivan5200':
				$jenis=4;
			break;
		case 'Vivan8400':
				$jenis=5;
			break;
		case 'Vivan10000':
				$jenis=6;
			break;
		case 'Vivan11200':
				$jenis=7;
			break;
		case 'Anker1500':
				$jenis=8;
			break;
		case 'Anker5200':
				$jenis=9;
			break;
		case 'Anker8400':
				$jenis=10;
			break;
		case 'Anker11200':
				$jenis=11;
			break;
		case 'Hippo1500':
				$jenis=12;
			break;
		case 'Hippo5200':
				$jenis=13;
			break;
		case 'Hippo8400':
				$jenis=14;
			break;
		case 'Hippo10000':
				$jenis=15;
			break;
		case 'RavPower1500':
				$jenis=16;
			break;
		case 'RavPower5200':
				$jenis=17;
			break;
		case 'RavPower10000':
				$jenis=18;
			break;
		default:
			$jenis=0;
			break;
	}
	switch ($hari) {
		case '1':
				$hari =1;
			break;
		case '2':
				$hari =2;
			break;
		case '3':
				$hari =3;
			break;
		case '4':
				$hari =4;
			break;
		case '5':
				$hari =5;
			break;
		case '6':
				$hari =6;
			break;
		case '7':
				$hari =7;
			break;
		default:
			$hari =0;
			break;
	}
	 $query = "SELECT * FROM user WHERE id_user = '$id'";
	 $sql = mysqli_query($connect, $query);
	 $datauser = mysqli_fetch_array($sql);
		 
	 $query2 = "SELECT * FROM powerbank WHERE id_powerbank LIKE '%$jenis%'";
	 $sql2 = mysqli_query($connect, $query2);
	 $datapowerbank = mysqli_fetch_array($sql2);
		 
	 $totalharga = $datapowerbank['harga']*$hari;
	 $kodebooking = $datauser['username'].$datapowerbank['id_powerbank'].$hari.date("Ymd");
	 
	 
	 if($datapowerbank['stock'] != "0"){
	 	$query3 = "INSERT INTO peminjaman(id_user,id_powerbank,kode_booking,total_hari,total_harga,ambil) VALUES ($id,{$datapowerbank['id_powerbank']},'$kodebooking','$hari','$totalharga',0)";
		$sql3 = mysqli_query($connect, $query3);
	 }

	 if($datapowerbank['stock'] == "0"){
	 	?>
			<script>
				alert("Stock kosong!");
				window.location.href= 'powerbank.php?id=<?php echo $id ?>';
			</script>
			<?php
	 }

 	}
 ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</head>
<body style=" 
	background-image: url(Style/img/bacgroundPBB.jpg);
	font-family: "comic sans"; 
	">
<main>
	<div class="container-PB" id="PB" style="
		background-image: url(Style/img/bacgroundPB.jpg);
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		background-attachment: fixed;
		display: flex;
		max-width: 80%;
		height: 85vh;
		position: relative;
		left: 20vh;
		border-radius: 15px;
		right: 20vh;
		top: 7vh;
	">
		<section class="cont-form">
			<form id="res" action="powerbank.php" method="post" style="
				background-color: rgba(255,255,255,0.7);
				position: relative;
				width: 60vh;
				margin-left: 60vh;
				padding: 30px;
				margin-bottom: 20px;
				margin-top: 20px;
				border-radius: 10px;
				top: 5vh;
				left: 30vh;
			">
				<h2 id="pb1" style="font-size: 25px; font-weight: bold; text-align: center;">Isi daftar PowerBank</h2>
				 <ul style="
				 	list-style: none;
				 	padding: 0px;
				 	margin:0px;
				 	padding: 10px;
				 ">
				 	<li style="
				 		font-size: 15px;
				 		font-weight: bold;
				 		margin-bottom: 10px;
				 		margin-top: 5px;
				 	">
				 		<label for="fmerk">Merk Powerbank</label><br>
				 		<select class="select" name="merkPB" style="
				 			width: 95%;
				 			outline: none;
				 			border: none;
				 			padding: 10px;
				 			border-radius: 10px;
				 			cursor: pointer;
				 			background-color: #f9f9f9;
				 		">
				 			<optgroup label="Merk Powerbank">
				 				<option value="Robot1500">Robot 1500 mAh</option>
				 				<option value="Robot5200">Robot 5200 mAh</option>
				 				<option value="Robot11200">Robot 11200 mAh</option>
				 				<option value="Vivan5200">Vivan 5200 mAh</option>
				 				<option value="Vivan8400">Vivan 8400 mAh</option>
				 				<option value="Vivan10000">Vivan 10000 mAh</option>
				 				<option value="Vivan11200">Vivan 11200 mAh</option>
				 				<option value="Anker1500">Anker 1500 mAh</option>
				 				<option value="Anker5200">Anker 5200 mAh</option>
				 				<option value="Anker8400">Anker 8400 mAh</option>
				 				<option value="Anker11200">Anker 11200 mAh</option>
				 				<option value="Hippo1500">Hippo 1500 mAh</option>
				 				<option value="Hippo5200">Hippo 5200 mAh</option>
				 				<option value="Hippo8400">Hippo 8400 mAh</option>
				 				<option value="Hippo10000">Hippo 10000 mAh</option>
				 				<option value="RavPower1500">Rav Power 1500 mAh</option>
				 				<option value="RavPower5200">Rav Power 5200 mAh</option>
				 				<option value="RavPower10000">Rav Power 10000 mAh</option>
				 			</optgroup>
				 		</select>
				 	</li>
				 	<li>
				 		<label for="fharga">Hari Peminjaman</label><br>
				 		<input type="number" name="hari" placeholder="Jam Peminjaman Max 7 Hari" min="1" max="7" step="1" class="jam" style="
				 			width: 95%;
				 			outline: none;
				 			border: none;
				 			padding: 10px;
				 			border-radius: 10px;
				 			cursor: pointer;
				 			background-color: #f9f9f9;
				 		">
				 	</li>
					<input type="hidden" name="id" value="<?php echo $id = $_GET['id'] ?>">
				 </ul>

				 <!-- Submit Button -->
				 <input type="submit" class="btn btn-primary" name="submitt" value="Submit" style="
					width: 49%;
					margin-top: 15px;
					border-radius: 10px;
					">
				 <input type="reset" class="btn btn-primary" name="reset" value="Reset" style="
					width: 49%;
					margin-top: 15px;
					border-radius: 10px;
					">
				<button type="button" class="btn btn-primary" name="cetak" data-toggle="modal" data-target="#exampleModal" style="
					width: 100%;
					margin-top: 15px;
					border-radius: 10px;
					">Cetak Pesanan</button>
			</form>

			<!-- Tulisan di kiri -->
			<div style="
				position: relative;
				bottom: 30vh;
				left: 20vh;
				width: 50vh;
				height: 60vh;
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
		</section>

	</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Peminjaman Powerbank</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<?php echo "kode booking : ".$kodebooking; ?><br>	
		<?php echo "Username : ".$datauser['username']; ?><br>	
		<?php echo "Jenis Powerbank : ".$datapowerbank['merk']; ?><br>
		<?php echo "Kapasitas Powerbank : ".$datapowerbank['capacity']. "mAh" ; ?><br>
		<?php echo "Total Hari Pinjaman : ".$hari." hari"; ?><br>
		<?php echo "Total Harga : Rp. ".$totalharga; ?><br>
      </div>

      <!-- Tombol di popup -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit" name="submitModal" class="btn btn-primary">Cetak</button> -->
        <a href="index.php"><input type="submit" class="btn btn-primary" name="submitModal" value="Submit"></a>
      </div>
    </div>
  </div>
</div> 
	<!-- Tempat Nge Query buat ke database setelah Pop Up di setujui datanya -->
	<?php
		if (ISSET($_POST['submitModal'])) {
			
		}
	?>
</main>
</body>
</html>