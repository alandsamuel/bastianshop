<h2 class="hitam">Cari Pelanggan</h2>
<br>
<form>
<center>
<input type="text" name="issearch" value="1" HIDDEN>
<input type="text" name="search" placeholder="Masukkan Nama Pelanggan Disini" size="100%"/> &nbsp; <input type="submit" value="submit"/>

</center>
</form>
<br><hr><br>
<center>
<table style="width:50%;">
    <tr>
        <th>Nama</th>
        <th>Username</th>
        <th>No-HP</th>
    </tr>
<?php

$issearch=$this->input->get('issearch');
$search = $this->input->get('search');
$hasil = $this->model_user->cariUser($search);
if($issearch==1){
foreach($hasil as $user){ ?>
    <tr>
        <td><?php echo $user->nama; ?></td>
        <td><?php echo $user->username; ?></td>
        <td><?php echo $user->nohp; ?></td>
    </tr>
    
<?php }     
} else {?>

    Masukkan Nama Pelanggan Pada Box Diatas!

<?php } ?>
</table>
</center>