<?php
/**
 * Classe principale du plugin
 * 
 * @package MH_Booking_System
 */

if (!defined('ABSPATH')) {
    exit;
}

class MH_Booking_System {
    
    /**
     * Version du plugin
     */
    protected $version;
    
    /**
     * Constructeur
     */
    public function __construct() {
        $this->version = MH_BOOKING_VERSION;
        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }
    
    /**
     * Charger les dépendances
     */
    private function load_dependencies() {
        // Charger les classes nécessaires
        require_once MH_BOOKING_PLUGIN_DIR . 'includes/database/class-database.php';
        require_once MH_BOOKING_PLUGIN_DIR . 'includes/database/schema.php';
        
        // Charger les classes admin si on est dans l'admin
        if (is_admin()) {
            require_once MH_BOOKING_PLUGIN_DIR . 'includes/admin/class-admin.php';
            require_once MH_BOOKING_PLUGIN_DIR . 'includes/admin/class-hebergements.php';
            require_once MH_BOOKING_PLUGIN_DIR . 'includes/admin/class-tarifs.php';
            require_once MH_BOOKING_PLUGIN_DIR . 'includes/admin/class-reservations.php';
            require_once MH_BOOKING_PLUGIN_DIR . 'includes/admin/class-settings.php';
        }
        
        // Charger les classes frontend
        require_once MH_BOOKING_PLUGIN_DIR . 'includes/frontend/class-frontend.php';
        require_once MH_BOOKING_PLUGIN_DIR . 'includes/frontend/class-booking-form.php';
        require_once MH_BOOKING_PLUGIN_DIR . 'includes/frontend/class-calendar.php';
        
        // Charger le système de notifications
        require_once MH_BOOKING_PLUGIN_DIR . 'includes/notifications/class-email-handler.php';
    }
    
    /**
     * Définir les hooks admin
     */
    private function define_admin_hooks() {
        if (is_admin()) {
            $admin = new MH_Booking_Admin();
        }
    }
    
    /**
     * Définir les hooks frontend
     */
    private function define_public_hooks() {
        $frontend = new MH_Booking_Frontend();
    }
    
    /**
     * Lancer le plugin
     */
    public function run() {
        // Charger les traductions
        add_action('plugins_loaded', array($this, 'load_textdomain'));
    }
    
    /**
     * Charger les traductions
     */
    public function load_textdomain() {
        load_plugin_textdomain(
            'mh-booking-system',
            false,
            dirname(MH_BOOKING_PLUGIN_BASENAME) . '/languages/'
        );
    }
    
    /**
     * Obtenir la version du plugin
     */
    public function get_version() {
        return $this->version;
    }
}

