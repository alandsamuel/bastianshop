<div class="container">
    <div class="row">
        <br>
        <br>
        <div class="col-md-4 col-md-offset-4 kotak shadow">
            <h2 style="color:black;">Login</h2>
            <hr style="border-top:1px black dashed">
            <form class="form-horizontal" <?php echo form_open("auth/cek_login"); ?>
                      <div class="form-group">
                        <label class="control-label col-sm-4" for="uname">Username:</label>
                        <div class="col-sm-8"> 
                          <input type="text" class="form-control" name="username" placeholder="Masukan username">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-4" for="pwd">Password:</label>
                        <div class="col-sm-8"> 
                          <input type="password" class="form-control"  name="password" placeholder="Masukan password">
                        </div>
                      </div>
                      <div class="form-group"> 
                        <div class="col-sm-offset-6 col-sm-12">
                          <button type="submit" class="btn btn-default">Log In</button>
                        </div>
                      </div>
            <?php echo form_close(); ?>
        
        
        </div>
    
    </div>
</div>