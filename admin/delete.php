<?php
session_start();
include '../dbconnect.php';
	if(!isset($_SESSION['log'])){
		header('location: ../index.php');
	} else {

	};
	if($_SESSION['role']=='Member'){
		header('location:../index.php');
	} else {
	};

//jika benar mendapatkan GET id dari URL
if(isset($_GET['id'])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$id = $_GET['id'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($conn, "SELECT * FROM produk WHERE idproduk='$id'") or die(mysqli_error($conn));
  $data = mysqli_fetch_assoc($cek);
	$nama = $data['namaproduk'];

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($conn, "DELETE FROM produk WHERE idproduk='$id'") or die(mysqli_error($conn));
		$incre = mysqli_query($conn, "ALTER TABLE produk AUTO_INCREMENT = 0") or die(mysqli_error($conn));
		$file = '.jpg';
		unlink("../produk/".$nama.$file);
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="produk.php"; </script>';

		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="produk.php";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="produk.php";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="produk.php";</script>';
}

?>
