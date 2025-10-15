<?php
/**
 * Classe Formulaire de réservation
 * 
 * @package MH_Booking_System
 */

if (!defined('ABSPATH')) {
    exit;
}

class MH_Booking_Form {
    
    public function __construct() {
        add_shortcode('mh_booking_form', array($this, 'render_form'));
    }
    
    /**
     * Afficher le formulaire
     */
    public function render_form($atts) {
        return '<div class="mh-booking-form">Formulaire de réservation à venir...</div>';
    }
}