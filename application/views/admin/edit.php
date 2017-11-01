<h2 class="hitam">Edit Data</h2>
<center>
<form method="post" action="<?php echo URL.'index.php/Home/selesaiEdit'; ?>">
<?php foreach($edit as $e){ ?>
    <table>
        <tr>
            <td>ID Barang</td>
            <td><input type="text" name="idbarang" value="<?php echo $e->idbarang; ?>" disabled>
                <input type="text" name="idbarang" value="<?php echo $e->idbarang; ?>" hidden></td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td><input type="text" name="nama" value="<?php echo $e->nama; ?>"></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>
            <?php switch($e->kategori) { 
                case'pulsa' :
                echo '<select name="kategori">';
                echo  '<option value="pulsa">Pulsa</option>';
                echo  '<option value="pd">Paket Data</option>';
                echo '</select>';
                break;
                
                default: 
                echo '<select name="kategori">';
                echo  '<option value="pd">Paket Data</option>';
                echo  '<option value="pulsa">Pulsa</option>';
                echo '</select>';
                
            }
                ?>
                
            </td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="harga" value="<?php echo $e->harga; ?>"></td>
        </tr>
        <!--<tr>
            <td>Gambar</td>
            <td><input type="text" name="nama" value="<?php echo $e->gambar; ?>"></td>
        </tr> -->
    </table>
<?php } ?>
        <br>
        <input type="submit" value="Submit" class="hitam">
</form>
</center>