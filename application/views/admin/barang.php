<center>
    <table style="width:100%;">
    
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>kategori</th>
            <th style="text-align:center;">Aksi</th>
        </tr>
        <?php $no = 1; ?>
        <?php foreach($result as $b){ ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $b->nama; ?></td>
            <td>Rp. <?php echo $b->harga; ?></td>
            <td><?php echo $b->kategori; ?></td>
            <td><?php echo anchor('home/page/admin/edit/'.$b->idbarang, 'Edit'); ?> | <?php echo anchor('home/page/admin/hapus/'.$b->idbarang, 'Hapus'); ?> </td>
        </tr>
        <?php $no ++; } ?>
    </table>
    <br>
    <p style="color:black; font-size:15px;"><?php echo $page; ?></p>
</center>