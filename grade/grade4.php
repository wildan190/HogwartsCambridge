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
			$edit = mysqli_query($koneksi, "UPDATE grade4 set
											 	NoKK = '$_POST[tNoKK]',
											 	namasis = '$_POST[tnamasis]',
												alamat = '$_POST[talamat]',
											 	gender = '$_POST[tgender]',
												agama = '$_POST[tagama]',
												walsis = '$_POST[twalsis]',
												tgllhr = '$_POST[ttgllhr]'
											 WHERE id_grade4 = '$_GET[id]'
										   ");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Edit data suksess!');
						document.location='grade4.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='grade4.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO grade4 (NoKK, namasis, alamat, gender, agama,walsis,tgllhr)
										  VALUES ('$_POST[tNoKK]', 
										  		 '$_POST[tnamasis]', 
										  		 '$_POST[talamat]', 
										  		 '$_POST[tgender]',
												 '$_POST[tagama]',
												 '$_POST[twalsis]',
												 '$_POST[ttgllhr]'
												  )
										 ");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='grade4.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='grade4.php';
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
			$tampil = mysqli_query($koneksi, "SELECT * FROM grade4 WHERE id_grade4 = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vNoKK = $data['NoKK'];
				$vnamasis = $data['namasis'];
				$valamat = $data['alamat'];
				$vgender = $data['gender'];
				$vagama = $data['agama'];
				$vwalsis = $data['walsis'];
				$vtgllhr = $data['tgllhr'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM grade4 WHERE id_grade4 = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='grade4.php';
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
	    		<input type="text" name="tNoKK" value="<?=@$vNoKK?>" class="form-control" placeholder="Nomor KK" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Nama Lengkap</label>
	    		<input type="text" name="tnamasis" value="<?=@$vnamasis?>" class="form-control" placeholder="Nama Lengkap" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Alamat</label>
	    		<textarea class="form-control" name="talamat"  placeholder="Alamat"><?=@$valamat?></textarea>
	    	</div>
	    	<div class="form-group">
	    		<label>Jenis Kelamin</label>
	    		<textarea class="form-control" name="tgender"  placeholder="Jenis Kelamin"><?=@$vgender?></textarea>
	    	</div>
			<div class="form-group">
	    		<label>Agama</label>
	    		<textarea class="form-control" name="tagama"  placeholder="Agama"><?=@$vagama?></textarea>
	    	</div>
			<div class="form-group">
	    		<label>Wali Siswa</label>
	    		<textarea class="form-control" name="twalsis"  placeholder="Wali Siswa"><?=@$vwalsis?></textarea>
	    	</div>
			
			<div class="form-group">
	    		<label>Tempat Tanggal Lahir</label>
	    		<input type="text" class="form-control datepicker" name="ttgllhr" require><?=@$vtgllhr?></textarea>
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
	    		$tampil = mysqli_query($koneksi, "SELECT * from grade4 order by id_grade4 desc");
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
	    		<td><?=$no++;?></td>
	    		<td><?=$data['NoKK']?></td>
	    		<td><?=$data['namasis']?></td>
	    		<td><?=$data['alamat']?></td>
	    		<td><?=$data['gender']?></td>
				<td><?=$data['agama']?></td>
				<td><?=$data['walsis']?></td>
				<td><?=$data['tgllhr']?></td>
	    		<td>
	    			<a href="grade4.php?hal=edit&id=<?=$data['id_grade4']?>" class="btn btn-warning"> Update </a><br />
	    			<a href="grade4.php?hal=hapus&id=<?=$data['id_grade4']?>" 
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
	<button type = "logout" class="btn btn-danger"><a style = "text-decoration:none; color:white;" href="grade4.php"</a>Grade 4</button>
	<button type = "logout" class="btn btn-danger"><a style = "text-decoration:none; color:white;" href="grade5.php"</a>Grade 5</button>
	<button type = "logout" class="btn btn-danger"><a style = "text-decoration:none; color:white;" href="grade6.php"</a>Grade 6</button>

	</center>
</div> <br />

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>