<div class="row">
    <div class="display">
    <div class="col-md-8 col-md-offset-2">
    <div class="row">
    
        <br><br/>  
        <?php $default = 0;?>
        <?php  foreach($bxl as $brngxl){ 
        $default++;
        $delay = ($default+1)/10;?>
        <div class="kotakdisplaybesar wow flipInX" data-wow-delay="<?php echo $delay;?>s">
            <div class="isi">
            <img src="<?php echo IMG.$brngxl->gambar; ?>" alt="xl" height="300" width="300">
            <p><?php echo $brngxl->nama; ?></p>
              <a href="<?php echo URL.'index.php/home/addCart/'.$brngxl->idbarang.'/'.$asal; ?>" >
                <button type="button" class="btn btn-success ">Add To Cart</button>
              </a>
            </div>
          </div>
        <?php } ?>
        <?php  foreach($bm as $brng){ 
        $default = $default+3;;
        $delay = ($default+3)/10;?>
        <div class="kotakdisplaykecil wow flipInX" data-wow-delay="<?php echo $delay;?>s">
            <div class="isi">
            <img src="<?php echo IMG.$brng->gambar; ?>" alt="xl" height="100" width="100">
            <p><?php echo $brng->nama; ?></p>
              <a href="<?php echo URL.'index.php/home/addCart/'.$brng->idbarang.'/'.$asal; ?>" >
                <button type="button" class="btn btn-success ">Add To Cart</button>
              </a>
            </div>
          </div>
        <?php } ?>
    </div>
    </div>
    </div>

</div>