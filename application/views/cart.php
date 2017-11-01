<div class="row">
    <div class="col-md-8 col-md-offset-1">
        <h2>Selamat Datang, <?php echo $user; ?></h2>
    </div>
</div>

<!-- navbar bawah -->

<?php switch($is_login) {

    case '1':
    ?>
<!-- menu bawah -->
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
              <h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> | Profile<div class="pull-right"><a href="<?php echo URL.'home/page/index/'?>"><< Kembali Ke Menu</a></div></h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                  <br>
                  <a href="<?php echo URL.'home/clear/'?>" class="pull-right">Clear Cart</a>
                  <?php echo form_open('home/selesai'); ?>

                        <table cellpadding="6" cellspacing="1" style="width:100%" border="0" >

                        <tr>    
                                <th>Hapus</th>
                                <th>QTY</th>
                                <th>Nama Barang</th>
                                <th style="text-align:right">Harga</th>
                                <th style="text-align:right">Sub-Total</th>
                        </tr>

                        <?php $i = 1; ?>

                        <?php foreach ($this->cart->contents() as $items): ?>

                                <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

                                <tr>
                                        <td><?php echo anchor('home/cartDelete/'.$items['rowid'],'X'); ?>
                                        </td>
                                        <td>
                                        <input type="text" name="qty<?php echo $i;?>" size="3"  value="<?php echo $items['qty']; ?>" DISABLED>&nbsp;
                                        <?php echo anchor('home/qtyPlus/'.$items['rowid'].'/'.$items['qty'],'<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>'); ?>
                                        <?php echo anchor('home/qtyMin/'.$items['rowid'].'/'.$items['qty'],'<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>'); ?>
                                    
                                        </td>
                                        <td>
                                                <?php echo $items['name']; ?>

                                                <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                                        <p>
                                                                <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                                                        <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                                                <?php endforeach; ?>
                                                        </p>

                                                <?php endif; ?>

                                        </td>
                                        <td style="text-align:right">
                                        Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
                                        <td style="text-align:right">Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                                </tr>

                        <?php $i++; ?>

                        <?php endforeach; ?>

                        <tr>
                                <td colspan="3"> </td>
                                <td class="right"><strong>Total</strong></td>
                                <td class="right">Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></td>
                        </tr>

                        </table>
                    <br><br/>
                  
                    <p class="pull-right"><input type="submit" value="Selesai" class="hitam"></p>
                    <?php echo form_close(); ?>
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


<!-- Modal -->
<?php $this->load->view('modal'); ?>