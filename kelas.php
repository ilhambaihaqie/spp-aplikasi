<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="indexstyle.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">


    <title>Kelas</title>
  </head>
  <body>
     

    <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
          <a class="navbar-brand" href="#">APLIKASI PEMBAYARAN SPP</a>
            
              <div class="icon ml-auto">
               <h5>
                  <a href="logout.php" class="text-dark"><i class="fas fa-sign-out-alt mr-3 " data-toggle="tooltip" title="Sign Out"></i></a>
                </h5>
              </div>
         
        </nav>

     <div class="row no-gutters mt-5">
         <div class="col-md-2 bg-dark mt-2 pr-3 pt-4 ">
            <ul class="nav flex-column ml-3 mb-5">
                  <li class="nav-item">
                    <a class="nav-link active text-white" href="header.php"><i class="fas fa-tachometer-alt mr-2"></i>DASHBORD</a><hr class="bg-secondary">
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active text-white" href="spp.php"><i class="fas fa-chart-line mr-2"></i>SPP</a><hr class="bg-secondary">
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="kelas.php"><i class="fas fa-users mr-2"></i>KELAS</a><hr class="bg-secondary">
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="petugas.php"><i class="fas fa-chalkboard-teacher mr-2"></i>PETUGAS</a><hr class="bg-secondary">
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link text-white" href="siswa.php"><i class="fas fa-user-graduate mr-2"></i>SISWA</a><hr class="bg-secondary">
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="transaksi.php"><i class="fas fa-cash-register mr-2"></i>TRANSAKSI PEMBAYARAN</a><hr class="bg-secondary">
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="laporan.php"><i class="far fa-clipboard mr-2"></i>LAPORAN</a><hr class="bg-secondary">
                  </li>
                </ul>
        </div>

          <div class="col-md-10 p-5 pt-4">
            <h3><i class="fas fa-users mr-2"></i>KELAS</h3><hr> 
              <center><a href="tambah_kelas.php">+ &nbsp; Tambah Kelas</a><center>
    <br/>
    <table class="table table-striped table-responsive">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">NAMA KELAS</th>
      <th scope="col">KOMPETENSI KEAHLIAN</th>
      <th scope="col">AKSI</th>
    </tr>
  </thead>
  <tbody>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
      $query = "SELECT * FROM kelas ORDER BY id_kelas ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['nama_kelas']; ?></td>
          <td><?php echo substr($row['kompetensi_keahlian'], 0, 20); ?></td>
          <td>
              <a href="edit_kelas.php?id=<?php echo $row['id_kelas']; ?>">Edit</a> |
              <a href="proses_hapuskelas.php?id=<?php echo $row['id_kelas']; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
    </tr>
  </tbody>
</table>
   
      </div>          
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="admin.js"></script>
  </body>
</html>