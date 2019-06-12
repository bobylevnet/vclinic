<?php





    function insertmenu () {
      $html =  '<div class="container">
       <div class="row">
       
         <div class="img-flt-right col-md-4 col-xs-10 ">'.
            '<h2>'. wp_get_nav_menu_name('onemenu'). '</h2>'.
            '<img src="/wp-content/themes/vlicnictheme/img/menu1.png"/>'.
            wp_nav_menu(['theme_location'=>'onemenu', 'container_class'=>'menu-content', 'echo'=>false]).
           
         '</div>
       
         <div class="col-md-4 img-flt-right col-xs-10">
           <h2>'. wp_get_nav_menu_name('twomenu'). '</h2>'.
           '<img src="/wp-content/themes/vlicnictheme/img/menu2.png"/>'.
           wp_nav_menu(['theme_location'=>'twomenu', 'container_class'=>'menu-content', 'echo'=>false]).
           
         '</div>
       
         <div class="col-md-4 img-flt-right col-xs-10">
            <h2>'. wp_get_nav_menu_name('threemenu'). '</h2>'.
            '<img src="/wp-content/themes/vlicnictheme/img/menu3.png"/>'.
           wp_nav_menu(['theme_location'=>'threemenu', 'container_class'=>'menu-content', 'echo'=>false]).
         
         '</div>
       
       </div>
       </div>';
    
       return $html;
    
    }

    
    


    add_shortcode('menus','insertmenu');
    






function true_register_wp_sidebars() {
 
	/* 1 */
	register_sidebar(
		array(
			'id' => 'one_side', // уникальный id
			'name' => '1 колонка', // название сайдбара
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
			'before_widget' => '<div id="%1$s" class="side widget %2$s"> <div class="wdth-well well"> <div class="nav">', // по умолчанию виджеты выводятся <li>-списком
			'after_widget' => '</div> </div> </div>',
			'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
			'after_title' => '</h3>'
		)
    );

   

    }



    
    add_action( 'widgets_init', 'true_register_wp_sidebars' );



//включаем потдержку фона в теме
add_theme_support( 'custom-background' );

//включаем потдержку логотипа
add_theme_support( 'custom-logo' );




//регистрируем меню в теме
register_nav_menus(array(
	'top'    => 'Верхнее меню',    //Название месторасположения меню в шаблоне
    'bottom' => 'Нижнее меню' ,
     'onemenu' => 'Меню1 главное страницы',
     'twomenu' => 'Меню2 главное страницы',
     'threemenu' => 'Меню3 главное страницы'        //Название другого месторасположения меню в шаблоне
));

//устаналиваем ширину sidebar равную контаэнеру 
function height_fltrigt() {
  
  wp_enqueue_script( 
        'heightsidebar.js',
        get_template_directory_uri() . '/js/heightsidebar.js',
        array('jquery')

    );

}


//подключаем bootstrap 3   и не только
function bootstrap_insjs() {

   
    wp_enqueue_script(
		'menusqroll.js',
        get_template_directory_uri() . '/js/menuscroll.js',
        array('jquery')

    );

    
	wp_enqueue_script(
		'bootstrap-js',
        get_template_directory_uri() . '/bs/js/bootstrap.min.js',
        array('jquery')

    );



    wp_enqueue_style( 'style', get_stylesheet_uri() );
    
    wp_enqueue_style(
        'bootstrap-css',
        get_template_directory_uri() . '/bs/css/bootstrap.min.css'
    );

   

    
   
}



add_action('wp_enqueue_scripts', 'bootstrap_insjs');

add_action('wp_enqueue_scripts', 'height_fltrigt');




class menuBootsrap extends Walker_Nav_Menu {

//function start_el ( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
   
    public $menus=[];



    function __construct($positionMenu) {
        //выбираем данные по меню у кого есть подменю из рсположения top
        $item = [];
        $items = [];
        $menu = wp_get_nav_menu_object( get_nav_menu_locations()[$positionMenu] );
        $items =  wp_get_nav_menu_items($menu);
        foreach ($items as $key=> $item) {
            if ($item->menu_item_parent>0) {
                    $this->menus[$item->menu_item_parent] = $item->menu_item_parent;
            }
        }
    }

    //добавляем в sub menu свой класс
    //Запускает список перед добавлением элементов.
    function start_lvl(&$output, $depth=0, $args=array()) {
      //  $indent = str_repeat("\t", $depth);
        $output .= "\n<ul class=\"dropdown-menu\">\n";
      }


      //Начинает вывод элемент к куждома пункту меню дабавляет подменю
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        
        
        $classubmenu = '';

        //проверяем содержит данное меню подменю
        if (array_search($item->ID,  $this->menus )) {
            $classubmenu = 'data-toggle="dropdown" class="dropdown-toggle"';
        }

        $output .= sprintf( "\n<li class='dropdown'><a %s href='%s'%s>%s</a>\n",
            $classubmenu,
            $item->url,
            ( $item->object_id === get_the_ID() ) ? ' class="current"' : '',
            strtoupper($item->title)
           
        );
    }

   


    function   end_el (&$output, $object, $depth = 0, $args = array ()) {

      // $output .="</ul>";
   }
    // if ($depth>0) {
     // $output = preg_replace('/ class="sub-menu"/','/ class="yourclass" /',$output); 
   // }
//}


}





class menuBootsrapBottom extends menuBootsrap 
{
        function __construct($positionMenu) {
                parent::__construct($positionMenu);
        }


        function start_lvl(&$output, $depth=0, $args=array()) {
           // $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<ul class=\"list-unstyled\">\n";
          }
        
            //Начинает вывод элемента
            function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
             $classubmenu="";
             $output .= sprintf( "\n<li><a %s href='%s'%s>%s</a>\n",
             $classubmenu,
             $item->url,
             ( $item->object_id === get_the_ID() ) ? ' class="current"' : '',
              $item->title);
       
            }

}










?>

<?php

//хлебные крошки
function breadcrumbs($separator = ' » ', $home = 'Главная', $idexplode=0) {
   

  $explodeurl = "testimonial";

    if ($idexplode>0 ) { return ;}  
	$path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
	$base_url =  'http'. '://' . $_SERVER['HTTP_HOST'] . '/';
  $breadcrumbs = array("<a href=\"$base_url\">$home</a>");
  
  $last =  array_keys($path);
  
  //главная
  echo implode($breadcrumbs);

	foreach( $path as $x => $crumb ){
    $title	= ucwords(str_replace(array('.php', '_'), Array('', ' '), $crumb));
     
   if  ($explodeurl ==  $crumb) { continue; };
   
     if( $x != $last ){
      //if ($titlePage==the_title()) {
          echo $separator  .'<a href=" '.$base_url.$crumb.'">' ; 
         echo  get_the_title(url_to_postid($base_url.$crumb));
          echo '</a>';
     // }
		}
		else {
			$breadcrumbs[] = $title;
		}
	}

	
}

?>