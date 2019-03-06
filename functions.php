

<?php 
register_nav_menus(array(
	'top'    => 'Верхнее меню',    //Название месторасположения меню в шаблоне
	'bottom' => 'Нижнее меню'      //Название другого месторасположения меню в шаблоне
));



?>





<?php





function bootstrap_insjs() {
	wp_enqueue_script(
		'bootstrap-js',
        get_template_directory_uri() . '/bs/js/bootstrap.min.js',
        array('jquery')

    );
    
    wp_enqueue_style(
        'bootstrap-css',
        get_template_directory_uri() . '/bs/css/bootstrap.min.css'
    );
}






add_action('wp_enqueue_scripts', 'bootstrap_insjs');
?>