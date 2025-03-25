<?php 

class HYA_Menu {
    public function __construct() {
        add_action('admin_menu', array($this, 'add_menu'));
    }

    public function add_menu() {
        add_menu_page(
            'هوشیار',
            'هوشیار', 
            'manage_options', 
            'hoshyar', 
            array($this, 'main_menu_page'), 
            'dashicons-lightbulb',
            2 
        );

        
        add_submenu_page(
            'hoshyar', 
            'تنظیمات هوشیار', 
            'تنظیمات', 
            'manage_options', 
            'hya_menu_settings',
            array($this, 'settings_page')
        );
       
    }

    public function main_menu_page() {
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

