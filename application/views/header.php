<!DOCTYPE html>
<html>
<head>
<!--
YOU CAN SEE, BUT YOU CAN'T COPY! 
DON'T STEAL SOMEONE WORKS!
IF YOU WANT USE THIS TEMPLATE, JUST FIND ME ON FACEBOOK.

-= Aland Samuel Tiwa =-
-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bastian Shop">
    <meta name="author" content="Aland Samuel Tiwa">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo IMG.'icon.ico'; ?>" />
    
<title><?php echo $title ?></title>
<link rel="stylesheet" href="<?php echo CSS.'bootstrap.min.css'; ?>" />
<link rel="stylesheet" href="<?php echo CSS.'toko.css'; ?>" />
<link rel="stylesheet" href="<?php echo CSS.'font-awesome.min.css'; ?>"/>
<link rel="stylesheet" href="<?php echo CSS.'animate.min.css';?>"/>
<script type="text/javascript" src="<?php echo JS.'jQuery.js'; ?>"></script>
<script type="text/javascript" src="<?php echo JS.'bootstrap.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo JS.'wow.min.js'; ?>"></script>

<script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
    
<script type="text/javascript">

</script>

</head>

<body>
    <!--<div id="loading">
      <img id="loading-image" src="<?php echo IMG; ?>nyan.gif" alt="Loading..." />
    </div> -->
    
    <div id="menu-atas">
	<div id="atas">
		<div class="logo">
            <?php switch($is_login){ 
            
        case '1': 
            echo '<img src="'.IMG.'logow.png" height="100" width="200" /> &nbsp;';
            echo '<b><a href="'.URL.'home/page/index" alt="Home">Home</a> </b>&nbsp;';
            echo '<a href="'.URL.'home/page/katalog/pulsa" alt="Katalog">Katalog</a> &nbsp;';
            echo '<b><a href="'.URL.'home/page/about" alt="About">About</a> </b>&nbsp;';
            echo '<a href="'.URL.'home/page/contact" alt="Contact">Contact</a> &nbsp;';
            echo '<a href="'.URL.'home/page/cart" alt="cart" class="pepet-kanan">Cart <span class="badge">'.count($this->cart->contents()).'</span></a> &nbsp;&nbsp;';
            echo '<a href="'.URL.'home/logout" alt="Contact"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Log Out </a> &nbsp;';
            break;
        
        default:
            echo '<img src="'.IMG.'logow.png" height="100" width="200" /> &nbsp;';
            echo '<b><a href="'.URL.'auth" alt="Login" >Login</a> &nbsp;</b>';
            echo '<a href="'.URL.'auth/daftar" alt="daftar">Daftar</a> &nbsp;';
            
}?>
	</div>
        
	</div>
    </div>



<content>
    
 