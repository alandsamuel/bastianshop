<h2 class="hitam">Tambah Data</h2>
<center>
<form method="post" action="<?php echo URL.'home/terimaTambah';?>">
    <table>
        <tr>
            <td>ID Barang</td>
            <td><input type="text" name="idbarang" value="p<?php echo $total+1; ?>" disabled>
                <input type="text" name="idbarang" value="p<?php echo $total+1; ?>" hidden></td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td><input type="text" name="nama" placeholder="nama barang" autofocus></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>
                <select name="kategori">
                  <option value="pulsa">Pulsa</option>
                  <option value="pd">Paket Data</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="harga" placeholder="harga (TANPA RP.)"></td>
        </tr>
        <tr>
            <td>Gambar</td>
            <td><select name="gambar">
                  <option value="xl.jpg">XL</option>
                  <option value="3.jpg">3</option>
                  <option value="axis.jpg">Axis</option>
                  <option value="telkomsel.jpg">Telkomsel</option>
                  <option value="indosat.jpg">Indosat</option>
                </select>
            </td>
        </tr>
    </table>
        <br>
        <input type="submit" value="Submit" class="hitam">
</form>
</center>