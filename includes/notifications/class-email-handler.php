<?php
/**
 * Classe de gestion des emails
 * 
 * @package MH_Booking_System
 */

if (!defined('ABSPATH')) {
    exit;
}

class MH_Booking_Email_Handler {
    
    public function __construct() {
        // Hooks à venir
    }
    
    /**
     * Envoyer email de confirmation
     */
    public function send_confirmation_email($reservation_id) {
        // À implémenter
        return true;
    }
    
    /**
     * Envoyer notification admin
     */
    public function send_admin_notification($reservation_id) {
        // À implémenter
        return true;
    }
}