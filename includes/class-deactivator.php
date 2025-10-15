<?php
/**
 * Classe de désactivation du plugin
 * 
 * @package MH_Booking_System
 */

if (!defined('ABSPATH')) {
    exit;
}

class MH_Booking_Deactivator {
    
    /**
     * Actions à effectuer lors de la désactivation
     */
    public static function deactivate() {
        // Flush les rewrite rules
        flush_rewrite_rules();
        
        // Nettoyer les tâches cron planifiées
        self::clear_scheduled_hooks();
    }
    
    /**
     * Nettoyer les hooks planifiés
     */
    private static function clear_scheduled_hooks() {
        wp_clear_scheduled_hook('mh_booking_check_expired_reservations');
        wp_clear_scheduled_hook('mh_booking_send_reminders');
    }
}

