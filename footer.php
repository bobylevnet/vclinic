


<footer class="page-footer font-small blue pt-4" style="background: #2d3246;">

<div class="container text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-6 mt-md-0 mt-3">

         <img src="http://vclinic89.h1n.ru/wp-content/uploads/2019/04/logofooter-3.png"/> 
          <!--<h3> <?php bloginfo("description"); ?> </h3>-->

          <!-- Content -->
          <h5 class="text-uppercase">О клинике</h5>
          <p>«Помочь каждому хвосту» — главный принцип сотрудников ветеринарной клиники «Ноябрьский центр ветеринарии», где каждый день принимают квалифицированные врачи различных направлений, готовые провести любые необходимые диагностические и лечебные процедуры домашним питомцам.</div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3 bottom-menu" >

            <!-- Links -->
            <h3 class="text-uppercase">Меню</h3>
           
            <?php 
            wp_nav_menu( array(
            	'menu_class'=>'list-unstyled',
                'theme_location'=>'',
                'after'=>'' ,
                'walker'=> new menuBootsrapBottom('bottom')
            ) );
            ?>
            

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div  class="col-md-3 mb-md-0 mb-3 contact">

            <!-- Links -->
            <h3 class="text-uppercase">Контакты:</h3>
            <p style="fon">Ноябрьский центр ветеринарии</p>
            <hr class="clearfix w-60 d-md-none pb-3">
            <p>Город: ЯНАО <?= get_option('city');?> </p>
            <hr class="clearfix w-60 d-md-none pb-3">
            <p><?= get_option('street') ?> <?= get_option('house') ?></p>
            <hr class="clearfix w-60 d-md-none pb-3">
            
         
          </div>
          <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center ">©  <?= date('Y');?> Copyright:
      <a href=<?php echo home_url();?>>Vclinic.ru</a>
    </div>
    <!-- Copyright -->
</footer>
<?php  get_sidebar(); ?>
<?php wp_footer();?>
<?php get_category(',');?>
</body>
</html>