<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center>
      <h2>Rental Motor</h2>
      <table>
            <form action="" method="post">
               <tr>
                  <td>Nama Pelanggan</td>
                  <td>:</td>
                  <td><input type="text" name="nama"></td>
               </tr>
               <tr>
                  <td>Lama Waktu Rental (per hari)</td>
                  <td>:</td>
                   <td><input type="text" name="lamaRental"></td>
               </tr>
               <tr>
                  <td>Jenis Motor</td>
                  <td>:</td>
                  <td>
                     <select name="jenis" required>
                        <option value="Scooter">Scooter</option>
                        <option value="Sport"> Motor Sport</option>
                        <option value="SportTouring">Motor Sport Touring</option>
                        <option value="Cross">MotoCross</option>
                     </select>
                  </td>
               </tr>
               <tr>
                  <td></td>
                  <td></td>
                  <td><input type="submit" value="Submit" name="submit"></td>
               </tr>
            </form>
        </table>
    <div style="border: 1px solid black; width: 40%; padding: 10px; margin: 10px;">
    <?php
        include 'execute.php';
        $proses = new Rental ();
        $proses->setHarga(70000, 90000, 90000, 100000);
        if (isset($_POST['submit'])) {
            $proses->member = $_POST['nama'];
            $proses->jenis = $_POST['jenis'];
            $proses->waktu = $_POST['lamaRental'];

            $proses->pembayaran();;
        }
    ?>
    </div>
    </center>
</body>
</html>

