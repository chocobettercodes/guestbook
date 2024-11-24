<?php
// koneksi database
require 'connection.php';

$pesan_gagal  = "";
$pesan_sukses = "";

// mengecek inputan user 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    date_default_timezone_set("Asia/Jakarta");
    // tampung inputan user 
    $nama_user = $_POST['name'];
    $email_user = $_POST['email'];
    $pesan_user = $_POST['pesan'];
    $tglinsert = date('Y-m-d H:i:s');
    
    // var_dump($nama_user, $email_user, $pesan_user);
    // mengecek inputan apakah kosong atau tidak 
    if(!empty($nama_user) && !empty($email_user) && !empty($pesan_user)){
        // insert data ke database 
        $sql = "INSERT INTO tamu (nama_tamu, email_tamu, pesan_tamu, tgl_insert) VALUES ('$nama_user', '$email_user', '$pesan_user', '$tglinsert')";
        if(mysqli_query($conn, $sql)){
            $pesan_sukses = 'Data berhasil di simpan';
        }else{
            $pesan_gagal = 'Data gagal disimpan'. mysqli_connect_error($conn);
        }
    }else{
        $pesan_gagal = 'silahkan diisi dulu ya';
    }
}

// ambil data tamu 
$sql = "SELECT * FROM tamu ORDER BY id DESC";
$hasil = mysqli_query($conn, $sql);

// membuat perulangan foreach 
$data_tamu = mysqli_fetch_all($hasil, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Guest Book</title>
</head>

<body>
    <div class="container-sm">
        <div class="col-md-12">
            <br><br>
            <h5>
                <center>BUKU TAMU SEDERHANA</center>
            </h5>
        </div>

        <div class="col-md-12">
            <form method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email </label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Pesan</label>
                    <textarea class="form-control" id="pesan" name="pesan" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div> <br>

        <!-- alert untuk pesan gagal dan pesan sukses -->
        <?php if(!empty($pesan_sukses)):?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $pesan_sukses; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php elseif(!empty($pesan_gagal)):?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $pesan_gagal; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif;?>

        <div class="container mt-4">
            <h3 class="text-center">Lihat Pesan untuk Kamu
            </h3>
            <!-- Kontainer Scroll -->
            <div class="border p-3" style="max-height: 300px; overflow-y: auto;">
                <!-- menampilkan pesan -->
                <?php if(!empty($data_tamu)): ?>
                <?php foreach($data_tamu as $tamu) :  ?>
                <?php
                    // $insertdate = $tamu['tgl_insert'];
                    // $waktusekarang = time();
                    // $convert_waktu = strtotime($insertdate);
                    // $selisihdetik = $waktusekarang - $convert_waktu;  
                    // $waktu = '';
					// 	if($selisihdetik < 60){
					// 		$waktu = 'Baru saja';
					// 	}else if($selisihdetik < 3600){
					// 		$menit = floor($selisihdetik / 60);
					// 		$waktu = $menit . ' menit yang lalu';
					// 	} elseif ($selisihdetik < 86400) {
					// 		$jam = floor($selisihdetik / 3600);
					// 		$waktu = $jam . ' jam yang lalu';
					// 	} elseif ($selisihdetik < 604800) { // 7 hari = 604800 detik
					// 		$hari = floor($selisihdetik / 86400);
					// 		$waktu = $hari . ' hari yang lalu';
					// 	} else {
					// 		// Jika lebih dari 7 hari, tampilkan tanggal waktu insert
					// 		$waktu = date('d M Y', $convert_waktu);// Format tanggal misalnya: 20 Sep 2024
					// 	}  

                    $insertdate = $tamu['tgl_insert'];  // Ambil waktu insert dari database
$waktusekarang = time();  // Waktu sekarang
$convert_waktu = strtotime($insertdate);  // Konversi waktu insert ke timestamp
$selisihdetik = $waktusekarang - $convert_waktu;  // Hitung selisih detik

$waktu = '';
if($selisihdetik < 60){
    $waktu = 'Baru saja';  // Jika kurang dari 1 menit
} else if($selisihdetik < 3600){
    $menit = floor($selisihdetik / 60);  // Hitung menit yang lalu
    $waktu = $menit . ' menit yang lalu';
} elseif ($selisihdetik < 86400) {  // Kurang dari 1 hari (86400 detik)
    $jam = floor($selisihdetik / 3600);  // Hitung jam yang lalu
    $waktu = $jam . ' jam yang lalu';
} elseif ($selisihdetik < 604800) {  // Kurang dari 1 minggu (604800 detik)
    $hari = floor($selisihdetik / 86400);  // Hitung hari yang lalu
    $waktu = $hari . ' hari yang lalu';
} else {
    // Jika lebih dari 7 hari, tampilkan tanggal penuh
    $waktu = date('d M Y', $convert_waktu);  // Format tanggal misalnya: 20 Sep 2024
}
                ?>
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><?= $tamu['nama_tamu'] ?></h5>
                        <p class="text-muted mb-0" style="white-space: nowrap;"><?= $waktu?></p>
                    </div>
                    <p class="text-muted"><?= $tamu['email_tamu'] ?></p>
                    <p><?= $tamu['pesan_tamu'] ?></p>
                    <hr>
                </div>

                <?php endforeach;?>
                <?php else : ?>
                <div class="mb-3">
                    <h5><i>Belum ada tamu yang mengisi</i></h5>
                </div>
                <?php endif; ?>

            </div>
            <br><br><br>
        </div>

    </div>
    <!-- </div> -->

    <!-- <h3><u>Lihat Pesan Untuk Kamu</u></h3> -->
    <!-- nampilkan pesan -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>