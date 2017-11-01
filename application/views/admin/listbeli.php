<h2 style="color:black">List Penjualan Aktif</h2> <br>
              
              <table style="width:100%">
                <tr>
                    <th style="padding-left:20px;">No</th>
                    <th style="padding-left:20px;">Nama Pembeli </th>
                    <th style="padding-left:20px;">Tanggal Beli</th>
                    <th style="padding-left:20px;">Pembelian</th>
                    <th style="padding-left:20px;">Aksi</th>
                </tr> 
                <?php $no=1; ?>
                <?php foreach($result as $a){ ?>
                <tr>
                    <td><?php echo $no; $no++; ?></td> 
                    <td><?php echo $a->nama; ?> (<?php echo $a->username; ?>)</td>
                    <td><?php echo $a->tanggalPanjang; ?></td>
                    <td><?php echo anchor('home/page/detail/'.$a->iddetail.'/'.$a->tanggal,'Klik Untuk Melihat');?></td>
                    <td style="text-align:center">
                        <?php echo anchor('home/gantiStatus/'.$a->iddetail,'<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Sudah Di Kirim');?><strong> | </strong><?php echo anchor('home/hapusPembeli/'.$a->iddetail,'<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Hapus');?>  </td>
                </tr>
                <?php }?>
              </table><br>
<center>
    <p style="color:black; font-size:15px;"><?php echo $page; ?></p>    
</center> 