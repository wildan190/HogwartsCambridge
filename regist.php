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
			$edit = mysqli_query($koneksi, "UPDATE tmhs set
											 	kd_mkul = '$_POST[tkd_mkul]',
											 	nama_mkul = '$_POST[tnama_mkul]',
												kd_dosen = '$_POST[tkd_dosen]',
											 	jam = '$_POST[tjam]',
												ruang_kelas = '$_POST[truang_kelas]',
												jumlah_mhs = '$_POST[tjumlah_mhs]',
												tanggal_mulai = '$_POST[ttanggal_mulai]'
											 WHERE id_tmhs = '$_GET[id]'
										   ");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Edit data suksess!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='index.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO tmhs (kd_mkul, nama_mkul, kd_dosen, jam, ruang_kelas,jumlah_mhs,tanggal_mulai)
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
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='index.php';
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
			$tampil = mysqli_query($koneksi, "SELECT * FROM tmhs WHERE id_tmhs = '$_GET[id]' ");
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
			$hapus = mysqli_query($koneksi, "DELETE FROM tmhs WHERE id_tmhs = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='index.php';
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
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="css/datepicker.css">
</head>
<body>

<div class="container">



	<h1 class="text-center">Form Registrasi</h1>
	

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

	
	
	<br />
	<center>
	<button type = "logout" class="btn btn-danger"><a style = "text-decoration:none; color:white;" href="index.php"</a>Kembali</button>
    <button type = "logout" class="btn btn-danger"><a style = "text-decoration:none; color:white;" href="studentView.php"</a>Lihat Data</button>
	</center>
</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>