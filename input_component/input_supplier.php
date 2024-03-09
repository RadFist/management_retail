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
      <header>Input Data Supplier</header>
      <form action="../logic/input_logic.php" method="POST" class="form">

        <div class="input-box" hidden>
            <label>Id Supplier</label>
            <input type="number" placeholder="Masukan id supplier" value="" />
        </div>

        <div class="input-box">
          <label>Nama</label>
          <input name="name_supplier" type="text" placeholder="Masukan nama lengkap" required />
        </div>

        <div class="column">
          <div class="input-box">
            <label>No telepon</label>
            <input name="np" type="number" placeholder="Masukkan nomor telepon" required />
          </div> 
        </div>
        <div class="input-box address">
          <label>Alamat</label>
          <input name="alamat" type="text" placeholder="Masukkan alamat anda" required />
        </div>
        <button type="submit" name="submit" value="simpan_supplier">Submit</button>
      </form>
    </section>
  </body>
</html>