<?php
ob_start();

	if (ISSET($_POST['submitt'])){
		 include 'config.php';
		 $username = $_POST['nama'];
		 $pass = $_POST['password'];

		 $password = md5($pass);
		 $query = "SELECT * FROM user WHERE username='$username' and password='$password'";
		 $sql = mysqli_query($connect, $query);
		 $result = mysqli_fetch_array($sql);

		 $id=$result['id_user'];
			 
		if (!$result){
		?>
		<script>
			alert("Gagal!");
		</script>
		<?php
		}
		
		if ($result){?>
			<script>
				alert("Berhasil!");
				window.location.href= 'powerbank.php?id=<?php echo $id ?>';
			</script><?php
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
			<form id="res" action="login.php" method="post" style="
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
				<h2 id="pb1" style="font-size: 25px; font-weight: bold; text-align: center;">Login User</h2>
				 <ul style="
				 	list-style: none;
				 	padding: 0px;
				 	margin:0px;
				 	padding: 10px;
				 ">
				 	<li style="">
						<label for="fnama">Username</label><br />
						<input type="text" name="nama" placeholder="Username" style="
							outline: none;
							border: none;
							border-radius: 10px;
							font-size: 17px;
							background-color: #f9f9f9;
							padding: 10px 15px 10px 15px;
							margin-top: 5px;
							margin-bottom: 10px;
							width: 95%;
						">
					</li>
				 	<li style="">
						<label for="fnama">Password</label><br />
						<input type="Password" name="password" placeholder="Password" style="
							outline: none;
							border: none;
							border-radius: 10px;
							font-size: 17px;
							background-color: #f9f9f9;
							padding: 10px 15px 10px 15px;
							margin-top: 5px;
							margin-bottom: 10px;
							width: 95%;
						">
					</li>
				 </ul>

				 <!-- Submit Button -->
				 <input type="submit" class="btn btn-primary" name="submitt" value="Login" style="
					width: 49%;
					margin-top: 15px;
					border-radius: 10px;
					">
				 <a href="index.php"><input type="button" class="btn btn-primary" name="reset" value="Batal" style="
					width: 49%;
					margin-top: 15px;
					border-radius: 10px;
					"></a>
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
						<h3 style="text-align: center;">Login User</h3>
						<p style="text-align: center;">Silahkan login dahulu sebelum memesan!<br>Belum terdaftar ? <a href="regis.php" style="color: #f1c40f">Daftar disini</a></p>
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
		<?php echo "Username : ".$username; ?><br>	
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