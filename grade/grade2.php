<?php
	//Koneksi Database
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "hogwarts";

	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

	session_start();


	//jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		//Pengujian Apakah data akan diedit atau disimpan baru
		if($_GET['hal'] == "edit")
		{
			//Data akan di edit
			$edit = mysqli_query($koneksi, "UPDATE grade2 set
											 	kd_mkul = '$_POST[tkd_mkul]',
											 	nama_mkul = '$_POST[tnama_mkul]',
												kd_dosen = '$_POST[tkd_dosen]',
											 	jam = '$_POST[tjam]',
												ruang_kelas = '$_POST[truang_kelas]',
												jumlah_mhs = '$_POST[tjumlah_mhs]',
												tanggal_mulai = '$_POST[ttanggal_mulai]'
											 WHERE id_grade2 = '$_GET[id]'
										   ");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Edit data suksess!');
						document.location='grade2.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='grade2.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO grade2 (kd_mkul, nama_mkul, kd_dosen, jam, ruang_kelas,jumlah_mhs,tanggal_mulai)
										  VALUES ('$_POST[tkd_mkul]', 
										  		 '$_POST[tnama_mkul]', 
										  		 '$_POST[tkd_dosen]', 
										  		 '$_POST[tjam]',
												 '$_POST[truang_kelas]',
												 '$_POST[tjumlah_mhs]',
												 '$_POST[ttanggal_mulai]'
												  )
										 ");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='grade2.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='grade2.php';
				     </script>";
			}
		}


		
	}


	//Pengujian jika tombol Edit / Hapus di klik
	if(isset($_GET['hal']))
	{
		//Pengujian jika edit Data
		if($_GET['hal'] == "edit")
		{
			//Tampilkan Data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM grade2 WHERE id_grade2 = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vkd_mkul = $data['kd_mkul'];
				$vnama_mkul = $data['nama_mkul'];
				$vkd_dosen = $data['kd_dosen'];
				$vjam = $data['jam'];
				$vruang_kelas = $data['ruang_kelas'];
				$vjumlah_mhs = $data['jumlah_mhs'];
				$vtanggal_mulai = $data['tanggal_mulai'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM grade2 WHERE id_grade2 = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='grade2.php';
				     </script>";
			}
		}
	}

?>

<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv = "x-UA-Compatible" content="IE=edge, chrome=1">
    <meta name = "HandleFriendly" content = "true">
	<title>Hogwarts Student Registration</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link href="../assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="../css/datepicker.css">
</head>
<body>

<div class="container">



	<h1 class="text-center">Form Siswa</h1>
	

	<!-- Awal Card Form -->
	<div class="card mt-3">
	  <div class="card-header bg-primary text-white">
	    Form Input Biodata
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>Nomor KK</label>
	    		<input type="text" name="tkd_mkul" value="<?=@$vkd_mkul?>" class="form-control" placeholder="Nomor KK" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Nama Lengkap</label>
	    		<input type="text" name="tnama_mkul" value="<?=@$vnama_mkul?>" class="form-control" placeholder="Nama Lengkap" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Alamat</label>
	    		<textarea class="form-control" name="tkd_dosen"  placeholder="Alamat"><?=@$vkd_dosen?></textarea>
	    	</div>
	    	<div class="form-group">
	    		<label>Jenis Kelamin</label>
	    		<textarea class="form-control" name="tjam"  placeholder="Jenis Kelamin"><?=@$vjam?></textarea>
	    	</div>
			<div class="form-group">
	    		<label>Agama</label>
	    		<textarea class="form-control" name="truang_kelas"  placeholder="Agama"><?=@$vruang_kelas?></textarea>
	    	</div>
			<div class="form-group">
	    		<label>Wali Siswa</label>
	    		<textarea class="form-control" name="tjumlah_mhs"  placeholder="Wali Siswa"><?=@$vjumlah_mhs?></textarea>
	    	</div>
			
			<div class="form-group">
	    		<label>Tempat Tanggal Lahir</label>
	    		<input type="text" class="form-control datepicker" name="ttanggal_mulai" require><?=@$vtanggal_mulai?></textarea>
	    	</div>

			
			<script type="text/javascript">
        	$(function(){
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            	});
        	});
    		</script>

	    	<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
	    	<button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

	    </form>
	  </div>
	</div>
	<!-- Akhir Card Form -->

	<!-- Awal Card Tabel -->
	<div class="card mt-3">
	  <div class="card-header bg-success text-white">
	    Daftar Data Siswa
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">
	    	<tr>
	    		<th>No.</th>
	    		<th>Nomor KK</th>
	    		<th>Nama Lengkap</th>
	    		<th>Alamat</th>
	    		<th>Jenis Kelamin</th>
				<th>Agama</th>
				<th>Wali Siswa</th>
				<th>Tanggal Lahir</th>
	    		<th>Aksi</th>
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from grade2 order by id_grade2 desc");
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
	    		<td><?=$no++;?></td>
	    		<td><?=$data['kd_mkul']?></td>
	    		<td><?=$data['nama_mkul']?></td>
	    		<td><?=$data['kd_dosen']?></td>
	    		<td><?=$data['jam']?></td>
				<td><?=$data['ruang_kelas']?></td>
				<td><?=$data['jumlah_mhs']?></td>
				<td><?=$data['tanggal_mulai']?></td>
	    		<td>
	    			<a href="grade2.php?hal=edit&id=<?=$data['id_grade2']?>" class="btn btn-warning"> Update </a><br />
	    			<a href="grade2.php?hal=hapus&id=<?=$data['id_grade2']?>" 
	    			   onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
	    		</td>
	    	</tr>
	    <?php endwhile; //penutup perulangan while ?>
	    </table>

	  </div>
	</div>
	<!-- Akhir Card Tabel -->
	
	<br />
	<center>
	<button type = "logout" class="btn btn-danger"><a style = "text-decoration:none; color:white;" href="../tambah_siswa.php"</a>Grade1</button>
	<button type = "logout" class="btn btn-danger"><a style = "text-decoration:none; color:white;" href="grade2.php"</a>Grade 2</button>
	<button type = "logout" class="btn btn-danger"><a style = "text-decoration:none; color:white;" href="grade3.php"</a>Grade 3</button>
	<button type = "logout" class="btn btn-danger"><a style = "text-decoration:none; color:white;" href="index.php"</a>Grade 4</button>
	<button type = "logout" class="btn btn-danger"><a style = "text-decoration:none; color:white;" href="index.php"</a>Grade 5</button>
	<button type = "logout" class="btn btn-danger"><a style = "text-decoration:none; color:white;" href="index.php"</a>Grade 6</button>

	</center>
</div> <br />

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>