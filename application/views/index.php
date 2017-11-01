<div class="row">
    <div class="col-md-8 col-md-offset-1">
        <h2>Selamat Datang, <?php echo $user; ?></h2>
    </div>
</div>

<!-- menu random -->
<?php 
$data['asal']='index';
$this->load->view('menuatas',$data); ?>

<hr>
<!-- navbar bawah -->

<?php switch($is_login) {

    case '1':
    ?>
<!-- menu bawah -->
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> | Profile <?php echo '<a href="'.URL.'home/page/cart" alt="cart" class="pull-right"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Cart <span class="badge">'.$badge.'</span></a>'; ?></h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                    
                    <table style="color:black; width:100%; border:2px solid black; text-align:center;" class="wow flipInX" data-wow-delay="0.4s">
                        <tr>
                            <td>Username</td>
                            <td>=</td>
                            <td><?php echo $username ?></td>
                        </tr>
                        <tr>
                            <td>Level</td>
                            <td>=</td>
                            <td><b><?php echo $level ?> </b></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>=</td>
                            <td><?php echo $email ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Handphone</td>
                            <td>=</td>
                            <td><?php echo $nohp ?></td>
                        </tr>
                    </table>
                    <br>
                  <p style="color:black; font-size:15px; font-weight:bolder;">Histori Pembelian</p>
                <table style="color:black; width:100%; border:2px solid black; text-align:center;" class="wow flipInY" data-wow-delay="0.6s">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pembelian</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>

                     <?php  $no = 1;
                            foreach($result as $a) { ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $a->tanggalPanjang; ?></td>
                            <td><?php if($a->status=='TRUE'){ 
                                echo '<p style="color:green"><span class="glyphicon glyphicon-ok" aria-hidden="true"/> </p>';
                                    }
                                    else{
                                echo '<p style="color:red"><span class="glyphicon glyphicon-remove" aria-hidden="true"/> </p>';
                                    } ?>
                                                     </td>
                            <td><?php echo anchor('home/page/detail/'.$a->iddetail.'/'.$a->tanggal,'Klik Untuk Melihat');?></td>
                        </tr>
                    <?php } ?>
                    
                </table>
                <center>
                    <p style="color:black; font-size:15px;"><?php echo $page; ?></p>    
                </center>
                  
                </div>
              
              </div>
          </div>
        </div>
    </div>
    
    
</div>
<?php break;
        
    default:
        
} ?>

<hr class="tebal"/>


<?php $this->load->view('modal'); ?>