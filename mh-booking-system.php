<?php
/**
 * Plugin Name: MH Booking System
 * Plugin URI: https://www.mh-digital-solution.com/
 * Description: Système complet de réservation pour hébergements - Gestion des chambres, tarifs et réservations
 * Version: 1.0.0
 * Author: MH Digital Solution
 * Author URI: https://www.mh-digital-solution.com/
 * Text Domain: mh-booking-system
 * Domain Path: /languages
 * Requires at least: 5.8
 * Requires PHP: 7.4
 * License: GPL v2 or later
 */

// Si ce fichier est appelé directement, on quitte
if (!defined('ABSPATH')) {
    exit;
}

// Définir les constantes du plugin
define('MH_BOOKING_VERSION', '1.0.0');
define('MH_BOOKING_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('MH_BOOKING_PLUGIN_URL', plugin_dir_url(__FILE__));
define('MH_BOOKING_PLUGIN_BASENAME', plugin_basename(__FILE__));

/**
 * Code à exécuter lors de l'activation du plugin
 */
function activate_mh_booking_system() {
    require_once MH_BOOKING_PLUGIN_DIR . 'includes/class-activator.php';
    MH_Booking_Activator::activate();
}

/**
 * Code à exécuter lors de la désactivation du plugin
 */
function deactivate_mh_booking_system() {
    require_once MH_BOOKING_PLUGIN_DIR . 'includes/class-deactivator.php';
    MH_Booking_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_mh_booking_system');
register_deactivation_hook(__FILE__, 'deactivate_mh_booking_system');

/**
 * Charger la classe principale du plugin
 */
require_once MH_BOOKING_PLUGIN_DIR . 'includes/class-booking-system.php';

/**
 * Initialiser le plugin
 */
function run_mh_booking_system() {
    $plugin = new MH_Booking_System();
    $plugin->run();
}

run_mh_booking_system();