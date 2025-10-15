<?php
/**
 * Classe d'activation du plugin
 * 
 * @package MH_Booking_System
 */

if (!defined('ABSPATH')) {
    exit;
}

class MH_Booking_Activator {
    
    /**
     * Actions à effectuer lors de l'activation
     */
    public static function activate() {
        // Créer les tables de la base de données
        self::create_tables();
        
        // Créer les options par défaut
        self::create_default_options();
        
        // Créer les capabilities pour les rôles
        self::add_capabilities();
        
        // Flush les rewrite rules
        flush_rewrite_rules();
    }
    
    /**
     * Créer les tables
     */
    private static function create_tables() {
        require_once MH_BOOKING_PLUGIN_DIR . 'includes/database/schema.php';
        MH_Booking_Schema::create_tables();
    }
    
    /**
     * Créer les options par défaut
     */
    private static function create_default_options() {
        $default_options = array(
            'mh_booking_version' => MH_BOOKING_VERSION,
            'mh_booking_currency' => 'EUR',
            'mh_booking_currency_position' => 'after',
            'mh_booking_date_format' => 'd/m/Y',
            'mh_booking_time_format' => 'H:i',
            'mh_booking_admin_email' => get_option('admin_email'),
            'mh_booking_confirmation_page' => '',
            'mh_booking_terms_page' => '',
        );
        
        foreach ($default_options as $key => $value) {
            if (get_option($key) === false) {
                add_option($key, $value);
            }
        }
    }
    
    /**
     * Ajouter les capabilities
     */
    private static function add_capabilities() {
        $role = get_role('administrator');
        if ($role) {
            $role->add_cap('manage_bookings');
            $role->add_cap('edit_bookings');
            $role->add_cap('delete_bookings');
            $role->add_cap('manage_hebergements');
        }
    }
}