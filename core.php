<?php
/*
Plugin Name:  هوشیار
Description:  دستیار هوشمند وردپرس برای تولید محتوا، مدیریت سایت و ارتقای بهره‌وری با قدرت هوش مصنوعی! 
Version: 1.0.0
Author: طاها کرمی
*/

defined('ABSPATH') || exit('NO Access');


class Core
{

    private static $_instance = null;

    const MINIUM_PHP_VERSION = '7.2';

    public static function instance()
    {

        if (is_null(self::$_instance)) {

            self::$_instance = new self();
        }

        return  self::$_instance;
    }

    public function __construct()
    {

        if (version_compare(PHP_VERSION, self::MINIUM_PHP_VERSION, '<')) {
            add_action('admin_notices', [$this, 'admin_php_notice']);
            return;
        }

        $this->constant();
        $this->init();
    }


    public function constant()
    {

        if (!function_exists('get_plugin_data')) {

            require_once(ABSPATH . 'wp-admin/includes/plugin.php');
        }

        define('HYA_BASE_FILE', __FILE__);
        define('HYA_PATH', trailingslashit(plugin_dir_path(HYA_BASE_FILE)));
        define('HYA_URL', trailingslashit(plugin_dir_url(HYA_BASE_FILE)));
        define('HYA_ADMIN_ASSETS', trailingslashit(HYA_URL . 'assets/admin'));
        define('HYA_FRONT_ASSETS', trailingslashit(HYA_URL . 'assets/front'));
        define('HYA_INC_PATH', trailingslashit(HYA_PATH . 'inc'));
        define('HYA_VIEWS_PATH', trailingslashit(HYA_PATH . 'views'));





        $HYA_plugin_data =  get_plugin_data(HYA_BASE_FILE, '<');
        define('HYA_VER',  $HYA_plugin_data['Version']);
    }

    public function init()
    {

        require_once HYA_PATH . 'vendor/autoload.php';
        require_once HYA_INC_PATH . 'admin/codestar/codestar-framework.php';
        require_once HYA_INC_PATH . 'admin/hya-settings.php';
        require_once  HYA_INC_PATH . 'functions.php';


        register_activation_hook(HYA_BASE_FILE, [$this, 'active']);
        register_deactivation_hook(HYA_BASE_FILE, [$this, 'deactive']);


        hya_settings();






        new HYA_ASSETS();

        if (is_admin()) {

            new HYA_Menu();
        } else {
        }
    }

    public function active()
    {

        // HYA_DB::create_table();

    }



    public function deactive() {}

    public function admin_php_notice()
    { ?>
        <div class="notice notice-error">
            <p>افزونه هوشیار برای اجرا صحیح نیاز به نسخه 7.2 به بالا دارد لطفا نسخه php هاست خود را ارتقا دهید
            </p>
        </div>
<?php
    }
}

Core::instance();
