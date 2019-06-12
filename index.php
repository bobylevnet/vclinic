<?php get_header(); ?>


<?php 

?>




<?php 

  $idp=0;
   if (get_the_id() == get_option('page_on_front')) {
      $idp=1;
  }
  else {
    $idp=0;
  }
?>


<?php $sthtml = 
 '<div class="flt-right">  <div id="one-side" class="sidebar">';
 $enhtml ='</div> </div>  ';
 ?>

 

   
   

<div id="main" class="container">
<div class="row">

<?php if ( is_active_sidebar( 'one_side' ) &&  $idp==0 ) : ?>

   <?php 
 
   echo $sthtml;
   dynamic_sidebar( 'one_side' ); 
   echo $enhtml;
   ?>
 
<?php endif; ?>







<div class="">
<?= breadcrumbs(" » ", "Главная" ,$idp); ?>
<?php
$more = 1;


if (have_posts()) :
    while (have_posts()) :
            echo '<h2>';
            the_title();
            echo '</h2>';
            the_post();
          the_content();
    endwhile;
 endif;



 ?>
 </div>
</div> <!--row-->
</div> <!--container-->


<?php get_footer();?>