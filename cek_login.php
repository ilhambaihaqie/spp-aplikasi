<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data petugas dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from petugas where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['level']=="Admin"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "Admin";
		$_SESSION['login'] = true;
		// alihkan ke halaman dashboard admin
		header("location:dashboard.php");

	// cek jika user login sebagai petugas
	}else if($data['level']=="Petugas"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "Petugas";
		$_SESSION['login'] = true;
		// alihkan ke halaman dashboard petugas
		header("location:dashboard.php");

	// cek jika user login sebagai petugas
	}else if($data['level']=="siswa"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "siswa";
		$_SESSION['login'] = true;
		// alihkan ke halaman dashboard petugas
		header("location:dashboard.php");
		
	}





	else{

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}

	
}else{
	header("location:index.php?pesan=gagal");
}



?>