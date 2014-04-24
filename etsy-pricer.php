<?php
/*
Plugin Name: Etsy Pricer
Plugin URI: http://devjunkyard.com
Description: Etsy Pricer calculates the optimal selling price for items so you stay profitable
Author: Sean Kennedy
Author URI: http://devjunkyard.com
Version: 1.0.0
License: MIT
*/
if (!defined('ABSPATH')) exit;
if (!class_exists('EtsyPricer')):
    class EtsyPricer {

        /*************************************************
         * VARIABLES
         ************************************************/

        const NAME = 'EtsyPricer';
        const NAME_LOWER = 'etsypricer';
        const VERSION = '1.0.0';
        const SLUG = 'etsypricer';

        static $instance;
        static $enqueue;



        /*************************************************
         * INITIALIZE / CONFIGURE
         ************************************************/

        static function load() {
            if (!self::$instance) {
                self::$instance = new self;
            }
            return self::$instance;
        }

        public function __construct() {
            $this->_init();
        }

        protected function _init() {
            add_action('init', array($this, 'scriptsRegister'));
            add_shortcode('etsy-pricer', array($this, 'etsyPricer'));
        }

        public static function activate() {
        }

        public static function deactivate() {
        }

        public static function uninstall() {
        }

        public static function scriptsRegister() {
            wp_register_script(self::SLUG.'-scripts', plugins_url( '/js/scripts.js' , __FILE__ ), array(), self::VERSION, true);
        }

        public static function scriptsEnqueue() {
            if (!self::$enqueue)
                return;
            wp_enqueue_style(self::SLUG.'-styles');
            wp_enqueue_script(self::SLUG.'-scripts');
        }

        public function etsyPricer() {
            self::$enqueue = true;
            ob_start();
            include plugin_dir_path(__FILE__).'templates/etsy-pricer.php';
            $shortcode = ob_get_clean();
            return $shortcode;
        }

    }
    register_activation_hook( __FILE__, array('EtsyPricer', 'activate'));
    register_deactivation_hook( __FILE__, array('EtsyPricer', 'deactivate'));
    register_uninstall_hook(__FILE__, array('EtsyPricer', 'uninstall'));
    add_action('plugins_loaded', array('EtsyPricer', 'load'));
endif;