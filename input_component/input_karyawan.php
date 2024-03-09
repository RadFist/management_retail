<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="input.css" />
  </head>
  <body>
    <section class="container">
      <header>Input Data Karyawan</header>
      <form action="../logic/input_logic.php" method="POST" class="form">

        <div class="input-box" hidden>
            <label>Id Karyawan</label>
            <input type="number" placeholder="Masukan id Karyawan" value="" />
        </div>
        <div class="input-box">
          <label>Nama</label>
          <input name="nama_karyawan" type="text" placeholder="Masukan nama lengkap" required />
        </div>

        <div class="column">
          <div class="input-box">
            <label>No telepon</label>
            <input name="np" type="number" placeholder="Masukkan nomor telepon" required />
          </div>

          <div class="input-box">
            <label>Tanggal lahir</label>
            <input name="tanggal_lahir" type="date" placeholder="Masukkan tanggal lahir" required />
          </div>
        </div>

        <div class="gender-box">
          <h3>Jenis Kelamin</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="gender" value="Laki-Laki" checked />
              <label for="check-male">Laki Laki</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" value="Perempuan" />
              <label for="check-female">Perempuan</label>
            </div>
          
          </div>
        </div>
        <div class="input-box address">
          <label>Alamat</label>
          <input name="alamat" type="text" placeholder="Masukkan alamat karyawan" required />
        </div>
        <button type="submit" name="submit" value="simpan_karyawan">Submit</button>
      </form>
    </section>
  </body>
</html>