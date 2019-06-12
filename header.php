<!DOCTYPE html>
<html>
    <?php global $post;?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo get_post_meta($post->ID, 'title', true); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head();?>

</head>
<body <?php body_class() ?>>





    
<header id="head" class="container">
<div class=" header row ">

<div class="logo col-md-5  vertical-center "> 

    <?php the_custom_logo( 1 ); ?>
   
    <img class = "wdthfull" src="/wp-content/uploads/2019/04/risunok-1.svg_.2019_04_26_09_36_51.0.svg_.png" />
</div>

<!--<div class="col-md-4">-->
  <!--<img src="wp-content/uploads/2019/04/risunok-1.svg_.2019_04_26_09_36_51.0.svg_.png" />!-->
<!--</div>-->
<div class="address-header col-md-3 col-xs-12 vertical-center">
    <div class="address">
      <span><?= get_option('city');?></span> 
      <span><?= get_option('street') ?></span> 
      <span><?= get_option('house') ?></span> 
      <span><a href="<?= get_option('passage')?>">Схема проезда</a> </span>       
    </div>     
  </div>

  <div class="vertical-center phone col-md-3 col-xs-9 ">
    <a  href="tel:<?= str_replace(' ', '', get_option('phone')); ?>"> <?= get_option('phone');?></a>
  </div>

 

  
</div>



<nav id="myNavbar" class="navbar navbar-default animatenav">
  <div class="container-fluid">
    <!-- мобильное отображение-->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
     </button>
    </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <?php 
        wp_nav_menu( array(
	        'menu_class'=>'nav nav-pills nav-justified',
            'theme_location'=>'top',
            'after'=>'' ,
             'walker'=> new menuBootsrap('top')
            )   );
?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>






    
