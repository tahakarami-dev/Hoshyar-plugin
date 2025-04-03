<?php 

defined('ABSPATH') || exit('NO Access');

class HYA_ASSETS{

    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this ,'front_assets'], 999);
        add_action('admin_enqueue_scripts', [$this ,'admin_assets'] , );

    }
    public function admin_assets(){
        //css
        wp_enqueue_style('HYA-admin-style' , HYA_ADMIN_ASSETS . 'css/style.css');


       //script
       wp_enqueue_media();
        wp_enqueue_script('HYA-main' , HYA_ADMIN_ASSETS . 'js/main.js' , ['jquery'] ,HYA_VER ,true);
        wp_enqueue_script('HYA-chart' ,  'https://cdn.jsdelivr.net/npm/chart.js' , ['jquery'] ,HYA_VER ,true);

        wp_localize_script('HYA-main','HYA_DATA', [
            'ajax_url' => admin_url('admin-ajax.php'),
        ]);

    }

    public function front_assets(){

        wp_enqueue_style('HYA-style_front' , HYA_FRONT_ASSETS . 'css/style.css' , '', HYA_VER );




        // scripts
        wp_enqueue_script('HYA-scripts', HYA_FRONT_ASSETS . 'js/scripts.js', ['jquery'], '', true);

        wp_localize_script('HYA-scripts','HYA_DATA_AJAX', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('HYA_ajax_nonce' )
        ]);
        

        

    }



}