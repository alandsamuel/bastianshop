<div class="row">
    <div class="col-md-8 col-md-offset-1">
        <h2>Selamat Datang, <?php echo $user; ?></h2>
    </div>
</div>

<!-- menu random -->
<?php if($level!='Admin'){ ?>
<?php 
$data['asal']='detail';
$this->load->view('menuatas',$data); ?>
<?php }else{ } ?>
<hr>

<!-- menu bawah -->
<div class="row">
    <div class="col-md-8 col-md-offset-2 wow zoomInUp">
        <div class="panel panel-default">
          <div class="panel-heading">
              <h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> | Profile <div class="pull-right"><a href="<?php echo URL.'home/page/index'; ?>">Back</a></div></h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                  <center>
                  <p style="color:black; font-size:26px; font-weight:bolder;">Histori Pembelian</p>
                  </center>    
                  <div class="well">
                   <p style="color:black; font-size:12px;">
                  Tanggal      : <strong><?php echo $tanggal; ?></strong><br>
                  No Handphone : <strong><?php echo $nohp; ?></strong><br>
                  </p>
                  </div>
                <table style="color:black; width:100%; border:2px solid black; text-align:left; text-size:14px;">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                        <?php
                            $default = 0;
                            $delay = 1;
                            $no = 1;
                            $total = 0;
                            $totalr = 0;
                            foreach($detail as $a) {
                            $delay = ($default + 3)/10;
                            $default = $default +2;
                            $qty = $a->qty;
                            $harga = $a->harga;
                            $nama = $a->nama;
                            $totalr = $harga * $qty;
                            $total = $total + $totalr;
                            ?>
                        <tr>
                            <td class="wow fadeIn" data-wow-delay="<?php echo $delay; ?>s"><?php echo $no++; ?></td>
                            <td class="wow fadeIn" data-wow-delay="<?php echo $delay+0.1; ?>s"><?php echo $nama; ?></td>
                            <td class="wow fadeIn" data-wow-delay="<?php echo $delay+0.2; ?>s"><?php echo 'Rp. '.$harga; ?></td>
                            <td class="wow fadeIn" data-wow-delay="<?php echo $delay+0.3; ?>s"><?php echo '<strong>'.$qty.'</strong>';?></td>
                            <td class="wow fadeIn" data-wow-delay="<?php echo $delay+0.4; ?>s"><?php echo 'Rp. '.$totalr; ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2"></td>
                            <td class="wow fadeIn" data-wow-delay="<?php echo $delay+1; ?>s"><b>Total</b></td>
                            <td> </td>
                            <td class="wow fadeIn" data-wow-delay="<?php echo $delay+1.2; ?>s"><?php echo '<strong>Rp. '.$total.'</strong>'; ?></td>
                        </tr>
                    
                </table>
                </div>
              
              </div>
          </div>
        </div>
    </div>
</div>

<hr class="tebal"/>






<!-- Modal -->
<?php $this->load->view('modal'); ?>