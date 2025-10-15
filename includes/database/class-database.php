<?php
/**
 * Classe de gestion de la base de données
 * 
 * @package MH_Booking_System
 */

if (!defined('ABSPATH')) {
    exit;
}

class MH_Booking_Database {
    
    /**
     * Instance de wpdb
     */
    private $wpdb;
    
    /**
     * Constructeur
     */
    public function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
    }
    
    /**
     * Obtenir tous les hébergements
     */
    public function get_hebergements() {
        $table = $this->wpdb->prefix . 'mh_booking_hebergements';
        return $this->wpdb->get_results("SELECT * FROM $table WHERE statut = 'actif'");
    }
    
    /**
     * Obtenir un hébergement par ID
     */
    public function get_hebergement($id) {
        $table = $this->wpdb->prefix . 'mh_booking_hebergements';
        return $this->wpdb->get_row($this->wpdb->prepare("SELECT * FROM $table WHERE id = %d", $id));
    }
}