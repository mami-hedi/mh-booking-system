<?php
/**
 * Classe principale Admin
 * 
 * @package MH_Booking_System
 */

if (!defined('ABSPATH')) {
    exit;
}

class MH_Booking_Admin {
    
    /**
     * Constructeur
     */
    public function __construct() {
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_assets'));
    }
    
    /**
     * Ajouter le menu admin
     */
    public function add_admin_menu() {
        add_menu_page(
            'MH Booking',
            'MH Booking',
            'manage_options',
            'mh-booking',
            array($this, 'display_main_page'),
            'dashicons-calendar-alt',
            30
        );
        
        add_submenu_page(
            'mh-booking',
            'Hébergements',
            'Hébergements',
            'manage_options',
            'mh-booking-hebergements',
            array($this, 'display_hebergements_page')
        );
        
        add_submenu_page(
            'mh-booking',
            'Réservations',
            'Réservations',
            'manage_options',
            'mh-booking-reservations',
            array($this, 'display_reservations_page')
        );
        
        add_submenu_page(
            'mh-booking',
            'Tarifs',
            'Tarifs',
            'manage_options',
            'mh-booking-tarifs',
            array($this, 'display_tarifs_page')
        );
        
        add_submenu_page(
            'mh-booking',
            'Paramètres',
            'Paramètres',
            'manage_options',
            'mh-booking-settings',
            array($this, 'display_settings_page')
        );
    }
    
    /**
     * Afficher la page principale
     */
    public function display_main_page() {
        echo '<div class="wrap">';
        echo '<h1>MH Booking System - Tableau de bord</h1>';
        echo '<p>Bienvenue dans votre système de réservation !</p>';
        echo '</div>';
    }
    
    /**
     * Afficher la page hébergements
     */
    public function display_hebergements_page() {
        echo '<div class="wrap">';
        echo '<h1>Gestion des Hébergements</h1>';
        echo '<p>Liste des hébergements à venir...</p>';
        echo '</div>';
    }
    
    /**
     * Afficher la page réservations
     */
    public function display_reservations_page() {
        echo '<div class="wrap">';
        echo '<h1>Gestion des Réservations</h1>';
        echo '<p>Liste des réservations à venir...</p>';
        echo '</div>';
    }
    
    /**
     * Afficher la page tarifs
     */
    public function display_tarifs_page() {
        echo '<div class="wrap">';
        echo '<h1>Gestion des Tarifs</h1>';
        echo '<p>Configuration des tarifs à venir...</p>';
        echo '</div>';
    }
    
    /**
     * Afficher la page paramètres
     */
    public function display_settings_page() {
        echo '<div class="wrap">';
        echo '<h1>Paramètres MH Booking</h1>';
        echo '<p>Configuration du plugin à venir...</p>';
        echo '</div>';
    }
    
    /**
     * Charger les assets admin
     */
    public function enqueue_admin_assets($hook) {
        if (strpos($hook, 'mh-booking') === false) {
            return;
        }
        
        wp_enqueue_style(
            'mh-booking-admin',
            MH_BOOKING_PLUGIN_URL . 'admin/css/admin-style.css',
            array(),
            MH_BOOKING_VERSION
        );
        
        wp_enqueue_script(
            'mh-booking-admin',
            MH_BOOKING_PLUGIN_URL . 'admin/js/admin-script.js',
            array('jquery'),
            MH_BOOKING_VERSION,
            true
        );
    }
}