<?php
include 'config.php';
?>

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
		
			<form action="tabel.php" method="get" style="
				background-color: rgba(200,2,40,0.3);
				padding: 10px;
				border-radius: 20px;
				width: 60vh;
			">
			<h2 style="
				font-size: 20px;
				color: white;
				letter-spacing: 1px;
				font-weight: bold;
				text-align: center;
			">Pencarian Powerbank</h2>
			<ul style="
				list-style: none;
				font-family: serif;
				font-weight: bold;
				color: white;
			">
				<li style="">
							
<center>
				<form action="tabel.php" method="get" style="margin-top: 5px;">
					 <input type="text" name="cari">
					 <input type="submit" value="Cari">
				</form>
			</center>
				</li>
				<li style="margin-top: 10px;">
					<table width='94%' border="1" style="background-color:#34495e; ">
						    <tr>
						        <th>Merk</th> <th>Capacity</th> <th>Harga</th> <th>Stock</th>
						    </tr>
						    <?php  
							    if(isset($_GET['cari'])){
							    	$cari = $_GET['cari'];
							  		$query = "SELECT * FROM powerbank where merk LIKE '$cari'";
									$sql = mysqli_query($connect, $query);

								    while($datapowerbank = mysqli_fetch_array($sql)) {


							        echo "<tr>";
							        echo "<td>".$datapowerbank['merk']."</td>";
							        echo "<td>".$datapowerbank['capacity']."</td>";
							        echo "<td>".$datapowerbank['harga']."</td>";
							        echo "<td>".$datapowerbank['stock']."</td>";
							        echo "</tr>";       
							    }   
							 }else{
							 		$query = "SELECT * FROM powerbank";
									$sql = mysqli_query($connect, $query);

								    while($datapowerbank = mysqli_fetch_array($sql)) {


							        echo "<tr>";
							        echo "<td>".$datapowerbank['merk']."</td>";
							        echo "<td>".$datapowerbank['capacity']."</td>";
							        echo "<td>".$datapowerbank['harga']."</td>";
							        echo "<td>".$datapowerbank['stock']."</td>";
							        echo "</tr>";       
							    } 
							}
						    ?>
				</table>
				</li>
				<li style="margin-top: 10px;">
					<h2 style="
						font-size: 20px;
						color: white;
						letter-spacing: 1px;
						font-weight: bold;
						text-align: center;
					">List User</h2>
				</li>
				<li style=""><center>
					<table width='65%' border="1" style="background-color:#34495e; ">
						    <tr>
						        <th>Username</th> <th>Gender</th>
						    </tr>
						    <?php  
						    	$query1 = "SELECT * FROM user";
								$sql1 = mysqli_query($connect, $query1);

							    while($datauser = mysqli_fetch_array($sql1)) {


						        echo "<tr>";
						        echo "<td>".$datauser['username']."</td>";
						        echo "<td>".$datauser['gender']."</td>";
						        echo "</tr>"; 
							}
						    ?>
					</table></center>
			</li>
			</ul>
			</form>
			
		</div>
	</div>

</body>
</html>