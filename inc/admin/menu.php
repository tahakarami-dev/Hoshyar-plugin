<?php 

class HYA_Menu {
    public function __construct() {
        add_action('admin_menu', array($this, 'add_menu'));
    }

    public function add_menu() {
        $logo_url = HYA_ASSETS . 'images/admin/logo.png';
        add_menu_page(
            'هوشیار',
            'هوشیار', 
            'manage_options', 
            'dashboard-hooshyar', 
            array($this, 'main_menu_page'), 
            $logo_url,
            2 
        );

        
        add_submenu_page(
            'dashboard-hooshyar', 
            'تنظیمات هوشیار', 
            'تنظیمات', 
            'manage_options', 
            'hya_menu_settings',
            array($this, 'settings_page')
        );
       
    }

    public function main_menu_page() {
        require_once HYA_VIEWS_PATH . 'admin/dashboard/dashboard.php';
    }

    public function settings_page() {
        // محتوای صفحه تنظیمات
        echo '<div class="wrap"><h1>تنظیمات هوشیار</h1>';
        if (function_exists('csf_init')) {
            do_action('csf_hya_menu_settings'); // لود تنظیمات Codestar
        } else {
            echo '<div class="notice notice-error"><p>خطا در بارگذاری تنظیمات.</p></div>';
        }
        echo '</div>';
    }

  
}

