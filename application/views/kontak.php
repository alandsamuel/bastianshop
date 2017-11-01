<div class="row">
    <div class="col-md-8 col-md-offset-1">
        <h2>Selamat Datang, <?php echo $user; ?></h2>
    </div>
</div>

<br>
<!-- navbar bawah -->

<?php switch($is_login) {

    case '1':
    ?>
<!-- menu bawah -->
<div class="row">
    <div class="col-md-8 col-md-offset-2 wow zoomInUp">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> | About Us </h3>
          </div>
          <div class="panel-body about">
            <div class="row">
              <div class="col-md-12" style="color:black;" >
                    <p class="note"><img src="<?php echo IMG.'sip.jpg'; ?>" height="80%" width="80%" class="wow swing" data-wow-delay="0.6s"/></p>
                  <h5>
                  <header>
                    Kontak kami :
                  </header>
                  <br>
                  <article style="padding-left:20px; font-size:16px;">
                    <span class="glyphicon glyphicon-earphone"></span> : 081878187818<br>
                    <span class="glyphicon glyphicon-phone"></span> : 081878187818<br><br>
                    Line  : BHarry<br>
                    <br>  
                  </article>
                  </h5>    
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