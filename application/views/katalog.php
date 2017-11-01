<div class="row">
    <div class="col-md-8 col-md-offset-1">
        <h2>Selamat Datang, <?php echo $user; ?></h2>
    </div>
</div>

<!-- menu random -->
<?php 
$data['asal']='katalog';
$this->load->view('menuatas',$data); ?>
<hr>


<div class="row">
    <div class="col-md-7 col-md-offset-2 wow fadeIn">
    <?php $default=0; ?>
    <?php  foreach($barang as $b){ 
        $default = $default +3;
        $delay = $default/10;?>
        <div class="kotakdisplay wow flipInX" data-wow-delay="<?php echo $delay; ?>s">
            <div class="isi">
            <img src="<?php echo IMG.$b->gambar; ?>" alt="xl" height="100" width="100">
            <p><?php echo $b->nama; ?></p>
              <a href="<?php echo URL.'home/addCart/'.$b->idbarang; ?>/katalog" >
                <button type="button" class="btn btn-success ">Add To Cart</button>
              </a>
            </div>
          </div>
        <?php } ?>
    </div>
    
    <div class="col-md-2">
        <div class="list-group">
          <a href="#" class="list-group-item disabled">
            Kategori
          </a>
          <a href="<?php echo URL.'home/page/katalog/pulsa';?> " class="list-group-item">Pulsa <span class="badge"><?php echo $pulsa; ?></span></a>
          <a href="<?php echo URL.'home/page/katalog/paket';?> " class="list-group-item">Paket Data <span class="badge"><?php echo $pd; ?></span></a>
          <a href="<?php echo URL.'home/page/cart';?> " class="list-group-item">Cart <span class="badge"><?php echo count($this->cart->contents()); ?></span></a>
        </div>
    </div>
</div>

<hr class="tebal"/>




<!-- Modal -->
<?php $this->load->view('modal'); ?>