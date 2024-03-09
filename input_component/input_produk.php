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
        <header>Input Data Produk</header>
        <form action="../logic/input_logic.php" method="POST" class="form">
            <div class="input-box" hidden>
                <label>Id produk</label>
                <input name="id_produk" type="number" placeholder="Masukan id produk" value="" />
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Nama produk</label>
                    <input name="nama_produk" type="text" placeholder="Masukkan nama produk" required />
                </div>

                <div class="input-box">
                    <label>Jumlah produk</label>
                    <input name="jumlah_produk" type="number" placeholder="Masukkan jumlah produk" required />
                </div>

                <div class="input-box">
                    <label>Harga produk</label>
                    <input name="harga_produk" type="number" placeholder="Masukkan harga produk" required />
                </div>

                <button type="submit" name="submit" value="simpan_produk">Submit</button>
        </form>
    </section>
</body>

</html>