<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="indexstyle.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">


    <title></title>
    <style>
      body{
        min-height: 100vh;
      }
    </style>
  </head>
<body>
  <?php 
  session_start();

  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php?pesan=belummasuk");
  }

  ?>
  <?php
  if($_SESSION['level']=="Admin"){
  ?>
 <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
          <a class="navbar-brand" href="#">APLIKASI PEMBAYARAN SPP</a>
            
              <div class="icon ml-auto">
               <h5>
                  <a href="logout.php" class="text-dark"><i class="fas fa-sign-out-alt mr-3 " data-toggle="tooltip" title="Sign Out"></i></a>
                </h5>
              </div>
         
        </nav>

        <div class="row no-gutters mt-5">
          <div class="col-md-2 bg-dark mt-2 pr-3 pt-4 sidebar">
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
            <h3><i class="fas fa-tachometer-alt mr-2"></i>DASHBORD</h3><hr> 
            <div class="row text-white">
              <div class="card bg-info ml-5" style="width: 18rem;">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fas fa-tachometer-alt mr-2"></i>
                    </div>
                   <h5 class="card-title">JUMLAH SISWA</h5> 
                    <div class="display-4">10</div>
                  </div>
                </div>

              <div class="card bg-dark ml-5" style="width: 18rem;">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fas fa-chalkboard-teacher mr-2"></i>
                    </div>
                   <h5 class="card-title">JUMLAH PETUGAS</h5> 
                    <div class="display-4">3</div>
                  </div>
                </div>
                
              <div class="card bg-info ml-5" style="width: 18rem;">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fas fa-list-ol mr-2"></i>
                    </div>
                   <h5 class="card-title">JUMLAH KELAS</h5> 
                    <div class="display-4">3</div>
                  </div>
                </div>
          </div> 
<?php 
}

else if($_SESSION['level']=="Petugas"){

   ?>
   <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
          <a class="navbar-brand" href="#">APLIKASI PEMBAYARAN SPP</a>
            
              <div class="icon ml-auto">
                 <h5>
                  <a href="logout.php" class="text-dark"><i class="fas fa-sign-out-alt mr-3 " data-toggle="tooltip" title="Sign Out"></i></a>
                </h5>
              </div>
         
        </nav>

        <div class="row no-gutters mt-5">
          <div class="col-md-2 bg-dark mt-2 pr-3 pt-4 sidebar">
            <ul class="nav flex-column ml-3 mb-5">
                  
                <li class="nav-item">
                    <a class="nav-link text-white" href=""><i class="fas fa-cash-register mr-2"></i>TRANSAKSI PEMBAYARAN</a><hr class="bg-secondary">
                  </li>
                </ul>
          </div>

          <div class="col-md-10 p-5 pt-4">
            <h3><i class="fas fa-cash-register mr-2"></i>TRANSAKSI PEMBAYARAN</h3><hr> 

            <form action="proses_transaksipetugas.php" method="post">
            <div class="input-group mb-3">
             <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">id Petugas</span>
               </div>
                <input type="text" name="id_petugas" class="form-control" placeholder="id petugas" aria-label="masukkan id petugas" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
             <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">NISN</span>
               </div>
                <input type="text" name="nisn" class="form-control" placeholder="nisn" aria-label="masukkan nisn" aria-describedby="basic-addon1">
                </div>

               <div class="input-group mb-3">
             <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Tanggal Bayar</span>
               </div>
                <input type="date" name="tgl_bayar" class="form-control" placeholder="tgl_bayar" aria-label="tanggal" aria-describedby="basic-addon1">
                </div> 

              <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Bulan Bayar</label>
              </div>
              <select class="custom-select" name= "bulan_dibayar" id="inputGroupSelect01">
                
                <option value="januari">Januari</option>
                <option value="februari">Februari</option>
                <option value="maret">Maret</option>
                <option value="januari">April</option>
                <option value="februari">Mei</option>
                <option value="maret">Juni</option>
                <option value="januari">Juli</option>
                <option value="februari">Agustus</option>
                <option value="maret">September</option>
                <option value="januari">oktober</option>
                <option value="februari">november</option>
                <option value="maret">desember</option>
              </select>
            </div>  

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Tahun Bayar</label>
                </div>
                <select class="custom-select" name="tahun_dibayar" id="inputGroupSelect01">
                  <option selected>--pilih tahun--</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                </select>
              </div>

              <div class="input-group mb-3">
             <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">ID SPP</span>
               </div>
                <input type="text" name="id_spp" class="form-control" placeholder="id spp" aria-label="masukkan id" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
             <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">jumlah</span>
               </div>
                <input type="text" name="jumlah_bayar" class="form-control" placeholder="jumlah bayar" aria-label="masukkan nominal" aria-describedby="basic-addon1">
                </div>

            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-success">Bayar</button>

            </form>
            </div>






            <br/>   




                   <form action="" method="get">
                    <h2>DATA BAYAR SISWA SESUAI NISN</h2>
                      <table class="table">
                      <tr>
                      <td>NISN</td>
                      <td>:</td>
                      <td>
                      <input class="form-control" type="text" name="nisn" placeholder="--Data NISN Lihat Di Form Siswa--">
                      </td>
                      <td>
                      <button class="btn btn-success" type="submit" name="cari">Cari</button>
                      </td>
                      </tr>

                      </table>
                      </form>
                <?php 
                if (isset($_GET['nisn']) && $_GET['nisn']!='') {
                  $query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$_GET[nisn]'");
                  $data = mysqli_fetch_array($query);
                  $nisn = $data['nisn'];
                
                ?>

                <h2>DATA SISWA</h2>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">NISN</th>
                      <th scope="col">NAMA SISWA</th>
                      <th scope="col">ID KELAS</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <td><?php echo $data['nisn']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['id_kelas']; ?></td>
                  </tbody>
                </table>

                <h2>DATA SPP SISWA</h2>
              <table class="table table-striped">
                <thead> 
                  <tr>
                    <th scope="col">Id Pembayaran</th>
                <th scope="col">Id Petugas</th>
               <th scope="col"> NISN</th>
                <th scope="col">Tgl Bayar</th>
                <th scope="col">Bulan Bayar</th>
                <th scope="col">Tahun Bayar</th>
                <th scope="col">id spp</th>
                <th scope="col">Jumlah</th>
                
                  </tr>
                </thead>

                <tbody>
                  <?php 
                  $query = mysqli_query($koneksi,"SELECT * FROM pembayaran WHERE nisn='$data[nisn]' ORDER BY bulan_dibayar ASC");
                  

                  while ($data=mysqli_fetch_array($query)) {
                    echo" <tr>
                          <td>$data[id_pembayaran]</td>
                          <td>$data[id_petugas]</td>
                          <td>$data[nisn]</td>
                          <td>$data[tgl_bayar]</td>
                          <td>$data[bulan_dibayar]</td>
                          <td>$data[tahun_dibayar]</td>
                          <td>$data[id_spp]</td>
                          <td>$data[jumlah_bayar]</td>

                        </tr>";
                  }

                   ?>

                </tbody>

              </table>  
                
    <?php 
    }
    ?>      
        
        </div>




      <?php
  }
else if ($_SESSION['level']=="siswa") {
    
  ?>
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
                    <a class="nav-link text-white" href="transaksi.php"><i class="fas fa-cash-register mr-2"></i>HISTORY PEMBAYARAN</a><hr class="bg-secondary">
                  </li>
                
                </ul>
          </div>
          <div class="col-md-10 p-5 pt-4">
               <h3><i class="fas fa-cash-register mr-2"></i>HISTORY PEMBAYARAN</h3><hr> 


                   <form action="" method="get">
                    <h2>Harap Masukkan Kembali NISN Anda</h2>
                      <table class="table">
                      <tr>
                      <td>NISN</td>
                      <td>:</td>
                      <td>
                      <input class="form-control" type="text" name="nisn" placeholder="--Masukkan NISN--">
                      </td>
                      <td>
                      <button class="btn btn-success" type="submit" name="cari">Cari</button>
                      </td>
                      </tr>

                      </table>
                      </form>
                <?php 
                if (isset($_GET['nisn']) && $_GET['nisn']!='') {
                  $query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$_GET[nisn]'");
                  $data = mysqli_fetch_array($query);
                  $nisn = $data['nisn'];
                
                ?>
                

                <h2>DATA SISWA</h2>
                <table class="table table-striped table-responsive">
                  <thead>
                    <tr>
                      <th scope="col">NISN</th>
                      <th scope="col">NAMA SISWA</th>
                      <th scope="col">ID KELAS</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <td><?php echo $data['nisn']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['id_kelas']; ?></td>
                  </tbody>
                </table>

                <h2>DATA SPP SISWA</h2>
              <table class="table table-striped table-responsive">
                <thead> 
                  <tr>
                    <th scope="col">Id Pembayaran</th>
                <th scope="col">Id Petugas</th>
               <th scope="col"> NISN</th>
                <th scope="col">Tgl Bayar</th>
                <th scope="col">Bulan Bayar</th>
                <th scope="col">Tahun Bayar</th>
                <th scope="col">id spp</th>
                <th scope="col">Jumlah</th>
                
                  </tr>
                </thead>

                <tbody>
                  <?php 
                  $query = mysqli_query($koneksi,"SELECT * FROM pembayaran WHERE nisn='$data[nisn]' ORDER BY bulan_dibayar ASC");
                  $no=1;

                  while ($data=mysqli_fetch_array($query)) {
                    echo" <tr>
                          <td>$no</td>
                          <td>$data[id_petugas]</td>
                          <td>$data[nisn]</td>
                          <td>$data[tgl_bayar]</td>
                          <td>$data[bulan_dibayar]</td>
                          <td>$data[tahun_dibayar]</td>
                          <td>$data[id_spp]</td>
                          <td>$data[jumlah_bayar]</td>

                        </tr>";
                  }

                   ?>

                </tbody>

              </table>  
                
    <?php 
    }
    ?>      
        
        
          </div> 
<?php 
} 
else{
  header("location:index.php?pesan=gagal");
}

?>
    
  
    </div>
</body>
</html>