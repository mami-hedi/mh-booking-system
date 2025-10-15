<?php
/**
 * Schéma de la base de données
 * 
 * @package MH_Booking_System
 */

if (!defined('ABSPATH')) {
    exit;
}

class MH_Booking_Schema {
    
    /**
     * Créer les tables
     */
    public static function create_tables() {
        global $wpdb;
        
        $charset_collate = $wpdb->get_charset_collate();
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        
        // Table hébergements
        $table_hebergements = $wpdb->prefix . 'mh_booking_hebergements';
        $sql_hebergements = "CREATE TABLE IF NOT EXISTS $table_hebergements (
            id bigint(20) NOT NULL AUTO_INCREMENT,
            nom varchar(255) NOT NULL,
            description text,
            capacite int(11) DEFAULT 2,
            nombre_lits int(11) DEFAULT 1,
            equipements text,
            photos text,
            statut varchar(20) DEFAULT 'actif',
            date_creation datetime DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) $charset_collate;";
        
        // Table tarifs
        $table_tarifs = $wpdb->prefix . 'mh_booking_tarifs';
        $sql_tarifs = "CREATE TABLE IF NOT EXISTS $table_tarifs (
            id bigint(20) NOT NULL AUTO_INCREMENT,
            hebergement_id bigint(20) NOT NULL,
            type_tarif varchar(50) DEFAULT 'nuit',
            saison varchar(50) DEFAULT 'normale',
            prix_base decimal(10,2) NOT NULL,
            prix_personne_sup decimal(10,2) DEFAULT 0,
            date_debut date,
            date_fin date,
            PRIMARY KEY (id),
            KEY hebergement_id (hebergement_id)
        ) $charset_collate;";
        
        // Table réservations
        $table_reservations = $wpdb->prefix . 'mh_booking_reservations';
        $sql_reservations = "CREATE TABLE IF NOT EXISTS $table_reservations (
            id bigint(20) NOT NULL AUTO_INCREMENT,
            hebergement_id bigint(20) NOT NULL,
            nom_client varchar(255) NOT NULL,
            email_client varchar(255) NOT NULL,
            telephone varchar(50),
            date_arrivee date NOT NULL,
            date_depart date NOT NULL,
            nombre_personnes int(11) DEFAULT 1,
            prix_total decimal(10,2) NOT NULL,
            statut varchar(20) DEFAULT 'en_attente',
            date_reservation datetime DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id),
            KEY hebergement_id (hebergement_id),
            KEY statut (statut)
        ) $charset_collate;";
        
        // Table meta réservations
        $table_meta = $wpdb->prefix . 'mh_booking_reservation_meta';
        $sql_meta = "CREATE TABLE IF NOT EXISTS $table_meta (
            meta_id bigint(20) NOT NULL AUTO_INCREMENT,
            reservation_id bigint(20) NOT NULL,
            meta_key varchar(255),
            meta_value longtext,
            PRIMARY KEY (meta_id),
            KEY reservation_id (reservation_id),
            KEY meta_key (meta_key)
        ) $charset_collate;";
        
        // Exécuter les requêtes
        dbDelta($sql_hebergements);
        dbDelta($sql_tarifs);
        dbDelta($sql_reservations);
        dbDelta($sql_meta);
    }
